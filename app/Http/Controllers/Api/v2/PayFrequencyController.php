<?php

namespace App\Http\Controllers\Api\v2;

use App\Models\PayFrequency;
use App\Http\Controllers\ApiBaseController;
use App\Http\Requests\StorePayFrequencyRequest;
use App\Http\Requests\UpdatePayFrequencyRequest;

class PayFrequencyController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->customSuccessResponseWithPayload(PayFrequency::all());
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
     * @param  \App\Http\Requests\StorePayFrequencyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePayFrequencyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PayFrequency  $payFrequency
     * @return \Illuminate\Http\Response
     */
    public function show(PayFrequency $payFrequency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PayFrequency  $payFrequency
     * @return \Illuminate\Http\Response
     */
    public function edit(PayFrequency $payFrequency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePayFrequencyRequest  $request
     * @param  \App\Models\PayFrequency  $payFrequency
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePayFrequencyRequest $request, PayFrequency $payFrequency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PayFrequency  $payFrequency
     * @return \Illuminate\Http\Response
     */
    public function destroy(PayFrequency $payFrequency)
    {
        //
    }
}
