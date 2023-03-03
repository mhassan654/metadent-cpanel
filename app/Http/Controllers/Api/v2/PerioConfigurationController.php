<?php

namespace App\Http\Controllers\Api\v2;

use App\Models\PerioConfiguration;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiBaseController;

class PerioConfigurationController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->customSuccessResponseWithPayload($this->all());
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
            "name" => "required",
            "arrangement" => "required"
        ]);

        $perio_configuration = PerioConfiguration::create([
            "name" => request()->name,
            "arrangement" => request()->arrangement,
            "created_by" => auth()->id(),
        ]);

        if($perio_configuration):
            return $this->customSuccessResponseWithPayload($this->all());
        endif;

        return $this->customFailResponseWithPayload("Failed to record done treatment");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerioConfiguration  $perioConfiguration
     * @return \Illuminate\Http\Response
     */
    public function destroy($perioConfiguration)
    {
        PerioConfiguration::find($perioConfiguration)->delete();
        return $this->customSuccessResponseWithPayload($this->all());
    }

    public function all() {
        return PerioConfiguration::orderBy('created_at', 'desc')->get();
    }
}
