<?php

namespace App\Http\Resources;

use Metadent\AuthModule\Models\Employee;
use Illuminate\Http\Resources\Json\JsonResource;

class GeneralRemarkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "patient_id" => $this->patient_id,
            "treatment_ids" => $this->treatment_ids,
            "treatment_codes" => $this->treatment_codes,
            "treatment_amounts" => $this->treatment_amounts,
            "tooth_element" => $this->tooth_element,
            "general_remark_category" => $this->general_remark_category,
            "general_remark_description" => $this->general_remark_description,
            "created_by" => (!is_null($this->created_by)) ?
                Employee::find($this->created_by)->full_name
                 : "",
            "updated_by" => (!is_null($this->updated_by)) ?
                Employee::find($this->updated_by)->full_name
                : "",
            "treatment_status" => $this->treatment_status,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
