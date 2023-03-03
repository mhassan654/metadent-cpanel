<?php

namespace App\Http\Controllers\Api\v2;

use Exception;
use Illuminate\Http\Request;
use App\zorgmailService\zorgCurl;
use App\Http\Controllers\ApiBaseController;
use Illuminate\Support\Arr;
use App\Models\Setting;

class ZorgController extends BaseController
{
    private $zorgservice;
    public function __construct(zorgCurl $zorgservice)
    {
        $this->zorgservice = $zorgservice;
    }

    public function openzorg()
    {
        // return 2000;
        try {
            $name = "ssekimuli andrew";
            $subj = "communicate with other health provider";
            $email = "metadentb.v@zorgmail.nl";
            $details = [
                'from_details' => $name,
                'subject' => $subj,
                'email' => $email,
                'under_category' => "customer care",
                'MentaDent' => 'Thank you from mentadent.com',
            ];
            $this->zorgservice->zorglist($details);
            return $this->customSuccessResponseWithPayload('email send successfull');

        } catch (Exception $ex) {
            return $this->customFailResponseWithPayload($ex->getMessage());
        }

    }

    public function save_zorg_mail_settings()
    {
        try {
            $zorg_mail_settings = Arr::only(request()->all(), [
                'ZORG_MAIL_USERNAME',
                'ZORG_MAIL_PASSWORD',
                'ZORG_MAIL_FROM_ADDRESS'
            ]);
            update_env($zorg_mail_settings);
            return $this->customSuccessResponseWithPayload('Setting Saved');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function save_zorgmail_imap_settings()
    {
        try {
            $zorg_mail_imap_settings = Arr::only(request()->all(), [
                'zorg_mail_imap_server',
                'zorg_mail_imap_username',
                'zorg_mail_imap_password'
            ]);
            foreach ($zorg_mail_imap_settings as $key => $value) {
                Setting::updateOrCreate(['key' => $key], ['value' => $value]);
            }
            cache_clear();
            return $this->customSuccessResponseWithPayload("Settings Saved");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function save_general_imap_settings()
    {
        try {
            $general_imap_settings = Arr::only(request()->all(), [
                'general_imap_server',
                'general_imap_username',
                'general_imap_password'
            ]);
            foreach ($general_imap_settings as $key => $value) {
                Setting::updateOrCreate(['key' => $key], ['value' => $value]);
            }
            cache_clear();
            return $this->customSuccessResponseWithPayload("Settings Saved");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function zorg_mail_address_book_credentials()
    {
        try {
            $user = request()->userName;
            $password = request()->password;
            $address_token = base64_encode("$user:$password");
            $address_user = Setting::firstOrNew(array('key' => 'zorg_mail_address_book_user'));
            $address_user->value = $user;
            $address_user->save();
            $address_password = Setting::firstOrNew(array('key' => 'zorg_mail_address_book_password'));
            $address_password->value = $password;
            $address_password->save();
            $token = Setting::firstOrNew(array('key' => 'zorg_mail_address_book_token'));
            $token->value = $address_token;
            $token->save();
            cache_clear();
            return $this->customSuccessResponseWithPayload("Successfully Saved");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function get_zorg_mail_settings()
    {
        try {
            $zorg_mail_settings = [
                "generalImapServer" => get_facility_setting("general_imap_server"),
                "generalImapUserName" => get_facility_setting("general_imap_username"),
                "zorgMailAddressBookUser" => get_facility_setting("zorg_mail_address_book_user"),
                "zorgMailImapServer" => get_facility_setting("zorg_mail_imap_server"),
                "zorgMailImapUsername" => get_facility_setting("zorg_mail_imap_username"),
                "zorgMailUsername" => env('ZORG_MAIL_USERNAME'),
                "zorgMailFromAddress" => env("ZORG_MAIL_FROM_ADDRESS")
            ];
            return $this->customSuccessResponseWithPayload($zorg_mail_settings);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }


}
