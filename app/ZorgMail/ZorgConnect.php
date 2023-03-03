<?php

namespace App\ZorgMail;

use App\Mail\ZorgMail;
use Illuminate\Support\Facades\Mail;

class ZorgConnect
{

    // // email login credentials
    private $server;
    private $user;
    private $pass;
    public function __construct()
    {

        $zorg_server = get_facility_setting("zorg_mail_imap_server");

        $this->server = '{' . $zorg_server . '}';
        $this->user = get_facility_setting("zorg_mail_imap_username");
        $this->pass = get_facility_setting("zorg_mail_imap_password");
    }

    public function getConnect()
    {

        $mbox = imap_open($this->server, $this->user, $this->pass);
    }

    //list of foders
    public function getFolders()
    {
        $mbox = imap_open($this->server, $this->user, $this->pass);
        $folders = imap_listmailbox($mbox, $this->server, "*");

        // $servertr = "{mail.zorgmail.nl:993/imap/ssl}
        $folder = [];
        foreach ($folders as $mailbox) {
            $folder[] = $mailbox = str_replace($this->server, '', $mailbox);
        }
        return $folder;
    }


    public function fetchMessages($type)
    {
        // return $this->server;
        $mbox = imap_open($this->server . $type, $this->user, $this->pass);
        $MC = imap_check($mbox);
        // Fetch an overview for all messages in INBOX
        $result = imap_fetch_overview($mbox, "1:{$MC->Nmsgs}", 0);

        $inbox = [];
        foreach ($result as $overview) {
            $inbox[] = $overview;
            // $inbox['msgno'] = $overview->msgno;
        }
        return $inbox;
    }
    public function create_folder($newname)
    {
        $mbox = imap_open($this->server, $this->user, $this->pass);

        $zorg_mail_server = $this->server;

        $createFolder = imap_createmailbox($mbox, imap_utf7_encode("$zorg_mail_server.$newname"));

        return $createFolder;
    }
    public function move_mail($uid, $folder)
    {
        $mbox = imap_open($this->server, $this->user, $this->pass);
        $res = imap_mail_move($mbox, $uid, $folder, CP_UID);
        return $res;
    }

    public function fetchMs()
    {

        // $mbox = imap_open($this->server . $type, $this->user, $this->pass);
        $zorg_server_mail = $this->server;
        $mbox = imap_open("$zorg_server_mail.Draft", $this->user, $this->pass);
        // $headers = imap_headers($mbox);
        $MC = imap_check($mbox);
        // Fetch an overview for all messages in INBOX
        $result = imap_fetch_overview($mbox, "1:{$MC->Nmsgs}", 0);

        $inbox = [];
        foreach ($result as $overview) {
            $inbox[] = $overview;
            // $inbox['msgno'] = $overview->msgno;
        }
        return $inbox;
    }
    // flag fetch flagged,answered,deleted,seen,draft mthd "imap_fetch_overview()"
    public function message($message_id, $folder)
    {
        // return $message_id;
        $mbox = imap_open($this->server . $folder, $this->user, $this->pass);
        $uid = $message_id;
        //  $num = imap_num_msg($id);
        $email_number = imap_msgno($mbox, $uid);
        //  $message = imap_fetch_overview($mbox,$email_number,0);
        // $message =imap_fetchbody($mbox,$email_number,1.0);

        $hText = imap_fetchbody($mbox, $uid, '0', FT_UID);
        $headers = imap_rfc822_parse_headers($hText);
        //  return $headers;
        $message = imap_fetchbody($mbox, $email_number, 1.0);
        $cleaner_input = strip_tags($message);
        $messageBody = str_replace(array("\r\n", "\n"), '', $cleaner_input);
        return ['message' => $messageBody, 'header' => $headers];
    }

    // query specific  $mails = imap_search($this->conn, 'FROM "hotelpartners@goibibo.com" SUBJECT "Confirm Hotel Booking"');

    public function view_mg()
    {
        // $email_overview = imap_fetch_overview($imapResource, $Email, 0);
        // $email_message = imap_fetchbody($imapResource, $Email, 2);
        # code...
    }
    public function replyTo($replybody, $from)
    {
        $email = $from;
        $new_str = str_replace(array('<', '>'), ' ', $email);
        $ex = explode(" ", $new_str);
        $to_person = $ex[3];
        $detail = [
            'from' => $email,
            'subj' => $replybody['subject'],
            'mgsBdy' => $replybody['messageBdy'],
            'newMessage' => $replybody['newMessage'],
        ];
        // return $detail;
        Mail::to($to_person)->send(new ZorgMail($detail));
    }

    // public function single_patient()
    // {
    //     // return 2000;
    //     $mbox = imap_open("{mail.zorgmail.nl:993/imap/ssl}INBOX", $this->user, $this->pass);
    //     $qry = "assekimuli@projectcode.ug";
    //     $mgsNo   = imap_search($mbox, 'TEXT ' . $qry);
    //     if ($mgsNo == null) {
    //         return "no email for this patient";
    //     }
    //     $last_item = $mgsNo[count($mgsNo) - 1];
    //     $first_item = $mgsNo[0];

    //     return  $result = imap_fetch_overview($mbox, "$first_item:$last_item", 0);
    // }
    // public function single_patient_sent()
    // {
    //     // return 2000;
    //     $mbox = imap_open("{mail.zorgmail.nl:993/imap/ssl}SENT", $this->user, $this->pass);
    //     $qry = "assekimuli@projectcode.ug";
    //     $mgsNo   = imap_search($mbox, 'TEXT ' . $qry);
    //     if ($mgsNo == null) {
    //         return "no email for this patient";
    //     }
    //     $last_item = $mgsNo[count($mgsNo) - 1];
    //     $first_item = $mgsNo[0];

    //     return  $result = imap_fetch_overview($mbox, "$first_item:$last_item", 0);
    // }
    public function mgsAttachment()
    {
        $zorg_server_inbox = $this->server;
        $mbox = imap_open("$zorg_server_inbox.INBOX", $this->user, $this->pass);
        $uid = 589;
        //  $num = imap_num_msg($id);
        $mgsNo = imap_msgno($mbox, $uid);
        $structure = imap_fetchstructure($mbox, $mgsNo);
        return $structure;
        $attachment = array();
        foreach ($structure->parts as $key => $value) {
            if (isset($value->disposition)) {
                if ($value->disposition == "attachment"  && $value->subtype != 'PGP-SIGNATURE') {
                    foreach ($value->dparameters as $files) {
                        if ($files->attribute == 'FILENAME') {
                            $attachments = array('FILENAME' => $files->value);
                            $attachments['type'] = strtoupper($value->subtype);
                            // $attachments['content'] = imap_fetchbody($mbox, $mgsNo, $key + 1);
                        }
                        return $attachment[] = $attachments;
                    }
                }
            }
            # code...
        }
    }
}
