<?php
//Created by Mulindwa Denis

namespace App\Http\Controllers\Api\v2;

use Illuminate\Http\Request;
use App\Models\ToggleSettings;
use App\Http\Controllers\ApiBaseController;
use Illuminate\Support\Facades\Validator;

class ToggleController extends BaseController {

    public function __construct()
    {
//        $this->middleware('auth:api');
    }

    public function index()
    {
        try {
            return $this->customSuccessResponseWithPayload(ToggleSettings::all());
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function update()
    {
        try {
            $validator = Validator::make(request()->all(),[
                'user_reg' => 'boolean',
                'patient_reg' => 'boolean'
            ]);
            if($validator->fails()){
                return $this->customFailResponseWithPayload($validator->errors()->all());
            } else {
                $user = ToggleSettings::where('name','Users')->first();
                $user->status = request()->user_reg;
                $user->update();

                $patient = ToggleSettings::where('name','Patients')->first();
                $patient->status = request()->patient_reg;
                $patient->update();

                return $this->customSuccessResponseWithPayload('SUccess');
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

}
