<?php

namespace App\Http\Controllers\Api\v2;

use App\Modules\Common\Helper;
use Auth;
use App\Models\TreatmentPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiBaseController;
use App\Http\Resources\TreatmentPlanResource;

class TreatmentPlanController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->customSuccessResponseWithPayload(
            TreatmentPlan::orderBy("created_at", "desc")->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            "patient_id" => "required",
        ]);

        $phase_number_array = $treatment_code_array = $tooth_element_array = array();
        $treatment_description_array = $treatment_amount_array = $appointments = array();
        $planned_data = $request->plan_data;

        foreach ($planned_data as $key => $value) {
            array_push($appointments, '0');
            array_push($phase_number_array, $planned_data[$key]['phase_number']);
            array_push($treatment_code_array, $planned_data[$key]['treatment_code']);
            array_push($tooth_element_array, $planned_data[$key]['tooth_element']);
            array_push($treatment_description_array, $planned_data[$key]['treatment_description']);
            array_push($treatment_amount_array, $planned_data[$key]['treatment_amount']);
        }
        try {
            $treatment_plan = TreatmentPlan::create([
                'patient_id' => request()->patient_id,
                'main_description' => request()->main_description,
                'phase_number' => implode(',', $phase_number_array),
                'tooth' => implode(',', $tooth_element_array),
                'appointments' => implode(',', $appointments),
                'treatment_ids' => request()->treatment_ids,
                'treatment_codes' => implode(',', $treatment_code_array),
                'treatment_amounts' => implode(',', $treatment_amount_array),
                'treatment_descriptions' => implode(',', $treatment_description_array),
                'save_type' => request()->save_type,
                'status' => request()->status,
                'created_by' => Auth::id(),
            ]);

            return $this->get_treatment_plans_by_patient();
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload("Failed to record done procedure");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TreatmentPlan  $treatmentPlan
     * @return \Illuminate\Http\Response
     */
    public function show(TreatmentPlan $treatmentPlan)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TreatmentPlan  $treatmentPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            "patient_id" => "required",
        ]);

        $phase_number_array = $treatment_code_array = $tooth_element_array = array();
        $treatment_description_array = $treatment_amount_array = $appointments = array();

        $planned_data = $request->plan_data;

        foreach ($planned_data as $key => $value) {
            array_push($appointments, $planned_data[$key]['appointment']);
            array_push($phase_number_array, $planned_data[$key]['phase_number']);
            array_push($treatment_code_array, $planned_data[$key]['treatment_code']);
            array_push($tooth_element_array, $planned_data[$key]['tooth_element']);
            array_push($treatment_description_array, $planned_data[$key]['treatment_description']);
            array_push($treatment_amount_array, $planned_data[$key]['treatment_amount']);
        }
        $treatment_plan = TreatmentPlan::find($id);
        try {
            $treatment_plan->update([
                'patient_id' => request()->patient_id,
                'main_description' => request()->main_description,
                'phase_number' => implode(',', $phase_number_array),
                'tooth' => implode(',', $tooth_element_array),
                'appointments' => implode(',', $appointments),
                'treatment_ids' => request()->treatment_ids,
                'treatment_codes' => implode(',', $treatment_code_array),
                'treatment_amounts' => implode(',', $treatment_amount_array),
                'treatment_descriptions' => implode(',', $treatment_description_array),
                'save_type' => request()->save_type,
                'status' => request()->status,
                'created_by' => Auth::id(),
            ]);
            return $this->get_treatment_plans_by_patient();
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload("Failed to record done procedure");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TreatmentPlan  $treatmentPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $treatment_plan = TreatmentPlan::find($id);
            $treatment_plan->delete();
            return $this->get_treatment_plans_by_patient();
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload("Failed to record done procedure");
        }
    }

    public function get_treatment_plans_by_patient()
    {
        try {
            Helper::custom_validator(request()->all(), ['patient_id' => 'required|exists:App\Models\Patient,id']);
            return $this->customSuccessResponseWithPayload(
                TreatmentPlanResource::collection(TreatmentPlan::where('patient_id', request()->patient_id)->orderBy("created_at", "desc")->get())
            );
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
}
