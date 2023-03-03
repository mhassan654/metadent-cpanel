<?php

namespace App\Services\RecallService;

use App\Mail\RecallMailing;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\smsPatient;
use Metadent\AuthModule\Models\Employee;
use buibr\Budget\BudgetSMS;
use Carbon\Carbon;
use Mail;

/* Dentist  Recall  */

class RecallService
{

    // recall dentist
    public function recallPatient()
    {
        $recall_patient = Patient::where('confirm_dentist_visit', false)
            ->where('next_dentist_visit', Carbon::now()->addDays(14)->format('d-m-Y'))->get();

        $body = "Patient Recall from dentist";

        $sms_link = "https://patients.metadent.nl/dashboard/viewappointments";

        foreach ($recall_patient as $data) {


            $email_link = "http://127.0.0.1:8000/api/patients/appointments/recall_appointment?id=$data->id";
            if (request()->secure()) {
                $email_link = secure_url(route("recall_appointment", ["id" => $data->id], false));
            }

            $doctor = Employee::find($data->dentist);

            $this->recall_emailing(
                $data->email,
                $body,
                $doctor->first_name,
                $doctor->last_name,
                $data->next_dentist_visit,
                $sms_link,
                $email_link
            );

            if ($data->receive_sms == 1) {

                $this->accepting_sms(
                    $data->id,
                    $data->patient_phone,
                    $data->dentist,
                    $doctor->first_name,
                    $doctor->last_name,
                    $data->next_dentist_visit,
                    $sms_link
                );
            }
        }
    }

    public function accepting_sms($id, $patient_phone, $first_name, $last_name, $date, $link)
    {
        $message = new smsPatient();
        $message->patient_id = $id;
        $message->phonenumber = $patient_phone;
        $message->message = "Patient Recall from Dr $first_name $last_name make your appointment on $date and onwords using this link <a href='$link' >$link</a>";
        $message->status = "pending";
        $message->save();

        //message api
        $budget = new BudgetSMS([
            'username' => 'buytech',
            'userid' => '20200',
            'handle' => '3b10ba8de6dc3f5303787dd8e0961c11',
            'from' => 'METADENT TEST SMS',
        ]);
        $phone = $message->phonenumber;
        $msge = $message->message;

        $budget->setRecipient($phone);

        //  add message
        $budget->setMessage($msge);

        //  Send the message
        $send = $budget->send();
        $res = $send->response;
        if ($res) {
            $message = new smsPatient();
            $message->status = "sent";
            $message->update();
        }
    }

    public function recall_emailing($patient_email, $body, $first_name, $last_name, $date, $link, $confirm_link)
    {

        $details = [
            'email' => $patient_email,
            'person' => $first_name . ' ' . $last_name,
            'date' => $date,
            'body' => $body,
            'link' => $link,
            'confirm' => $confirm_link,
        ];

        $to = $details['email'];
        \Mail::to($to)->send(new RecallMailing($details));
    }

    public function create_recall_appointment($data)
    {

        $patient = Patient::findorfail($data);
        $employee_depart = Employee::find($patient->dentist);

        $appoint_recall = new Appointment();
        $appoint_recall->facility_id = $patient->facility_id;
        $appoint_recall->patient_id = $patient->id;
        $appoint_recall->status_id = APPOINTMENT_CONFIRMED;
        $appoint_recall->source_id = 2;
        $appoint_recall->period_id = 1;
        $appoint_recall->interval = 10;
        $appoint_recall->treatment_type_id = null;
        $appoint_recall->frequency_id = 1;
        $appoint_recall->department_id = $employee_depart->department_id;
        $appoint_recall->doctors = $patient->dentist;
        $appoint_recall->appointment_type_id = 1;
        $appoint_recall->date  =  $patient->next_dentist_visit;
        $appoint_recall->slots = [
            "start-time" => "08:00",
            "end-time" => "80:20"
        ];
        $appoint_recall->save();

        // update status
        $patient_confirm = Patient::where('id', $patient->id)->first();
        $patient_confirm->confirm_dentist_visit = true;
        $patient_confirm->update();
    }
}
