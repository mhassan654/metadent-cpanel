<?php

namespace App\Http\Controllers\Api\v2;

use App\Models\RateType;
use App\Http\Controllers\ApiBaseController;
use App\Http\Requests\StoreRateTypeRequest;
use App\Http\Requests\UpdateRateTypeRequest;

class RateTypeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->customSuccessResponseWithPayload(RateType::all());
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
     * @param  \App\Http\Requests\StoreRateTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRateTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RateType  $rateType
     * @return \Illuminate\Http\Response
     */
    public function show(RateType $rateType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RateType  $rateType
     * @return \Illuminate\Http\Response
     */
    public function edit(RateType $rateType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRateTypeRequest  $request
     * @param  \App\Models\RateType  $rateType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRateTypeRequest $request, RateType $rateType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RateType  $rateType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RateType $rateType)
    {
        //
    }
}
