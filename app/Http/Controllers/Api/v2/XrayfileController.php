<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use App\Models\Xrayfile;

class XrayfileController extends BaseController
{
    public function __construct()
    {
//      $this->middleware('auth:api');
    }

    public function upload(Request $request){

      $validator = Validator::make($request->all(),[
        'name' => 'required',
        'xrayfile' => 'required'
      ]);

      if($validator->fails()){
        return $this->customFailResponseWithPayload($validator->errors()->all());
      } else {
        $xray = new Xrayfile;
        $xray->name = $request->name;
        $xray->description = $request->description;
        $xray->save();

        if(isset($request->xrayfile) && !empty($request->xrayfile)){
          $originalImage = Image::make($request->file('xrayfile'));

          $originalPath = storage_path('app/public/uploads/xrays/');

          $originalImage->resize(350,350);

          $originalImage->save($originalPath.time().'.png');

          if(request()->secure()){
            $xray->download_link = URL::asset('/public/storage/uploads/xrays/'.time() . '.png');
          }
          $xray->download_link = URL::asset('/public/storage/uploads/xrays/'.time() . '.png');
          $xray->save();
        }

        if($xray){
          return $this->customSuccessResponseWithPayload($xray);
        } else {
          return $this->customFailResponseWithPayload('Error Occured try again');
        }
      }
    }

    public function xray_images(){
      $all_xray_images = Xrayfile::latest();
      return $this->customSuccessResponseWithPayload($all_xray_images);
    }
}
