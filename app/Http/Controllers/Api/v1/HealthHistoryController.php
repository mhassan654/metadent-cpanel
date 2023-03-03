<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\HealthHistory;
use Illuminate\Support\Facades\Auth;

class HealthHistoryController extends Controller
{
    public function __construct()
    {
//        $this->middleware("auth:api");
    }

    public function index()
    {
        return $this->customSuccessResponseWithPayload(HealthHistory::where("facility_id", Auth::user()->facility_id));
    }


    public function store()
    {
        request()->validate(["patientId" => "required"]);

        $history = HealthHistory::create([
            "patient_id" => request()->patientId,
            "facility_id" => Auth::user()->facility_id,
            "history" => request()->healthHistory,
        ]);
    }

    public function update()
    {
        request()->validate([
            "patientId",
            "facilityId",
        ]);

        $history = HealthHistory::where("facility_id", Auth::user()->facility_id)->where("patient_id", request()->patientId)->first();

        if($history)
        {
            $history->update(["history" => request()->healthHistory]);

            $this->customSuccessResponseWithPayload(HealthHistory::where("facility_id", Auth::user()->facility_id)->where("patient_id", request()->patientId)->first());
        }

        return $this->customFailResponseWithPayload("Patient does not have health history");
    }
}
