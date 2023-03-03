<?php
// created by Mulindwa Denis

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Models\FamilyMember;
use App\Models\Patient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FamilyMemberController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:api');
    }

    public function index(): JsonResponse
    {
        $response = [];
        foreach (FamilyMember::orderBy('created_at', 'desc')->get() as $member) {
            $member->patient = Patient::find($member->patient_id);
            $response[] = $member;
        }
        return $this->customSuccessResponseWithPayload($response);
    }

    public function patient_members(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'patientId' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->customFailResponseWithPayload($validator->errors()->all());
        }

        return $this->customSuccessResponseWithPayload(FamilyMember::where('patient_id', $request->patientId)->get());
    }


    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'memberId' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseWithPayload($validator->errors()->all());
        } else {
            $member = FamilyMember::find($request->memberId);
            if ($member) {
                $member->patient = Patient::find($member->patient_id);
                return $this->customSuccessResponseWithPayload($member);
            } else {
                return $this->customFailResponseWithPayload('Member not Found');
            }
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patientId' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required|string',
            'maritalStatus' => 'required',
            'gender' => 'required',
            'dateOfBirth' => 'required',
            'nationality' => 'required',
            'country' => 'required',
            'region' => 'required',
            'postalCode' => 'required',
            'homeAddress' => 'required',
            'state' => 'required',
            'street' => 'required',
            'memberId' => 'required',
            'relationToPatient' => 'required',
            'category' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseWithPayload($validator->errors()->all());
        } else {
            $family_member = FamilyMember::find(request()->memberId);
            $family_member->patient_id = request()->patientId;
            $family_member->member_first_name = request()->firstName;
            $family_member->member_last_name = request()->lastName;
            $family_member->member_middle_name = request()->middleName;
            $family_member->member_date_of_birth = request()->dateOfBirth;
            $family_member->member_email = request()->email;
            $family_member->member_gender = request()->gender;
            $family_member->member_phone_number = request()->phoneNumber;
            $family_member->member_second_phone_number = request()->secondPhoneNumber;
            $family_member->member_marital_status = request()->maritalStatus;
            $family_member->member_citizen_service_number = request()->citizenServiceNumber;
            $family_member->member_nationality = request()->nationality;
            $family_member->member_country = request()->country;
            $family_member->member_region = request()->region;
            $family_member->member_postal_code = request()->postalCode;
            $family_member->member_home_address = request()->homeAddress;
            $family_member->member_state = request()->state;
            $family_member->member_street = request()->street;
            $family_member->member_relationship = request()->relationToPatient;
            $family_member->member_category = request()->category;
            $family_member->BSN = request()->BSN;
            $family_member->update();

            if ($family_member) {
                return $this->customSuccessResponseWithPayload($family_member);
            } else {
                return $this->customFailResponseWithPayload('Family member not updated');
            }
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patientId' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required|unique:family_members,member_email',
            'maritalStatus' => 'required',
            'gender' => 'required',
            'dateOfBirth' => 'required',
            'nationality' => 'required',
            'country' => 'required',
            'region' => 'required',
            'postalCode' => 'required',
            'homeAddress' => 'required',
            'state' => 'required',
            'street' => 'required',
            'relationToPatient' => 'required',
            'imagePath' => 'image|mimes:jpg,png,jpeg|max:2048',
            'category' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseWithPayload($validator->errors()->all());
        } else {
            try {
                $family_member = new FamilyMember;
                $family_member->patient_id = request()->patientId;
                $family_member->member_first_name = request()->firstName;
                $family_member->member_last_name = request()->lastName;
                $family_member->member_middle_name = request()->middleName;
                $family_member->member_date_of_birth = request()->dateOfBirth;
                $family_member->member_email = request()->email;
                $family_member->member_gender = request()->gender;
                $family_member->member_phone_number = request()->phoneNumber;
                $family_member->member_second_phone_number = request()->secondPhoneNumber;
                $family_member->member_marital_status = request()->maritalStatus;
                $family_member->member_citizen_service_number = request()->citizenServiceNumber;
                $family_member->member_nationality = request()->nationality;
                $family_member->member_country = request()->country;
                $family_member->member_region = request()->region;
                $family_member->member_postal_code = request()->postalCode;
                $family_member->member_home_address = request()->homeAddress;
                $family_member->member_state = request()->state;
                $family_member->member_street = request()->street;
                $family_member->member_relationship = request()->relationToPatient;
                $family_member->member_category = request()->category;
                $family_member->BSN = request()->BSN;
                $family_member->save();

                if (isset($request->imagePath) && !empty($request->imagePath)) {
                    $file_name = time() . '_' . $request->imagePath->getClientOriginalName();
                    upload_file($file_name, $request->imagePath, 'patients');
                    $family_member->member_image_path = $file_name;
                    $family_member->save();
                }

                if ($family_member->member_category === 'New Patient') {
                    $patient = new Patient;
                    $patient->first_name = request()->firstName;
                    $patient->last_name = request()->lastName;
                    $patient->middle_name = request()->middleName;
                    $patient->facility_id = 1;
                    $patient->birth_date = request()->dateOfBirth;
                    $patient->email = request()->email;
                    $patient->gender = request()->gender;
                    $patient->home_phone = request()->phoneNumber;
                    $patient->secondary_phone = request()->secondPhoneNumber;
                    $patient->marital_status = request()->maritalStatus;
                    $patient->citizen_service_number = request()->citizenServiceNumber;
                    $patient->nationality = request()->nationality;
                    $patient->country = request()->country;
                    $patient->postalcode = request()->postalCode;
                    $patient->home_address = request()->homeAddress;
                    $patient->state = request()->state;
                    $patient->street = request()->street;
                    $patient->photo = $family_member->member_image_path;
                    $patient->BSN = request()->BSN;
                    $patient->save();
                }

                return $this->customSuccessResponseWithPayload($family_member);

            } catch (\Throwable $th) {
                return $this->customFailResponseWithPayload($th->getMessage());
            }
        }
    }

    public function existing_patient(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'selectedPatientId' => 'required',
            'currentPatientId' => 'required',
            'category' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->customFailResponseWithPayload($validator->errors()->all());
        }
        try {
            $patient_member = Patient::find($request->selectedPatientId);
            $family_member = new FamilyMember;
            $family_member->patient_id = request()->currentPatientId;
            $family_member->member_first_name = $patient_member->first_name;
            $family_member->member_last_name = $patient_member->last_name;
            $family_member->member_middle_name = $patient_member->middle_name;
            $family_member->member_email = $patient_member->email;
            $family_member->member_citizen_service_number = $patient_member->citizen_service_number == null ? "" : $patient_member->citizen_service_number;
            $family_member->member_date_of_birth = $patient_member->birth_date;
            $family_member->member_gender = $patient_member->gender == null ? "" : $patient_member->gender;
            $family_member->member_phone_number = $patient_member->home_phone == null ? "" : $patient_member->home_phone;
            $family_member->member_second_phone_number = $patient_member->patient_phone;
            $family_member->member_marital_status = $patient_member->marital_status == null ? "" : $patient_member->marital_status;
            $family_member->member_country = $patient_member->country == null ? "" : $patient_member->country;
            $family_member->member_nationality = $patient_member->nationality == null ? "" : $patient_member->nationality;
            $family_member->member_postal_code = $patient_member->postalcode == null ? "" : $patient_member->postalcode;
            $family_member->member_home_address = $patient_member->home_address == null ? "" : $patient_member->home_address;
            $family_member->member_state = $patient_member->state == null ? "" : $patient_member->state;
            $family_member->member_street = $patient_member->street == null ? "" : $patient_member->street;
            $family_member->member_region = $patient_member->region == null ? "" : $patient_member->region;
            $family_member->member_image_path = $patient_member->photo;
            $family_member->member_category = request()->category;
            $family_member->BSN = $patient_member->BSN;
            $family_member->save();
            return $this->customSuccessResponseWithPayload($family_member);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function destroy(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'memberId' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->customFailResponseWithPayload($validator->errors()->all());
        } else {
            $member = FamilyMember::find($request->memberId);
            if ($member) {
                $member->delete();
                return $this->customSuccessResponseWithPayload('Member Deleted');
            } else {
                return $this->customFailResponseWithPayload('Member not Found');
            }
        }
    }

}
