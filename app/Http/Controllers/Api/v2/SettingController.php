<?php

namespace App\Http\Controllers\Api\v2;

use App\Models\Setting;
use App\Models\Currency;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\ApiBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Artisan;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Services\CustomLogger\Models\LogMessage;

/**
 * For managing various systems related settings
 */
class SettingController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return $this->customSuccessResponseWithPayload(Setting::all());
    }


    /**
     * Store faciltiy configurations from here
     *
     * @param  \App\Http\Requests\StoreSettingRequest  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // dd($request);
        try {
            $settingInputArray = Arr::only($request->all(), [
                'app_name',
                'company_name',
                'facility_email',
                'facility_phone',
                'facility_from_day',
                'facility_from_time',
                'facility_address',
                'current_currency',
                'code_format',
                'max_checkin_time',
                'min_checkin_time',
                'favicon',
                'app_logo',
                'patient_string',
                'vat',
                'invoice_string',
                'lang',
                'vat_code',
                'time_zone',
                'max_login_attempts',
                'locked_account_duration_mins',
                'min_login_session_time',
                'sms_login_enabled',
                'mfa_login_enabled',
                'email_login_enabled',
                'facility_default_interval',
                'allow_password_numbers',
                'allow_password_symbols',
                'allow_password_allcases',
                'outstanding_invoice_reminder_period',
                'overdue_invoice_reminder_period',
                'truncate_price',
                'decimal_separator',
                'symbol_format',
                'system_default_currency',
                'mfa_code_expiry_minutes',
                'max_idle_minutes',
                'self_patient_registration',
                'max_timeout_idle_minutes'
            ]);

            foreach ($settingInputArray as $key => $value) {
                $setting = Setting::where('key', '=', $key)->where('facility_id', Auth::user()->facility_id)->first();
                if (is_null($setting)) {
                    $setting = new Setting();
                    $setting->key = $key;
                    $setting->value = $value;
                    $setting->facility_id = Auth::user()->facility_id;
                    $setting->save();
                }
                $setting->value = $value;
                $setting->update();

                if ($key == 'app_logo') {
                    if (is_file($value)) {
                        $file_name = time() . '_' . $value->getClientOriginalName();
                        upload_file($file_name, $value, 'logos');

                        $file = route('fetch.photo', ['file' => $file_name, 'folder' => 'logos']);
                        $setting->value = $file;
                        $setting->update();
                    }
                }

                if ($key == 'favicon') {
                    if (is_file($value)) {

                        $file_name = time() . '_' . $value->getClientOriginalName();
                        upload_file($file_name, $value, 'logos');

                        $file = route('fetch.photo', ['file' => $file_name, 'folder' => 'logos']);
                        $setting->value = $file;
                        $setting->update();
                    }
                }

            }
            cache_clear();
            return $this->customSuccessResponseWithPayload(Setting::all());
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function update(Request $request)
    {
        // dd($request);

        foreach ($request->all() as $key => $type) {
            if ($key === 'time_zone') {
            } else {
                $value = $type;
                $settings = Setting::where('key', $key)->first();
                if ($settings == null) {
                    $settings = new Setting;
                    $settings->key = $key;
                }
                if (gettype($value) == 'array') {
                    $settings->value = json_encode($value);
                } else {
                    $settings->value = $value;
                }

                $settings->save();
            }
        }

        cache_clear();

        return $this->customSuccesResponseWithPayload('Settings updated successfully!');
    }

    /**
     * batabase backup configurations settings
     *
     * @param
     * @return JsonResponse
     */
    public function dbBackSettings(Request $request)
    {

        try {
            $settingInputArray = Arr::only($request->all(), [
                'KEEP_BACKUP_FOR_DAYS',
                'KEEP_DAILY_BACKUP_FOR_DAYS',
                'KEEP_WEEKLY_BACKUPS_FOR_WEEKS',
                'KEEP_MONTHLY_BACKUPS_FOR_MONTHS',
                'KEEP_YEARS_BACKUPS_FOR_YEARS',
                'DELETE_OLDEST_BACK',
                'BACKUP_ARCHIVE_PASSWORD',
                'BACKUP_NOTIFICATION_EMAIL',
            ]);

            update_env($settingInputArray);

            return $this->BDBackup();
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return JsonResponse
     */
    public function BDBackup()
    {
        $settings = [
            'KEEP_BACKUP_FOR_DAYS' => env('KEEP_BACKUP_FOR_DAYS'),
            'KEEP_DAILY_BACKUP_FOR_DAYS' => env('KEEP_DAILY_BACKUP_FOR_DAYS'),
            'KEEP_WEEKLY_BACKUPS_FOR_WEEKS' => env('KEEP_WEEKLY_BACKUPS_FOR_WEEKS'),
            'KEEP_MONTHLY_BACKUPS_FOR_MONTHS' => env('KEEP_MONTHLY_BACKUPS_FOR_MONTHS'),
            'KEEP_YEARS_BACKUPS_FOR_YEARS' => env('KEEP_YEARS_BACKUPS_FOR_YEARS'),
            'DELETE_OLDEST_BACK' => env('DELETE_OLDEST_BACK'),
            'BACKUP_ARCHIVE_PASSWORD' => env('BACKUP_ARCHIVE_PASSWORD'),
            'BACKUP_NOTIFICATION_EMAIL' => env('BACKUP_NOTIFICATION_EMAIL'),
        ];

        return $this->customSuccessResponseWithPayload($settings);
    }

    /**
     * database backup configurations settings
     *
     * @param
     * @return JsonResponse
     */
    public function smtpSettings(Request $request)
    {

        try {
            $data = Arr::only($request->all(), [
                'MAIL_DRIVER',
                'MAIL_HOST',
                'MAIL_PORT',
                'MAIL_USERNAME',
                'MAIL_PASSWORD',
                'MAIL_ENCRYPTION',
                'MAIL_FROM_ADDRESS',
                'MAIL_FROM_NAME',
            ]);
            update_env($data);

            return $this->customSuccesResponseWithPayload('SMTP settings updated successfully!');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    /**
     * Mollie payment api gateway
     *
     * @param
     * @return JsonResponse
     */
    public function MollieConfigs(Request $request)
    {

        try {
            $data = Arr::only($request->all(), [
                'MOLLIE_CLIENT_ID',
                'MOLLIE_CLIENT_SECRET',
                'MOLLIE_REDIRECT_URI',
                'MOLLIE_WEBHOOK_URL',
                'MOLLIE_KEY'
            ]);

            update_env($data);

            return $this->customSuccesResponseWithPayload('Mollie settings updated successfully!');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return JsonResponse
     */
    public function Mollie(Setting $setting)
    {
        $settings = [
            'MOLLIE_KEY' => env('MOLLIE_KEY'),
            'MOLLIE_CLIENT_ID' => env('MOLLIE_CLIENT_ID'),
            'MOLLIE_CLIENT_SECRET' => env('MOLLIE_CLIENT_SECRET'),
            'MOLLIE_REDIRECT_URI' => env('MOLLIE_REDIRECT_URI'),
            'MOLLIE_WEBHOOK_URL' => env('MOLLIE_WEBHOOK_URL'),
        ];

        return $this->customSuccessResponseWithPayload($settings);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return Response
     */
    public function generalSettings(Setting $setting)
    {
        $settings = [
            'appName' => get_facility_setting('company_name'),
            'appLogo' => get_facility_setting('app_logo'),
            'appfavicon' => get_facility_setting('favicon'),
            'vat' => get_facility_setting('vat'),
            // 'currency' => get_facility_setting('current_currency'),
            'currency' => [
                'code' => Cache::remember('system_default_currency_symbol', 86400, function () {
                    return Currency::find(get_facility_setting('system_default_currency'))->symbol;
                }),
                'decimal_separator' => get_facility_setting('decimal_separator'),
                'symbol_format' => get_facility_setting('symbol_format'),
                'no_of_decimals' => get_facility_setting('no_of_decimals'),
                'truncate_price' => get_facility_setting('truncate_price'),
            ],
            'appLanguage' => get_facility_setting('lang'),
        ];

        return $this->customSuccessResponseWithPayload($settings);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return JsonResponse
     */
    public function SMTP(Setting $setting)
    {
        $settings = [
            'MAIL_DRIVER' => env('MAIL_DRIVER'),
            'MAIL_HOST' => env('MAIL_HOST'),
            'MAIL_PORT' => env('MAIL_PORT'),
            'MAIL_USERNAME' => env('MAIL_USERNAME'),
            'MAIL_PASSWORD' => env('MAIL_PASSWORD'),
            'MAIL_ENCRYPTION' => env('MAIL_ENCRYPTION'),
            'MAIL_FROM_ADDRESS' => env('MAIL_FROM_ADDRESS'),
            'MAIL_FROM_NAME' => env('MAIL_FROM_NAME'),
        ];

        return $this->customSuccessResponseWithPayload($settings);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return JsonResponse
     */
    public function azure()
    {
        $settings = [
            'AZURE_STORAGE_NAME' => env('AZURE_STORAGE_NAME'),
            'AZURE_STORAGE_KEY' => env('AZURE_STORAGE_KEY'),
            'AZURE_STORAGE_URL' => env('AZURE_STORAGE_URL'),
            'AZURE_STORAGE_CONNECTION_STRING' => env('AZURE_STORAGE_CONNECTION_STRING')
        ];

        return $this->customSuccessResponseWithPayload($settings);
    }

    public function languageCode()
    {
        $language_code = get_facility_setting('lang');
        return $this->customSuccessResponseWithPayload($language_code);
    }

    /**
     *
     * @param string $type
     * @param string $val
     * @return void
     */
    public function envOverwriteNoString(string $type, string $val): void
    {
        $path = app()->environmentFilePath();
        if (is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0) {
            file_put_contents(
                $path,
                str_replace(
                    $type . '=' . env($type), $type . '=' . $val,
                    file_get_contents($path)
                )
            );
        } else {
            file_put_contents($path, file_get_contents($path) . "\r\n" . $type . '=' . $val);
        }
    }

    /**
     * @param string $path
     * @param string $type
     * @param string $val
     * @return void
     */
    public function envOverwriteWithString(string $type, string $val): void
    {
        $path = app()->environmentFilePath();
        if (is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0) {
            file_put_contents(
                $path,
                str_replace(
                    $type . '=' . env($type), $type . '=' . $val,
                    file_get_contents($path)
                )
            );
        } else {
            file_put_contents($path, file_get_contents($path) . "\r\n" . $type . '=' . $val);
        }
    }


    public function errorLogs()
    {
        $logs = LogMessage::latest()->get();
        return $this->customSuccessResponseWithPayload($logs);
    }

    public function updateLogChannel()
    {
        try {

            $data = Arr::only(request()->all(), [
                'LOG_CHANNEL'
            ]);

            update_env($data);

            return $this->customSuccessResponseWithPayload('Log Successfully Updated');

        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }

    }

}
