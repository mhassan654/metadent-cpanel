<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Http\Controllers\ApiBaseController;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\CountryCity;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->customSuccessResponseWithPayload(Country::all());

//         $countries = Country::with('cities')->where('country', 'LIKE','%'.request()->keyword.'%')
//         ->orderBy('created_at','desc')
//         ->get();
// return $this->customSuccessResponseWithPayload($countries);
    }

    public function cities($id)
    {
        $all_country_cities = CountryCity::where('country_id', $id)->get();

        return $this->customSuccessResponseWithPayload($all_country_cities);
    }
}
