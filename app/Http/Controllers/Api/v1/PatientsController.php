<?php
/*
 *
 * @Author: Wavamuno Brandon Elijah
 * @Email: brandonelijah099@gmail.com
 * @Github: Elijahwb
 * @Tel: +256753659098 / +256770944854
 *
 */

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\HealthHistory;
use App\Models\Patient;
use App\Models\User;
//use http\Env\Request;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Response;

class PatientsController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:api');
    }
    //TIED TO v1/patients/all ROUTE IN THE api.php FILE IN THE ROUTES FOLDER

    public function index()
    {
        if ($this->authUser()->can('View Patients')) {
            $patients = $this->allPatients();
            return $this->customSuccessResponseWithPayload($patients);
        }
        return $this->customFailResponseWithPayload('Permission denied');
    }

    //TIED TO v1/patients/patient ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    public function show(Request $request)
    {
//        if ($this->authUser()->can('View Patients')) {
            // Check if all the mandatory fields have been provided
            $validator = Validator::make($request->all(), [
                "patientId" => "required",
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json($errors->all(), 500);
            }

            // Look for the specified patient in the database and store in a variable for more computations
            $patient = Patient::with('')->find(request()->patientId);

            // if the patient exists
            if ($patient) {
                $history = HealthHistory::where("facility_id", Auth::user()->facility_id)->where("patient_id", $patient->id)->first();

                $patient->healthHistory = $history ? $history->history : "";

                // Return the patients record to the client
                return $this->customSuccessResponseWithPayload($patient);
            }

            // If the patient record does not exist then notify the client
            return $this->customFailResponseWithPayload("Patient not found in the system");
//        }
//        return $this->customFailResponseWithPayload('Permission denied');
    }

// //TIED TO v1/patients/create ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    public function store(Request $request)
    {
//        if ($this->authUser()->can('Create Patient')) {

            $validator = Validator::make($request->all(), [
                "firstName" => "required",
                "lastName" => "required",
                "nokEmail" => "required",
                "nokPhoneNumber" => "required",
                "nokName" => "required",
                "insurancePolicyNumber" => "required",
                "citizenServiceNumber" => "required",
                "homeAddress" => "required",
                "patientEmail" => "required|unique:patients,email",
                "patientPhone" => "required",
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json($errors->all(), 500);
            }

            // Create a new patient record and store it in a variable for more computations
            $patient = new Patient;

            $patient->unique_identifier = mt_rand();
            $patient->first_name = request()->firstName;
            $patient->last_name = request()->lastName;
            $patient->middle_name = request()->middleName;
            $patient->gender = request()->gender;
            $patient->marital_status = request()->maritalStatus;
            $patient->birth_date = request()->birthDate;
            $patient->email = request()->patientEmail;
            $patient->home_phone = request()->homePhone;
            $patient->home_address = request()->homeAddress;
            $patient->nationality = request()->nationality;
            $patient->country = request()->country;
            $patient->state = request()->state;
            $patient->city = request()->city;
            $patient->street = request()->street;
            $patient->postalcode = request()->postalCode;
            $patient->patient_phone = request()->patientPhone;

            // get logged in user data
            $user = Auth::user();
            $patient->patient_insurer = request()->patientInsurer;
            $patient->insurance_policy_number = request()->insurancePolicyNumber;

            $patient->guardian_name = request()->guardianName;
            $patient->guardian_phone = request()->guardianPhone;
            $patient->guardian_email = request()->guardianEmail;
            $patient->guardian_address = request()->guardianAddress;

            $patient->reviews = request()->reviews;
            $patient->facility_id = Auth::user()->facility_id;
            $patient->citizen_service_number = request()->citizenServiceNumber;

            $patient->facility_id = $user->facility_id;
            $patient->nok_phone_number = request()->nokPhoneNumber;
            $patient->nok_name = request()->nokName;
            $patient->nok_email = request()->nokEmail;
            $patient->fm_relationship = request()->fmRelationship;
            $patient->fm_name = request()->fmName;
            $patient->fm_phone_number = request()->fmPhoneNumber;
//        $patient->fm_insurance_policy_number = request()->fmInsurancePolicyNumber;
            $patient->fm_email = request()->fmEmail;
            $patient->fill_if_not_filled = request()->fillIfNotFilled;
            $patient->referred_by = request()->referredBy;
            $patient->referree_email = request()->referreeEmail;
            $patient->referree_phone = request()->referreePhone;
            $patient->main_doctor_id = request()->mainDoctorId;

            $patient->save();

            if (isset($request->photo) && !empty($request->photo)) {
                $originalImage = $request->file('photo');
                $thumbnailImage = Image::make($originalImage);

                // Define upload path
                $thumbnailPath = public_path('/uploads/thumbnail/');
                $originalPath = public_path('/uploads/patients/');

                // Save Orginal Image
                $thumbnailImage->save($originalPath . time() . '.png');

                // Resize and save image
                $thumbnailImage->resize(350, 350);
                $thumbnailImage->save($thumbnailPath . time() . '.png');

                // Save In Database
                if(request()->secure()):
                    $patient->photo =URL::asset('/public/uploads/patients/'.time() . '.png');
                endif;
                $patient->photo =URL::asset('/public/uploads/patients/'.time() . '.png');
                $patient->save();
            }

            // Check if the new patient creation was successful
            if ($patient) {
                // is_null, empty, is_string
                if (request()->healthHistory != null && request()->healthHistory != "" && request()->healthHistory !== " ") {
                    $history = HealthHistory::where("facility_id", Auth::user()->facility_id)->where("patient_id", request()->patientId)->first();

                    HealthHistory::create([
                        "patient_id" => $patient->id,
                        "facility_id" => Auth::user()->facility_id,
                        "history" => request()->healthHistory,
                    ]);
                }

                LogActivity::addToLog('Patient  with' . $request->unique_identifier . ' number was registered');
                // Notify the client that the desired action was successful
                // return $this->customSuccessResponseWithPayload($this->allPatients());
                return $this->customSuccessResponseWithPayload("Patient was created successfully");
            }

            // If the new patient creation failed, then notify the client
            return $this->customFailResponseWithPayload("Patient was not created");
//        }
//        return $this->customFailResponseWithPayload('Permission denied');
    }

    //TIED TO v1/patients/edit ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    public function update()
    {
            // Look for the specified patient in the database and store in a variable for more computations
            $patient = Patient::find(request()->patientId);

            // If the patient exists in the database
            if ($patient) {
                // Update the patient record and store the bolean result
                $updated = $patient->update([
                    "first_name" => request()->firstName,
                    "last_name" => request()->lastName,
                    "middle_name" => request()->middleName,
                    "gender" => request()->gender,
                    "marital_status" => request()->maritalStatus,
                    "birth_date" => request()->birthDate,
                    "email" => request()->patientEmail,
                    "home_phone" => request()->homePhone,
                    "home_address" => request()->homeAddress,
                    "nationality" => request()->nationality,
                    "country" => request()->country,
                    "state" => request()->state,
                    "city" => request()->city,
                    "street" => request()->street,
                    "postalcode" => request()->postalCode,
                    "patient_phone" => request()->patientPhone,
                    "patientInsurer" => request()->insurer,
                    "insurance_policy_number" => request()->insurancePolicyNumber,
                    "guardian_name" => request()->guardianName,
                    "guardian_phone" => request()->guardianPhone,
                    "guardian_email" => request()->guardianEmail,
                    "guardian_address" => request()->guardianAddress,
                    "reviews" => request()->reviews,
                    "facility_id" => Auth::user()->facility_id,
                    "citizen_service_number" => request()->citizenServiceNumber,
                    "nok_phone_number" => request()->nokPhoneNumber,
                    "nok_name" => request()->nokName,
                    "nok_email" => request()->nokEmail,
                    "fm_relationship" => request()->fmRelationship,
                    "fm_name" => request()->fmName,
                    "fm_phone_number" => request()->fmPhoneNumber,
                    "fm_email" => request()->fmEmail,
                    "fill_if_not_filled" => request()->fillIfNotFilled,
                    "referred_by" => request()->referredBy,
                    "referree_email" => request()->referreeEmail,
                    "referree_phone" => request()->referreePhone,
                    "photo" => request()->image,
                ]);

                // // Check if the update is successful then proceed
                if ($updated) {
                    $history = HealthHistory::where("facility_id", Auth::user()->facility_id)->where("patient_id", $patient->id)->first();

                    if ($history) {
                        $history->update(["history" => request()->healthHistory]);
                    } else {
                        if (request()->healthHistory != null && request()->healthHistory != "" && request()->healthHistory != " ") {
                            HealthHistory::create([
                                "patient_id" => request()->$patient->id,
                                "facility_id" => Auth::user()->facility_id,
                                "history" => request()->healthHistory,
                            ]);
                        }

                    }

                    // Notify the client that the desired action was successful
                    return $this->customSuccessResponseWithPayload($this->allPatients());
                }

                // If the update failed, then notify the client that the desired action was successful
                return $this->customFailResponseWithPayload("Patient record failed to update");
            }

            // If the patient record does not exist, then notify the client
            return $this->customFailResponseWithPayload("Patient record does not exist");
    }

    private function allPatients()
    {
        $patients = Patient::with('mainDoctor')->where("facility_id", Auth::user()->facility_id)
            ->orderBy("created_at", "desc")->get();

        $finalPatients = [];

        foreach ($patients as $patient) {
            $history = HealthHistory::where("facility_id", Auth::user()->facility_id)->where("patient_id", $patient->id)->first();
            $patient->healthHistory = $history ? $history->history : "";

            $finalPatients[] = $patient;
        }

        return $patients;
    }

    public function paginated()
    {
        if ($this->authUser()->can('View Patients')  || $this->authUser()->hasRole('Doctor')) {
            return $this->customSuccessResponseWithPayload(Patient::where("facility_id", Auth::user()->facility_id)->orderBy("created_at", "desc")->paginate(20));
        }
        return $this->customFailResponseWithPayload('Permission denied');
    }

    public function assignDoctor()
    {
            request()->validate([
                "patientId" => "required",
            ]);

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
                        array_push($getDoctors, User::role('Doctor')->where('id', $second)->first());
                    }

                    $doctorsArr['sec_doctors'] = $getDoctors;
                    $data = array_merge($patientData->toArray(), $doctorsArr);
                    return $data;
                }

            }

            return $this->customFailResponseWithPayload("Patient  not found");

    }

    public function patientAppointments(Request $request)
    {

            $patientId = request()->patientId;
            $patientExists = Patient::find($patientId);

            $all_appointments = Appointment::where('patient_id', $patientExists->id)->where("facility_id", Auth::user()->facility_id)
                ->with(["patient", "status", "source", "type", "treatment", "period"])
                ->orderBy("date", "asc")
                ->get();

            $final_appointment_container = [];

            foreach ($all_appointments as $appointment):
                $appointment_day = Carbon::parse($appointment->date)->dayOfWeek;

                $appointment->day = $appointment_day;
                $doctor_ids = $appointment->doctors;
                $doctors_list = [];

                foreach ($doctor_ids as $doctor_id):
                    $doctors_list[] = User::find($doctor_id);
                endforeach;

                $appointment->doctors = $doctors_list;

                $final_appointment_container[] = $appointment;
            endforeach;

            return $this->customSuccessResponseWithPayload($final_appointment_container);
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
                array_push($getDoctors, User::where('id', $second)->first());
            }

            $doctorsArr['sec_doctors'] = $getDoctors;
            $data = array_merge($patientData->toArray(), $doctorsArr);
            // Return the patients record to the client
            return $this->customSuccessResponseWithPayload($data);
        }

        // If the patient record does not exist then notify the client
        return $this->customFailResponseWithPayload("Patient not found");

    }
}
