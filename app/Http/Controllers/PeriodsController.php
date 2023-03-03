<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeriodsController extends Controller
{
    public function index()
    {

        return $this->customSuccessResponseWithPayload(Period::where('facility_id', Auth::user()->facility_id)->get());
    }
}
