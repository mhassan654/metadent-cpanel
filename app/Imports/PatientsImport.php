<?php

namespace App\Imports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithUpserts;

class PatientsImport implements ToModel, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Patient([
            'main_doctor_id' => $row['client_name'] ?? null,
            'secondary_doctor_id' => $row['client_name'] ?? null,
            'unique_identifier' => $row['client_name'] ?? null,
            'first_name' => $row['client_name'] ?? null,
            'last_name' => $row['client_name'] ?? null,
            'middle_name' => $row['client_name'] ?? null,
            'gender' => $row['client_name'] ?? null,
            'marital_status' => $row['client_name'] ?? null,
            'birth_date' => $row['client_name'] ?? null,
            'email' => $row['client_name'] ?? null,
            'reviews' => $row['client_name'] ?? null,
            'home_phone' => $row['client_name'] ?? null,
            'nationality' => $row['client_name'] ?? null,
            'country' => $row['client_name'] ?? null,
            'state' => $row['client_name'] ?? null,
            'city' => $row['client_name'] ?? null,
            'street' => $row['client_name'] ?? null,
            'home_address' => $row['client_name'] ?? null,
            'patient_phone' => $row['client_name'] ?? null,
            'secondary_phone' => $row['client_name'] ?? null,
            'photo' => $row['client_name'] ?? null,
            'postalcode' => $row['client_name'] ?? null,
            'occupation' => $row['client_name'] ?? null,
            'patient_insurer' => $row['client_name'] ?? null,
            'insurance_policy_number' => $row['client_name'] ?? null,
            'guardian_name' => $row['client_name'] ?? null,
            'guardian_phone' => $row['client_name'] ?? null,
            'guardian_email' => $row['client_name'] ?? null,
            'guardian_address' => $row['client_name'] ?? null,
            'fm_relationship' => $row['client_name'] ?? null,
            'fm_name' => $row['client_name'] ?? null,
            'fm_phone_number' => $row['client_name'] ?? null,
            'fm_email' => $row['client_name'] ?? null,
            'fill_if_not_filled' => $row['client_name'] ?? null,
            'referred_by' => $row['client_name'] ?? null,
            'referree_email' => $row['client_name'] ?? null,
            'referree_phone' => $row['client_name'] ?? null,
            'referred_by' => $row['client_name'] ?? null,
            'nok_name' => $row['client_name'] ?? null,
            'nok_email' => $row['client_name'] ?? null,
            'nok_phone_number' => $row['client_name'] ?? null,
            'citizen_service_number' => $row['client_name'] ?? null,
            'preferred_appointment_time' => $row['client_name'] ?? null,
            'any_extra_time' => $row['client_name'] ?? null,
            'password' => $row['client_name'] ?? null,
            'dentist' => $row['client_name'] ?? null,
            'mouth_hygienist' => $row['client_name'] ?? null,
            'preventive_assistant' => $row['client_name'] ?? null,
            'orthodontist' => $row['client_name'] ?? null,
            'recall_dentist_duration' => $row['client_name'] ?? null,
            'recall_mouth_hygienist_duration' => $row['client_name'] ?? null,
            'recall_preventive_assistant_duration' => $row['client_name'] ?? null,
            'recall_orthodontist_duration' => $row['client_name'] ?? null,
            'general_practitioner' => $row['client_name'] ?? null,
            'next_dentist_visit' => $row['client_name'] ?? null,
            'next_mouth_hygienist_visit' => $row['client_name'] ?? null,
            'next_orthodontist_visit' => $row['client_name'] ?? null,
            'next_preventive_assistant_visit' => $row['client_name'] ?? null,
            'BSN' => $row['client_name'] ?? null,
            'WLZ' => $row['client_name'] ?? null,
            'title' => $row['client_name'] ?? null,
            'language' => $row['client_name'] ?? null,
            'secondary_email' => $row['client_name'] ?? null,
            'insurance_from_date' => $row['client_name'] ?? null,
            'receive_sms' => $row['client_name'] ?? null,
            'receive_system_emails' => $row['client_name'] ?? null,
            'receive_newsletters' => $row['client_name'] ?? null,
            'do_not_receive_emails' => $row['client_name'] ?? null,
            'do_not_receive_email_declarations' => $row['client_name'] ?? null,
            'do_not_send_declaration_to_insurance_company' => $row['client_name'] ?? null,
            'is_disabled' => $row['client_name'] ?? null,
            'defaulter' => $row['client_name'] ?? null,
            'no_appointment_creation' => $row['client_name'] ?? null,
            'no_payment_reminder' => $row['client_name'] ?? null,
            'no_insurance_claims' => $row['client_name'] ?? null,
            'customer_in_arrears' => $row['client_name'] ?? null,
        ]);
    }

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'email';
    }
}
