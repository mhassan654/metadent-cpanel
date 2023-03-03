<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Procedures;
use Illuminate\Support\Facades\Auth;

class ProcedureController extends Controller
{
    public function __construct()
    {
//        $this->middleware("auth:api");
    }


    public function index()
    {
        return $this->customSuccessResponseWithPayload(Procedures::where("facility_id", Auth::user()->facility_id)->orderBy("created_at", "desc")->get());
    }


    public function show()
    {
        request()->validate(["procedureId" => "required"]);

        $procedure = Procedures::find(request()->procedureId);

        if($procedure)
        {
            return $this->customSuccessResponseWithPayload($procedure);
        }

        return $this->customFailResponseWithPayload("Procedure does not exist");
    }


    public function store()
    {
        request()->validate([
            "procedure" => "required",
            "code" => "required",
            "price" => "required",
        ]);

        $newProcedure = Procedures::create([
            "procedure" => request()->procedure,
            "code" => request()->code,
            "price" => request()->price,
            "facility_id" => Auth::user()->facility_id,
        ]);

        if($newProcedure)
        {
            return $this->customSuccessResponseWithPayload(Procedures::where("facility_id", Auth::user()->facility_id)->orderBy("created_at", "desc")->get());
        }

        return $this->customFailResponseWithPayload("Procedure was not created");
    }


    public function update()
    {
        request()->validate(["procedureId" => "required"]);

        $procedure = Procedures::find(request()->procedureId);

        if($procedure)
        {
            $procedure->update([
                "procedure" => request()->procedure,
                "code" => request()->code,
                "price" => request()->price,
            ]);

            return $this->customSuccessResponseWithPayload(Procedures::where("facility_id", Auth::user()->facility_id)->orderBy("created_at", "desc")->get());
        }

        return $this->customFailResponseWithPayload("Procedure was not update");
    }


    public function destroy()
    {
        request()->validate(["procedureId" => "required"]);

        $procedure = Procedures::find(request()->procedureId);

        if($procedure)
        {
            $procedure->delete();

            return $this->customSuccessResponseWithPayload(Procedures::where("facility_id", Auth::user()->facility_id)->orderBy("created_at", "desc")->get());
        }

        return $this->customFailResponseWithPayload("Procedure was not found");
    }
}
