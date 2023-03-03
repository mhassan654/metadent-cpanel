<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::truncate();

        $userfacilityId = session('facility_id', 1);
        // $userfacilityId = session('facility_id', null);

        Setting::create([
            'key' => 'app_name',
            'value' => 'MetaDent',
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'lang',
            'value' => 'nl',
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'app_logo',
            'value' => null,
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'company_name',
            'value' => 'Projectcode',
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'current_currency',
            'value' => 'nl',
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'facility_address',
            'value' => '16/A saint Joseph Park',
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'facility_email',
            'value' => 'cityfacility@gmail.com',
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'facility_phone',
            'value' => '+919876543210',
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'facility_from_day',
            'value' => 'Mon to Fri',
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'facility_from_time',
            'value' => '9 AM to 9 PM',
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'code_format',
            'value' => 'MDT',
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'max_checkin_time',
            'value' => 30,
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'min_checkin_time',
            'value' => 5,
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'favicon',
            'value' => null,
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'vat',
            'value' => 8,
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'patient_string',
            'value' => 'MDT',
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'invoice_string',
            'value' => 'MDT',
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'vat_code',
            'value' => 'VAT',
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'time_zone',
            'value' => 'Europe/Amsterdam',
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'agb',
            'value' => 45657890,
            'facility_id' => $userfacilityId != null ? $userfacilityId : null,
        ]);
        Setting::create([
            'key' => 'max_login_attempts',
            'value' => 3,
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'locked_account_duration_mins',
            'value' => 2,
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'min_login_session_time',
            'value' => 50,
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'max_login_session_time_hrs',
            'value' => 5,
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'sms_login_enabled',
            'value' => YES,
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'mfa_login_enabled',
            'value' => YES,
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'email_login_enabled',
            'value' => YES,
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'zorg_mail_imap_server',
            'value' => 'mail.zorgmail.nl:993/imap/ssl',
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'zorg_mail_imap_username',
            'value' => '500157865',
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'zorg_mail_imap_password',
            'value' => 'yf72m-tqykg-46zyf-3c3jh-4spkd',
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'general_imap_server',
            'value' => 'outlook.office365.com',
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'general_imap_user_name',
            'value' => 'metadentinf4@outlook.com',
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'general_imap_password',
            'value' => '@@general321c',
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'zorg_mail_address_book_user',
            'value' => 500157865,
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'zorg_mail_address_book_password',
            'value' => '73P5f3749J3wDRJ3',
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'zorg_mail_address_book_token',
            'value' => 'NTAwMTU3ODY1OjczUDVmMzc0OUozd0RSSjM=',
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'mfa_code_expiry_minutes',
            'value' => 15,
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'max_idle_minutes',
            'value' => 30,
            'facility_id' => $userfacilityId,
        ]);

        Setting::create([
            'key' => 'max_timeout_idle_minutes',
            'value' => 5,
            'facility_id' => $userfacilityId,
        ]);


        Setting::create([
            'key' => 'self_patient_registration',
            'value' => YES,
            'facility_id' => $userfacilityId,
        ]);

    }
}