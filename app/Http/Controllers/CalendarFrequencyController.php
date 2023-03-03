<?php

namespace App\Http\Controllers;

use App\Models\CalendarFrequency;
use Illuminate\Http\Request;

class CalendarFrequencyController extends Controller
{
    public function index()
    {
        return $this->customSuccessResponseWithPayload(CalendarFrequency::all());
    }
}
