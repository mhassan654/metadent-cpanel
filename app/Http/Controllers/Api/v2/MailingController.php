<?php

namespace App\Http\Controllers\Api\v2;

use App\Models\Patient;
use App\Models\Treatment;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiBaseController;
use Illuminate\Support\Facades\Mail;
use App\Mail\PatientTreatmentsconcent;

class MailingController extends BaseController
{
    public function send_patient_treatments_concent_form()
    {
        try {
            $data['patient' ]= Patient::find(26);
            $data['treatments'] = Treatment::all()->take(5);

            // $patientdata = [
            //     'patientEmail' => $patient->email,
            //     'firstName' => $patient->first_name,
            //     'lastName' => $patient->last_name,
            //     // 'body' => $body,
            //     // 'subject' => $subject,
            // ];

            // dd($data);
            Mail::to('8f81c5f9a6-a1e3ea@inbox.mailtrap.io')->send(new PatientTreatmentsconcent($data));

            // dd($treatments);
        } catch (\Throwable $th) {
           return $th->getMessage();
        }

    }
}
