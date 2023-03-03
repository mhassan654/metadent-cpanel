<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'positionId' => 'required|integer',
            'dutyTypeId' => 'required|integer',
            'lastName' => 'required|string',
            'firstName' => 'required|string',
            'joiningDate' => 'required|date|date_format:d/m/Y',
            'hireDate' => 'required|date',
            'dateOfBirth' => 'required|date|date_format:d/m/Y',
            'email' => 'required|email',
            'gender' => 'required|string',
            'maritalStatus' => 'required|string',
            'homeEmail' => 'required|email',
            'homePhone' => 'required',
            'cellPhone' => 'required|string',
            'businessEmail' => 'required|email',
            'businessPhone' => 'required',
            'branchAddress' => 'required',
            'phone' => 'required',
            'basicSalary' => 'required',
            'tinNumber' => 'required',
            'rate' => 'required',
            'basicSalary' => 'required',
            'emergencyContactPerson' => 'required',
            'emergencyHomePhone' => 'required',
            'emergencyWorkPhone' => 'required',
            'altEmergencyContact' => 'required',
            'altEmergencyHomePhone' => 'required',
            'altEmergencyWorkPhone' => 'required',
        ];
    }
}
