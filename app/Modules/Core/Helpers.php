<?php
/**
 **Created by MUWONGE HASSAN on 31/01/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

use App\Models\BusinessSetting;
use App\Models\Setting;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

//helper function for uploading files to storage disks
if(!function_exists('upload_file')){

    function upload_file($name,$file,$folder=null ): void
    {
        $file->storeAs("$folder", $name, 'azure');
    }
}


//function to return specific file from disk storageg
if(!function_exists('get_disk_file')){
    function get_disk_file($file, $folder=null)
    {

        $filename = "$file";
        $disk = Storage::disk('azure');

        if (!$disk->exists("$folder/" .$filename))
        {
            return response()->json('');

        }

        $contents = $disk->get("$folder/".$filename);
        // dd($contents);

        return response($contents)->header('content-type', 'image/jpeg');
    }
}
//function to delete specific file from disk storage
if(!function_exists('delete_file')){
    /**
     */
    function delete_file($file, $folder): JsonResponse
    {
        $filename = "$file";

        $disk = Storage::disk('azure');

        if (!$disk->exists("$folder/" .$filename))
        {
            return response()->json('Image does not exist or was delete');
        }

        $contents = $disk->delete("$folder/".$filename);
        return response()->json('successfully delete');
    }
}
if(!function_exists('update_file')) {
    function update_file($old_file,$file_name,$file,$folder=null){
        if(!$folder) $file_path = $old_file;
        else $file_path = "$folder/$old_file";
        $disk = Storage::disk('azure');
        if($disk->exists($file_path)) $disk->delete($file_path);
        return upload_file($file_name,$file,$folder);

    }
}

if (!function_exists('get_setting')) {
    function get_setting($key, $default = null)
    {
        $settings = Cache::remember('business_settings', 86400, function () {
            return BusinessSetting::all();
        });

        $setting = $settings->where('type', $key)->first();
        $setting = !$setting ? $settings->where('type', $key)->first() : $setting;
        return $setting == null ? $default : $setting->value;
    }
}

if (!function_exists('get_facility_setting')) {
    function get_facility_setting($key, $default = null)
    {

        $settings = Cache::remember('facility_settings', 1000, function () {
            return Setting::all();
        });

        $setting = $settings->where('key', $key)->first();
        $setting = !$setting ? $settings->where('key', $key)->first() : $setting;
        return $setting == null ? $default : $setting->value;
    }
}

if (!function_exists('get_facility_setting_patient_portal')) {
    function get_facility_setting_patient_portal($key, $default = null)
    {

        $settings = Cache::remember('facility_settings', 86400, function () {
            return Setting::where('facility_id', Auth::guard('patient')->user()->facility_id)->first();
        });

        $setting = $settings->where('key', $key)->first();
        $setting = !$setting ? $settings->where('key', $key)->first() : $setting;
        return $setting == null ? $default : $setting->value;
    }
}

if(!function_exists('update_env_variables')) {
    function update_env_variables($key, $value) {

        $path = app()->environmentFilePath();
        $escaped = preg_quote('='.env($key),'/');
        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
            "{$key}={$value}",
            file_get_contents($path)
        ));
    }
}

/**
 * @param $number
 *
 * @return string|string[]
 */
function removeCommaFromNumbers($number)
{
    return (gettype($number) === 'string' && !empty($number)) ? str_replace(',', '', $number) : $number;
}

function routefreestring($string)
{

    $string = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $string));

    $search = [' ', '&', '%', "?", '=', '{', '}', '$'];

    $replace = ['-', '-', '-', '-', '-', '-', '-', '-'];

    $string = str_replace($search, $replace, $string);

    return $string;

}

if (!function_exists('cache_clear')) {
    function cache_clear()
    {
        Artisan::call('cache:clear');
        Artisan::call('optimize:clear');
    }
}

/**
 * overWrite the Env File values.
 * @param array $data
 */

if (!function_exists('update_env')) {
    function update_env( $data = [] ) : void
    {

        $path = base_path('.env');

        if (file_exists($path)) {
            foreach ($data as $type => $val) {
                $val = '"' . trim($val) . '"';
                if (is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0) {
                    file_put_contents(
                        $path,
                        str_replace(
                            $type . '="' . env($type) . '"', $type . '=' . $val,
                            file_get_contents($path)
                        )
                    );
                } else {

                    file_put_contents($path, file_get_contents($path) . "\r\n" . $type . '=' . $val);
                }
            }
        }

    }
}

if(!function_exists('generate_random_string')){
    function generate_random_string(){
        $characters = '0123456789ABCDEFG';
        $length = strlen($characters);
        $random_str = '';
        for($i = 0; $i < 15; $i++){
            $random_str .= $characters[rand(0, $length-1)];
        }
        return $random_str;
    }
}

