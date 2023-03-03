<?php

namespace App\Http\Controllers\Api\v2;

use App\Models\DutyType;
use App\Http\Controllers\ApiBaseController;
use App\Http\Requests\StoreDutyTypeRequest;
use App\Http\Requests\UpdateDutyTypeRequest;

class DutyTypeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->customSuccessResponseWithPayload(DutyType::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDutyTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDutyTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DutyType  $dutyType
     * @return \Illuminate\Http\Response
     */
    public function show(DutyType $dutyType)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDutyTypeRequest  $request
     * @param  \App\Models\DutyType  $dutyType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDutyTypeRequest $request, DutyType $dutyType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DutyType  $dutyType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DutyType $dutyType)
    {
        //
    }
}
