<?php

namespace App\Services\GeneralComService;

use Mail;
use App\Mail\forwardMail;

class GeneralComService
{

    private $generalserver;
    private $generaluser;
    private $generalpass;
    public function __construct()
    {
        $general_serrver = get_facility_setting('general_imap_server');
        $this->generalserver = '{' . $general_serrver . '}';
        $this->generaluser = get_facility_setting('general_imap_user_name');
        $this->generalpass = get_facility_setting('general_imap_password');
    }

    public function getFolders()
    {
        $mbox = imap_open(
            $this->generalserver,
            $this->generaluser,
            $this->generalpass
        );

        $folders = imap_listmailbox($mbox, $this->generalserver, "*");
        $servertr = $this->generalserver;
        $folder = [];
        foreach ($folders as $mailbox) {
            $folder[] = $mailbox = str_replace($servertr, '', $mailbox);
        }
        return $folder;
    }

    public function fetchMessages($type)
    {
        $mbox = imap_open(
            $this->generalserver . $type,
            $this->generaluser,
            $this->generalpass
        );

        $MC = imap_check($mbox);
        // Fetch an overview for all messages in INBOX
        $result = imap_fetch_overview($mbox, "1:{$MC->Nmsgs}", 0);

        $inbox = [];
        foreach ($result as $overview) {
            $inbox[] = $overview;
        }
        return $inbox;
    }

    // flag fetch flagged,answered,deleted,seen,draft mthd "imap_fetch_overview()"
    public function message($message_id, $folder)
    {
        // return $message_id;
        $mbox = imap_open(
            $this->generalserver . $folder,
            $this->generaluser,
            $this->generalpass
        );
        $uid = $message_id;
        //  $num = imap_num_msg($id);
        $email_number = imap_msgno($mbox, $uid);

        $hText = imap_fetchbody($mbox, $uid, '0', FT_UID);
        $headers = imap_rfc822_parse_headers($hText);
        //  return $headers;
        $message = imap_fetchbody($mbox, $email_number, 1.0);
        $cleaner_input = strip_tags($message);
        $messageBody = str_replace(array("\r\n", "\n"), '', $cleaner_input);
        return ['message' => $messageBody, 'header' => $headers];
    }

    public function forward($to, $subject, $message, $more, $date, $header)
    {
        $data = [
            'email' => $to,
            'subject' => $subject,
            'message' => $message,
            'more_details' => $more,
            'date' => $date,
        ];
        Mail::to($to)->send(new forwardMail($data));

        return "message forward";
        // $mbox = imap_open('{' . env('GENERAL_IMAP_SERVER') . ':993/imap/ssl}', 
        // env('GENERAL_IMAP_USERNAME'), 
        // env('GENERAL_IMAP_PASSWORD'));

        // $body=imap_body($mbox, $message_id, FT_UID);
        //    return $header = imap_fetchheader($mbox, $message_id, FT_UID);
        // return $headers =  imap_headerinfo($mbox, $message_id);
        // $sendmail = imap_mail($to, $subject, $body, $headers);
        // return $sendmail;
    }
}
