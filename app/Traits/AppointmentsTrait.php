<?php
namespace App\Traits;
use App\Jobs\InsertGCalenderEvent;
use Carbon\Carbon;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentCreatedEmail;
use App\Models\Appointment;
use App\Models\Patient;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Log as FacadesLog;
trait AppointmentsTrait
{
    public function fetch_email_calender_appointment($id){
        $appointment = DB::table('appointments')->where('appointments.id',$id)
                                ->leftjoin('appointment_types','appointments.appointment_type_id','=','appointment_types.id')
                                ->leftjoin('treatment_types','appointments.treatment_type_id','=','treatment_types.id')
                                ->join('patients','appointments.patient_id','=','patients.id')
                                ->select([
                                    'appointments.*','patients.id AS p_id',
                                    'patients.email AS p_email','patients.first_name','patients.last_name','patient_phone',
                                    'appointment_types.title as appointment','treatment_types.title as treatment',
                                    ])
                                ->first();
        return $appointment;
    }
    public function get_appointment_doctors(Array $docs_array){
        $doctors = DB::table('employees')->whereIn('employees.id',$docs_array)
                                ->join('facilities','employees.facility_id','=','facilities.id')
                                ->select(['employees.email','employees.first_name','employees.last_name',
                                'facilities.*'])->get();
                                // dd($doctors);
        return $doctors;
    }
    public function send_created_appointment_email($id){
        try {
            $appointment = $this->fetch_email_calender_appointment($id);
            if($appointment){
                $doctors = $this->get_appointment_doctors(json_decode($appointment->doctors));
                $subject = 'Dental Appointment Set';
                $body = 'Thank you for choosing Meta Dent for your dental services.
                        Your appointment is set.';
                // $g_auth_url = $this->getAuthUrl($appointment->id);
                $patient_mail_data =[
                    'patientEmail' => $appointment->p_email,
                    'firstName' => $appointment->first_name,
                    'lastName' => $appointment->last_name,
                    'appointmentDate' => $appointment->date,
                    'appointment' => $appointment->treatment ? $appointment->treatment : $appointment->appointment,
                    'doctors' => $doctors,
                    'body' => $body,
                    'subject' =>   $subject.' sms '.$appointment->patient_phone,
                    'appointment_id'=>$appointment->id,
                    'patient_id'=>$appointment->p_id,
                    'sender_email'=>env('MAIL_FROM_ADDRESS')
                    // 'g_auth_url'=>$g_auth_url
                ];
                Mail::to($appointment->p_email)->queue(new AppointmentCreatedEmail($patient_mail_data));
                // Mail::to('otim.idb@gmail.com')->queue(new AppointmentCreatedEmail($patient_mail_data));
            }
        } catch (\Throwable $th) {
            // return $th;
            throw $th;
            //log the error
        }
    }
    public function getClient()
    {
        $client = new \Google_Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URL'));
        $client->setScopes([
          \Google\Service\Oauth2::USERINFO_PROFILE,
          \Google\Service\Oauth2::USERINFO_EMAIL,
          \Google\Service\Oauth2::OPENID,
          \Google\Service\Calendar::CALENDAR
        ]);
        $client->setApprovalPrompt(env('GOOGLE_APPROVAL_PROMPT'));
        $client->setAccessType(env('GOOGLE_ACCESS_TYPE'));
        $client->setIncludeGrantedScopes(true); 
      return $client;
    }
    public function getUserClient($id){
        $client = $this->getClient();
        if($client){
            $appointment = Appointment::findOrFail($id);
            $patient = $appointment->patient;
            $token = $patient->google_access_token;
            if(!$token){
                 return $this->getAuthUrl($client);
            }
        // $client = json_encode($client,true);
        // dd($client);
        InsertGCalenderEvent::dispatch($patient,$appointment->id);
        }
    }
    public function set_access_token(Patient $patient, $client){
        $token = $patient->google_access_token;
        $accessTokenJson = stripslashes($token);
        $client->setAccessToken($accessTokenJson);
        if ($client->isAccessTokenExpired()) {
            // fetch new access token
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            $client->setAccessToken($client->getAccessToken()); 
            // save new access token
            $patient->google_access_token = json_encode($client->getAccessToken());
            $patient->save();
        }
        return $client;
    }
    public function getAuthUrl($client)
    {
      /**
       * Create google client
       */
      // $client = $this->getClient();
      /**
       * Generate the url at google we redirect to
       */
      $authUrl = $client->createAuthUrl();
      /**
       * HTTP 200
       */
      // return response()->json($authUrl, 200);
       return redirect()->away($authUrl);
      // return redirect($authUrl);
    }
    public function get_google_access_token(Request $request){
      // dd($authcode);
        $authcode = $request->code;
        $client = $this->getClient();
          /**
         * Exchange auth code for access token
         * Note: if we set 'access type' to 'force' and our access is 'offline', we get a refresh token. we want that.
         */
        $accessToken = $client->fetchAccessTokenWithAuthCode($authcode);
        // dd($accessToken);
        /**
         * Set the access token with google. nb json
         */
        $client->setAccessToken(json_encode($accessToken));
        /**
         * Get user's data from google
         */
        $service = new \Google\Service\Oauth2($client);
        $userFromGoogle = $service->userinfo->get();
        $email = $userFromGoogle->email;
        $patient = $this->store_google_access_token($email,$accessToken);
        $appointment = $patient->appointments()->where('status_id',1)->latest()->first();
        InsertGCalenderEvent::dispatch($patient,$appointment->id);
    // $this->storeEvent($client,$appointment->id);
    //      return ;
    }
    public function store_google_access_token($email,$accessToken){
        $patient = Patient::where('email',$email)->first();
        $patient->google_access_token = json_encode($accessToken);
        $patient->save();
        return $patient;
    }
    public function storeEvent(Patient $patient,$id)
    {
      try {
        $client = $this->getClient();
        $client = $this->set_access_token($patient,$client);
        // $patient_id = $this->get_google_access_token($authcode);
        // $appointment = $this->fetch_email_calender_appointment($id);
        $appointment = Appointment::find($id);
        if ($appointment) {
            $slots = $appointment->slots;
            $doctor_ids = $appointment->doctors;
            $doctors = $this->get_appointment_doctors($doctor_ids);
            $doctor = $doctors->first();
            $appointment_type = $appointment->treatmentType ? $appointment->treatmentType->title : $appointment->appointmentType->title;
            $event = new \Google_Service_Calendar_Event(array(
              'summary' => "$appointment_type  appointment at $doctor->name",
              // 'location' => '800 Howard St., San Francisco, CA 94103',
              'description' =>  "$appointment_type  appointment at $doctor->name",
              'start' => array(
                'dateTime' => Carbon::parse($appointment->date . ' ' . $slots[0]['start-time']),
                'timeZone' => config('app.timezone'),
              ),
              'end' => array(
                'dateTime' => Carbon::parse($appointment->date . ' ' . $slots[0]['end-time']),
                'timeZone' => config('app.timezone'),
              ),
              // 'recurrence' => array(
              //   'RRULE:FREQ=DAILY;COUNT=2'
              // ),
              'attendees' => array(
                array('email' => $patient->email),
                array('email' => $doctor->email),
              ),
              'reminders' => array(
                'useDefault' => FALSE,
                'overrides' => array(
                  array('method' => 'email', 'minutes' => 24 * 60),
                  array('method' => 'popup', 'minutes' => 10),
                ),
              ),
            ));
            $calendarId = env('GOOGLE_CALENDER_ID');
            $service = new \Google_Service_Calendar($client);
            $event = $service->events->insert($calendarId, $event);
            // $this->set_event_watcher($appointment,$calendarId,$service);
            return redirect()->away($event->htmlLink);
        }
      } catch (\Throwable $th) {
        throw $th;
      }
    }
    public function set_event_watcher(Appointment $appointment,$calender_id,$service){
          $uuid = $uuid = Uuid::uuid4(); 
        $channel = new \Google_Service_Calendar_Channel();
        $channel->setId($uuid);
        $channel->setType('web_hook');
        $channel->setAddress(route('gcalender.update.event'));
        $watchResp = $service->events->watch($calender_id, $channel);
      $appointment->UUID = $uuid;
      $appointment->watch_resp = $watchResp;
      $appointment->save();
    }
}