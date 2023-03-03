<?php
namespace App\ZorgMail;

use App\Mail\healthMail;
use Illuminate\Support\Facades\Mail;

class mailHealth {

    public function sendTohealth($data)
    {
        $toHealt = $data['email'];
        // return $toHealt;
        Mail::mailer('zorg_smtp')->to($toHealt)->send(new healthMail($data));
    }
}
