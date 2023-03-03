<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\ApiBaseController;
use App\Models\AppointmentReason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentReasonController extends BaseController
{
    public function __construct()
    {
//        $this->middleware(["auth:api",'role:Super-Admin']);
    }

    public function index()
    {
        return $this->allReasons();
    }

    public function show()
    {
        request()->validate(["reasonId" => "required"]);

        $reason = AppointmentReason::find(request()->reasonId);

        if($reason)
        {
            return $this->customSuccessResponseWithPayload($reason);
        }

        return $this->customFailResponseWithPayload("Appointment reason not found");
    }

    public function store()
    {
        request()->validate(["reason" => "required"]);

        $newReason = AppointmentReason::create([
            "reason" => request()->reason,
            "facility_id" => Auth::user()->facility_id,
        ]);

        if($newReason)
        {
            return $this->allReasons();
        }

        return $this->customFailResponseWithPayload("Appointment reason failed to create");
    }

    public function update()
    {
        request()->validate(["reasonId" => "required"]);

        $reason = AppointmentReason::find(request()->reasonId);

        if($reason)
        {
            $reason->update(["reason" => request()->reason]);

            return $this->allReasons();
        }

        return $this->customFailResponseWithPayload("Appointment reason not found");
    }

    public function destroy()
    {
        request()->validate(["reasonId" => "required"]);

        $reason = AppointmentReason::find(request()->reasonId);

        if($reason)
        {
            $reason->delete();

            return $this->allReasons();
        }

        return $this->customFailResponseWithPayload("Appointment reason not found");
    }


    private function allReasons()
    {
        return $this->customSuccessResponseWithPayload(AppointmentReason::where("facility_id", Auth::user()->facility_id)->orderBy("created_at", "desc")->get());
    }
}
