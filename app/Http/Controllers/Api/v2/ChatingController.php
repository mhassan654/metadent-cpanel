<?php

namespace App\Http\Controllers\Api\v2;

// use DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\chatEmployeeResource;
use App\Mail\Emailling;
use App\Mail\GeneralMail;
use App\Mail\ReplyZorgmail;
use App\Models\Attachmentsdocs;
use App\Models\Chatting;
use App\Models\Draft;
use App\Models\Employee;
use App\Models\onboardingDoc;
use App\Models\Patient;
use App\Models\replying;
use App\Models\smsPatient;
use App\Models\User;
use App\Notifications\EmailNotification;
use App\Services\GeneralComService\GeneralComService;
use App\Services\onBoardDocuments\OnBoardDocuments;
use App\Services\RecallService\RecallService;
use App\Services\Sms\SmsService;
use App\ZorgMail\mailHealth;
use App\ZorgMail\ZorgConnect;
use App\zorgmailService\AddressBook;
use App\zorgmailService\zorgCurl;
use Barryvdh\DomPDF\Facade\Pdf;
use buibr\Budget\BudgetSMS;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Throwable;

// use App\zorgmailService\smsService;

class ChatingController extends Controller
{
    protected $user;

    protected $isDoctor = false;
    private $zorgservice;
    public function __construct(zorgCurl $zorgservice)
    {
        $this->zorgservice = $zorgservice;
        // $this->Zservice = $Zservice;
        if (Auth::guard('api')->check()) {
            $this->user = Auth::guard('api')->user();
            $this->middleware("auth:api");
            $this->isDoctor = true;
        } elseif (Auth::guard('patient')->check()) {
            // $this->zorgservice = $zorgservice;
            $this->user = Auth::guard('patient')->user();
            $this->middleware("auth:patient");
            $this->isDoctor = false;
        } else {
            return response()->json([
                'message' => 'Not Authorized',
            ], 401);
        }
    }

    // OPEN COMMUNICATION EMAIL START

