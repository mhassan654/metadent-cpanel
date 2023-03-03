<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Services\Sms\SmsService;
use Illuminate\Http\Request;

class SmsController extends Controller
{

    public function send_sms(Request $request)
    {
        try {
            // Helper::custom_validator($request->all(), ['phone' => 'required', 'message' => 'required']);
            // return $this->customSuccessResponseWithPayload($this->gatewaySend(request('phone'), request('message')));
            // return $this->customSuccessResponseWithPayload(SmsService::send(request('phone'), request('message')));

            return $this->customSuccessResponseWithPayload(SmsService::sendOtp(request('phone')));

            // return $this->customSuccessResponseWithPayload($this->send(request('phone'), request('message')));

            // return $this->customSuccessResponseWithPayload($this->easy_send());

            // return $this->customSuccessResponseWithPayload($this->send_message(request('phone'), request('message')));
        } catch (\Exception $e) {
            return $this->customFailResponseMessage($e->getMessage());
        }
    }

    public function test()
    {
        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://smsraw.com/api/send/sms?secret=eb1c6d3b67e4b2f006ebc05ae7b55bc681962524&type=sms&phone=0774262923&message=%22Hello%20uganda%22&mode=credits&gateway=9',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            return $this->customSuccesResponseWithPayload(json_decode($response));
        } catch (\Exception $e) {
            return $this->customFailResponseMessage($e->getMessage());
        }
    }

    private function send(string $phone, string $message)
    {
        $ch = curl_init();

        $post_url = EASY_SEND_GATEWAY["siteUrl"] . "username=" . EASY_SEND_GATEWAY["username"] . "&password=" . EASY_SEND_GATEWAY["password"] .
            "&from=" . EASY_SEND_GATEWAY["senderId"] . "&to=" . str_replace("+", "", $phone) . "&text=" . $message . "&type=0";

        curl_setopt($ch, CURLOPT_URL, $post_url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);

        curl_close($ch);
        return $response;
    }

    public function send_message(string $phone, string $message)
    {
        $url = "https://smsraw.com/api/send/sms";

        $secret = "eb1c6d3b67e4b2f006ebc05ae7b55bc681962524";

        $post_url = 'https://smsraw.com/api/send/sms?secret=eb1c6d3b67e4b2f006ebc05ae7b55bc681962524&type=sms&phone=' . $phone . '&message=' . $message . '&mode=credits&gateway=14';

        $data = [
            "secret" => $secret,
            "mode" => "credits",
            "gateway" => 13,
            "phone" => $phone,
            "message" => $message,
            "type" => "sms"
        ];

        // array_reduce($data, fn($val, $curr)=> ,'');

        $client =  new \GuzzleHttp\Client();

        // $response = $client->post($url, ["json" => $data]);
        $response = $client->request('post', $post_url);

        return json_decode($response->getBody()->getContents());
    }

    public function easy_send()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://www.easysendsms.com/sms/bulksms-api/bulksmsapi?username=andronyaj5tyb2022&password=esm89398&from=Metadent&to=256774262923&text=Hello%2520world&type=0',
            CURLOPT_RETURNTRANSFER => true,
             CURLOPT_HTTPHEADER=> array('Content-Type: application/json; charset=utf-8'),
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;

    }

    public function send_otp(Request $request)
    {
        try {
            Helper::custom_validator($request->all(), ['phone' => 'required']);
            return $this->customSuccessResponseWithPayload(SmsService::sendOtp($request->phone));
        } catch (\Exception $e) {
            return $this->customFailResponseMessage($e->getMessage());
        }
    }
}
