<?php

namespace App\Helpers;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class BackupClass
{
    /**
     *  Database backup configurations helper function
     */

    public static function backupConfig($key, $default = null)
    {

        $settings = Cache::remember('facility_settings', 86400, function () {
            return Setting::all();
        });

        $setting = $settings->where('key', $key)->first();
        $setting = !$setting ? $settings->where('key', $key)->first() : $setting;
        return $setting == null ? $default : $setting->value;
    }

}
