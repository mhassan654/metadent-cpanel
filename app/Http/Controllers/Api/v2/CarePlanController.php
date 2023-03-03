<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Models\CarePlan;
use Illuminate\Http\Request;

class CarePlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->customSuccessResponseWithPayload(
            CarePlan::orderBy("created_at", "desc")->get()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        request()->validate([
            "appointment_id" => "required",
            "patient_id" => "required",
        ]);

        try {
            $care_plan = CarePlan::create([
                'patient_id' => request()->patient_id,
                'appointment_id' => request()->appointment_id,
                'long_term_goal_one' => request()->long_term_goal_one,
                'goal_period' => request()->goal_period,
                'long_term_goal_two' => request()->long_term_goal_two,
                'caries_risk' => request()->caries_risk,
                'bitewing_interval' => request()->bitewing_interval,
                'caries_risk_explanation' => request()->caries_risk_explanation,
                'periodontal_risk' => request()->periodontal_risk,
                'periodontal_risk_explanation' => request()->periodontal_risk_explanation,
                'wear_risk' => request()->wear_risk,
                'wear_risk_explanation' => request()->wear_risk_explanation,
                'soft_tissue_risk' => request()->soft_tissue_risk,
                'soft_tissue_risk_explanation' => request()->soft_tissue_risk_explanation,
                'medical_risk' => request()->medical_risk,
                'medical_risk_explanation' => request()->medical_risk_explanation,
                'mouth_hygiene_risk' => request()->mouth_hygiene_risk,
                'mouth_hygiene_risk_explanation' => request()->mouth_hygiene_risk_explanation,
                'pps_score' => request()->pps_score,
                'bleeding_index' => request()->bleeding_index,
                'plaque_index' => request()->plaque_index,
                'pps_number' => request()->pps_number,
                'plaque_index_parcentage' => request()->plaque_index_parcentage,
                'bleeding_index_percentage' => request()->bleeding_index_percentage,
                'pps_number_date' => request()->pps_number_date,
                'plaque_index_date' => request()->plaque_index_date,
                'bleeding_index_date' => request()->bleeding_index_date,
                'created_by' => request()->created_by,
            ]);

            return $this->get_care_plans_by_patient();

        } catch (\Throwable $th) {

            return $this->customFailResponseWithPayload("Failed to record done procedure");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarePlan  $CarePlan
     * @return \Illuminate\Http\Response
     */
    public function show(CarePlan $CarePlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\CarePlan  $CarePlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            "patient_id" => "required",
        ]);

        $care_plan = CarePlan::find($id);

        try {
            $care_plan->update([
                'patient_id' => request()->patient_id,
                'appointment_id' => request()->appointment_id,
                'long_term_goal_one' => request()->long_term_goal_one,
                'goal_period' => request()->goal_period,
                'long_term_goal_two' => request()->long_term_goal_two,
                'caries_risk' => request()->caries_risk,
                'bitewing_interval' => request()->bitewing_interval,
                'caries_risk_explanation' => request()->caries_risk_explanation,
                'periodontal_risk' => request()->periodontal_risk,
                'periodontal_risk_explanation' => request()->periodontal_risk_explanation,
                'wear_risk' => request()->wear_risk,
                'wear_risk_explanation' => request()->wear_risk_explanation,
                'soft_tissue_risk' => request()->soft_tissue_risk,
                'soft_tissue_risk_explanation' => request()->soft_tissue_risk_explanation,
                'medical_risk' => request()->medical_risk,
                'medical_risk_explanation' => request()->medical_risk_explanation,
                'mouth_hygiene_risk' => request()->mouth_hygiene_risk,
                'mouth_hygiene_risk_explanation' => request()->mouth_hygiene_risk_explanation,
                'pps_score' => request()->pps_score,
                'bleeding_index' => request()->bleeding_index,
                'plaque_index' => request()->plaque_index,
                'pps_number' => request()->pps_number,
                'plaque_index_parcentage' => request()->plaque_index_parcentage,
                'bleeding_index_percentage' => request()->bleeding_index_percentage,
                'pps_number_date' => request()->pps_number_date,
                'plaque_index_date' => request()->plaque_index_date,
                'bleeding_index_date' => request()->bleeding_index_date,
                'created_by' => 4,
            ]);

            return $this->get_care_plans_by_patient();

        } catch (\Throwable $th) {

            return $this->customFailResponseWithPayload("Failed to record done procedure");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarePlan  $CarePlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarePlan $CarePlan)
    {
        //
    }

    public function get_care_plans_by_patient() {
        return $this->customSuccessResponseWithPayload(CarePlan::where('patient_id', request()->patient_id)->orderBy("created_at", "desc")->get());
    }
}
