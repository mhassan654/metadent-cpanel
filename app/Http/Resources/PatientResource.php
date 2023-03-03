<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'=>$this->id,
            'gender'=>$this->gender,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'birth_date'=>$this->birth_date,
            'country'=>$this->country,
            'city'=>$this->city,
            'dentist' => !is_null($this->dentist) ? \Metadent\AuthModule\Models\Employee::with(['department','employeeType'])->where('id',$this->dentist)
                          ->first(['id','first_name','last_name','weeks','week_days','department_id','employee_type_id','frequency_id','contract_start_date','contract_end_date','availability','interval'])
                          ->makeHidden(['roles','permissions']) : null
        ];
    }
}
