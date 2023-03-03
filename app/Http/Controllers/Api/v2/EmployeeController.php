<?php

namespace App\Http\Controllers\Api\v2;

use App\Exports\DoctorTreatmentsExport;
use App\Exports\EmployeeExport;
use App\Exports\EmployeeLogExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Modules\Core\LogActivity;
use App\Models\Employee;
use App\Services\Employee\EmployeeService;
use App\Traits\PasswordChecker;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    use PasswordChecker;

    public function __construct()
    {
        //        $this->middleware("auth:api", ["except" => ["fetchEmployeePhoto"]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $all_employees = Employee::with(['department', 'sub_department', 'first_supervisor', 'second_supervisor', 'reportingTo', 'employeeType'])->select(
                'employees.*',
                'attendance_times.start_time as attendance_time',
                'country_cities.city',
                'countries.country',
                'pay_frequencies.frequency as pay_frequency',
                'duty_types.name as duty_type',
                'rate_types.name as rate_type',
                'positions.name as  position_name',
                'departments.department as sub_department',
                'supervisors.name as supervisor_name'
            )
                ->leftJoin('positions', function ($join) {
                    $join->on('employees.position_id', '=', 'positions.id');
                })
                ->leftJoin('countries', function ($join) {
                    $join->on('employees.country_id', '=', 'countries.id');
                })
                ->leftJoin('supervisors', function ($join) {
                    $join->on('employees.first_supervisor_id', '=', 'supervisors.id');
                })
                ->leftJoin('country_cities', function ($join) {
                    $join->on('employees.city_id', '=', 'country_cities.id');
                })
                ->leftJoin('attendance_times', function ($join) {
                    $join->on('employees.attendance_time_id', '=', 'attendance_times.id');
                })
                ->leftJoin('departments', function ($join) {
                    $join->on('employees.sub_department_id', '=', 'departments.id');
                })
                ->leftJoin('pay_frequencies', function ($join) {
                    $join->on('employees.pay_frequency_id', '=', 'pay_frequencies.id');
                })
                ->leftJoin('duty_types', function ($join) {
                    $join->on('employees.duty_type_id', '=', 'duty_types.id');
                })
                ->leftJoin('rate_types', function ($join) {
                    $join->on('employees.rate_type', '=', 'rate_types.id');
                })
                ->orderBy('employees.id', 'DESC')
                ->groupBy('employees.id')
                ->get();

            return $this->customSuccessResponseWithPayload($all_employees);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        // dd($this->password_validate());
        $validator = Validator::make(request()->all(), [
            'positionId' => 'nullable|integer',
            'dutyTypeId' => 'nullable|integer',
            'lastName' => 'required|string',
            'firstName' => 'required|string',
            'hireDate' => 'nullable|date|date_format:d-m-Y',
            'dateOfBirth' => 'nullable|date|date_format:d-m-Y',
            // 'email' => 'required|email|unique:employees,email',
            'gender' => 'nullable|string',
            'maritalStatus' => 'nullable|string',
            'homeEmail' => 'nullable|email',
            'homePhone' => 'nullable',
            'cellPhone' => 'nullable|string',
            'businessEmail' => 'nullable|email',
            'businessPhone' => 'nullable',
            'branchAddress' => 'nullable',
            'phone' => 'nullable',
            'basicSalary' => 'nullable',
            'netSalary' => 'nullable',
            'tinNumber' => 'nullable',
            'rate' => 'nullable',
            'reportingTo' => 'nullable|integer|exists:App\Models\Supervisor,id',
            'payFrequencyId' => 'nullable|integer|exists:App\Models\PayFrequency,id',
            'employeeTypeId' => 'required|integer|exists:App\Models\EmployeeType,id',
            'departmentId' => 'required|integer|exists:App\Models\Department,id',
            'emergencyPersonName' => 'nullable',
            'emergencyRelationship' => 'nullable',
            'emergencyPhone' => 'nullable',
            'emergencyAnotherPhone' => 'nullable',
            'emergencyHomePhone' => 'nullable',
            'emergencyAddress' => 'nullable',
            'emergencyWorkPhone' => 'nullable',
            'password' => [
                'required', $this->password_validate()
            ],
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->errors()->all(), 200);
        }

        try {
            $employee = new Employee;
            $employee->position_id = $request->positionId;
            $employee->duty_type_id = $request->dutyTypeId;
            $employee->first_name = $request->firstName;
            $employee->last_name = $request->lastName;
            $employee->middle_name = $request->middleName;
            $employee->maiden_name = $request->maidenName;
            $employee->email = $request->email;
            $employee->date_of_birth = $request->dateOfBirth;
            $employee->hire_date = $request->hireDate;
            $employee->gender = $request->gender;
            $employee->city_id = $request->cityId;
            $employee->marital_status = $request->maritalStatus;
            $employee->home_email = $request->homeEmail;
            $employee->alt_phone = $request->altPhone;
            $employee->cell_phone = $request->cellPhone;
            $employee->business_email = $request->businessEmail;
            $employee->business_phone = $request->businessPhone;
            $employee->branch_address = $request->branchAddress;
            $employee->ethnic_group = $request->ethnicGroup;
            $employee->place_of_residence = $request->placeOfResidence;
            $employee->work_in_city = $request->workInCity;
            $employee->work_permitt = $request->workPermitt;
            $employee->gross_salary = $request->grossSalary;
            $employee->phone = $request->phone;
            $employee->zipcode = $request->zipcode;
            $employee->country_id = $request->countryId;
            $employee->basic_salary = $request->basicSalary;
            $employee->net_salary = $request->netSalary;
            $employee->tin_number = $request->tinNumber;
            $employee->employee_type_id = $request->employeeTypeId;
            $employee->attendance_time_id = $request->attendanceTimeId;
            $employee->account_number = $request->accountNumber;
            $employee->bank_name = $request->bankName;
            $employee->bank_ban_number = $request->bankBanNumber;
            $employee->transport_allowance = $request->transportAllowance;
            $employee->sub_department_id = $request->subDepartmentId;
            $employee->department_id = $request->departmentId;
            $employee->rate_type = $request->rateType;
            $employee->rate = $request->rate;
            $employee->medical = $request->medical;
            $employee->transportation = $request->transportation;
            $employee->monthly_working_hours = $request->monthlyWorkingHours;
            $employee->family = $request->family;
            $employee->others_in_benefits = $request->othersInBenefits;
            $employee->pay_frequency_id = $request->payFrequencyId;
            $employee->edu_award = $request->eduAward;
            $employee->edu_awarding_institution = $request->eduAwardingInstitution;
            $employee->edu_awarding_date = $request->eduAwardingDate;
            $employee->edu_class_of_award = $request->eduClassOfAward;
            $employee->first_supervisor_id = $request->firstSupervisorId;
            $employee->second_supervisor_id = $request->secondSupervisorId;
            $employee->reporting_to = $request->reportingTo;
            $employee->emergency_person_name = $request->emergencyPersonName;
            $employee->emergency_relationship = $request->emergencyRelationship;
            $employee->emergency_phone = $request->emergencyPhone;
            $employee->emergency_another_phone = $request->emergencyAnotherPhone;
            $employee->emergency_home_phone = $request->emergencyHomePhone;
            $employee->emergency_address = $request->emergencyAddress;
            $employee->emergency_work_phone = $request->emergencyWorkPhone;
            $employee->facility_id = auth()->user()->facility_id;
            $employee->verification_code = generate_random_string();
            $employee->save();

            // check if request has photo atached and save it
            if (isset($request->photo) && !empty($request->photo)) {
                $file_name = time() . '_' . $request->photo->getClientOriginalName();
                upload_file($file_name, $request->photo, 'employees');
                $employee->photo_url = $file_name;
                $employee->save();
            }

            $password = $request->password;
            $userName = $request->userEmail;
            $employee->password = Hash::make($password);
            $employee->user_email = $userName;
            $employee->save();

            if ($employee) {
                (new EmployeeService)->sendChangeTemporaryPasswordEmail(
                    email: $request->email,
                    password: $request->password,
                    name: $employee->first_name . ' ' . $employee->middle_name . ' ' . $employee->last_name,
                    url: $request->url
                );
                LogActivity::addToLog('Employee Registered', 'Create', null, 'Profile', $employee->id);
                return $this->customSuccessResponseWithPayload($employee);
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Metadent\AuthModule\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $validator = Validator::make(request()->all(), [
            'employeeId' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->errors->all(), 200);
        }

        $id = request()->employeeId;

        $employee = Employee::query()->with(['department', 'sub_department', 'first_supervisor', 'second_supervisor', 'employeeType', 'reportingTo'])->select(
            'employees.*',
            'attendance_times.start_time as attendance_time',
            'country_cities.city',
            'countries.country as country_name',
            'pay_frequencies.frequency as pay_frequency',
            'duty_types.name as duty_type',
            'rate_types.name as rate_type',
            'positions.name as  position_name',
            'departments.department as sub_department',
            'supervisors.name as supervisor_name',
            'employee_types.type as employee_type_name',
        )
            ->leftJoin('positions', function ($join) {
                $join->on('employees.position_id', '=', 'positions.id');
            })
            ->leftJoin('employee_types', function ($join) {
                $join->on('employees.employee_type_id', '=', 'employee_types.id');
            })
            ->leftJoin('countries', function ($join) {
                $join->on('employees.country_id', '=', 'countries.id');
            })
            ->leftJoin('supervisors', function ($join) {
                $join->on('employees.first_supervisor_id', '=', 'supervisors.id');
            })
            ->leftJoin('country_cities', function ($join) {
                $join->on('employees.city_id', '=', 'country_cities.id');
            })
            ->leftJoin('attendance_times', function ($join) {
                $join->on('employees.attendance_time_id', '=', 'attendance_times.id');
            })
            ->leftJoin('departments', function ($join) {
                $join->on('employees.sub_department_id', '=', 'departments.id');
            })
            ->leftJoin('pay_frequencies', function ($join) {
                $join->on('employees.pay_frequency_id', '=', 'pay_frequencies.id');
            })
            ->leftJoin('duty_types', function ($join) {
                $join->on('employees.duty_type_id', '=', 'duty_types.id');
            })
            ->leftJoin('rate_types', function ($join) {
                $join->on('employees.rate_type', '=', 'rate_types.id');
            })->where('employees.id', $id)
            ->first();
        LogActivity::addToLog('Read Employee Details', 'Read', null, 'Profile', $employee->id);

        return $this->customSuccessResponseWithPayload($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \Metadent\AuthModule\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'positionId' => 'nullable|integer',
            'dutyTypeId' => 'nullable|integer',
            'lastName' => 'required|string',
            'firstName' => 'required|string',
            'hireDate' => 'nullable|date|date_format:d-m-Y',
            'dateOfBirth' => 'nullable|date|date_format:d-m-Y',
            'email' => 'required|email',
            'gender' => 'nullable|string',
            'maritalStatus' => 'nullable|string',
            'homeEmail' => 'nullable|email',
            'homePhone' => 'nullable',
            'cellPhone' => 'nullable|string',
            'businessEmail' => 'nullable|email',
            'businessPhone' => 'nullable',
            'branchAddress' => 'nullable',
            'phone' => 'nullable',
            'basicSalary' => 'nullable',
            'netSalary' => 'nullable',
            'tinNumber' => 'nullable',
            'rate' => 'nullable',
            'reportingTo' => 'nullable|integer|exists:App\Models\Supervisor,id',
            'payFrequencyId' => 'nullable|integer|exists:App\Models\PayFrequency,id',
            'employeeTypeId' => 'required|integer|exists:App\Models\EmployeeType,id',
            'departmentId' => 'required|integer|exists:App\Models\Department,id',
            'emergencyPersonName' => 'nullable',
            'emergencyRelationship' => 'nullable',
            'emergencyPhone' => 'nullable',
            'emergencyAnotherPhone' => 'nullable',
            'emergencyHomePhone' => 'nullable',
            'emergencyAddress' => 'nullable',
            'emergencyWorkPhone' => 'nullable',
            'employeeId' => 'required|integer|exists:App\Models\Employee,id',
            // 'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->errors()->all(), 200);
        }

        $get_employee = Employee::find($request->employeeId);

        try {

            $get_employee->position_id = $request->positionId;
            $get_employee->duty_type_id = $request->dutyTypeId;
            $get_employee->first_name = $request->firstName;
            $get_employee->last_name = $request->lastName;
            $get_employee->middle_name = $request->middleName;
            $get_employee->maiden_name = $request->maidenName;
            $get_employee->email = $request->email;
            $get_employee->date_of_birth = $request->dateOfBirth;
            $get_employee->hire_date = $request->hireDate;
            $get_employee->gender = $request->gender;
            $get_employee->city_id = $request->cityId;
            $get_employee->marital_status = $request->maritalStatus;
            $get_employee->home_email = $request->homeEmail;
            $get_employee->alt_phone = $request->altPhone;
            $get_employee->cell_phone = $request->cellPhone;
            $get_employee->business_email = $request->businessEmail;
            $get_employee->business_phone = $request->businessPhone;
            $get_employee->branch_address = $request->branchAddress;
            $get_employee->ethnic_group = $request->ethnicGroup;
            $get_employee->place_of_residence = $request->placeOfResidence;
            $get_employee->work_in_city = $request->workInCity;
            $get_employee->work_permitt = $request->workPermitt;
            $get_employee->gross_salary = $request->grossSalary;
            $get_employee->phone = $request->phone;
            $get_employee->zipcode = $request->zipcode;
            $get_employee->country_id = $request->countryId;
            $get_employee->basic_salary = $request->basicSalary;
            $get_employee->net_salary = $request->netSalary;
            $get_employee->tin_number = $request->tinNumber;
            $get_employee->employee_type_id = $request->employeeTypeId;
            $get_employee->attendance_time_id = $request->attendanceTimeId;
            $get_employee->account_number = $request->accountNumber;
            $get_employee->bank_name = $request->bankName;
            $get_employee->bank_ban_number = $request->bankBanNumber;
            $get_employee->transport_allowance = $request->transportAllowance;
            $get_employee->sub_department_id = $request->subDepartmentId;
            $get_employee->department_id = $request->departmentId;
            $get_employee->rate_type = $request->rateType;
            $get_employee->rate = $request->rate;
            $get_employee->medical = $request->medical;
            $get_employee->transportation = $request->transportation;
            $get_employee->monthly_working_hours = $request->monthlyWorkingHours;
            $get_employee->family = $request->family;
            $get_employee->others_in_benefits = $request->othersInBenefits;
            $get_employee->pay_frequency_id = $request->payFrequencyId;
            $get_employee->edu_award = $request->eduAward;
            $get_employee->edu_awarding_institution = $request->eduAwardingInstitution;
            $get_employee->edu_awarding_date = $request->eduAwardingDate;
            $get_employee->edu_class_of_award = $request->eduClassOfAward;
            $get_employee->first_supervisor_id = $request->firstSupervisorId;
            $get_employee->second_supervisor_id = $request->secondSupervisorId;
            $get_employee->reporting_to = $request->reportingTo;
            $get_employee->emergency_person_name = $request->emergencyPersonName;
            $get_employee->emergency_relationship = $request->emergencyRelationship;
            $get_employee->emergency_phone = $request->emergencyPhone;
            $get_employee->emergency_another_phone = $request->emergencyAnotherPhone;
            $get_employee->emergency_home_phone = $request->emergencyHomePhone;
            $get_employee->emergency_address = $request->emergencyAddress;
            $get_employee->emergency_work_phone = $request->emergencyWorkPhone;
            $get_employee->facility_id = auth()->user()->facility_id;
            $get_employee->update();

            // check if request has photo attached and save it
            if (isset($request->photo) && !empty($request->photo)) {
                $old_file = $get_employee->photo_url;
                $file_name = time() . '_' . $request->photo->getClientOriginalName();
                update_file($old_file, $file_name, $request->photo, 'employees');
                $get_employee->photo_url = $file_name;
                $get_employee->save();
            }

            // $password = $request->password;
            $userName = $request->userEmail;
            // $get_employee->password = bcrypt($password);
            $get_employee->user_email = $userName;
            $get_employee->save();

            if ($get_employee):
                LogActivity::addToLog('Update Employee Details', 'Update', null, 'Profile', $get_employee->id);
                return $this->customSuccessResponseWithPayload($get_employee);
            endif;
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function update_image(Request $request)
    {
        request()->validate([
            'employeeId' => 'required',
            'imagePath' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            $employee = Employee::find(request()->employeeId);
            if ($employee) {
                if (isset($request->imagePath) && !empty($request->imagePath)) {
                    $old_file = $employee->photo_url;
                    $file_name = time() . '_' . $request->imagePath->getClientOriginalName();
                    update_file($old_file, $file_name, $request->imagePath, 'employees');
                    $employee->photo_url = $file_name;
                    $employee->save();
                    LogActivity::addToLog('Update Employee Image', 'Update', null, 'Profile', $employee->id);
                    return $this->customSuccessResponseWithPayload('Image Updated');
                }
            } else {
                return $this->customFailResponseWithPayload('Employee not found');
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function change_status()
    {


        try {
            $validator = Validator::make(request()->all(), [
                'employeeId' => 'required|integer',
                'status' => 'required|integer',
            ]);
            if ($validator->fails()) {
                throw new \Exception(implode(',', $validator->errors()->messages()), 200);
            }

            $employee = Employee::find(request()->employeeId);

            if (request()->status === 1) {
                $employee->status = 1;
                $employee->update();

                LogActivity::addToLog('Activate Employee', 'Update', null, 'Profile', $employee->id);
                return $this->customSuccessResponseWithPayload('successfully activated the employee !');
            } else if (request()->status === 0) {
                $employee->status = 0;
                $employee->update();

                LogActivity::addToLog('De-Activate Employee', 'Update', null, 'Profile', $employee->id);
                return $this->customSuccessResponseWithPayload('successfully deactivated the employee !');
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }

    // function for deleting an adhesive type
    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'employeeId' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->errors()->all(), 200);
        }

        $employee = Employee::find(request()->employeeId);

        if ($employee) {

            $employee->delete();

            LogActivity::addToLog('Delete Employee', 'Delete', null, 'Profile', $employee->id);

            return $this->customSuccessResponseWithPayload('Employee  has been archived');
        }

        return $this->customFailResponseWithPayload("Employee  not found");
    }
    /**
     * restore all post
     *
     * @return \Illuminate\Http\JsonResponse()
     */
    public function restoreAll()
    {
        $restored = Employee::onlyTrashed()->restore();

        LogActivity::addToLog('Restored Deleted Employees', 'Update');

        return $this->customSuccessResponseWithPayload($restored);
    }

    public function getDoctors()
    {
        $doctors = Employee::with([
            'department' => function ($query) {
                $query->select(['id', 'department']);
            },
        ])->whereDoesntHave('leaveApplications')->orWhereHas('leaveApplications', function ($query) {
            $query->where('is_approved', '!=', 1);
        })->role('Doctor')->latest()->get()->makeHidden(['permissions', 'roles']);

        LogActivity::addToLog('Read Doctors List', 'Read');

        return $this->customSuccessResponseWithPayload($doctors);
    }

    public function doctorDetails()
    {
        $validator = Validator::make(request()->all(), [
            "doctorId" => "required",
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->errors()->all(), 200);
        }

        $id = request()->doctorId;

        $doctor = Employee::query()->with(['department', 'sub_department', 'first_supervisor', 'second_supervisor'])->select(
            'employees.*',
            'attendance_times.start_time as attendance_time',
            'cities.city',
            'countries.country as country_name',
            'pay_frequencies.frequency as pay_frequency',
            'duty_types.name as duty_type',
            'rate_types.name as rate_type',
            'positions.name as  position_name',
            'departments.department as sub_department',
            'supervisors.name as supervisor_name',
            'employee_types.type as employee_type_name',
        )
            ->leftJoin('positions', function ($join) {
                $join->on('employees.position_id', '=', 'positions.id');
            })
            ->leftJoin('employee_types', function ($join) {
                $join->on('employees.employee_type_id', '=', 'employee_types.id');
            })
            ->leftJoin('countries', function ($join) {
                $join->on('employees.country_id', '=', 'countries.id');
            })
            ->leftJoin('supervisors', function ($join) {
                $join->on('employees.first_supervisor_id', '=', 'supervisors.id');
            })
            ->leftJoin('cities', function ($join) {
                $join->on('employees.city_id', '=', 'cities.id');
            })
            ->leftJoin('attendance_times', function ($join) {
                $join->on('employees.attendance_time_id', '=', 'attendance_times.id');
            })
            ->leftJoin('departments', function ($join) {
                $join->on('employees.sub_department_id', '=', 'departments.id');
            })
            ->leftJoin('pay_frequencies', function ($join) {
                $join->on('employees.pay_frequency_id', '=', 'pay_frequencies.id');
            })
            ->leftJoin('duty_types', function ($join) {
                $join->on('employees.duty_type_id', '=', 'duty_types.id');
            })
            ->leftJoin('rate_types', function ($join) {
                $join->on('employees.rate_type', '=', 'rate_types.id');
            })->where('employees.id', $id)
            ->with('appointments')
            ->role('Doctor')
            ->first()->makeHidden(['availability', 'permissions']);

        LogActivity::addToLog('Read Employee/Doctor Details', 'Read', null, 'Profile', $doctor->id);

        return $this->customSuccessResponseWithPayload($doctor);
    }

    public function download_pdf()
    {
        try {

            $request_employees = json_decode(request("employees"));
            $employees = Employee::with(['position', 'reportingTo', 'city', 'department'])
                ->whereIn('id', $request_employees)->latest()->get(['id', 'first_name', 'email', 'phone', 'last_name', 'city_id', 'position_id', 'reporting_to', 'department_id'])
                ->makeHidden(['permissions']);
            Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = Pdf::loadView('pdfs.employee_list', compact('employees'));
            $pdf->setPaper('a3', 'landscape');
            LogActivity::addToLog('Print Employee PDF', 'Execute');
            return $pdf->stream("Employees PDF");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_excel()
    {
        try {
            $employees = json_decode(request("employees"));
            LogActivity::addToLog('Print Employee ExcelSheet', 'Execute');
            return Excel::download(new EmployeeExport($employees), 'Employees.xlsx');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_csv()
    {
        try {
            $employees = json_decode(request("employees"));
            LogActivity::addToLog('Print Employee CSVSheet', 'Execute');
            return Excel::download(new EmployeeExport($employees), 'Employees.csv');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function paginated_employees()
    {
        try {
            $query_employees = Employee::with(['department', 'city', 'position', 'reportingTo', 'country', 'latestLog']);

            $query_employees->when(request("departments"), function ($query) {
                $departments = request("departments");
                return $query->whereIn('department_id', $departments);
            });
            $query_employees->when(request("positions"), function ($query) {
                $positions = request("positions");
                return $query->whereIn('position_id', $positions);
            });
            $query_employees->when(request("roles"), function ($query) {
                $roles = request("roles");
                $role_ids = DB::table('model_has_roles')->whereIn('role_id', $roles)
                    ->select('model_id')->pluck('model_id')->lazy()->toArray();
                return $query->whereIn('id', $role_ids);
            });
            $query_employees->when(request("search_word"), function ($query) {
                $search_term = request("search_word");
                return $query->where('last_name', 'LIKE', '%' . $search_term . '%')
                    ->orWhere('first_name', 'LIKE', '%' . $search_term . '%')
                    ->orWhereHas(
                        'department',
                        function ($query_department) use ($search_term) {
                            $query_department->where('department', 'LIKE', '%' . $search_term . '%');
                        }
                    )
                    ->orWhereHas(
                        'city',
                        function ($query_city) use ($search_term) {
                            $query_city->where('city', 'LIKE', '%' . $search_term . '%');
                        }
                    )
                    ->orWhereHas(
                        'position',
                        function ($query_position) use ($search_term) {
                            $query_position->where('name', 'LIKE', '%' . $search_term . '%');
                        }
                    )
                    ->orWhereHas(
                        'roles',
                        function ($query_roles) use ($search_term) {
                            $query_roles->where('name', 'LIKE', '%' . $search_term . '%');
                        }
                    )
                    ->orWhereHas(
                        'reportingTo',
                        function ($query_reporting) use ($search_term) {
                            $query_reporting->where('name', 'LIKE', '%' . $search_term . '%');
                        }
                    );
            });
            $query_employees->when(request("log_date_range"), function ($query) {
                $log_date_range = request("log_date_range");
                return $query->whereHas(
                    'latestLog',
                    function ($query_logs) use ($log_date_range) {
                        $query_logs->whereDate('created_at', '>=', $log_date_range[0])
                            ->whereDate('created_at', '<=', $log_date_range[1]);
                    }
                );
            });
            $query_employees->when(request("log_month_range"), function ($query) {
                $log_month_range = request("log_month_range");
                return $query->whereHas(
                    'latestLog',
                    function ($query_logs) use ($log_month_range) {
                        $query_logs->whereMonth('created_at', $log_month_range[0])
                            ->whereYear('created_at', $log_month_range[1]);
                    }
                );
            });
            $query_employees->when(request("log_year"), function ($query) {
                $log_year = request("log_year");
                return $query->whereHas(
                    'latestLog',
                    function ($query_logs) use ($log_year) {
                        $query_logs->whereYear('created_at', $log_year);
                    }
                );
            });

            $paginated_employees = $query_employees->latest()->paginate(20);
            LogActivity::addToLog('Read Employee List', 'Read');
            return $this->customSuccessResponseWithPayload($paginated_employees);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_single_employee_pdf()
    {
        try {
            $request = json_decode(request("employees"));
            $employee = Employee::with(['reportingTo', 'city', 'country', 'position', 'department', 'dutyType', 'employeeType'])
                ->where('id', $request[0])->get();
            Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = Pdf::loadView('pdfs.employee_detail', compact('employee'));
            LogActivity::addToLog('Print Single Employee PDF', 'Execute', null, 'Profile', $request[0]);
            return $pdf->stream("Employees PDF");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_employees_with_latest_log_pdf()
    {
        try {
            $request_employees = json_decode(request("employees"));
            $employees = Employee::with(['department', 'latestLog'])->whereIn('id', $request_employees)->latest()->get();
            Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = Pdf::loadView('pdfs.employee_logs_list', compact('employees'));
            $pdf->setPaper('a3', 'landscape');
            LogActivity::addToLog('Print Employee with Logs List PDF', 'Execute');
            return $pdf->stream("Employee PDF");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_employees_with_latest_log_excel()
    {
        try {
            $request_employees = json_decode(request("employees"));
            LogActivity::addToLog('Print Employee with Logs List Excel', 'Execute');
            return Excel::download(new EmployeeLogExport($request_employees), 'EmployeesWithLogs.xlsx');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_employees_with_latest_log_csv()
    {
        try {
            $request_employees = json_decode(request("employees"));
            LogActivity::addToLog('Print Employee with Logs List CSV', 'Execute');
            return Excel::download(new EmployeeLogExport($request_employees), 'EmployeesWithLogs.csv');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function employee_with_latest_treatment()
    {
        try {

            $query_employees = Employee::with(
                ['treatments.invoices', 'department']
            )->has('treatments')->orWhereHas('treatments.invoices', function ($query) {
                $query->withoutAppends();
            });

            $query_employees->when(request("departments"), function ($query) {
                $departments = request("departments");
                $query->whereIn('department_id', $departments);
            });

            $query_employees->when(request("treatment_date_range"), function ($query) {
                $treatment_date_range = request("treatment_date_range");
                return $query->whereHas(
                    'treatments',
                    function ($query_treatments) use ($treatment_date_range) {
                        $query_treatments->whereDate('created_at', '>=', $treatment_date_range[0])
                            ->whereDate('created_at', '<=', $treatment_date_range[1]);
                    }
                );
            });

            $query_employees->when(request("treatment_month_range"), function ($query) {
                $treatment_month_range = request("treatment_month_range");
                return $query->whereHas(
                    'treatments',
                    function ($query_treatments) use ($treatment_month_range) {
                        $query_treatments->whereMonth('created_at', $treatment_month_range[0])
                            ->whereYear('created_at', $treatment_month_range[1]);
                    }
                );
            });

            $query_employees->when(request("treatment_year"), function ($query) {
                $treatment_year = request("treatment_year");
                return $query->whereHas(
                    'treatments',
                    function ($query_treatments) use ($treatment_year) {
                        $query_treatments->whereYear('created_at', $treatment_year);
                    }
                );
            });

            $query_employees->when(request("search_name"), function ($query) {
                $search_name = request("search_name");
                return $query->where(
                    function ($q) use ($search_name) {
                        $q->where('last_name', 'LIKE', '%' . $search_name . '%')
                            ->orWhere('first_name', 'LIKE', '%' . $search_name . '%');
                    }
                );
            });

            $query_employees->when(request("search_word"), function ($query) {
                $search_word = request("search_word");
                return $query->where(
                    function ($q) use ($search_word) {
                        $q->where('last_name', 'LIKE', '%' . $search_word . '%')
                            ->orWhere('first_name', 'LIKE', '%' . $search_word . '%')
                            ->orWhere('email', 'LIKE', '%' . $search_word . '%')
                            ->orWhereHas(
                                'treatments',
                                function ($query_treatments) use ($search_word) {
                                        $query_treatments->where('done_treatments.treatment_status', 'LIKE', '%' . $search_word . '%')
                                            ->orWhere('done_treatments.id', 'LIKE', '%' . $search_word . '%');
                                    }
                            );
                    }
                );
            });

            $status = request("status") ?? null;

            $paginated_employees = $query_employees->latest()->paginate(20)
                ->through(function ($employee) use ($status) {
                    $employee->setRelation('treatments', $employee->treatments->when(
                        request('status'),
                        function ($q) use ($status) {
                                return $q->where('treatment_status', $status)->flatten();
                            }
                    )->take(1));
                    return $employee;
                });

            LogActivity::addToLog('Read Employee List', 'Read');

            return $this->customSuccessResponseWithPayload($paginated_employees);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_employee_treatments_pdf()
    {
        try {
            $request_employees = json_decode(request("employees"));
            $employees = Employee::with(['treatments.invoices', 'department'])->has('treatments')->whereIn('id', $request_employees)->latest()->get()->map(function ($employee) {
                $employee->setRelation('treatments', $employee->treatments->take(1));
                return $employee;
            });
            Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = Pdf::loadView('pdfs.employee_treatments_list', compact('employees'));
            $pdf->setPaper('a3', 'landscape');
            LogActivity::addToLog('Print Employee with Treatments List PDF', 'Execute');
            return $pdf->stream("Employee Treatments PDF");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_employee_treatments_csv()
    {
        try {
            $request_employees = json_decode(request("employees"));
            LogActivity::addToLog('Print Employee with Treatments List CSV', 'Execute');
            return Excel::download(new DoctorTreatmentsExport($request_employees), 'DoctorsTreatments.csv');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_employee_treatments_excel()
    {
        try {
            $request_employees = json_decode(request("employees"));
            LogActivity::addToLog('Print Employee with Treatments List Excel', 'Execute');
            return Excel::download(new DoctorTreatmentsExport($request_employees), 'DoctorsTreatments.xlsx');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

}