    //zorgmail address book
    public function zorg()
    {
        try {
            $ad = 'sms+256759672755';
            // return 200;
            $zordetails = [
                'first_name' => "ssekimuli andrew",
                'email' => "ssekimuliandrew321@gmail.com",
                'subject' => "test zorgmail" . $ad,
                'serve_email' => "metadentb.v@zorgmail.nl",
                'message' => "metadent we can now communicate with our patient outside zorgmail community",
                'under_category' => "private",
                'MentaDen' => 'Thank you from mentadent.com',
            ];
            // \Mail::to($zordetails['email'])->send(new healthMail($zordetails));
            // $user = Employee::first();
            // $user= $zordetails['serve_email'];
            // Notification::send($user, new EmailNotification($zordetails));

            $this->zorgservice->zorglist($zordetails);
        } catch (\Throwable$ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }

    //sending to health provide
    public function send_zorg()
    {
        try {
            $compz = new mailHealth();
            $usd = Auth::guard('api')->check();
            $usd = Auth::guard('api')->user();
            $sender = $usd;
            if (!is_null(request()->file('attachments'))) {
                foreach (request()->file('attachments') as $value) {
                    $attach[] = $value->getRealPath();
                }
            }
            $fileShare = $attach;
            $mgs = [
                'first_name' => $sender->first_name . ' ' . $sender->last_name,
                'email' => request()->email,
                'subject' => request()->subject,
                'serve_email' => $sender->email,
                'message' => request()->message,
                'attachment' => $fileShare ? $fileShare : null,
                'MentaDent' => 'Thank you from mentadent.com',
            ];
            $body = $compz->sendTohealth($mgs);

            return $this->customSuccessResponseWithMessage('email sent to health');
        } catch (\Throwable$ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }

    public function drs_list()
    {
        try {
            if (Auth::guard('patient')->check()) {

                $rw = "SELECT id, first_name, last_name, gender, phone, email FROM employees";
                $dr_listing = DB::select(DB::raw($rw));
                return $this->customSuccessResponseWithPayload($dr_listing);
            }
        } catch (Exception $ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }
    public function address_book3()
    {
        try {

            $keyword = request()->search; //500154374;
            $search_list = new AddressBook($keyword);
            return $this->customSuccessResponseWithPayload($search_list->healthProviderC());
        } catch (\Throwable$ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }
    public function list_folders(ZorgConnect $service)
    {
        try {

            $list = $service->getFolders();
            return $this->customSuccesResponseWithPayload($list);
        } catch (\Throwable$ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }

    // all mails inbox matadent zorgmail
    public function zorgmail_inbox(ZorgConnect $service)
    {
        try {
            $all_mgs = $service->fetchMessages(INBOX);
            return $this->customSuccessResponseWithPayload($all_mgs);
        } catch (Exception $ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }
    public function zorgmail_sent(ZorgConnect $service)
    {

        try {
            $all_mgs = $service->fetchMessages(SENT);
            return $this->customSuccessResponseWithPayload($all_mgs);
        } catch (Exception $ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }
    public function zorgmail_draft(ZorgConnect $service)
    {

        try {
            $all_mgs = $service->fetchMessages(DRAFT);
            return $this->customSuccessResponseWithPayload($all_mgs);
        } catch (Exception $ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }
    public function zorgmail_junk(ZorgConnect $service)
    {

        try {
            $all_mgs = $service->fetchMessages(JUNK);
            return $this->customSuccessResponseWithPayload($all_mgs);
        } catch (Exception $ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }

    public function zorgmail_trash(ZorgConnect $service)
    {

        try {
            $all_mgs = $service->fetchMessages(TRASH);
            return $this->customSuccessResponseWithPayload($all_mgs);
        } catch (Exception $ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }
    public function add_folder(ZorgConnect $service)
    {
        try {
            $folder_name = request()->newFolder;
            $new_folder = $service->create_folder($folder_name);
            return $this->customSuccessResponseWithPayload($new_folder);
        } catch (\Throwable$ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }
    public function move_to_folder(ZorgConnect $service)
    {
        try {
            $folder = request()->folder_name;
            $uid = request()->uid;
            $dest_folder = $service->move_mail($uid, $folder);
            return $this->customSuccessResponseWithPayload($dest_folder);
        } catch (\Throwable$ex) {

            return $this->customFailResponseMessage($ex->getMessage());
        }
    }

    public function replying()
    {
        try {
            $email = request()->email;
            preg_match('~<(.*?)>~', $email, $output);
            $toPerson[] = $output[1];
            $replyBody = [
                'email' => request()->email,
                'subject' => request()->subject,
                'message' => request()->message,
            ];
            Mail::mailer('smtp')->to($toPerson)->send(new ReplyZorgmail($replyBody));
            return $this->customSuccessResponseWithPayload("email was replied successfully");
        } catch (\Throwable$ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }
    public function openMessage(ZorgConnect $service)
    {
        try {

            $view_message = $service->message(request()->message_id, request()->folder);
            return $this->customSuccessResponseWithPayload($view_message);
        } catch (Exception $ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    } //ZORGMAIL MAILING

    public function all_mail()
    {

        try {
            $patients_emails = Patient::all(['first_name', 'last_name', 'email', 'photo'])->toArray();
            $users_emails = Employee::all(['first_name', 'last_name', 'email'])->toArray();
            $all_emails = array_merge($patients_emails, $users_emails);

            return $this->customSuccessResponseWithPayload($all_emails);
        } catch (Exception $ex) {

            return $this->customFailResponseWithPayload($ex->getMessage());
        }
    }

    public function drs_emailist()
    {
        try {
            if (Auth::guard('patient')->check()) {
                $main_doctor = Auth::guard('patient')->user()->main_doctor_id;
                $second_doctor = Auth::guard('patient')->user()->secondary_doctor_id;
            }
            if ($main_doctor !== null && $second_doctor !== null) {

                $rw = "SELECT id, first_name, last_name, email FROM employees WHERE id IN ($main_doctor, $second_doctor)";
            } else {
                if ($main_doctor == null) {
                    $any_dr = Employee::first()->id;
                    $rw = "SELECT id, first_name, last_name, email FROM employees WHERE id = $any_dr";
                } else {
                    $rw = "SELECT id, first_name, last_name, email FROM employees WHERE id = $main_doctor";
                }
            }

            $my_doctor = DB::select(DB::raw($rw));
            return $this->customSuccessResponseWithPayload($my_doctor);
        } catch (\Throwable$ex) {

            return $this->customFailResponseMessage($ex->getMessage());
        }
    }

    public function patient_mail()
    {
        request()->validate(["patientId" => "required"]);
        $patientId = request()->patientId;
        $user = Patient::find($patientId);
        $user->notifications;
        return $this->customSuccessResponseWithPayload($user);
    }
    public function open_inbox()
    {
        request()->validate(["patientId" => "required"]);

        $patientId = request()->patientId;
        $patient_mailing = DB::table('notifications')
            ->where('type', 'App\Notifications\EmailNotification')
            ->where('data->from_details->from_id', $patientId)
            ->orderBy('created_at', 'desc')
            ->get();
        return $this->customSuccessResponseWithPayload($patient_mailing);
    }

    public function fromemail()
    {
        try {
            $user = Auth::guard('api')->check() ? auth('api')->user() : auth('patient')->user();

            $filter = Chatting::listUser()->where('to_user_id', $user->id)->get();

            $listid = [];
            foreach ($filter as $id) {
                $idc = $id;
                $listid[] = $idc;
            }
            $getlist = array_unique($listid);
            return $this->customSuccessResponseWithPayload($getlist);
        } catch (\Throwable$ex) {
            return $ex->getMessage();
        }
    }
    public function filterEmail()
    {
        try {
            $user = Auth::guard('api')->check() ? auth('api')->user() : auth('patient')->user();

            $filter = DB::table('notifications')
                ->where('type', 'App\Notifications\EmailNotification')
                ->where('notifiable_id', $user->id)
                ->where('data->from_details->from_id', request()->fromId)->get();

            return $this->customSuccessResponseWithPayload($filter);
        } catch (\Throwable$ex) {
            return $ex->getMessage();
        }
    }
    public function body()
    {

        $messagebody = request()->mail_body;
        $body = Chatting::where('id', $messagebody)->first(['id', 'subject', 'to_user', 'message', 'from_user_id', 'from_fname']);
        return $this->customSuccessResponseWithPayload($body);
    }

    public function mark_read()
    {

        request()->validate(["notify_id" => "required"]);
        request()->validate(["notifiable_id" => "required"]);

        $nofy_id = request()->notifiable_id;
        $id = request()->notify_id;

        $user = Employee::findOrFail($nofy_id);
        $not = $user->unreadNotifications
            ->where('type', 'App\Notifications\EmailNotification')
            ->where('id', $id)->first();
        $not->markAsRead();
        return $this->customSuccessResponseWithPayload('mark read');
    }
    public function mark_all_read()
    {
        try {
            $user = Auth::guard('api')->check() ? auth('api')->user() : Auth::guard('patient')->user();
            $user_id = $user->id;
            if (Auth::guard('api')->check()) {
                $all_notifications = User::find($user_id);
            }
            if (Auth::guard('patient')->check()) {
                $all_notifications = Patient::find($user_id);
            }
            foreach ($all_notifications->unreadNotifications as $notification) {
                $notification->markAsRead();
            }
            return $this->customSuccesResponseWithPayload('marked all read');
        } catch (\Throwable$ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }
    public function markAsRead()
    {
        try {
            $notifyid = request()->id;
            $guard = Auth::guard('api')->check() ? auth('api')->user() : auth('patient')->user();
            $notification = $guard->notifications()
                ->where('type', 'App\Notifications\EmailNotification')
                ->where('id', $notifyid)->first();
            $notification->update(['read_at' => now()]);
            return $this->customSuccessResponseWithMessage('marked as read');
        } catch (\Throwable$ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }
    // general patient portal customer care
    public function general_reply()
    {

        request()->validate(["message_id" => "required"]);
        request()->validate(["subject" => "required"]);
        request()->validate(["reply_user" => "required"]);
        request()->validate(["replyMessage" => "required"]);
        //doctor's details
        if (Auth::guard('api')->check()) {

            $fromuser_id = Auth::guard('api')->user()->id;
            $from_fname = Auth::guard('api')->user()->first_name;
            $from_lname = Auth::guard('api')->user()->last_name;
            $from_email = Auth::guard('api')->user()->email;
        }

        $to = request()->reply_user;
        $user = Patient::find($to);
        // $to_email =json_decode($to);
        $reply = new replying();
        $reply->message_id = request()->message_id;
        $reply->subject = request()->subject;
        $reply->from_user = $from_fname;
        $reply->to_user = request()->reply_user;
        $reply->replyMessage = request()->replyMessage;
        $reply->save();
        //message id
        if ($reply->save()) {
            $reply_id = $reply->id;
        }
        // return $this->customSuccessResponseWithPayload($reply_id);

        $from_details = [
            'first_name' => $from_fname,
            'last_name' => $from_lname,
            'from_id' => $fromuser_id,
        ];
        //notify message
        $details = [
            'from_details' => $from_details,
            'subject' => $reply->subject,
            'message_id' => $reply->message_id,
            'reply_id' => $reply_id,
            'under_category' => request()->under_category,
            'sent_at' => now(),
            'flag_status' => 'normal',
        ];
        // return $this->customSuccessResponseWithPayload($to);
        Notification::send($user, new EmailNotification($details));
        return $this->customSuccessResponseWithPayload('email replied successfully');
    }
    // END OF OPEN COMMUNICATION

    //START OF ONE TO ONE COMMUNICATION

    //sending mail doctors and patients two way
    public function sendmail()
    {

        try {
            $validated = request()->validate([
                'message' => 'required',
                'toUsers' => 'required',
                'subject' => 'required',
                'under_category' => 'required',
            ]);

            // $snooze_set = request()->snooze_date;
            $snooze_format = request()->snooze_date;
            $zorg_check = request()->chedkedMail;
            $snooze = Carbon::parse($snooze_format)->format('Y-m-d H:i:s');
            //// return response(['attachments' => $attachmentdocs . extension()]);
            //doctor's details
            if (Auth::guard('api')->check()) {
                $fromuser_id = Auth::guard('api')->user()->id;
                $from_fname = Auth::guard('api')->user()->first_name;
                $from_lname = Auth::guard('api')->user()->last_name;
                $from_email = Auth::guard('api')->user()->email;
                $user_model = "App\Models\Employee";
            }
            //patient's details
            if (Auth::guard('patient')->check()) {
                $fromuser_id = Auth::guard('patient')->user()->id;
                $from_fname = Auth::guard('patient')->user()->first_name;
                $from_lname = Auth::guard('patient')->user()->last_name;
                $from_email = Auth::guard('patient')->user()->email;
                $user_model = "App\Models\Patient";
            }

            //details email
            $toemail = request()->input('toUsers');
            $search = Patient::info()->where('email', 'LIKE', '%' . $toemail . '%')->first();

            $onboard_patient_doc = $search;
            // $to_user_id = $search->id;
            // $phone = $search->patient_phone;

            $srch = $search;

            $check = json_decode($search);
            if (empty($check)) {
                $search = $this->search_dr_emails($toemail);
                $srch = $search;
            }

            $to_user_id = $search->id;
            if ($to_user_id == null) {

                $to_user_id = $search->id;
            }

            $phone = $search->patient_phone;
            if ($phone == null) {
                $phone = $search->phone;
            }

            // return $srch;

            $compose = new Chatting();
            $compose->from_user_id = $fromuser_id;
            $compose->from_fname = $from_fname;
            $compose->from_lname = $from_lname;
            $compose->from_email = $from_email;
            $compose->to_user = json_encode($srch);
            $compose->to_user_id = $to_user_id;
            $compose->sender_model = $user_model;
            $compose->subject = request()->subject;
            $compose->message = request()->message;
            $compose->status = request()->status;
            $compose->snooze_date = $snooze;
            // $se =$search->id;
            $compose->save();

            //message id
            if ($compose->save()) {
                $message_id = $compose->id;
            }
            // return $compose;

            //attachments

            if (request()->hasFile('attachments')) {
                foreach (request()->file('attachments') as $file) {
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    upload_file($file_name, $file, 'emailattachments');
                    $attachdocs = new Attachmentsdocs();
                    $attachdocs->chatting_id = $compose->id;
                    $attachdocs->docs = $file_name;
                    $attachdocs->save();
                    $add_by = Auth::guard('api')->check() ? auth('api')->user() : auth('patient')->user();
                    if ($onboard_patient_doc !== null || Auth::guard('patient')->check()) {

                        $patient_id = ($onboard_patient_doc || Auth::guard('patient')->check()) ? $onboard_patient_doc->id : Auth::guard('patient')->user()->id;
                        $onboard = new OnBoardDocuments;
                        $onboard->upload_docs($patient_id, $file_name, $file_name, 1, $add_by, $status = "");
                    }
                }
            }

            $to_user_email = $search;

            if (!is_null(request()->file('attachments'))) {
                foreach (request()->file('attachments') as $value) {
                    $attach[] = $value->getRealPath();
                }
                $fileShare = $attach;
            }
            $fileShare = null;
            $zordetails = [
                'first_name' => $from_fname . ' ' . $from_lname,
                'email' => env('ZORG_MAIL_FROM_ADDRESS'),
                'subject' => $compose->subject . ' sms' . $phone,
                'serve_email' => $toemail,
                'message' => $compose->message,
                'attachment' => $fileShare,
                'under_category' => request()->under_category,
                'MentaDent' => 'Thank you from mentadent.com',
            ];
            // $zordetails;
            //notification condition fire if not snoozed
            if ($snooze_format == null) {

                $from_details = [
                    'first_name' => $from_fname,
                    'last_name' => $from_lname,
                    'from_id' => $fromuser_id,
                ];
                // email using zorgmail
                if ($zorg_check == 'zorgmail') {
                    $this->zorgservice->zorglist($zordetails);
                } else {
                    // Emailling
                    \Mail::to($toemail)->send(new Emailling($zordetails));
                }
                //notify message
                $details = [
                    'from_details' => $from_details,
                    'subject' => $compose->subject,
                    'message_id' => $message_id,
                    'reply_id' => 0,
                    'under_category' => request()->under_category,
                    'sent_at' => now(),
                    'flag_status' => 'normal',
                ];
                // return $details;
                // if ($zorg_check == 'other') {
                //     // Emailling
                // };
                Notification::send($to_user_email, new EmailNotification($details));
            }

            return $this->customSuccessResponseWithPayload("email was sent successfully");
        } catch (Throwable $ex) {
            return $this->customFailResponseWithPayload($ex->getMessage());
        }
    }

    public function snoozing()
    {
        try {
            $this->sendmail();
            return $this->customSuccessResponseWithPayload("email was snoozed successfully");
        } catch (\Throwable$ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }
    public function mySnoozed()
    {
        try {
            $user = Auth::guard('api')->check() ? Auth::guard('api')->user() : Auth::guard('patient')->user();
            $list = Chatting::where('status', 10)
                ->where('from_user_id', $user->id)->get();
            return $this->customSuccessResponseWithPayload($list);
        } catch (\Throwable$ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }
    //inbox emails for the auth user
    public function inbox()
    {
        try {
            $user = Auth::guard('api')->check() ? Auth::guard('api')->user() : Auth::guard('patient')->user();
            $flag_status = 'normal';

            $inbo = DB::table('notifications');

            if (Auth::guard('api')->check()) {

                $inbo->where('notifiable_id', '=', $user->id);
            }
            //patient's details
            if (Auth::guard('patient')->check()) {

                $inbo->where('notifiable_id', '=', $user->id)
                    ->where('notifiable_type', 'App\Modules\Metadent\AuthModule\src\Models\Employee');
            }
            $inbo->where('type', 'App\Notifications\EmailNotification')
                ->where('data->flag_status', $flag_status)
                ->orderByDesc('created_at');
            // return $user_id;
            $inbox = $inbo->paginate(25);

            return $this->customSuccessResponseWithPayload($inbox);
        } catch (Exception $ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }
    public function inbox2()
    {
        try {
            $user = Auth::guard('patient')->user();
            $flag_status = "normal";
            if (Auth::guard('patient')->check()) {
                $inbo = "SELECT * FROM notifications WHERE notifiable_id =$user->id AND JSON_EXTRACT(data,'$.flag_status') LIKE '%$flag_status%' ORDER BY created_at DESC";
            }
            // return $user_id;
            $inbox = DB::select(DB::raw($inbo));

            return $this->customSuccessResponseWithPayload($inbox);
        } catch (\Throwable$ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }
    public function notification()
    {

        //doctor's details
        if (Auth::guard('api')->check()) {
            $notifications = auth('api')->user()->unreadNotifications;
            $datajson = $notifications;
            return $this->customSuccessResponseWithPayload($datajson);
        }

        //patient's details
        if (Auth::guard('patient')->check()) {
            $notifications = auth('patient')->user()->unreadNotifications;
            $datajson = $notifications;
            return $this->customSuccessResponseWithPayload($datajson);
        }
    }

    public function outbox()
    {
        $user = Auth::guard('api')->check() ? Auth::guard('api')->user() : Auth::guard('patient')->user();
        $under_category = 'private_care';
        $outbox_mail = DB::table('notifications');
        //doctor's details
        if (Auth::guard('api')->check()) {
            $outbox_mail->where('type', 'App\Notifications\EmailNotification')
                ->where('data->from_details->from_id', $user->id)
                ->where('data->under_category', $under_category);
            $outbox_mail = $outbox_mail->paginate(20);
        }
        //patients
        if (Auth::guard('patient')->check()) {

            $sent_by_me = Auth::guard('patient')->user()->id;
            $outbox_mail = Chatting::where('from_user_id', $sent_by_me)
                ->where('sender_model', 'App\Models\Patient')
                ->orderBy("created_at", "desc")
                ->paginate(20);
            // return $this->customSuccessResponseWithPayload($outbox_mail);
        }

        return $this->customSuccessResponseWithPayload($outbox_mail);
    }
    public function inbox_patient()
    {
        try {
            $sent_to_me = Auth::guard('patient')->user()->id;
            $outbox_mail = Chatting::where('to_user_id', $sent_to_me)
                ->where('sender_model', '!=', 'App\Models\Patient')
                ->orderBy("created_at", "desc")
                ->get();

            return $this->customSuccessResponseWithPayload($outbox_mail);
        } catch (\Throwable$th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }
    public function outbox_patient()
    {
        // return 3000000;
        try {

            if (Auth::guard('patient')->check()) {

                $sent_by_me = Auth::guard('patient')->user()->id;
                $outbox_mail = Chatting::where('from_user_id', $sent_by_me)
                    ->where('sender_model', 'App\Models\Patient')
                    ->orderBy("created_at", "desc")
                    ->get();
                return $this->customSuccessResponseWithPayload($outbox_mail);
            }
        } catch (\Throwable$th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }
    public function save_draft()
    {
        // return 200;
        try {
            //details email
            $toemail = request()->toUsers;
            $search = Patient::info()->where('email', 'LIKE', '%' . $toemail . '%')->first();

            $check = json_decode($search);
            $dataStatus = $check;
            if (empty($dataStatus)) {
                $search = $this->search_dr_emails($toemail);
            }

            $userId = Auth::guard('api')->check() ? Auth::guard('api')->user() : Auth::guard('patient')->user();

            $draft = new Draft();
            $draft->to_user = request()->toUsers;
            $draft->first_name = $search->first_name;
            $draft->last_name = $search->last_name;
            $draft->subject = request()->subject;
            $draft->message = request()->message;
            $draft->user_id = $userId->id;
            $draft->save();
            // return $draft;
            return $this->customSuccessResponseWithPayload('draft  saved');
        } catch (Exception $ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }

    public function draft()
    {
        try {

            $userId = Auth::guard('api')->check() ? Auth::guard('api')->user() : Auth::guard('patient')->user();

            $list_draft = Draft::where('user_id', $userId->id);
            if (Auth::guard('api')) {
                $data = $list_draft->paginate(25);
                return $this->customSuccessResponseWithPayload($data);
            }
            if (Auth::guard('patient')->check()) {

                $data = $list_draft->orderBy("created_at", "desc")
                    ->get();
                return $this->customSuccessResponseWithPayload($data);
            }
        } catch (Exception $ex) {

            return $this->customFailResponseMessage($ex->getMessage());
        }

        // return $this->customSuccessResponseWithPayload($outbox_mail);
    }

    public function view()
    {
        try {

            request()->validate(["messageId" => "required"]);

            $user = Auth::guard('api')->check() ? auth('api')->user() : auth('patient')->user();

            $notifyid = request()->messageId;

            $notification = $user->notifications()
                ->where('type', 'App\Notifications\EmailNotification')
                ->where('data->message_id', $notifyid)->first();
            if ($notification) {
                $notification->markAsRead();
            }
            Chatting::where('id', $notifyid)
                ->update([
                    'read_at' => date('Y-m-d'),
                ]);

            if ($email = Chatting::with(['emailattachments', 'All_replies'])->find($notifyid)) {
                return $this->customSuccessResponseWithPayload($email);
            }

            throw new Exception('Email not found', 2404);
        } catch (Throwable $th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }

    public function category_view()
    {

        //doctor's details
        if (Auth::guard('api')->check()) {

            request()->validate(["messageId" => "required"]);
            // request()->validate(["notify_Id" => "required"]);

            $id = request()->messageId;
            $email = Chatting::with(['emailattachments', 'All_replies'])->find($id);

            return $this->customSuccessResponseWithPayload($email);
        }
        //patient's details
        if (Auth::guard('patient')->check()) {
            request()->validate(["messageId" => "required"]);
            // request()->validate(["notify_Id" => "required"]);

            $id = request()->messageId;
            $email = Chatting::find(request()->messageId);

            return $this->customSuccessResponseWithPayload($email);
        }
    }

    public function status()
    {

        request()->validate(["messageId" => "required"]);
        request()->validate(["statusId" => "required"]);
        //doctor's details
        if (Auth::guard('api')->check()) {

            $id = request()->messageId;
            $status_id = request()->statusId;
            $email_category = Chatting::where('id', $id)->update(['status' => $status_id]);
            return $this->customSuccessResponseWithPayload($email_category);
        }
        //patient's details
        if (Auth::guard('patient')->check()) {
            $id = request()->messageId;
            $status_id = request()->statusId;
            $email_category = Chatting::where('id', $id)->update(['status' => $status_id]);
            return $this->customSuccessResponseWithPayload($email_category);
        }
    }
    public function privatebox()
    {
        //doctor's details
        if (Auth::guard('api')->check()) {

            $to_user_id = Auth::guard('api')->user()->id;
            $email_category = Chatting::where('to_user->id', $to_user_id)
                ->where('status', 1)
                ->orderBy("created_at", "desc")
                ->get();
            return $this->customSuccessResponseWithPayload($email_category);
            // return "private box";
        }
        //patient's details
        if (Auth::guard('patient')->check()) {
            $to_user_id = Auth::guard('patient')->user()->id;
            $email_category = Chatting::where('to_user->id', $to_user_id)
                ->where('status', 1)
                ->orderBy("created_at", "desc")
                ->get();
            return $this->customSuccessResponseWithPayload($email_category);
        }
    }

    public function supportbox()
    {
        //doctor's details
        if (Auth::guard('api')->check()) {

            $to_user_id = Auth::guard('api')->user()->id;
            $email_category = Chatting::where('to_user->id', $to_user_id)
                ->where('status', 2)
                ->orderBy("created_at", "desc")
                ->get();
            return $this->customSuccessResponseWithPayload($email_category);
            // return "private box";
        }
        //patient's details
        if (Auth::guard('patient')->check()) {
            $to_user_id = Auth::guard('patient')->user()->id;
            $email_category = Chatting::where('to_user->id', $to_user_id)
                ->where('status', 2)
                ->orderBy("created_at", "desc")
                ->get();
            return $this->customSuccessResponseWithPayload($email_category);
        }
    }

    public function socialbox()
    {
        //doctor's details
        if (Auth::guard('api')->check()) {

            $to_user_id = Auth::guard('api')->user()->id;
            $email_category = Chatting::where('to_user->id', $to_user_id)
                ->where('status', 3)
                ->orderBy("created_at", "desc")
                ->get();
            return $this->customSuccessResponseWithPayload($email_category);
            // return "private box";
        }
        //patient's details
        if (Auth::guard('patient')->check()) {
            $to_user_id = Auth::guard('patient')->user()->id;
            $email_category = Chatting::where('to_user->id', $to_user_id)
                ->where('status', 3)
                ->orderBy("created_at", "desc")
                ->get();
            return $this->customSuccessResponseWithPayload($email_category);
        }
    }

    public function workbox()
    {
        //doctor's details
        if (Auth::guard('api')->check()) {

            $to_user_id = Auth::guard('api')->user()->id;
            $email_category = Chatting::where('to_user->id', $to_user_id)
                ->where('status', 4)
                ->orderBy("created_at", "desc")
                ->get();
            return $this->customSuccessResponseWithPayload($email_category);
            // return "private box";
        }
        //patient's details
        if (Auth::guard('patient')->check()) {
            $to_user_id = Auth::guard('patient')->user()->id;
            $email_category = Chatting::where('to_user->id', $to_user_id)
                ->where('status', 4)
                ->orderBy("created_at", "desc")
                ->get();
            return $this->customSuccessResponseWithPayload($email_category);
        }
    }

    public function trash()
    {
        try {
            // $user= Auth::guard('api')->check() ? auth('api')->user() : auth('patient')->user();
            $nofy_id = request()->notification_id;
            // $nofy_id = "122b603b-649b-425a-878f-ee96599607fe";
            $delete = DB::table('notifications')
                ->where('id', $nofy_id)
                ->update(['data->flag_status' => 'deleted']);

            return $this->customSuccessResponseWithMessage('email trashed');
        } catch (\Throwable$ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }
    public function trashList()
    {
        try {
            $user = Auth::guard('api')->check() ? auth('api')->user() : auth('patient')->user();
            $trash_list = DB::table('notifications')
                ->where('type', 'App\Notifications\EmailNotification')
                ->where('notifiable_id', $user->id)
                ->where('data->flag_status', 'deleted')->get();
            return $this->customSuccessResponseWithPayload($trash_list);
        } catch (\Throwable$ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }

    public function all_action()
    {
        $argument_Id = request()->argument_Id;
        $msg_id = request()->msg_id;

        if ($argument_Id == 6) {
            $nofy_id = request()->notification_id;

            foreach ($nofy_id as $id) {
                $delete = DB::table('notifications')
                    ->where('type', 'App\Notifications\EmailNotification')
                    ->where('id', $id)
                    ->update(['data->flag_status' => 'deleted']);

                return $this->customSuccessResponseWithMessage('email trashed');
            }

            // foreach ($msg_id as $id) {
            //     \App\Models\Chatting::findOrFail($id)->delete();
            // }
            // return $this->customSuccessResponseWithPayload('Delete All');
        }
        // Move to Social
        if ($argument_Id == 5) {

            foreach ($msg_id as $id) {
                \App\Models\Chatting::where('id', $id)->update(['status' => 3]);
            }
            return $this->customSuccessResponseWithPayload('Moved to Social');
        }
        if ($argument_Id == 4) {

            foreach ($msg_id as $id) {
                \App\Models\Chatting::where('id', $id)->update(['status' => 2]);
            }
            return $this->customSuccessResponseWithPayload('Move to Support');
        }
        if ($argument_Id == 3) {

            foreach ($msg_id as $id) {
                \App\Models\Chatting::where('id', $id)->update(['status' => 4]);
            }
            return $this->customSuccessResponseWithPayload('Move to Work');
        }
        if ($argument_Id == 2) {

            foreach ($msg_id as $id) {
                \App\Models\Chatting::where('id', $id)->update(['status' => 1]);
            }
            return $this->customSuccessResponseWithPayload('Moved to Private');
        }
        // if($argument_Id == 1){
        //     return $this->customSuccessResponseWithPayload('Mark All as Unread');
        // }

    }
    public function reply()
    {
        // return 200;
        request()->validate(["message_id" => "required"]);
        request()->validate(["subject" => "required"]);
        request()->validate(["reply_user" => "required"]);
        //// request()->validate(["reply_user" => "required"]);
        request()->validate(["replyMessage" => "required"]);
        //doctor's details
        if (Auth::guard('api')->check()) {

            $fromuser_id = Auth::guard('api')->user()->id;
            $from_fname = Auth::guard('api')->user()->first_name;
            $from_lname = Auth::guard('api')->user()->last_name;
            $from_email = Auth::guard('api')->user()->email;
            $user_model = "App\Models\Employee";
        }
        //patient's details
        if (Auth::guard('patient')->check()) {

            $fromuser_id = Auth::guard('patient')->user()->id;
            $from_fname = Auth::guard('patient')->user()->first_name;
            $from_lname = Auth::guard('patient')->user()->last_name;
            $from_email = Auth::guard('patient')->user()->email;
            $user_model = "App\Models\Patient";
        }
        //  $from_user = $fromuser_id.' '.$from_fname.' '.$from_lname.'  '.$from_email;
        $to = request()->reply_user;
        $search = Patient::info()->where('email', 'LIKE', '%' . $to . '%')->first(['id', 'email']);

        $check = json_decode($search);
        $dataStatus = $check;
        if (empty($dataStatus)) {
            $search = $this->search_dr_emails($to);
        }
        $to_email = $search;
        // return $this->customSuccessResponseWithPayload($to_email);

        $reply = new replying();
        $reply->chatting_id = request()->message_id;
        $reply->message_id = request()->message_id;
        $reply->subject = request()->subject;
        $reply->from_user_id = $fromuser_id;
        $reply->from_fname = $from_fname;
        $reply->from_lname = $from_lname;
        $reply->sender_model = $from_lname;
        $reply->to_user = request()->reply_user;
        $reply->replyMessage = request()->replyMessage;
        $reply->save();
        //message id
        if ($reply->save()) {
            $reply_id = $reply->id;
        }
        // return $this->customSuccessResponseWithPayload($reply_id);

        $from_details = [
            'first_name' => $from_fname,
            'last_name' => $from_lname,
            'from_id' => $fromuser_id,
            'from_email' => $from_email,
        ];
        //notify message
        $details = [
            'from_details' => $from_details,
            'subject' => $reply->subject,
            'message_id' => $reply->message_id,
            'reply_id' => $reply_id,
            'under_category' => request()->under_category,
            'sent_at' => now(),
            'flag_status' => 'normal',
        ];
        // return $this->customSuccessResponseWithPayload($to);
        Notification::send($to_email, new EmailNotification($details));
        return $this->customSuccessResponseWithPayload('email replied successfully');
    }

    public function view_reply()
    {
        request()->validate(["reply_id" => "required"]);
        request()->validate(["notify_Id" => "required"]);

        $notifyid = request()->notify_Id;
        $notification = auth('api')->user()->notifications()
            ->where('type', 'App\Notifications\EmailNotification')
            ->where('id', $notifyid)->first();
        // return $this->customSuccessResponseWithPayload($notification);
        if ($notification) {
            $notification->markAsRead();
        }
        $reply_id = request()->reply_id;
        $view_reply = replying::find(request()->reply_id);
        return $this->customSuccessResponseWithPayload($view_reply);
    }

    public function view_sent()
    {

        request()->validate(["messageId" => "required"]);
        // $message_id = request()->messageId;
        // $email = Chatting::where('id', $message_id)->first();
        $id = request()->messageId;
        $email = Chatting::with(['emailattachments', 'ALL_replies'])->find($id);
        return $this->customSuccessResponseWithPayload($email);
    }

    public function total_mail()
    {
        //doctor's details
        if (Auth::guard('api')->check()) {
            $notifiableId = Auth::guard('api')->user()->id;
            $user = Employee::findOrFail($notifiableId);

            $under_category = 'private_care';
            $total_inbo = DB::table('notifications')->where('notifiable_id', $notifiableId)
                ->where('data->under_category', $under_category)
                ->where('read_at', null)
                ->count();
            $snooze_total = Chatting::where('status', 10)
                ->where('from_user_id', $notifiableId)->count();
            $total_inbox = (object) ['snooze_total' => $snooze_total, 'inbox_total' => $total_inbo];
            return $this->customSuccessResponseWithPayload($total_inbox);
        }

        //patient's details
        if (Auth::guard('patient')->check()) {

            $notifiableId = Auth::guard('patient')->user()->id;
            // $user = User::findOrFail($notifiableId);
            $total_inbo = DB::table('notifications')->where('notifiable_id', $notifiableId)
                ->where('read_at', null)
                ->count();
            $snooze_total = Chatting::where('status', 10)
                ->where('from_user_id', $notifiableId)->count();
            $total_inbox = (object) ['snooze_total' => $snooze_total, 'inbox_total' => $total_inbo];
            return $this->customSuccessResponseWithPayload($total_inbox);
        }
    }

    private function search_dr_emails($q)
    {
        $data = DB::select('select id, first_name, last_name, email, phone from employees where email = ? ', [$q]);

        $to_email = $data ? (object) $data[0] : false;
        if (!$to_email) {
            throw new Exception('Email not found', 2405);
        }
        $dr_email = $to_email->id;
        $employ = new chatEmployeeResource(Employee::find($dr_email));
        return $employ;
    } //ONE TO ONE COMM

    ///SENDING SMS SECTION
    /*sending sms */
    public function sendSms()
    {
        try {
            $reciepient = request()->reciepient;
            $subject = request()->subject;
            //  $messageContent =request()->messageContent;
            $Content = [
                'sender_fullnames' => request()->sender_fullnames,
                'sender_street' => request()->sender_street,
                'sender_house_number' => request()->sender_house_number,
                'sender_resident' => request()->sender_resident,
                'sender_postcode' => request()->sender_postcode,
                'sender_telephone' => request()->sender_phone,
                'message' => request()->message,
                'date_time' => now(),
                'recipient' => request()->id,
                'date_of_birth' => request()->birth_date,
                'lastname' => request()->last_name,
                'firstname' => request()->first_name,
                'BSN' => request()->BSN,
                'patient_street' => request()->patient_street,
                'patient_residence' => request()->home_address,
                'patient_postcode' => request()->patient_postalcode,
                'patient_telephone' => request()->patient_phone,
                'displayName' => request()->displayName,
                'institute' => request()->organizationType,
                'reciever_street' => request()->street,
                'reciever_hse_no' => request()->houseNumber,
                'reciever_residence' => request()->locality,
                'reciever_postcode' => request()->postalCode,
            ];
            $send_sms = new smsService();
            $data = $send_sms->send_sms($reciepient, $subject, $Content);
            return $this->customSuccessResponseWithPayload($data);
        } catch (\Throwable$ex) {

            return $this->customFailResponseMessage($ex->getMessage());
        }
    }
    /** listing sms in my inbox */
    public function smsList()
    {
        try {
            $list = new smsService();
            $data = $list->list();
            // $data[status];

            return $this->customSuccessResponseWithPayload($data);
        } catch (\Throwable$ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }

    /**retrieve sms for the selected account*/
    public function retrieve()
    {
        try {
            $message_id = request()->message_id;
            $smsRetrieve = new smsService();
            $data = $smsRetrieve->sms_retrieve($message_id);

            return $this->customSuccessResponseWithPayload($data);
        } catch (\Throwable$ex) {

            return $this->customFailResponseMessage($ex->getMessage());
        }
    }

    public function stat()
    {
        try {
            $sms_stat = new smsService();
            $data = $sms_stat->smsStat();

            return $this->customSuccessResponseWithPayload($data);
        } catch (\Throwable$ex) {

            return $this->customFailResponseMessage($ex->getMessage());
        }
    }

    public function smsDelete()
    {
        $message_id = request()->message_id;
        $smsDelete = new smsService();
        $data = $smsDelete->deleting_sms($message_id);

        return $this->customSuccessResponseWithMessage($data);
    } //ZORGMAIL SMS
    public function send_sms_patient()
    {
        try {

            $message = new smsPatient();
            $message->patient_id = request()->patient_id;
            $message->phonenumber = request()->phonenumber;
            $message->message = request()->message;
            $message->status = "pending";
            $message->save();

            // $message = new SmsService();
            $resp = SmsService::send(request()->phonenumber, request()->message);

            return $this->customSuccessResponseWithPayload($resp);
        } catch (\Throwable$ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }

    public function send_sms_patient2()
    {
        try {
            $message = new smsPatient();
            $message->patient_id = request()->patient_id;
            $message->phonenumber = request()->phonenumber;
            $message->message = request()->message;
            $message->status = "pending";
            $message->save();

            $budget = new BudgetSMS([
                'username' => 'buytech',
                'userid' => '20200',
                'handle' => '3b10ba8de6dc3f5303787dd8e0961c11',
                'from' => 'METADENT TEST SMS',
            ]);
            $phone = request()->phonenumber;
            $message = request()->message;

            $budget->setRecipient($phone);

            //  add message
            $budget->setMessage($message);

            //  Send the message
            $send = $budget->send();
            $res = $send->response;
            return $this->customSuccessResponseWithPayload($res);
        } catch (\Throwable$ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }

    public function messageList()
    {
        try {
            $all_patient_message = smsPatient::where('patient_id', request()->patient_id)->get();
            return $this->customSuccessResponseWithPayload($all_patient_message);
        } catch (\Throwable$th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }
    public function view_message()
    {
        try {
            $view_message = smsPatient::where('id', request()->message_id)->get();
            return $this->customSuccessResponseWithPayload($view_message);
        } catch (\Throwable$th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }
    //SMS SECTION END

    //on board section
    //on board section
    public function word_doc()
    {
        try {

            $file_name = request()->file_name;
            $doc_content = request()->doc_content;
            $category = request()->category;
           $doctor = Auth::guard('api')->user()->id;
            $onboard = new OnBoardDocuments();
            $data = $onboard->upload_docs(request()->patient_id, $file_name, $doc_content, $category, $doctor, $status = "typed_doc");

            // return $data;
            return $this->customSuccessResponseWithPayload("letter saved");
        } catch (\Throwable$th) {

            return $this->customFailResponseMessage($th->getMessage());
        }
    }
    public function download_file()
    {
        try {

            $app_name = get_facility_setting('app_name');
            $app_logo = get_facility_setting('app_logo');
            $facility_address = get_facility_setting('facility_address');
            $facility_email = get_facility_setting('facility_email');
            $facility_phone = get_facility_setting('facility_phone');
            $date = Carbon::now()->format('Y-m-d H:i:s jS F Y');
            $doc_content_data = onboardingDoc::findOrFail(request()->doc_id);
            $doc_content =$doc_content_data->file_url;
            // $doctor_id = $doc_content_data->add_by;

            $doctor= employee::find($doc_content_data->add_by);
            $lname = $doctor->last_name;
            $fname = $doctor->first_name;


            $dompdf = new Dompdf();
            $dompdf = Pdf::loadView('wordprocessor.worddoc', compact(['app_logo', 'app_name', 'facility_address', 'facility_email', 'facility_phone', 'date', 'doc_content', 'fname', 'lname']));
            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
           return $dompdf->download();
            // return $dompdf->stream("Invoices PDF");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
    public function onboard_treatment_doc()
    {
        try {
            $patient_id = request()->patient_id;
            $patient = Patient::find(request()->patient_id);
            if (!$patient) {
                throw new Exception('patient not found', 2405);
            }
            $treatment = onboardingDoc::where('patient_id', $patient_id)
                ->where('under_category', 1)->get();
            return $this->customSuccessResponseWithPayload($treatment);
        } catch (\Throwable$ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }
    public function onboard_xrayfile_doc()
    {
        try {
            $patient_id = request()->patient_id;
            $patient = Patient::find(request()->patient_id);
            if (!$patient) {
                throw new Exception('patient not found', 2405);
            }
            $treatment = onboardingDoc::where('patient_id', $patient_id)
                ->where('under_category', 3)->get();
            return $this->customSuccessResponseWithPayload($treatment);
        } catch (\Throwable$ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }
    public function onboard_referalfile_doc()
    {
        try {
            $patient_id = request()->patient_id;
            $patient = Patient::find(request()->patient_id);
            if (!$patient) {
                throw new Exception('patient not found', 2405);
            }
            $treatment = onboardingDoc::where('patient_id', $patient_id)
                ->where('under_category', 2)->get();
            return $this->customSuccessResponseWithPayload($treatment);
        } catch (\Throwable$ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }
    public function onboard_billing_doc()
    {
        try {
            $patient_id = request()->patient_id;
            $patient = Patient::find(request()->patient_id);
            if (!$patient) {
                throw new Exception('patient not found', 2405);
            }
            $treatment = onboardingDoc::where('patient_id', $patient_id)
                ->where('under_category', 4)->get();
            return $this->customSuccessResponseWithPayload($treatment);
        } catch (\Throwable$ex) {
            return $this->customFailResponseMessage($ex->getMessage());
        }
    }
    // dr onboard documents
    public function dr_onboard_doc()
    {
        try {
            if (request()->hasFile('attachments')) {
                $patient_id = request()->patient_id;
                $patient = Patient::find(request()->patient_id);
                if (!$patient) {
                    throw new Exception('patient not found', 2405);
                }
                $under_category = request()->under_category;
                $add_by = Auth::guard('api')->check() ? auth('api')->user() : auth('patient')->user();

                foreach (request()->file('attachments') as $file) {
                    $dr_onboardDoc = new OnBoardDocuments();
                    $dr_onboardDoc->dr_side_onboard_doc($patient_id, $file, $under_category, $add_by, "");
                    return $this->customSuccessResponseWithPayload('patient document uploaded successfully');
                }
            }
        } catch (\Throwable$ex) {

            return $this->customFailResponseMessage($ex->getMessage());
        }
    }
    public function searchfile()
    {
        try {

            $searchpatientsDocs = onboardingDoc::where('file_name', 'LIKE', '%' . request()->keyword . '%')
                ->Where('under_category', request()->under_category)
                ->get();
            return $this->customSuccessResponseWithPayload($searchpatientsDocs);
        } catch (\Throwable$th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    } //END DOCUMENT

    public function general_sendMail()
    {
        try {
            $data = [
                'email' => request()->email,
                'subject' => request()->subject,
                'message' => request()->message,
            ];
            Mail::mailer('smtp')->to($data['email'])->send(new GeneralMail($data));

            return $this->customSuccessResponseWithMessage('email sent successfully');
        } catch (\Throwable$th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }
    public function generalInbox()
    {
        try {
            $general = new GeneralComService();
            $data = $general->fetchMessages(INBOX);

            return $this->customSuccessResponseWithPayload($data);
        } catch (\Throwable$th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }

    public function generalSent()
    {
        try {
            $general = new GeneralComService();
            $data = $general->fetchMessages(SENT);

            return $this->customSuccessResponseWithPayload($data);
        } catch (\Throwable$th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }

    public function generalDraft()
    {
        try {

            $general = new GeneralComService();
            $data = $general->fetchMessages(DRAFT);
            return $this->customSuccessResponseWithPayload($data);
        } catch (\Throwable$th) {

            return $this->customFailResponseMessage($th->getMessage());
        }
    }

    public function generalJunk()
    {
        try {
            $general = new GeneralComService();
            $data = $general->fetchMessages(JUNK);

            return $this->customSuccessResponseWithPayload($data);
        } catch (\Throwable$th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }

    public function general_view_message()
    {
        try {
            $message = new GeneralComService();
            $data = $message->message(request()->uid, request()->folder);
            return $this->customSuccessResponseWithPayload($data);
        } catch (\Throwable$th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }
    public function general_forward()
    {
        try {
            $forwardEmail = new GeneralComService();
            $data = $forwardEmail->forward(request()->email, request()->subject, request()->message, request()->more_details, request()->date, request()->header);
            return $this->customSuccessResponseWithPayload($data);
        } catch (\Throwable$th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }
    //END GENERAL COMM
    public function testing()
    {
        try {

            $budget = new BudgetSMS([
                'username' => 'buytech',
                'userid' => '20200',
                'handle' => '3b10ba8de6dc3f5303787dd8e0961c11',
                'from' => 'MFI TEST SMS',
            ]);
            $phone = request()->phonenumber;
            $message = request()->message;
            $sms = $budget->send($phone, $message);
            return $this->customSuccessResponseWithPayload('sms sent successfully');
        } catch (\Throwable$ex) {
            return $ex->getMessage();
        }
    }

    public function test(RecallService $recallService)
    {
        try {
            // return 300;
            return $data = $recallService->recall_dentist_visit();

            // return $this->customSuccessResponseWithPayload($data);
        } catch (\Throwable$th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }

    // }
    // public function testing()
    // {
    //    try{
    //     $sg_patient = new ZorgConnect();
    //     $data =$sg_patient->single_patient();
    //     return $data;
    //    }catch(\Throwable $ex){
    //     return $this->customFailResponseMessage($ex->getMessage());
    //    }
    // }
    // obarigye@yahoo.com
    // DMulindwa@projectcode.ug

}
// obarigye@yahoo.com
// DMulindwa@projectcode.ug
