<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\EndondoticTreatmentResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EndondoticTreatmentResultController extends Controller
{
    public function __construct()
    {
//        $this->middleware("auth:api");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            "patientId" => "required",
            "appointmentId" => "required",
        ]);

        $exists = EndondoticTreatmentResult::where('appointment_id', $request->appointmentId)
            ->where('tooth_number', $request->toothNumber)
            ->first();

        if (is_null($exists)):
            $doneTreatment = EndondoticTreatmentResult::create([
                "patient_id" => $request->patientId,
                "tooth_number" => $request->toothNumber,
                "appointment_id" => $request->appointmentId,
                "treatment_id" => $request->treatmentId,
                "treatment_results" => $request->treatmentResults,
                "treatment_price" => $request->treatmentPrice,
                "created_by" => Auth::user()->id,
            ]);
            if($doneTreatment):
                return $this->latest_endodontic_treatment();
            endif;
        else:
            $exists->update([
                "tooth_number" => $request->toothNumber,
                "treatment_id" => $request->treatmentId,
                "treatment_results" => $request->treatmentResults,
                "treatment_price" => $request->treatmentPrice,
            ]);
        endif;

        return $this->customFailResponseWithPayload("Failed to record done procedure");
    }

    /**
     * Display the specified resource.
     *
     * @param  $tooth_number
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($toothNumber)
    {
        return $this->customSuccessResponseWithPayload(
            EndondoticTreatmentResult::where('tooth_number', $toothNumber)
                ->with('treatment')
                ->get()
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EndondoticTreatmentResult  $endondoticTreatmentResult
     * @return \Illuminate\Http\Response
     */
    public function edit(EndondoticTreatmentResult $endondoticTreatmentResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EndondoticTreatmentResult  $endondoticTreatmentResult
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            "patientId" => "required",
            "appointmentId" => "required",
        ]);

        $doneTreatment = EndondoticTreatmentResult::find($request->resultId);

        if($doneTreatment)
        {
            $doneTreatment->update([
                "tooth_number" => $request->toothNumber,
                "appointment_id" => $request->appointmentId,
                "treatment_id" => $request->treatmentId,
                "treatment_results" => $request->treatmentResults,
                "treatment_price" => $request->treatmentPrice,
            ]);

            return $this->latest_endodontic_treatment();
        }

        return $this->customFailResponseWithPayload("Failed to record done procedure");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EndondoticTreatmentResult  $endondoticTreatmentResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(EndondoticTreatmentResult $endondoticTreatmentResult)
    {
        //
    }
    public function all()
    {
        return $this->customSuccessResponseWithPayload(
            EndondoticTreatmentResult::where('patient_id', request()->patientId)->get()
        );
    }
    public function archive() {

    }

    public function latest_endodontic_treatment()
    {
        return $this->customSuccessResponseWithPayload(
            // DB::table('endondotic_treatment_results')->latest('updated_at')->first()
            EndondoticTreatmentResult::where('patient_id', request()->patientId)->get()
        );
    }
}
