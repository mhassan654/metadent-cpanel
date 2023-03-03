<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TreatmentPlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $planned_data = array();
        $appointment_array = explode(',', $this->appointments);
        $phase_number_array = explode(',', $this->phase_number);
        $tooth_element_array = explode(',', $this->tooth);
        $treatment_code_array = explode(',', $this->treatment_codes);
        $treatment_amount_array = explode(',', $this->treatment_amounts);
        $treatment_description_array = explode(',', $this->treatment_descriptions);

        if(is_null($this->appointments)):
            foreach($tooth_element_array as $tooth_element):
                array_push($appointment_array, '0');
            endforeach;
        endif;

        foreach ($phase_number_array as $key => $value) {
            array_push($planned_data, (object)[
                'phase_number'=> ($phase_number_array) ? $phase_number_array[$key] : 'undefined',
                'treatment_code'=> ($tooth_element_array) ? $treatment_code_array[$key] : 'undefined',
                'tooth_element'=> ($tooth_element_array) ? $tooth_element_array[$key] : 'undefined',
                'treatment_description'=> ($treatment_description_array) ? $treatment_description_array[$key] : 'undefined',
                'treatment_amount'=> ($treatment_amount_array) ? $treatment_amount_array[$key] : 'undefined',
                'appointment'=> ($appointment_array) ? $appointment_array[$key] : 'undefined',
            ]);            
        }

        return [
            'id' => $this->id,
            'patient_id' => $this->patient_id,
            'main_description' => $this->main_description,
            'plan_data' => $planned_data,
            'total_treatment_amount' => array_sum(explode(',', $this->treatment_amounts)),
            'save_type' => $this->save_type,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
