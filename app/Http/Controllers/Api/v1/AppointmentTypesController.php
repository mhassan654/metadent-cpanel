<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\AppointmentType;
use Illuminate\Support\Facades\Auth;

class AppointmentTypesController extends Controller
{
    public function __construct()
    {
//        $this->middleware("auth:api");
    }

    public function index()
    {
        return $this->allTypes();
    }

    public function show()
    {
        request()->validate(["typeId" => "required"]);

        $type = AppointmentType::find(request()->typeId);

        if($type)
        {
            return $this->customSuccessResponseWithPayload($type);
        }

        return $this->customFailResponseWithPayload("Appointment type not found");
    }

    public function store()
    {
        request()->validate(["type" => "required"]);

        $type = AppointmentType::create([
            "type" => request()->type,
            "facility_id" => Auth::user()->facility_id,
        ]);

        if($type)
        {
            return $this->allTypes();
        }

        return $this->customFailResponseWithPayload("Appointment type failed to create");
    }

    public function update()
    {
        request()->validate(["typeId" => "required"]);

        $type = AppointmentType::find(request()->typeId);

        if($type)
        {
            $type->update(["type" => request()->typeId]);

            return $this->allTypes();
        }

        return $this->customFailResponseWithPayload("Appointment type not found");
    }

    public function destroy()
    {
        request()->validate(["typeId" => "required"]);

        $type = AppointmentType::find(request()->typeId);

        if($type)
        {
            $type->delete();

            return $this->allTypes();
        }

        return $this->customFailResponseWithPayload("Appointment type not found");
    }


    private function allTypes()
    {
        return $this->customSuccessResponseWithPayload(AppointmentType::where("facility_id", Auth::user()->facility_id)->orderBy("created_at", "desc")->get());
    }
}
