<?php

namespace App\Http\Controllers\Api\v2;

use App\Exports\PatientLogExport;
use App\Exports\PatientsExport;
use App\Exports\PatientTodayAppointmentsExport;
use App\Http\Controllers\Controller;
use App\Mail\AppointmentInvitation;
use App\Mail\PatientCredentials;
use App\Models\Appointment;
use App\Models\AutoMail;
use App\Models\Employee;
use App\Models\HealthHistory;
use App\Models\Patient;
use App\Modules\Common\Helper;
use App\Modules\Core\LogActivity;
use App\Traits\FrontOfficeTrait;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class PatientsController extends Controller
{
    //TIED TO v1/patients/all ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    use FrontOfficeTrait;

    private $landing_page_fields = [
        'id',
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'home_address',
        'patient_phone',
        'unique_identifier',
        'photo',
        'street',
        'ext',
        'house_number',
        'city',
        'postalcode',
        'BSN'
    ];

    public function index()
    {
        // if ($this->authUser()->can('View Patients')) {
        $patients = $this->allPatients();
        return $this->customSuccessResponseWithPayload($patients);
        // }
        // return $this->customFailResponseWithPayload('Permission denied');

    }

    //return only required fields for patients landing page
    public function patients_landing_page()
    {
        $patients = DB::table('patients')->select($this->landing_page_fields)->paginate(20);
        return $this->customSuccessResponseWithPayload($patients);
    }
    //method to optimize patients consumed by front office
    public function front_office_patients()
    {
        try {
            $patients = collect(
                DB::table('patients')
                    ->leftJoin('periods', 'patients.preferred_appointment_time', '=', 'periods.id')
                    ->select([
                        'patients.any_extra_time',
                        'patients.defaulter',
                        'patients.is_serving',
                        'patients.no_appointment_creation',
                        'patients.is_disabled',
                        'patients.first_name',
                        'patients.last_name',
                        'patients.id',
                        'patients.main_doctor_id',
                    ])
                    ->whereNotNull('deleted_at')
                    ->orderBy('patients.created_at', 'desc')
                    ->get()
                    )->map(function ($patient) {
                        $doctor = $this->get_doctor_details($patient->main_doctor_id);
                        $family_members = $this->get_family_members($patient->id);
                        $patient->defaulter = $patient->defaulter == 0 ? false : true;
                        $patient->no_appointment_creation = $patient->no_appointment_creation == 0 ? false : true;
                        $patient->is_serving = $patient->is_serving == 0 ? false : true;
                        $patient->main_doctor = $doctor;
                        $patient->family_members = $family_members;
                        return $patient;
                    });

            return $this->customSuccessResponseWithPayload($patients);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //searching patients
    public function search(Request $request)
    {
        $searchpatients = Patient::where('email', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('unique_identifier', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('first_name', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('middle_name', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('last_name', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('citizen_service_number', 'LIKE', '%' . $request->keyword . '%')
            ->orderBy('created_at', 'desc')
            ->get();
        return $this->customSuccessResponseWithPayload($searchpatients);
    }

    public function search_landing_page(Request $request)
    {
        if (!$request->keyword) {
            return $this->patients_landing_page();
        }

        $searchpatients = DB::table('patients')
            ->where('email', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere(function ($query) use ($request) {
                $query->where('unique_identifier', 'LIKE', '%' . $request->keyword . '%')
                    ->orWhere('first_name', 'LIKE', '%' . $request->keyword . '%')
                    ->orWhere('middle_name', 'LIKE', '%' . $request->keyword . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $request->keyword . '%')
                    ->orWhere('citizen_service_number', 'LIKE', '%' . $request->keyword . '%')
                    ->orWhere('BSN', 'LIKE', '%' . $request->keyword . '%')
                    ->orWhere('birth_date', 'LIKE', '%' . $request->keyword . '%');
            })
            ->select($this->landing_page_fields)
            ->latest()
            ->paginate(20);

        return $this->customSuccessResponseWithPayload($searchpatients);
    }
    //TIED TO v1/patients/patient ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    public function show(Request $request)
    {
        if ($this->authUser()->can('View Patients')) {

            // Check if all the mandatory fields have been provided
            $validator = Validator::make($request->all(), [
                "patientId" => "required",
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json($errors->all(), 500);
            }

            // Look for the specified patient in the database and store in a variable for more computations
            $patient = Patient::with(['mainDoctor', 'familyMembers', 'preferredAppointmentTime'])->withTrashed()->find(request()->patientId);

            // if the patient exists
            if ($patient) {
                $history = HealthHistory::where("patient_id", $patient->id)->first();

                $patient->healthHistory = $history ? $history->history : "";

                LogActivity::addToLog('Read Patient Details', 'Read', $patient->id, 'Profile');

                // Return the patients record to the client
                return $this->customSuccessResponseWithPayload($patient);
            }

            // If the patient record does not exist then notify the client
            return $this->customFailResponseWithPayload("Patient not found in the system");
        }
        return $this->customFailResponseWithPayload('Permission denied');
    }

    //TIED TO v1/patients/create ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    public function store(Request $request)
    {
        if ($this->authUser()->can('Create Patient')) {
            try {
                $validator = Validator::make($request->all(), [
                    "firstName" => "required",
                    "lastName" => "required",
                    "insurancePolicyNumber" => "nullable",
                    "patientEmail" => "required|unique:patients,email",
                    "patientPhone" => "required",
                    "birthDate" => "required|date_format:d-m-Y",
                    "photo" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
                    "BSN" => "nullable|unique:patients,BSN",
                ]);

                if ($validator->fails()) {
                    $errors = $validator->errors();
                    // return response()->json($errors->all(), 500);
                    return $this->customFailResponseWithPayload($errors->all());
                }

                // Create a new patient record and store it in a variable for more computations
                $patient = new Patient;

                // $patient->unique_identifier = mt_rand();
                $patient->first_name = request()->firstName;
                $patient->last_name = request()->lastName;
                $patient->middle_name = request()->middleName == "" ? null : request()->middleName;
                $patient->gender = request()->gender == "" ? null : request()->gender;
                $patient->marital_status = request()->maritalStatus == "" ? null : request()->maritalStatus;
                $patient->birth_date = Carbon::parse(request()->birthDate)->format('d-m-Y');
                $patient->email = request()->patientEmail;
                $patient->home_phone = request()->homePhone == "" ? null : request()->homePhone;
                $patient->home_address = request()->homeAddress == "" ? null : request()->homeAddress;
                $patient->nationality = request()->nationality == "" ? null : request()->nationality;
                $patient->country = request()->country == "" ? null : request()->country;
                $patient->state = request()->state == "" ? null : request()->state;
                $patient->city = request()->city == "" ? null : request()->city;
                $patient->street = request()->street == "" ? null : request()->street;
                $patient->postalcode = request()->postalCode == "" ? null : request()->postalCode;
                $patient->patient_phone = request()->patientPhone;

                // get logged in user data
                $user = Auth::user();
                $patient->patient_insurer = request()->patientInsurer == "" ? null : request()->patientInsurer;
                $patient->insurance_policy_number = request()->insurancePolicyNumber;

                $patient->guardian_name = request()->guardianName == "" ? null : request()->guardianName;
                $patient->guardian_phone = request()->guardianPhone == "" ? null : request()->guardianPhone;
                $patient->guardian_email = request()->guardianEmail == "" ? null : request()->guardianEmail;
                $patient->guardian_address = request()->guardianAddress == "" ? null : request()->guardianAddress;

                $patient->reviews = request()->reviews == "" ? null : request()->reviews;
                $patient->citizen_service_number = request()->citizenServiceNumber == "" ? null : request()->citizenServiceNumber;

                $patient->facility_id = $user->facility_id;
                $patient->nok_phone_number = request()->nokPhoneNumber == "" ? null : request()->nokPhoneNumber;
                $patient->nok_name = request()->nokName == "" ? null : request()->nokName;
                $patient->nok_email = request()->nokEmail == "" ? null : request()->nokEmail;
                $patient->fm_relationship = request()->fmRelationship == "" ? null : request()->fmRelationship;
                $patient->fm_name = request()->fmName == "" ? null : request()->fmName;
                $patient->fm_email = request()->fmEmail == "" ? null : request()->fmEmail;
                $patient->fm_phone_number = request()->fmPhoneNumber == "" ? null : request()->fmPhoneNumber;
                $patient->fill_if_not_filled = request()->fillIfNotFilled == "" ? null : request()->fillIfNotFilled;
                $patient->referred_by = request()->referredBy == "" ? null : request()->referredBy;
                $patient->referree_email = request()->referreeEmail == "" ? null : request()->referreeEmail;
                $patient->referree_phone = request()->referreePhone == "" ? null : request()->referreePhone;
                $patient->main_doctor_id = request()->mainDoctorId == "" ? null : request()->mainDoctorId;
                $patient->is_disabled = request()->isDisabled == "" ? null : request()->isDisabled;
                $patient->self_registration = 0;
                $patient->BSN = request()->BSN == "" ? null : request()->BSN;
                $patient->approved = 1;
                $patient->passant = request()->passant == "" ? null : (int) request()->passant;
                $patient->additional_insurance = request()->additionalInsurance == "" ? null : request()->additionalInsurance;
                $patient->additional_insurance_policy_no = request()->additionalInsurancePolicyNo == "" ? null : request()->additionalInsurancePolicyNo;
                $patient->private_number = request()->privateNumber == "" ? null : request()->privateNumber;
                $patient->secret_number = request()->secretNumber == "" ? null : request()->secretNumber;
                $patient->house_number = request()->houseNumber == "" ? null : request()->houseNumber;
                $patient->ext = request()->ext == "" ? null : request()->ext;
                $patient->no_insurance_claims = (int) request()->passant == 1 ? 1 : 0;
                $patient->address = !is_null(request()->houseNumber) ? request()->street . ' ' . request()->houseNumber : request()->street;
                $patient->reference_date = request()->referenceDate == "" ? null : request()->referenceDate;
                $patient->insured_number = request()->insuredNumber == "" ? null : request()->insuredNumber;
                $patient->province = request()->province == "" ? null : request()->province;
                $patient->region = request()->region == "" ? null : request()->region;
                $patient->country_code = request()->countryCode;
                $patient->save();

                if (isset($request->photo) && !is_null($request->photo)) {
                    $file_name = time() . '_' . $request->photo->getClientOriginalName();
                    upload_file($file_name, $request->photo, 'patients');
                    $patient->photo = $file_name;
                    $patient->save();
                }

                $randomPassword = mt_rand();
                $patient->password = Hash::make($randomPassword);
                $patient->save();
                try {

                    $details = [
                        'title' => 'Your Login details to Meta Dent Patients Portal',
                        'email' => $patient->email,
                        'password' => $randomPassword,
                        'firstName' => $patient->first_name,
                        'lastName' => $patient->last_name,
                    ];

                    Mail::to($details['email'])->send(new PatientCredentials($details));
                } catch (\Exception $e) {
                    info("Error: " . $e->getMessage());
                }

                if ($patient) {
                    // is_null, empty, is_string
                    if (request()->healthHistory != null && request()->healthHistory != "" && request()->healthHistory !== " ") {
                        $history = HealthHistory::where("patient_id", request()->patientId)->first();

                        HealthHistory::create([
                            "patient_id" => $patient->id,
                            "facility_id" => 1,
                            "history" => request()->healthHistory,
                        ]);
                    }

                    $patient_to_return = Patient::with(['mainDoctor', 'familyMembers', 'preferredAppointmentTime'])->where('id', $patient->id)->first();

                    LogActivity::addToLog('Patient Registered', 'Create', $patient_to_return->id, 'Profile');
                    // Notify the client that the desired action was successful
                    return $this->customSuccessResponseWithPayload($patient_to_return);
                }
            } catch (\Throwable $exception) {
                DB::rollback();
                return $this->customFailResponseWithPayload($exception->getMessage());
            }
        }
        return $this->customFailResponseWithPayload('Permission denied');
    }

    //TIED TO v1/patients/edit ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    public function update(Request $request)
    {
        if ($this->authUser()->can('Update Patient')) {
            try {
                $validator = Validator::make($request->all(), [
                    "firstName" => "required",
                    "lastName" => "required",
                    "insurancePolicyNumber" => "nullable",
                    "patientEmail" => "required",
                    "patientPhone" => "required",
                    "birthDate" => "required|date_format:d-m-Y",
                    "patientId" => "required",
                    "BSN" => "nullable",
                ]);

                if ($validator->fails()) {
                    $errors = $validator->errors();
                    return response()->json($errors->all(), 500);
                }

                // Look for the specified patient in the database and store in a variable for more computations
                $patient = Patient::find(request()->patientId);

                $updated = $patient->update([
                    "first_name" => request()->firstName,
                    "last_name" => request()->lastName,
                    "middle_name" => request()->middleName == "" ? null : request()->middleName,
                    "gender" => request()->gender == "" ? null : request()->gender,
                    "marital_status" => request()->maritalStatus == "" ? null : request()->maritalStatus,
                    "birth_date" => Carbon::parse(request()->birthDate)->format('d-m-Y'),
                    "email" => request()->patientEmail,
                    "home_phone" => request()->homePhone == "" ? null : request()->homePhone,
                    "home_address" => request()->homeAddress == "" ? null : request()->homeAddress,
                    "nationality" => request()->nationality == "" ? null : request()->nationality,
                    "country" => request()->country == "" ? null : request()->country,
                    "state" => request()->state == "" ? null : request()->state,
                    "city" => request()->city == "" ? null : request()->city,
                    "street" => request()->street == "" ? null : request()->street,
                    "postalcode" => request()->postalCode == "" ? null : request()->postalCode,
                    "patient_phone" => request()->patientPhone,
                    "patient_insurer" => request()->patientInsurer == "" ? null : request()->patientInsurer,
                    "insurance_policy_number" => request()->insurancePolicyNumber,
                    "guardian_name" => request()->guardianName == "" ? null : request()->guardianName,
                    "guardian_phone" => request()->guardianPhone == "" ? null : request()->guardianPhone,
                    "guardian_email" => request()->guardianEmail == "" ? null : request()->guardianEmail,
                    "guardian_address" => request()->guardianAddress == "" ? null : request()->guardianAddress,
                    "reviews" => request()->reviews == "" ? null : request()->reviews,
                    "facility_id" => 1,
                    "citizen_service_number" => request()->citizenServiceNumber == "" ? null : request()->citizenServiceNumber,
                    "nok_phone_number" => request()->nokPhoneNumber == "" ? null : request()->nokPhoneNumber,
                    "nok_name" => request()->nokName == "" ? null : request()->nokName,
                    "nok_email" => request()->nokEmail == "" ? null : request()->nokEmail,
                    "fm_relationship" => request()->fmRelationship == "" ? null : request()->fmRelationship,
                    "fm_name" => request()->fmName == "" ? null : request()->fmName,
                    "fm_phone_number" => request()->fmPhoneNumber == "" ? null : request()->fmPhoneNumber,
                    "fm_email" => request()->fmEmail == "" ? null : request()->fmEmail,
                    "fill_if_not_filled" => request()->fillIfNotFilled == "" ? null : request()->fillIfNotFilled,
                    "referred_by" => request()->referredBy == "" ? null : request()->referredBy,
                    "referree_email" => request()->referreeEmail == "" ? null : request()->referreeEmail,
                    "referree_phone" => request()->referreePhone == "" ? null : request()->referreePhone,
                    "is_disabled" => request()->isDisabled == "" ? null : request()->isDisabled,
                    "BSN" => request()->BSN == "" ? null : request()->BSN,
                    "self_registration" => 0,
                    "passant" => request()->passant == "" ? null : (int) request()->passant,
                    "no_insurance_claims" => (int) request()->passant == 1 ? 1 : 0,
                    "additional_insurance" => request()->additionalInsurance == "" ? null : request()->additionalInsurance,
                    "additional_insurance_policy_no" => request()->additionalInsurancePolicyNo == "" ? null : request()->additionalInsurancePolicyNo,
                    "private_number" => request()->privateNumber == "" ? null : request()->privateNumber,
                    "secret_number" => request()->secretNumber == "" ? null : request()->secretNumber,
                    "address" => !is_null(request()->houseNumber) ? request()->street . ' ' . request()->houseNumber : request()->street,
                    "reference_date" => request()->referenceDate == "" ? null : request()->referenceDate,
                    "insured_number" => request()->insuredNumber == "" ? null : request()->insuredNumber,
                    "house_number" => request()->houseNumber == "" ? null : request()->houseNumber,
                    "ext" => request()->ext == "" ? null : request()->ext,
                    "region" => request()->region == "" ? null : request()->region,
                    "province" => request()->province == "" ? null : request()->province,
                    "country_code" => request()->countryCode,
                ]);
                // Check for Image file
                if (gettype($request->photo) != 'string' && !is_null($request->photo)) {
                    $old_file = $patient->photo;
                    $file_name = time() . '_' . $request->photo->getClientOriginalName();
                    update_file($old_file, $file_name, $request->photo, 'patients');
                    $patient->photo = $file_name;
                    $patient->update();
                }
                // Check if the new user creation is successful, then proceed
                if (!$updated) {
                    // Notify the client that the desired action was successful
                    return $this->customFailResponseWithPayload("Patient record failed to update");
                }
                LogActivity::addToLog('Patient Information Updated', 'Update', $patient->id, 'Profile');
                // Notify the client that the desired action was successful
                return $this->customSuccessResponseWithPayload("Patient was updated successfully");
            } catch (\Throwable $th) {
                return $this->customFailResponseWithPayload($th->getMessage());
            }
        }
        return $this->customFailResponseWithPayload('Permission denied');
    }

    private function allPatients()
    {
        $patients = Cache::remember('facility_patients', 86400, function () {
            return Patient::with(['mainDoctor', 'familyMembers', 'preferredAppointmentTime'])
                ->where('approved', 1)
                ->orderBy("created_at", "desc")->get();
        });

        $finalPatients = [];

        foreach ($patients as $patient) {
            $history = HealthHistory::where("patient_id", $patient->id)->first();
            $patient->healthHistory = $history ? $history->history : "";

            $finalPatients[] = $patient;
        }

        return $patients;
    }

    public function paginated(Request $request)
    {
        try {
            if ($this->authUser()->can('View Patients')) {
                Helper::custom_validator(
                    request()->all(),
                    ['year' => 'nullable|max:4|min:4', "month_range" => 'nullable|date_format:m-Y']
                );

                $query_patients = Patient::with('logs.user');

                $query_patients->when(request("year"), function ($query) {
                    $year = request("year");
                    return $query->where('birth_date', 'LIKE', '%' . $year . '%');
                });
                $query_patients->when(request("date_range"), function ($query) {
                    $date_range = request("date_range");
                    return $query->whereRaw('STR_TO_DATE(birth_date,"%d-%m-%Y") >= STR_TO_DATE("' . $date_range[0] . '","%d-%m-%Y")')
                        ->whereRaw('STR_TO_DATE(birth_date,"%d-%m-%Y") <= STR_TO_DATE("' . $date_range[1] . '","%d-%m-%Y")');
                });
                $query_patients->when(request("month_range"), function ($query) {
                    $month_range = request("month_range");
                    return $query->where('birth_date', 'LIKE', '%' . $month_range . '%');
                });
                $query_patients->when(request("gender"), function ($query) {
                    return $query->where('gender', request("gender"));
                });
                $query_patients->when(request("action"), function ($query) {
                    $actions = request("action");
                    return $query->whereHas(
                        'logs',
                        function ($query_logs) use ($actions) {
                            $query_logs->whereIn('action', $actions);
                        }
                    );
                });
                $query_patients->when(request("log_date_range"), function ($query) {
                    $log_date_range = request("log_date_range");
                    return $query->whereHas(
                        'logs',
                        function ($query_logs) use ($log_date_range) {
                            $query_logs->whereDate('created_at', '>=', $log_date_range[0])
                                ->whereDate('created_at', '<=', $log_date_range[1]);
                        }
                    );
                });
                $query_patients->when(request("log_month_range"), function ($query) {
                    $log_month_range = request("log_month_range");
                    return $query->whereHas(
                        'logs',
                        function ($query_logs) use ($log_month_range) {
                            $query_logs->whereMonth('created_at', $log_month_range[0])
                                ->whereYear('created_at', $log_month_range[1]);
                        }
                    );
                });
                $query_patients->when(request("log_year"), function ($query) {
                    $log_year = request("log_year");
                    return $query->whereHas(
                        'logs',
                        function ($query_logs) use ($log_year) {
                            $query_logs->whereYear('created_at', $log_year);
                        }
                    );
                });
                $query_patients->when(request("search_name"), function ($query) {
                    $search_name = request("search_name");
                    return $query->where('last_name', 'LIKE', '%' . $search_name . '%')
                        ->orWhere('first_name', 'LIKE', '%' . $search_name . '%');
                });
                $query_patients->when(request("search_bsn"), function ($query) {
                    $search_bsn = request("search_bsn");
                    return $query->where('BSN', 'LIKE', '%' . $search_bsn . '%');
                });
                $query_patients->when(request("search_word"), function ($query) {
                    $search_word = request("search_word");
                    return $query->where('last_name', 'LIKE', '%' . $search_word . '%')
                        ->orWhere('first_name', 'LIKE', '%' . $search_word . '%')
                        ->orWhere('email', 'LIKE', '%' . $search_word . '%')
                        ->orWhere('patient_phone', 'LIKE', '%' . $search_word . '%')
                        ->orWhere('birth_date', 'LIKE', '%' . $search_word . '%')
                        ->orWhere('city', 'LIKE', '%' . $search_word . '%')
                        ->orWhere('BSN', 'LIKE', '%' . $search_word . '%')
                        ->orWhere('citizen_service_number', 'LIKE', '%' . $search_word . '%')
                        ->orWhereHas(
                            'logs',
                            function ($query_logs) use ($search_word) {
                                $query_logs->where('action', 'LIKE', '%' . $search_word . '%');
                            }
                        );
                });
                $paginated_patients = $query_patients->latest()->paginate(20);
                LogActivity::addToLog('Read Patient List', 'Read');

                return $this->customSuccessResponseWithPayload($paginated_patients);
            }
            return $this->customFailResponseWithPayload('Permission denied');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function paginated_patient_done_treatments(Request $request)
    {
        try {
            if ($this->authUser()->can('View Patients')) {
                Helper::custom_validator(
                    request()->all(),
                    ['year' => 'nullable|max:4|min:4', "month_range" => 'nullable|date_format:m-Y']
                );

                $query_patients = Patient::with('latestTreatment.invoices')->has('latestTreatment.invoices')
                    ->orWhereHas('latestTreatment.invoices', function ($query) {
                    $query->withoutAppends();
                });

                $query_patients->when(request("status"), function ($query) {
                    $status = request("status");
                    return $query->whereHas(
                        'latestTreatment',
                        function ($query_treatments) use ($status) {
                            $query_treatments->where('treatment_status', $status);
                        }
                    );
                });
                $query_patients->when(request("treatment_date_range"), function ($query) {
                    $treatment_date_range = request("treatment_date_range");
                    return $query->whereHas(
                        'latestTreatment',
                        function ($query_treatments) use ($treatment_date_range) {
                            $query_treatments->whereDate('created_at', '>=', $treatment_date_range[0])
                                ->whereDate('created_at', '<=', $treatment_date_range[1]);
                        }
                    );
                });
                $query_patients->when(request("treatment_month_range"), function ($query) {
                    $treatment_month_range = request("treatment_month_range");
                    return $query->whereHas(
                        'latestTreatment',
                        function ($query_treatments) use ($treatment_month_range) {
                            $query_treatments->whereMonth('created_at', $treatment_month_range[0])
                                ->whereYear('created_at', $treatment_month_range[1]);
                        }
                    );
                });
                $query_patients->when(request("treatment_year"), function ($query) {
                    $treatment_year = request("treatment_year");
                    return $query->whereHas(
                        'latestTreatment',
                        function ($query_treatments) use ($treatment_year) {
                            $query_treatments->whereYear('created_at', $treatment_year);
                        }
                    );
                });
                $query_patients->when(request("search_name"), function ($query) {
                    $search_name = request("search_name");
                    return $query->where(
                        function ($q) use ($search_name) {
                            $q->where('last_name', 'LIKE', '%' . $search_name . '%')
                                ->orWhere('first_name', 'LIKE', '%' . $search_name . '%');
                        }
                    );
                });
                $query_patients->when(request("search_bsn"), function ($query) {
                    $search_bsn = request("search_bsn");
                    return $query->where(
                        function ($q) use ($search_bsn) {
                            $q->where('BSN', 'LIKE', '%' . $search_bsn . '%');
                        }
                    );
                });
                $query_patients->when(request("search_word"), function ($query) {
                    $search_word = request("search_word");
                    return $query->where(
                        function ($q) use ($search_word) {
                            $q->where('last_name', 'LIKE', '%' . $search_word . '%')
                                ->orWhere('first_name', 'LIKE', '%' . $search_word . '%')
                                ->orWhere('email', 'LIKE', '%' . $search_word . '%')
                                ->orWhere('patient_phone', 'LIKE', '%' . $search_word . '%')
                                ->orWhere('birth_date', 'LIKE', '%' . $search_word . '%')
                                ->orWhere('city', 'LIKE', '%' . $search_word . '%')
                                ->orWhere('BSN', 'LIKE', '%' . $search_word . '%')
                                ->orWhere('citizen_service_number', 'LIKE', '%' . $search_word . '%')
                                ->orWhereHas(
                                    'latestTreatment',
                                    function ($query_treatments) use ($search_word) {
                                            $query_treatments->where('treatment_status', 'LIKE', '%' . $search_word . '%')
                                                ->orWhere('id', 'LIKE', '%' . $search_word . '%');
                                        }
                                );
                        }
                    );
                });
                $paginated_patients = $query_patients->latest()->paginate(20);
                LogActivity::addToLog('Read Patient List', 'Read');

                return $this->customSuccessResponseWithPayload($paginated_patients);
            }
            return $this->customFailResponseWithPayload('Permission denied');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_patient_logs_pdf()
    {
        try {
            $request_patients = json_decode(request("patients"));
            $patients = Patient::whereIn('id', $request_patients)->latest()->get();
            Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = Pdf::loadView('pdfs.patient_logs_list', compact('patients'));
            $pdf->setPaper('a3', 'landscape');
            LogActivity::addToLog('Print Patient with Logs List PDF', 'Execute');
            return $pdf->stream("Patients PDF");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_patient_logs_excel()
    {
        try {
            $patients = json_decode(request("patients"));
            LogActivity::addToLog('Print Patient Logs List Excel', 'Execute');
            return Excel::download(new PatientLogExport($patients), 'PatientsWithLogs.xlsx');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_patient_logs_csv()
    {
        try {
            $patients = json_decode(request("patients"));
            LogActivity::addToLog('Print Patient Logs List CSV', 'Execute');
            return Excel::download(new PatientLogExport($patients), 'PatientsWithLogs.csv');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_pdf()
    {
        try {
            $request_patients = json_decode(request("patients"));
            $patients = Patient::whereIn('id', $request_patients)->latest()->get();
            Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = Pdf::loadView('pdfs.patient_list', compact('patients'));
            $pdf->setPaper('a3', 'landscape');
            LogActivity::addToLog('Print Patient List PDF', 'Execute');
            return $pdf->stream("Patients PDF");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_excel()
    {
        try {
            $patients = json_decode(request("patients"));
            LogActivity::addToLog('Print Patient List Excel', 'Execute');
            return Excel::download(new PatientsExport($patients), 'Patients.xlsx');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_csv()
    {
        try {
            $patients = json_decode(request("patients"));
            LogActivity::addToLog('Print Patient List CSV', 'Execute');
            return Excel::download(new PatientsExport($patients), 'Patients.csv');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function print_single_patient()
    {
        try {
            $request = json_decode(request("patients"));
            $patient = Patient::where('id', $request[0])->get();
            Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = Pdf::loadView('pdfs.patient_detail', compact('patient'));
            LogActivity::addToLog('Print Single Patient PDF', 'Execute');
            return $pdf->stream("Patient PDF");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_patient_treatment_pdf()
    {
        try {
            $request_patients = json_decode(request("patients"));
            $patients = Patient::whereIn('id', $request_patients)->with('latestTreatment.invoices')->has('latestTreatment.invoices')->latest()->get();
            Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = Pdf::loadView('pdfs.patient_treatments', compact('patients'));
            $pdf->setPaper('a3', 'landscape');
            LogActivity::addToLog('Print Patient List PDF', 'Execute');
            return $pdf->stream("Patients Treatments PDF");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_patient_treatment_csv()
    {
        try {
            $request_patients = json_decode(request("patients"));
            LogActivity::addToLog('Print Patient List CSV', 'Execute');
            return Excel::download(new PatientTreatmentsExport($request_patients), 'PatientsTreatments.csv');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_patient_treatment_excel()
    {
        try {
            $request_patients = json_decode(request("patients"));
            LogActivity::addToLog('Print Patient List Excel', 'Execute');
            return Excel::download(new PatientTreatmentsExport($request_patients), 'PatientsTreatments.xlsx');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function assignDoctor(Request $request)
    {
        if ($this->authUser()->can('Assign Doctors')) {
            $validator = Validator::make($request->all(), [
                "patientId" => "required",
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json($errors->all(), 500);
            }
            $patientExists = Patient::find(request()->patientId);

            if ($patientExists) {
                $patientExists->update([
                    "main_doctor_id" => request()->main_doctor_id,
                    "secondary_doctor_id" => request()->secondary_doctor_id,
                ]);

                $patientData = Patient::with('mainDoctor')->where('id', request()->patientId)->first();

                if ($patientData) {
                    $secondDoctor = $patientData->secondary_doctor_id;

                    $secondaryDoctorsArr = explode(',', $secondDoctor);

                    $secondaryDoctorsArr = array_filter($secondaryDoctorsArr);

                    $getDoctors = [];
                    foreach ($secondaryDoctorsArr as $second) {
                        array_push($getDoctors, Employee::where('id', $second)->first());
                    }

                    $doctorsArr['sec_doctors'] = $getDoctors;
                    $data = array_merge($patientData->toArray(), $doctorsArr);
                    return $data;
                }
            }

            return $this->customFailResponseWithPayload("Patient  not found");
        }
        return $this->customFailResponseWithPayload('Permission denied');
    }

    public function patientAppointments(Request $request)
    {
        if ($this->authUser()->can('View Patient Appointments')) {
            $patientId = request()->patientId;
            $patientExists = Patient::find($patientId);

            $all_appointments = Appointment::where('patient_id', $patientExists->id)
                ->with(["patient", "status", "source", "type", "treatment", "period"])
                ->orderBy("date", "asc")
                ->get();

            $final_appointment_container = [];

            foreach ($all_appointments as $appointment):
                $appointment_day = Carbon::parse($appointment->date)->dayOfWeek;

                $appointment->day = $appointment_day;
                $doctor_ids = $appointment->doctors;
                $doctors_list = []; foreach ($doctor_ids as $doctor_id):
                    $doctors_list[] = Employee::find($doctor_id);
                endforeach;

                $appointment->doctors = $doctors_list;

                $final_appointment_container[] = $appointment;
            endforeach;

            return $this->customSuccessResponseWithPayload($final_appointment_container);
        }
        return $this->customFailResponseWithPayload('Permission denied');
    }

    public function getPatientWithDoctor()
    {
        request()->validate([
            "patientId" => "required",
        ]);

        $patientData = Patient::with('mainDoctor')->where('id', request()->patientId)->first();
        if ($patientData) {
            $secondDoctor = $patientData->secondary_doctor_id;

            $secondaryDoctorsArr = explode(',', $secondDoctor);

            $secondaryDoctorsArr = array_filter($secondaryDoctorsArr);

            $getDoctors = [];
            foreach ($secondaryDoctorsArr as $second) {
                array_push($getDoctors, Employee::where('id', $second)->first());
            }

            $doctorsArr['sec_doctors'] = $getDoctors;
            $data = array_merge($patientData->toArray(), $doctorsArr);
            // Return the patients record to the client
            return $this->customSuccessResponseWithPayload($data);
        }

        // If the patient record does not exist then notify the client
        return $this->customFailResponseWithPayload("Patient not found");
    }

    //    patients with imaging data

    public function patientImaging()
    {
        $patients = Patient::orderBy("created_at", "desc")->get();
        return $this->customSuccessResponseWithPayload($patients);
    }

    public function destroy()
    {
        request()->validate([
            'patientId' => 'required',
        ]);

        $patient = Patient::find(request()->patientId);
        if ($patient) {
            DB::transaction(function () use ($patient) {
                DB::table('patients')->where('id', $patient->id)->delete();
                // delete invoice refunds data as well
                DB::table('invoices')->where('patient_id', $patient->id)->delete();
            });
            // LogActivity::addToLog('Delete Invoice', 'Delete', null, null, null, $patient->id);
            $patient->delete();
            return $this->customSuccessResponseWithPayload("Invoice deleted successfully");
        }
        // if ($patient) {
        //     $patient->forceDelete();
        //     LogActivity::addToLog('Patient Deleted', 'Delete', $patient->id, 'Profile');
        //     return $this->customFailResponseWithPayload('Patient Deleted');
        // } else {
        //     return $this->customSuccessResponseWithPayload('Patient Not Found');
        // }
    }

    public function deleteSelected()
    {
        request()->validate([
            'patients' => 'required',
        ]);
        if ($this->authUser()->can('Delete Patient')) {
            $patients = request()->patients;
            foreach ($patients as $patient):
                // Patient::find($patient)->forceDelete();
                DB::table('patients')->where('id', $patient->id)->delete();
                // delete invoice refunds data as well
                DB::table('invoices')->where('patient_id', $patient->id)->delete();
            endforeach;
            return $this->customSuccessResponseWithPayload('Patients Deleted');
        } else {
            return $this->customFailResponseWithPayload('Permission Denied');
        }
    }

    public function update_extra_info()
    {
        try {
            $validator = Validator::make(request()->all(), [
                'patientId' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->customFailResponseWithPayload($validator->errors()->all());
            } else {
                $patient = Patient::find(request()->patientId);
                $patient->BSN = request()->BSN;
                $patient->WLZ = request()->WLZ;
                $patient->secondary_phone = request()->secondary_phone;
                $patient->secondary_email = request()->secondary_email;
                $patient->language = request()->language;
                $patient->insurance_from_date = request()->insurance_from_date;
                $patient->dentist = request()->dentist;
                $patient->mouth_hygienist = request()->mouth_hygienist;
                $patient->preventive_assistant = request()->preventive_assistant;
                $patient->orthodontist = request()->orthodontist;
                $patient->general_practitioner = request()->general_practitioner;
                $patient->receive_sms = request()->receive_sms;
                $patient->receive_system_emails = request()->receive_system_emails;
                $patient->receive_newsletters = request()->receive_newsletters;
                $patient->do_not_receive_emails = request()->do_not_receive_emails;
                $patient->do_not_receive_email_declarations = request()->do_not_receive_email_declarations;
                $patient->do_not_send_declaration_to_insurance_company = request()->do_not_send_declaration_to_insurance_company;
                $patient->recall_dentist_duration = request()->recall_dentist_duration;
                $patient->recall_mouth_hygienist_duration = request()->recall_mouth_hygienist_duration;
                $patient->recall_preventive_assistant_duration = request()->recall_preventive_assistant_duration;
                $patient->recall_orthodontist_duration = request()->recall_orthodontist_duration;
                $patient->next_dentist_visit = is_null(request()->next_dentist_visit) || request()->next_dentist_visit == "" ? null : Carbon::parse(request()->next_dentist_visit)->format('d-m-Y');
                $patient->next_mouth_hygienist_visit = is_null(request()->next_mouth_hygienist_visit) || request()->next_mouth_hygienist_visit == "" ? null : Carbon::parse(request()->next_mouth_hygienist_visit)->format('d-m-Y');
                $patient->next_orthodontist_visit = is_null(request()->next_orthodontist_visit) || request()->next_orthodontist_visit == "" ? null : Carbon::parse(request()->next_orthodontist_visit)->format('d-m-Y');
                $patient->next_preventive_assistant_visit = is_null(request()->next_preventive_assistant_visit) || request()->next_preventive_assistant_visit == "" ? null : Carbon::parse(request()->next_preventive_assistant_visit)->format('d-m-Y');
                $patient->any_extra_time = request()->any_extra_time;
                $patient->preferred_appointment_time = request()->preferred_appointment_time;
                $patient->main_doctor_id = request()->main_doctor_id;
                $patient->is_disabled = request()->is_disabled;
                $patient->customer_in_arrears = request()->customer_in_arrears;
                $patient->no_insurance_claims = request()->no_insurance_claims;
                $patient->no_payment_reminder = request()->no_payment_reminder;
                $patient->no_appointment_creation = request()->no_appointment_creation;
                $patient->defaulter = request()->defaulter;
                $patient->confirm_dentist_visit = request()->confirm_dentist_visit;
                $patient->confirm_mouth_hygienist_visit = request()->confirm_mouth_hygienist_visit;
                $patient->confirm_preventive_assistant_visit = request()->confirm_preventive_assistant_visit;
                $patient->confirm_orthodontist_visit = request()->confirm_orthodontist_visit;
                $patient->last_dentist_recall = is_null(request()->last_dentist_recall) || request()->last_dentist_recall == "" ? null : Carbon::parse(request()->last_dentist_recall)->format('d-m-Y');
                $patient->last_mouth_hygienist_recall = is_null(request()->last_mouth_hygienist_recall) || request()->last_mouth_hygienist_recall == "" ? null : Carbon::parse(request()->last_mouth_hygienist_recall)->format('d-m-Y');
                $patient->last_preventive_assistant_recall = is_null(request()->last_preventive_assistant_recall) || request()->last_preventive_assistant_recall == "" ? null : Carbon::parse(request()->last_preventive_assistant_recall)->format('d-m-Y');
                $patient->last_orthodontist_recall = is_null(request()->last_orthodontist_recall) || request()->last_orthodontist_recall == "" ? null : Carbon::parse(request()->last_orthodontist_recall)->format('d-m-Y');
                $patient->account_number_iban = request()->account_number_iban;
                $patient->account_status_reason = request()->account_status_reason;
                $patient->account_status = request()->account_status;
                $patient->receive_physical_mails = request()->receive_physical_mails;
                $patient->additional_insurance_uzovi_code = request()->additional_insurance_uzovi_code;
                $patient->insurance_uzovi_code = request()->insurance_uzovi_code;
                $patient->landline_phone = request()->landline_phone;
                $patient->ext = request()->ext;
                $patient->date_of_death = request()->date_of_death;
                $patient->deactivation_date = request()->deactivation_date;
                $patient->date_of_first_treatment = request()->date_of_first_treatment;
                $patient->date_of_last_treatment = request()->date_of_last_treatment;
                $patient->automated_payment = request()->automated_payment;
                $patient->automatic_payment_type = request()->automatic_payment_type;
                $patient->referred_by = request()->referred_by;
                $patient->additional_insurance_type = request()->additional_insurance_type;
                $patient->additional_insurance_policy_no = request()->additional_insurance_policy_no;
                $patient->work_mail = request()->work_mail;
                $patient->invoice_mail = request()->invoice_mail;
                $patient->email_salutation = request()->email_salutation;
                $patient->account_status_reason_text = request()->account_status_reason_text;
                $patient->insurance_type = request()->insurance_type;
                $patient->house_number = request()->house_number;
                $patient->private_number = request()->private_number;
                $patient->passant = (int) request()->passant;
                $patient->secret_number = request()->secret_number;
                $patient->address = !is_null($patient->street) ? $patient->street . ' ' . request()->house_number : request()->house_number;
                $patient->general_practitioner_pharmacy = request()->general_practitioner_pharmacy;
                $patient->update();

                if (!$patient) {
                    return $this->customFailResponseWithPayload('Patient not Updated');
                }

                LogActivity::addToLog('Patient Information Updated', 'Update', $patient->id, 'Profile');

                return $this->customSuccessResponseWithPayload('Patient Edit Successful');
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function update_image(Request $request)
    {

        try {
            Helper::custom_validator(request()->all(), ['patientId' => 'required|exists:App\Models\Patient,id|integer', 'imagePath' => 'nullable']);
            $patient = Patient::find(request()->patientId);
            if ($patient) {
                if (isset($request->imagePath) && !empty($request->imagePath)) {
                    $old_file = $patient->photo;
                    $file_name = gettype($request->imagePath) != 'string' ? time() . '_' . $request->imagePath->getClientOriginalName() : null;
                    if (!is_null($file_name)) {
                        update_file($old_file, $file_name, $request->imagePath, 'patients');
                    }
                    $patient->photo = $file_name;
                    $patient->update();
                    LogActivity::addToLog('Patient Image Updated', 'Update', $patient->id, 'Profile');
                    return $this->customSuccessResponseWithPayload('Image Updated');
                }
                return $this->customSuccessResponseWithPayload('Image Updated');
            } else {
                return $this->customFailResponseWithPayload('Patient not found');
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function appointment_invitation(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'patientId' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->customFailResponseWithPayload($validator->errors()->all());
            } else {
                $patient = Patient::where('id', $request->patientId)->first(['first_name', 'last_name', 'email']);
                $mail_details = AutoMail::where('category_id', 3)->first();
                $subject = '';
                $body = '';
                if (is_null($mail_details)) {
                    $subject = 'Appointment Invitation';
                    $body = 'Thank you for choosing Meta Dent for your dental services.
                    You are hereby invited to have an appointment at our premises call us for more information.';
                } else {
                    $body = $mail_details->body;
                    $subject = $mail_details->subject;
                }
                Mail::to($patient->email)->send(new AppointmentInvitation([
                    'body' => $body,
                    'subject' => $subject,
                    'firstName' => $patient->first_name,
                    'lastName' => $patient->last_name,
                ]));
                return $this->customSuccessResponseWithPayload('Invitation Sent');
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    //patient counters
    public function patient_number()
    {
        try {
            $all_patients = Patient::where('facility_id', 1)->count();
            return $this->customSuccessResponseWithPayload($all_patients);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function expected_patients_today()
    {
        try {
            $expected_patients_today = Appointment::where('date', Carbon::now()->format('d-m-Y'))
                ->where('status_id', 1)
                ->count();

            return $this->customSuccessResponseWithPayload($expected_patients_today);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function recent_patients()
    {
        try {
            $recent_patients = Patient::orderBy('created_at', 'desc')->take(10)->get();
            return $this->customSuccessResponseWithPayload($recent_patients);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function patients_in_given_time()
    {
        try {
            $start_date = date('Y-m-d', strtotime(request()->startDate));
            $end_date = date('Y-m-d', strtotime(request()->endDate));
            if (request()->has('startDate') && request()->has('endDate')) {
                $given_patients = Patient::whereDate('created_at', '>=', $start_date)
                    ->whereDate('created_at', '<=', $end_date)
                    ->get();
                return $this->customSuccessResponseWithPayload($given_patients);
            }
            if (request()->startDate == null && request()->endDate == null) {
                $patients = $this->allPatients();
                return $this->customSuccessResponseWithPayload($patients);
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function approved_patients()
    {
        try {
            $approved_patients = Patient::with(['mainDoctor', 'familyMembers', 'preferredAppointmentTime'])
                ->where('approved', 1)
                ->orderBy("created_at", "desc")->select($this->landing_page_fields)->paginate(20);
            LogActivity::addToLog('View Approved Patient List', 'Read');
            return $this->customSuccessResponseWithPayload($approved_patients);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function search_approved_patients()
    {
        try {
            $key_word = request()->keyword;
            if (!$key_word) {
                return $this->approved_patients();
            }

            $search_patients = Patient::where('approved', 1)
                ->where(function ($query) use ($key_word) {
                    $query->where('first_name', 'LIKE', '%' . $key_word . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $key_word . '%')
                        ->orWhere('unique_identifier', 'LIKE', '%' . $key_word . '%')
                        ->orWhere('email', 'LIKE', '%' . $key_word . '%')
                        ->orWhere('birth_date', 'LIKE', '%' . $key_word . '%')
                        ->orWhere('BSN', 'LIKE', '%' . $key_word . '%')
                        ->orWhere('middle_name', 'LIKE', '%' . $key_word . '%')
                        ->orWhere('citizen_service_number', 'LIKE', '%' . $key_word . '%');
                })
                ->select($this->landing_page_fields)
                ->latest()
                ->paginate(20);
            return $this->customSuccessResponseWithPayload($search_patients);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function pending_patients()
    {
        try {
            $pending_patients = Patient::where('approved', 0)
                ->orderBy("created_at", "desc")->select($this->landing_page_fields)->paginate(20);
            LogActivity::addToLog('View Pending Patient List', 'Read');
            return $this->customSuccessResponseWithPayload($pending_patients);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function search_pending_patients()
    {
        try {
            $key_word = request()->keyword;
            $status = request()->status ?? 0;

            $search_patients = Patient::where('approved', $status)
                ->where(function ($query) use ($key_word) {
                    $query->where('first_name', 'LIKE', '%' . $key_word . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $key_word . '%')
                        ->orWhere('unique_identifier', 'LIKE', '%' . $key_word . '%')
                        ->orWhere('email', 'LIKE', '%' . $key_word . '%')
                        ->orWhere('birth_date', 'LIKE', '%' . $key_word . '%')
                        ->orWhere('BSN', 'LIKE', '%' . $key_word . '%')
                        ->orWhere('middle_name', 'LIKE', '%' . $key_word . '%')
                        ->orWhere('citizen_service_number', 'LIKE', '%' . $key_word . '%');
                })
                ->select($this->landing_page_fields)
                ->latest()
                ->paginate(20);
            return $this->customSuccessResponseWithPayload($search_patients);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function count_pending_approved_patients()
    {
        try {
            $total_pending_patients = Patient::where('approved', 0)->count();
            $total_approved_patients = Patient::where('approved', 1)->count();
            $total_archived_patients = Patient::onlyTrashed()->count();
            return $this->customSuccessResponseWithPayload([
                'pending' => $total_pending_patients,
                'approved' => $total_approved_patients,
                'archived' => $total_archived_patients,
            ]);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function confirm_patient()
    {
        try {
            Helper::custom_validator(request()->all(), ['patientId' => 'required|exists:App\Models\Patient,id|integer']);
            $patient = Patient::find(request()->patientId);
            if ($patient) {
                $patient->update([
                    'approved' => 1,
                ]);
                LogActivity::addToLog('Patient Confirmed', 'Update', $patient->id, 'Profile');
                return $this->customSuccessResponseWithPayload('Patient Approved');
            }
            return $this->customFailResponseWithPayload('Patient not found');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
    public function archive_patient()
    {
        try {
            Helper::custom_validator(request()->all(), ['patientId' => 'required|exists:App\Models\Patient,id|integer']);
            $patient = Patient::find(request()->patientId);
            if ($patient) {
                $patient->delete();
                LogActivity::addToLog('Archive Patient', 'Archive', $patient->id, 'Profile');
                return $this->customSuccessResponseWithPayload('Patient Archived');
            }

            return $this->customFailResponseWithPayload('Patient not found');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function search_archived_patients()
    {
        try {

            $key_word = request()->keyword;

            $search_patients = Patient::onlyTrashed()
                ->where(function ($query) use ($key_word) {
                    $query->where('first_name', 'LIKE', '%' . $key_word . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $key_word . '%')
                        ->orWhere('unique_identifier', 'LIKE', '%' . $key_word . '%')
                        ->orWhere('email', 'LIKE', '%' . $key_word . '%')
                        ->orWhere('birth_date', 'LIKE', '%' . $key_word . '%')
                        ->orWhere('BSN', 'LIKE', '%' . $key_word . '%')
                        ->orWhere('middle_name', 'LIKE', '%' . $key_word . '%')
                        ->orWhere('citizen_service_number', 'LIKE', '%' . $key_word . '%');
                })
                ->select($this->landing_page_fields)
                ->latest()
                ->paginate(20);
            return $this->customSuccessResponseWithPayload($search_patients);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function get_archived_patients()
    {
        try {
            $archived_patients = Patient::orderBy("created_at", "desc")->select($this->landing_page_fields)->onlyTrashed()->paginate(20);
            LogActivity::addToLog('View Archived Patient List', 'Read');
            return $this->customSuccessResponseWithPayload($archived_patients);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function restore_patient()
    {
        try {
            Helper::custom_validator(request()->all(), ['patientId' => 'required|integer']);
            $patient = Patient::onlyTrashed()->find(request()->patientId);
            if ($patient) {
                $patient->restore();
                LogActivity::addToLog('Restore Patient', 'Restore', $patient->id, 'Profile');
                return $this->customSuccessResponseWithPayload('Patient Restored');
            }
            return $this->customFailResponseWithPayload('Patient not found');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function activeAll(): void
    {
        Patient::query()->update(['approved' => 1]);
    }

    public function patients_with_today_appointments()
    {
        try {

            $date = Carbon::now()->format('d-m-Y');
            $query_patients = Patient::with([
                'appointments.status',
                'appointments.treatmentType',
                'appointments.appointmentType',
                'appointments.employees',
                'appointments.source'
            ])->has('appointments')->whereHas('appointments', function ($query) use ($date) {
                $query->where('date', $date);
            });

            $query_patients->when(request("search_word"), function ($query) {
                $search = request("search_word");
                $query->where(
                    function ($q) use ($search) {
                        $q->where('first_name', 'LIKE', '%' . $search . '%')
                            ->orWhere('last_name', 'LIKE', '%' . $search . '%')
                            ->orWhere('unique_identifier', 'LIKE', '%' . $search . '%')
                            ->orWhere('email', 'LIKE', '%' . $search . '%')
                            ->orWhere('birth_date', 'LIKE', '%' . $search . '%')
                            ->orWhere('BSN', 'LIKE', '%' . $search . '%')
                            ->orWhere('middle_name', 'LIKE', '%' . $search . '%')
                            ->orWhere('citizen_service_number', 'LIKE', '%' . $search . '%')
                            ->orWhereHas(
                                'appointments',
                                function ($query_appointments) use ($search) {
                                        $query_appointments->whereHas(
                                            'appointmentType',
                                            function ($q_appointment_type) use ($search) {
                                                                $q_appointment_type->where('title', 'LIKE', '%' . $search . '%');
                                                            }
                                        )->orWhereHas(
                                                'treatmentType',
                                                function ($q_treatment_type) use ($search) {
                                                                    $q_treatment_type->where('title', 'LIKE', '%' . $search . '%');
                                                                }
                                            );
                                    }
                            );
                    }
                );
            });

            $paginated_patients = $query_patients->latest()->paginate(20)->through(function ($patient) use ($date) {
                $patient->setRelation('appointments', $patient->appointments->where('date', $date));
                return $patient;
            });
            return $this->customSuccessResponseWithPayload($paginated_patients);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_patients_today_appointments_pdf()
    {
        try {
            $date = Carbon::now()->format('d-m-Y');
            $request_patients = json_decode(request("patients"));
            $patients = Patient::with([
                'appointments.status',
                'appointments.treatmentType',
                'appointments.appointmentType',
                'appointments.employees',
                'appointments.source'
            ])->has('appointments')->whereHas('appointments', function ($query) use ($date) {
                $query->where('date', $date);
            })->whereIn('id', $request_patients)->get()->map(function ($patient) use ($date) {
                $patient->setRelation('appointments', $patient->appointments->where('date', $date)->take(1));
                return $patient;
            });
            Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = Pdf::loadView('pdfs.patient_today_appointments_list', compact('patients'));
            $pdf->setPaper('a3', 'landscape');
            LogActivity::addToLog('Print Patient with Today Appointments List PDF', 'Execute');
            return $pdf->stream("Patients today appointments PDF");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_patients_today_appointments_csv()
    {
        try {
            $patients = json_decode(request("patients"));
            LogActivity::addToLog('Print Patient Today Appointments List CSV', 'Execute');
            return Excel::download(new PatientTodayAppointmentsExport($patients), 'PatientsTodayAppointments.csv');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_patients_today_appointments_excel()
    {
        try {
            $patients = json_decode(request("patients"));
            LogActivity::addToLog('Print Patient Today Appointments List Excel', 'Execute');
            return Excel::download(new PatientTodayAppointmentsExport($patients), 'PatientsTodayAppointments.xlsx');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

}
