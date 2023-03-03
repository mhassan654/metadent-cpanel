<?php

namespace App\Http\Controllers;

use App\Models\Frequency;

class FrequenciesContoller extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:api');
    }

    public function index()
    {
        return $this->customSuccessResponseWithPayload(Frequency::all());
    }
}
