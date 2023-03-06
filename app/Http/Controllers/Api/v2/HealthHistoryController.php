<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Models\HealthHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HealthHistoryController extends ApiBaseController
{
    public function __construct()
    {
//        $this->middleware(["auth:api", 'role:Super-Admin']);
//        $this->middleware('permission:role-create', ['only' => ['create','store']]);
//        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
//        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        if ($this->authUser()->hasRole('Charting'))
        {
            return $this->customSuccessResponseWithPayload(HealthHistory::where("facility_id", 1));
        }
        return $this->customFailResponseWithPayload('Permission denied');

    }


    public function store()
    {
        if ($this->authUser()->hasRole('Charting')) {
//            request()->validate(["patientId" => "required"]);
            $validator = Validator::make(request() -> all(),[
                "patientId" => "required"
            ]);

            if ($validator -> fails()){
                $errors = $validator -> errors();
                return response() -> json($errors -> all(),500);
            }

            $history = HealthHistory::create([
                "patient_id" => request()->patientId,
                "facility_id" => Auth::user()->facility_id,
                "history" => request()->healthHistory,
            ]);
        }
        return $this->customFailResponseWithPayload('Permission denied');
    }

    public function update()
    {
        if ($this->authUser()->hasRole('Charting')) {
//            request()->validate([
//                "patientId",
//                "facilityId",
//            ]);

            $validator = Validator::make(request() -> all(),[
                "patientId",
                "facilityId",
            ]);

            if ($validator -> fails()){
                $errors = $validator -> errors();
                return response() -> json($errors -> all(),500);
            }

            $history = HealthHistory::where("facility_id", Auth::user()->facility_id)->where("patient_id", request()->patientId)->first();

            if ($history) {
                $history->update(["history" => request()->healthHistory]);

                $this->customSuccessResponseWithPayload(HealthHistory::where("patient_id", request()->patientId)->first());
            }

            return $this->customFailResponseWithPayload("Patient does not have health history");
        }
        return $this->customFailResponseWithPayload('Permission denied');
    }
}
