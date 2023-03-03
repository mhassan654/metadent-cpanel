<?php

namespace App\Services\Employee;

use App\Helpers\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Metadent\AuthModule\Models\Employee;
use SendCodeMail;

class EmployeeService
{

    public function save(Request $request)
    {
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

        // check if request has photo atached and save it
        if (isset($request->photo) && !empty($request->photo)) {
            $file_name = time() . '_' . $request->photo->getClientOriginalName();
            upload_file($file_name, $request->photo, 'employees');
            $employee->photo_url = $file_name;
        }

        $password = $request->password;
        $userName = $request->userEmail;
        $employee->password = Hash::make($password);
        $employee->user_email = $userName;

        if (!$employee->save()) {
            throw new \Exception('Error occured while registering employee');
        }

        $this->sendChangeTemporaryPasswordEmail(
            email: $request->email,
            password: $request->password,
            name: $employee->first_name . ' ' . $employee->middle_name . ' ' . $employee->last_name,
            url: $request->url
        );
        LogActivity::addToLog('Employee Registered', 'Create', null, 'Profile', $employee->id);
        return $employee;
    }


    public function sendChangeTemporaryPasswordEmail(string $email, string $name, string $password, $url = null)
    {
        $details = [
            'password' => $password,
            'email' => $email,
            'fullname' => $name,
            'path' => $url ?? url()
        ];
        Mail::to($email)->send(new SendCodeMail($details, 'emails.temporary_password', 'Account Setup'));
    }
}
