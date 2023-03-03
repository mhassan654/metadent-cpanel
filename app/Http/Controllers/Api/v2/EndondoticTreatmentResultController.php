<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiBaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\EndondoticTreatmentResult;
use Illuminate\Support\Facades\Validator;

class EndondoticTreatmentResultController extends Controller
{
    public function __construct()
    {
        // $this->middleware(["auth:api",'role:Charting Manager']);
//       $this->middleware(['role:Super-Admin']);
//       $this->middleware('permission:Manage Charting');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->allPatientEndodonticTreatments();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request -> all(),[
            "patientId" => "required",
            "appointmentId" => "required",
        ]);

        if ($validator -> fails()){
            $errors = $validator -> errors();
            return response() -> json($errors -> all(),500);
        }

        $exists = EndondoticTreatmentResult::where('appointment_id', $request->appointmentId)
            ->where('treatment_id', $request->treatmentId)
            ->where('tooth_number', $request->toothNumber)
            ->get();

        if ($exists):
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
            $this->update($request);
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
                ->groupBy('treatment_id')
                ->get()
//            DB::table('endondotic_treatment_results')
//                ->select('*')
//                ->groupBy('treatment_id')
//                ->where('tooth_number', $toothNumber)
//                ->get()
        );
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
    private function allPatientEndodonticTreatments()
    {
        return $this->customSuccessResponseWithPayload(
            EndondoticTreatmentResult::all()
        );
    }
    private function latest_endodontic_treatment()
    {
        return $this->customSuccessResponseWithPayload(
            DB::table('endondotic_treatment_results')->latest('updated_at')->first()
        );
    }
}
