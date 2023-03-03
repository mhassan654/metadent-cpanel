<?php

namespace App\Http\Controllers\Api\v2;

use App\Models\GeneralRemark;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiBaseController;
use App\Http\Resources\GeneralRemarkResource;

class GeneralRemarkController extends BaseController
{
    public function index() {
        return $this->allGeneralRemarks();
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

        $general_remark = GeneralRemark::create([
            "patient_id" => request()->patient_id,
            "treatment_ids" => request()->treatment_ids,
            "treatment_codes" => request()->treatment_codes,
            "treatment_amounts" => request()->treatment_amounts,
            "tooth_element" => request()->tooth_element,
            "general_remark_category" => request()->general_remark_category,
            "general_remark_description" => request()->general_remark_description,
            "created_by" => request()->created_by,
            "updated_by" => request()->updated_by,
            "treatment_status" => request()->treatment_status,
        ]);

        if($general_remark): return $this->allGeneralRemarks(); endif;
        return $this->customFailResponseWithPayload("Failed to record done treatment");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GeneralRemark  $generalRemark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GeneralRemark $generalRemark)
    {
        request()->validate([
            "patient_id" => "required",
        ]);

        $general_remark = GeneralRemark::find(request()->id);

        if($general_remark):
            $general_remark->update([
                "patient_id" => request()->patient_id,
                "treatment_ids" => request()->treatment_ids,
                "treatment_codes" => request()->treatment_codes,
                "treatment_amounts" => request()->treatment_amounts,
                "tooth_element" => request()->tooth_element,
                "general_remark_category" => request()->general_remark_category,
                "general_remark_description" => request()->general_remark_description,
                "updated_by" => request()->updated_by,
                "treatment_status" => request()->treatment_status,
            ]);
            return $this->allGeneralRemarks();
        endif;
        return $this->customFailResponseWithPayload("Failed to record done procedure");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralRemark  $generalRemark
     * @return \Illuminate\Http\Response
     */
    public function archive()
    {
        GeneralRemark::find(request()->general_remark_id)->delete();
        return $this->customSuccessResponseWithPayload(GeneralRemark::where("patient_id", request()->patient_id)->orderBy("created_at", "desc")->get());
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralRemark  $generalRemark
     * @return \Illuminate\Http\Response
     */
    public function restore(GeneralRemark $generalRemark)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralRemark  $generalRemark
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralRemark $generalRemark)
    {
        //
    }
    public function allGeneralRemarks()
    {
        return $this->customSuccessResponseWithPayload(
            GeneralRemarkResource::collection(GeneralRemark::where("patient_id", request()->patient_id)->orderBy("created_at", "desc")->get())
        );
    }
}
