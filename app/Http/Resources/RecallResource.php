<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecallResource extends JsonResource
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
            // 'first_name'=>$this->first_name,
            // 'last_name'=>$this->last_name,
            // 'email' =>$this->email,
            // 'facility_id'=>$this->facility_id,
            // 'patient_email'=>$this->patient_email,
            // 'patient_phone'=>$this->patient_phone,
            // 'main_doctor_id'=>$this->main_doctor_id,
            // 'secondary_doctor_id'=>$this->secondary_doctor_id,
            // 'is_disabled'=>$this->is_disabled,
            // 'no_appointment_creation'=>$this->no_appointment_creation,
            // 'last_recall_date'=>$this->last_recall_date,
            // 'gp_code'=>$this->gp_code,
            // 'document_directory'=>$this->document_directory,
            // 'dentist'=>$this->dentist,
            // 'mouth_hygienist'=>$this->mouth_hygienist,
            // 'preventive_assistant'=>$this->preventive_assistant,
            // 'orthodontist'=>$this->orthodontist,
            'recall_dentist_duration'=>$this->recall_dentist_duration,
            // 'recall_mouth_hygienist_duration'=>$this->recall_mouth_hygienist_duration,
            // 'recall_preventive_assistant_duration'=>$this->recall_preventive_assistant_duration,
            // 'recall_orthodontist_duration'=>$this->recall_orthodontist_duration,
            // 'general_practitioner'=>$this->general_practitioner,
            // 'next_dentist_visit'=>$this->next_dentist_visit,
            // 'next_mouth_hygienist_visit'=>$this->next_mouth_hygienist_visit,
            // 'next_orthodontist_visit'=>$this->next_orthodontist_visit,
            // 'next_preventive_assistant_visit'=>$this->next_preventive_assistant_visit,
            // 'receive_sms'=>$this->receive_sms,
            // 'receive_system_emails'=>$this->receive_system_emails,
            'confirm_dentist_visit'=>$this->confirm_dentist_visit,
            // 'confirm_mouth_hygienist_visit'=>$this->confirm_mouth_hygienist_visit,
            // 'confirm_preventive_assistant_visit'=>$this->confirm_preventive_assistant_visit,
            // 'confirm_orthodontist_visit'=>$this->confirm_orthodontist_visit,
            // 'last_dentist_recall'=>$this->last_dentist_recall,
            // 'last_mouth_hygienist_recall'=>$this->last_mouth_hygienist_recall,
            // 'last_preventive_assistant_recall'=>$this->last_preventive_assistant_recall,
            // 'last_orthodontist_recall'=>$this->last_orthodontist_recall,
        ];
    }
}
