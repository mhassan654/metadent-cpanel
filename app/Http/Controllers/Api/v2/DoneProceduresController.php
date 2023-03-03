<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Models\DoneProcedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoneProceduresController extends Controller
{
    public function __construct()
    {
//        $this->middleware(["auth:api",'role:Super-Admin']);
//        $this->middleware('permission:Manage Charting');
    }

    public function index()
    {
            return $this->allDoneProcedures();
    }

    public function store()
    {
            request()->validate([
                "patientId" => "required",
                "visitId" => "required",
                "procedure" => "required",
                "complete" => "required",
                "procedurePrice" => "required",
            ]);

            $doneProcedure = DoneProcedure::create([
                "patient_id" => request()->patientId,
                "visit_id" => request()->visitId,
                "procedure" => request()->procedure,
                "complete" => request()->complete,
                "procedure_price" => request()->procedurePrice,
                "facility_id" =>1,
            ]);

            if($doneProcedure)
            {
                return $this->allDoneProcedures();
            }

            return $this->customFailResponseWithPayload("Failed to record done procedure");
    }

    public function update()
    {
            request()->validate([
                "doneProcedureId" => "required",
                "complete" => "required",
            ]);

            $doneProcedure = DoneProcedure::find(request()->doneProcedureId);

            if($doneProcedure)
            {
                $doneProcedure->update([
                    "complete" => request()->complete,
                ]);

                return $this->allDoneProcedures();
            }

            return $this->customFailResponseWithPayload("Failed to record done procedure");

    }

    private function allDoneProcedures()
    {
        return $this->customSuccessResponseWithPayload(DoneProcedure::orderBy("created_at", "desc")->get());
    }
}
