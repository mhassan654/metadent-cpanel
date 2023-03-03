<?php

namespace App\Services\Sms;

define("EASY_SEND_GATEWAY", [
    "api_key" => "eb1c6d3b67e4b2f006ebc05ae7b55bc681962524", // Your twilio Account SID
    "gateway" => 17, // Your twilio authentication token
    "mode" => "credits" // Messaging Service Sid
]);

class SmsService
{

    public static function send(string $phone, string $message)
    {
        $client =  new \GuzzleHttp\Client();
        $url = "https://smsraw.com/api/send/sms?secret=" . EASY_SEND_GATEWAY["api_key"] . "&phone=" . $phone . "&message=" . $message . "&mode=credits&gateway=" . EASY_SEND_GATEWAY["gateway"];

        $response = json_decode($client->request('GET', $url)->getBody()->getContents());

        if ($response->status == 200) {
            return  $response->message;
        }
        throw new \Exception($response->message);
    }

    public static function sendOtp(string $phone): string
    {
        $client =  new \GuzzleHttp\Client();

        $url = "https://smsraw.com/api/send/otp?secret=" . EASY_SEND_GATEWAY["api_key"] . "&mode=credits&phone=" . $phone . "&message=Your OTP is {{otp}}&gateway=17&type=sms";

        $response = json_decode($client->request(
            'GET',
            $url
        )->getBody()->getContents());

        if ($response->status == 200) {
            return  $response->message;
        }
        throw new \Exception($response->message);
    }

    public static function verifyOtp(string $code)
    {
        $client =  new \GuzzleHttp\Client();

        $response = json_decode($client->request(
            'GET',
            "https://smsraw.com/api/get/otp?secret=eb1c6d3b67e4b2f006ebc05ae7b55bc681962524&otp={$code}"
        )->getBody()->getContents());

        if ($response->status == 200) {
            return  $response->message;
        }
        throw new \Exception($response->message);
    }
}
