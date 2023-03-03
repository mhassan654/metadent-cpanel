<?php

namespace App\Services\RecallService;

use App\Mail\RecallMailing;
use App\Models\smsPatient;
use Metadent\AuthModule\Models\Employee;
use buibr\Budget\BudgetSMS;
use Mail;

class AllRecallService
{

    public function globalRecall($data, $body, $person_id, $sms_link, $next_visit)
    {

        $email_link = request()->getHttpHost().'/api/patients/appointments/recall_appointment?id=$data->id';
        if (request()->secure()) {
            $email_link = secure_url(route("recall_appointment", ["id" => $data->id], false));
        }

        $doctor = Employee::find($person_id);
        $this->recall_emailing(
            $data->email,
            $body,
            $doctor->first_name,
            $doctor->last_name,
            $next_visit,
            $sms_link,
            $email_link
        );

        if ($data->receive_sms == 1) {

            $this->accepting_sms(
                $data->id,
                $data->patient_phone,
                $person_id,
                $doctor->first_name,
                $doctor->last_name,
                $next_visit,
                $sms_link
            );
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
        \Mail::mailer('smtp')->to($to)->send(new RecallMailing($details));
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
}
