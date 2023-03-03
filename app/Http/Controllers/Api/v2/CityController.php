<?php

namespace App\Http\Controllers\Api\v2;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiBaseController;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;

class CityController extends BaseController
{
    public function index(Request $request)
    {
        $cities = City::where('city', 'LIKE','%'.$request->keyword.'%')
                            ->orderBy('created_at','desc')
                            ->get();
             return $this->customSuccessResponseWithPayload($cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCityRequest $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCityRequest  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }
}
