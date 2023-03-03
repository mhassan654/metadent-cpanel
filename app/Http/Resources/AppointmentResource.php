<?php

namespace App\Http\Resources;

use App\Models\Employee;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
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
        // dd($this->employees);
        return [
            'id'=>$this->id,
            'date'=>$this->date,
            'slots'=>$this->slots,
            // 'doctors'=>EmployeeResource::collection($this->employees),
            'comments'=>$this->comments,
            'appointment_type'=> new AppointmentTypeResource($this->appointmentType),
            'patient'=>new PatientResource($this->patient),
            'treatment_type'=> new TreatmentTypeResource($this->treatmentType),
            'appointment_source'=>new AppointmentSourceResource($this->source),
            'frequency'=>new FrequencyResource($this->frequency),
            'department' =>new DepartmentResource($this->department),
            'status'=>new AppointmentStatusResource($this->status),
            'material_name' => $this->material_name,
            'material_date' => $this->material_date,
            'frequency_value' => $this->frequency_value,
            'recurrencies' => $this->recurrencies,
            "appointment_code" => $this->appointment_code,
            "checkin_time" => $this->checkin_time,
            "servingtime" => $this->servingtime,
            "treatment_plan" => $this->treatmentPlan,
            "phase" => $this->phase_id,
            'is_recallable' => $this->is_recallable,
            "doctors" => Employee::with(['department:id,department','employeeType:id,type'])
                             ->whereIn('id',$this->doctors)
                             ->get(['id','first_name','last_name','weeks','week_days','department_id','employee_type_id','frequency_id','contract_start_date','contract_end_date','availability','interval'])
                             ->makeHidden(['roles','permissions'])
        ];
    }
}
