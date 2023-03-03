<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Models\DoneTreatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DoneTreatmentsController extends Controller
{
    public function __construct()
    {
//        $this->middleware(["auth:api",'role:Super-Admin']);
//        $this->middleware('permission:Manage Charting');

    }

    public function index()
    {
    //     if ($this->authUser()->can('DoneTreatments View'))
    //     {
            return $this->allDoneTreatments();
        // }
        // return $this->customFailResponseWithPayload('Not Authorized');

    }

    public function store()
    {
        request()->validate([
            "patientId" => "required",
            "visitId" => "required",
        ]);
        $treatment_exists = DoneTreatment::where('patient_id', request()->patientId)->where('visit_id', request()->visitId)->get();
        if(count($treatment_exists) === 0):
            $doneTreatment = DoneTreatment::create([
                "patient_id" => request()->patientId,
                "tooth" => request()->tooth,
                "visit_id" => request()->visitId,
                "treatment" => request()->treatment,
                "tooth_sections" => request()->sections,
                "treatment_complete" => request()->treatmentComplete,
                "payment_status" => request()->paymentStatus,
                "treatment_price" => request()->treatmentPrice,
                "facility_id" => 1,
            ]);
            if($doneTreatment):
                return $this->get_done_treatments_by_patient();
            endif;
            return $this->customFailResponseWithPayload($doneTreatment);
        endif;
        return $this->customFailResponseWithPayload("Failed to save the treatment done.");
    }

    public function update()
    {
        request()->validate([
            "doneTreatmentId" => "required",
            "treatmentComplete" => "required",
        ]);
        $doneTreatment = DoneTreatment::where('patient_id', request()->patientId)->where('visit_id', request()->visitId)->first();
        if($doneTreatment):
            $doneTreatment->update([
                "treatment" => request()->treatment,
                "tooth_sections" => request()->sections,
                "payment_status" => request()->paymentStatus,
                "treatment_complete" => request()->treatmentComplete,
            ]);
            return $this->get_done_treatments_by_patient();
        endif;
        return $this->customFailResponseWithPayload("Failed to save the treatment done.");
    }

    private function allDoneTreatments()
    {
        return $this->customSuccessResponseWithPayload(DoneTreatment::orderBy("created_at", "desc")->get());
    }

    public function get_done_treatments_by_patient() {
        $doneTreatments = DoneTreatment::where('patient_id', request()->patientId)->orderBy("created_at", "desc")->get();
        return $this->customSuccessResponseWithPayload($doneTreatments);
    }

    public function get_last_done_treatments() {
        $doneTreatments = DoneTreatment::where('patient_id', request()->patientId)
                            ->where('visit_id', request()->visitId)
                            ->orderBy("created_at", "desc")
                            ->get();
        return $this->customSuccessResponseWithPayload($doneTreatments);
    }

    public function recent_treatments()
    {
        $recent_treatments = DoneTreatment::orderBy('created_at','desc')->get();
        return $this->customSuccessResponseWithPayload($recent_treatments);
    }
}
