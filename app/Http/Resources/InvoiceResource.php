<?php

namespace App\Http\Resources;

use App\Models\Employee;
use App\Models\Patient;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // if (!is_null($this->doctors)) {
        //     $doctor = Employee::find($this->doctor_id)->exists();
        //     if ($doctor) {
               return [

                    'id' => $this->id,
                    'patient_id' => $this->patient_id,
                    'invoice_id' => $this->invoice_id,
                    'service_type' => $this->service_type,
                    'prices' => $this->prices,
                    'status' => $this->status,
                    'treatments' => $this->treatments,
                    'patient' => !is_null($this->patient_id) ? Patient::where('id', $this->patient_id)
                        ->first(['id', 'first_name', 'last_name', 'photo']) : null,
                    "doctors" => !is_null($this->doctors) ? Employee::with(['department:id,department', 'employeeType:id,type'])
                        ->whereIn('id', $this->doctors)
                        ->get(['id', 'first_name', 'last_name'])
                        ->makeHidden(['roles', 'permissions','photo','department','employee_type']) : null,
                ];

        //         $result = array_filter(
        //             $data,
        //             function ($var) {
        //                 return $var !== null;});

        //         $array = $result;
        //     }
        // }
        // return $array;

    }
}
