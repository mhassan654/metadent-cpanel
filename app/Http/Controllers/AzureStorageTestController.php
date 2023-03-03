<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AzureStorageTestController extends Controller
{
    public function fileUpload(Request $req){

try{
    $file = $req->file;
    $file_name = time() . '_' . $file->getClientOriginalName();
    upload_file($file_name, $file, 'patients');

//     upload_file($file, 'logos');

}catch(\Throwable $th){
    Log::info("error".print_r($th->getMessage(),true));
}

   }

    /**
     * @throws FileNotFoundException
     */
    public function getList($file)
    {
       return get_disk_file($file,'patients');
    }

    /**
     */
    public function deleteImage($file)
    {
        try {
           return delete_file($file,'patients');

        }catch(\Throwable $th){
            Log::info("error".print_r($th->getMessage(),true));
            return response()->json($th->getMessage());
        }
    }


}



