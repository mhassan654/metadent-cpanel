<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Modules\Common\Helper;
use App\Models\Audience;
use App\Services\Markerting\Markerting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AudiencesController extends Controller
{
    // //check auth middleware
    // public function __construct()
    // {
    //     $this->middleware(["auth:api"]);
    // }
    // get all audiences
    public function audiences_info()
    {
        try {
            $audiences = new Markerting();
            $res = $audiences->lists_info();
            return $this->customSuccessResponseWithPayload($res);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function specific_audience_list()
    {
        try {
            // return request()->list_id;
            $audience = new Markerting();
            $res = $audience->specific_list_info(request()->list_id);

            return $this->customSuccessResponseWithPayload($res);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    //store audience
    public function store()
    {
        try {
            //validation
            Helper::custom_validator(request()->all(), [
                'name' => 'required|string',
            ]);
            // create audience
            $audience = new Markerting();
            $add_audience = $audience->create_audience(request()->name, request()->email_type_option, request()->company, request()->address1, request()->city, request()->sate, request()->zip, request()->country, request()->from_email, request()->from_name, request()->subject, request()->laguage);

            if ($add_audience) {
                //return audience created
                return $this->customSuccessResponseWithPayload($add_audience);
            }
            return $this->customFailResponseWithPayload('Audience not Created');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
    public function delete_audience_list()
    {
        // return request()->list_id;
        try {
            $add_list = new Markerting();
            $res = $add_list->del_List(request()->list_id);

            return $this->customSuccessResponseWithPayload($res);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    //update audience
    public function update()
    {
        try {
            Helper::custom_validator(request()->all(), [
                'name' => 'required|string',
                'audienceId' => 'required|integer|exists:App\Models\Audience,id',
            ]);

            // find audience to be updated
            $audience = Audience::find(request()->audienceId);

            if ($audience) {
                //update the audience
                $audience->update([
                    'name' => request()->name,
                ]);
                //return updated audience
                return $this->customSuccessResponseWithPayload($audience);
            }

            return $this->customFailResponseWithPayload('Audience not Found');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    //fetch single specific_campaign
    public function specific_campaign()
    {
        try {
            // return request()->campaign_id;
            $specific_campaign= new Markerting();
            $res = $specific_campaign->campaign_info(request()->campaign_id);

            return $this->customFailResponseWithPayload($res);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    //delete audience
    public function destroy()
    {
        try {
            Helper::custom_validator(request()->all(), [
                'audienceId' => 'required|integer|exists:App\Models\Audience,id',
            ]);

            // find audience to be deleted
            $audience = Audience::find(request()->audienceId);

            if ($audience) {
                // delete the audience
                $audience->delete();

                //return audience
                return $this->customSuccessResponseWithPayload('Audience Deleted Successfully');
            }

            return $this->customFailResponseWithPayload('Audience not Found');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    //attach patients to audience
    public function attach_patients()
    {
        try {
            Helper::custom_validator(request()->all(), [
                'audienceId' => 'required|integer|exists:App\Models\Audience,id',
                'patients' => 'required|array',
                'patients.*' => 'integer|exists:App\Models\Patient,id',
            ]);

            //attach patients to audience
            foreach (request()->patients as $patient) {
                //ensure that the patient is not attached multiple times to the same audience
                $patient_in_audience = DB::table('audience_patient')->where('patient_id', $patient)->where('audience_id', request()->audienceId)->first();
                if (is_null($patient_in_audience)) {
                    DB::table('audience_patient')->insert([
                        'audience_id' => request()->audienceId,
                        'patient_id' => $patient,
                    ]);
                }
            }

            return $this->customSuccessResponseWithPayload('Patients Attached');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
    public function add_contact()
    {
        try {
            $add_contact_audience = new Markerting();
            $data = $add_contact_audience->add_contact_audience(request()->list_id, request()->email_address, request()->subscribed_status, request()->fname, request()->lname);

            return $this->customSuccessResponseWithPayload($data);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
    public function batch_subscribe()
    {
        try {

            $emails = request('email');
            $email_list = explode(',', $emails);
            $status = request('status');

            $members = array();
            foreach ($email_list as $email) {
                array_push($members, [
                    'email_address' => $email,
                    'email_type' => 'text',
                    'status' => $status,
                ]
                );
            }

            // $members;

            $batch_email = new Markerting();
            $res = $batch_email->add_batch_subscribe(request()->list_id, $members);

            return $this->customSuccessResponseWithPayload($res);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
    public function unsubscribe_contacts()
    {
        try {
            $unsubscribe = new Markerting();
            $res = $unsubscribe->unsubscribe_contacts_from_audience(request()->emails, request()->list_id);

            return $this->customSuccessResponseWithPayload($res);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
    public function add_campaign()
    {
        try {
            $subject_line = request()->subject_line;
            $preview_text = request()->preview_text;
            $title = request()->title;
            $from_name = request()->from_name;
            $campaign_type = request()->campaign_type;

            $data = new Markerting();
            $res = $data->create_compaign($campaign_type, $title, $subject_line, $preview_text, $from_name);

            return $this->customSuccessResponseWithPayload($res);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
    public function delete_campaign()
    {
        try {
            $delete_camapaign = new Markerting();
            $res = $delete_camapaign->remove_campaign(request()->campaign_id);

            return $this->customSuccessResponseWithPayload($res);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }

    }
    public function add_campaign_template()
    {
        try {
            return [
                request()->template_name,
                request()->html,
            ];
            $temp = new Markerting();
            $template = $temp->add_tempalate(request()->template_name, request()->html);
            return $this->customSuccessResponseWithPayload($template);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
    public function specific_template(){
        try{
        $temp = new Markerting();
        $template = $temp->get_template(request()->template_id);
        return $this->customSuccessResponseWithPayload($template);
    } catch (\Throwable $th) {
        return $this->customFailResponseWithPayload($th->getMessage());
    }

    }
    public function resend_campaign()
    {
        try {
            // return "resending";
            $resend = new Markerting();
            $res = $resend->resending_campaign(request()->campaign_id);
            return $this->customSuccessResponseWithPayload($res);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
    public function list_campaign()
    {
        try {
            $all_campaign = new Markerting();
            $res = $all_campaign->all_created_compaign();
            return $this->customSuccessResponseWithPayload($res);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
    public function audience_list_on_campaign()
    {
        try {
            $all_campaign = new Markerting();
            $res = $all_campaign->list_audience(request()->list_id);
            return $this->customSuccessResponseWithPayload($res);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
    public function cancel_campaign()
    {
        try {
            $cancel = new Markerting();
            $res = $cancel->stop_campaign(request()->campaign_id);
            return $this->customSuccessResponseWithPayload($res);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
    public function send_campaign()
    {
        try {
            $send = new Markerting();
            $res = $send->sending_campaign(request()->campaign_id);
            return $res;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function schedule_campaign()
    {
        try {
            $scheduling = new Markerting();

            $res = $scheduling->scheduling_campaign(request()->campaign_id, request()->schedule_time);

            return $this->customSuccessResponseWithPayload($res);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
    public function un_schedule_campaign()
    {
        try {
            $un_scheduled = new Markerting();
            $res = $un_scheduled->un_scheduled_campaign(request()->campaign_id);
            return $this->customSuccessResponseWithPayload($res);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
    public function test_markerting()
    {
        // test_addlist
        try {
            $data = new Markerting();
            $response = $data->test_addlist2();

            return $response;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
