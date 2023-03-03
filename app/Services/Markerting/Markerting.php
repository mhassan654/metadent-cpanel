<?php

namespace App\Services\Markerting;

use MailchimpMarketing\ApiClient;

class Markerting
{
    public $apiKey;
    public $server;

    public function __construct()
    {
        $this->apiKey = "05d813ba77a538deed2f2bb65e5cdbb4-us9"; //env('MAILCHIMP_API_KEY');
        $this->server = "us9"; //env('MAILCHIMP_DATA_CENTER');
    }
    public function connection()
    {
        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => $this->apiKey,
            'server' => $this->server,
        ]);

        $response = $mailchimp->ping->get();
        return $response;
    }

    public function create_audience($name, $email_type_option, $company, $address1, $city, $state, $zip, $country, $from_email, $from_name, $subject, $laguage)
    {

        try {

            $mailchimp = new ApiClient();

            $mailchimp->setConfig([
                'apiKey' => $this->apiKey,
                'server' => $this->server,
            ]);
            $response = $mailchimp->lists->createList([
                "name" => $name,
                "permission_reminder" => "permission_reminder",
                "email_type_option" => $email_type_option,
                "contact" => [
                    "company" => $company,
                    "address1" => $address1,
                    "city" => $city,
                    "state" => $state,
                    "zip" => $zip,
                    "country" => $country,
                ],
                "campaign_defaults" => [
                    "from_name" => $from_name,
                    "from_email" => $from_email,
                    "subject" => $subject,
                    "language" => "nl",
                ],
            ]);
            return $response;
        } catch (\MailchimpMarketing\ApiException $e) {
            return $e->getMessage();
        }
    }
    public function del_List($list_id)
    {
        $client = new ApiClient();
        $client->setConfig([
            'apiKey' => $this->apiKey,
            'server' => $this->server,
        ]);

        $response = $client->lists->deleteList($list_id);
        return $response;
    }

    // audiene cfefa42f83
    public function add_contact_audience($list_id, $email_address, $subscribed_status, $fname, $lname)
    {
        try {
            $mailchimp = new ApiClient();

            $mailchimp->setConfig([
                'apiKey' => $this->apiKey,
                'server' => $this->server,
            ]);
            $response = $mailchimp->lists->addListMember($list_id, [
                "email_address" => $email_address,
                "status" => $subscribed_status,
                "merge_fields" => [
                    "FNAME" => $fname,
                    "LNAME" => $lname,
                ],
            ]);
            return $response;
        } catch (MailchimpMarketing\ApiException $e) {
            return $e->getMessage();
        }
    }
    public function add_batch_subscribe($list_id, $members)
    {

        $client = new ApiClient();
        $client->setConfig([
            'apiKey' => $this->apiKey,
            'server' => $this->server,
        ]);

        $response = $client->lists->batchListMembers($list_id, ["members" => $members]);
        return $response;

    }
    public function list_audience($list_id)
    {

        $client = new ApiClient();
        $client->setConfig([
            'apiKey' => $this->apiKey,
            'server' => $this->server,
        ]);

        $response = $client->lists->getListMembersInfo($list_id);
        return $response;
    }
    // Check a contact’s subscription status
    public function check_contact_subscription_status($emails, $your_list_id)
    {

        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => $this->apiKey,
            'server' => $this->server,
        ]);

        $email = $emails;
        $list_id = $your_list_id;
        $subscriber_hash = md5(strtolower($email));

        try {
            $response = $mailchimp->lists->getListMember($list_id, $subscriber_hash);
            return $response;
        } catch (\MailchimpMarketing\ApiException $e) {
            return $e->getMessage();
        }
    }

    public function unsubscribe_contacts_from_audience($emails, $your_list_id)
    {

        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => $this->apiKey,
            'server' => $this->server,
        ]);

        $email = $emails;
        $listId = $your_list_id;
        $subscriberHash = md5(strtolower($email));

        try {
            $response = $mailchimp->lists->updateListMember($listId, $subscriberHash, ["status" => "unsubscribed"]);
            return $response;
        } catch (\MailchimpMarketing\ApiException $e) {
            return $e->getMessage();
        }
    }

    public function create_compaign($campaign_type, $title, $subject_line, $preview_text, $from_name)
    {

        $client = new ApiClient();
        $client->setConfig([
            'apiKey' => $this->apiKey,
            'server' => $this->server,
        ]);
        // $campaign_type, $title,$subject_line,$preview_text,$from_name

        $response = $client->campaigns->create([
            "type" => $campaign_type,
            'settings' => [
                "subject_line" => $subject_line,
                "preview_text" => $preview_text,
                "title" => $title,
                "from_name" => $from_name,
            ],
        ]);
        return $response;
    }
    public function campaign_info($campaign_id)
    {

        $client = new ApiClient();
        $client->setConfig([
            'apiKey' => $this->apiKey,
            'server' => $this->server,
        ]);

        $response = $client->campaigns->get($campaign_id);
        return $response;

    }
    public function remove_campaign($campaign_id)
    {

        $client = new ApiClient();
        $client->setConfig([
            'apiKey' => $this->apiKey,
            'server' => $this->server,
        ]);

        $response = $client->campaigns->remove($campaign_id);
        return $response;

    }
    public function add_tempalate($template_name, $html)
    {

        $client = new ApiClient();
        $client->setConfig([
            'apiKey' => $this->apiKey,
            'server' => $this->server,
        ]);

        $response = $client->templates->create([
            "name" => $template_name,
            "html" => $html,
        ]);
        return $response;
    }
    public function get_template($template_id)
    {

        $client = new ApiClient();
        $client->setConfig([
            'apiKey' => $this->apiKey,
            'server' => $this->server,
        ]);

        $response = $client->templates->getTemplate($template_id);
        return $response;

    }

    public function all_created_compaign()
    {

        $client = new ApiClient();
        $client->setConfig([
            'apiKey' => $this->apiKey,
            'server' => $this->server,
        ]);

        $response = $client->campaigns->list();
        return $response;
    }

    public function stop_campaign($campaign_id)
    {

        $client = new ApiClient();
        $client->setConfig([
            'apiKey' => $this->apiKey,
            'server' => $this->server,
        ]);

        $response = $client->campaigns->cancelSend($campaign_id);
        return $response;
    }

    public function sending_campaign($campaign_id)
    {

        $client = new ApiClient();
        $client->setConfig([
            'apiKey' => $this->apiKey,
            'server' => $this->server,
        ]);
        $response = $client->campaigns->send($campaign_id);
        // dd($$response);
        return $response;
    }
    public function resending_campaign($campaign_id)
    {

        $client = new ApiClient();
        $client->setConfig([
            'apiKey' => $this->apiKey,
            'server' => $this->server,
        ]);

        $response = $client->campaigns->createResend($campaign_id);
        return $response;

    }
    public function scheduling_campaign($campaign_id, $schedule_time)
    {

        $client = new ApiClient();
        $client->setConfig([
            'apiKey' => $this->apiKey,
            'server' => $this->server,
        ]);

        $response = $client->campaigns->schedule($campaign_id, [
            "schedule_time" => $schedule_time, //"2023-01-26T14:37:41.397Z"
        ]);
        return $response;
    }
    public function un_scheduled_campaign($campaign_id)
    {

        $client = new ApiClient();
        $client->setConfig([
            'apiKey' => $this->apiKey,
            'server' => $this->server,
        ]);

        $response = $client->campaigns->unschedule($campaign_id);

        return $response;
    }

    // Get lists info
    public function lists_info()
    {

        $client = new ApiClient();
        $client->setConfig([
            'apiKey' => $this->apiKey,
            'server' => $this->server,
        ]);

        $response = $client->lists->getAllLists();
        return $response;
    }

    public function specific_list_info($list_id)
    {

        $client = new ApiClient();
        $client->setConfig([
            'apiKey' => $this->apiKey,
            'server' => $this->server,
        ]);

        $response = $client->lists->getList($list_id);
        return $response;
    }

    public function test_addlist2()
    {
        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => $this->apiKey,
            'server' => $this->server,
        ]);
        $list_data = [
            "name" => "NEW TREATMENT PLAN",
            "contact" => [
                "company" => "METADENT",
                "address1" => "1234 Main Street",
                "city" => "Atlanta",
                "state" => "GA",
                "zip" => "30319",
                "country" => "US",
            ],
            "permission_reminder" => "You signed up for updates from My Company.",
            "campaign_defaults" => [
                "from_name" => "METADENT",
                "from_email" => "info@mycompany.com",
                "subject" => "New treatment plan",
                "language" => "en",
            ],
            "email_type_option" => true,
        ];
        $response = $mailchimp->lists->createList($list_data);
        return $response;
    }
    public function test_addlist()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://us9.api.mailchimp.com/3.0/campaigns/0b9da6d662/actions/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                "apiKey: $this->apiKey",
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;

    }
}
