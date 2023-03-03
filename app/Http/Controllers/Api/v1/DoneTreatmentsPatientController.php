<?php
namespace App\Http\Controllers\Api\v1;

use App\Models\DoneTreatment;
use App\Http\Controllers\Controller;

class DoneTreatmentsPatientController extends Controller
{

    public function __construct()
    {
//        $this->middleware("auth:patient");
    }
    public function get_done_treatments_by_patient_side()
    {

        $doneTreatments = DoneTreatment::where('patient_id', request()->patientId)
            ->orderBy("created_at", "desc")
            ->get();
        return $this->customSuccessResponseWithPayload($doneTreatments);
    }
}
