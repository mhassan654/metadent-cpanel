<?php

namespace App\Modules\Common;

use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class Helper
{
    public static function nullStringToInt($str) : ?int
    {
        if ($str !== null) {
            return (int)$str;
        }

        return null;
    }

    public static function custom_validator($data, $rules, $custom_errors = [])
    {
        $validator = Validator::make($data, $rules, $custom_errors);

        if ($validator->fails()) {
            $error = implode(',', $validator->errors()->all());

            throw new Exception($error, 101);
        }
    }

    public static function upload_file($file, $folder_path = COMMON_FILE_PATH)
    {
        $file_url = "";

        $file_name = self::file_name();

        $ext = $file->extension();

        $local_url = $file_name . "." . $ext;

        $final_folder_path = public_path($folder_path);

        if (!File::isDirectory($final_folder_path)) {
            File::makeDirectory($final_folder_path, 0777, true, true);
        }

        $file->move($final_folder_path, $local_url);

        $file_url = url('/') . $folder_path . $local_url;

        return $file_url;
    }

    public static function file_name()
    {
        $file_name = time();
        $file_name .= rand();
        $file_name = sha1($file_name);

        return $file_name;
    }

    public static function delete_file($picture, $path = COMMON_FILE_PATH)
    {
        if (file_exists(public_path() . $path . basename($picture))) {
            File::delete(public_path() . $path . basename($picture));
        } else {
            return false;
        }

        return true;
    }

}
