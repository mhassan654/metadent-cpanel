<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Traits\AppointmentsTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Google\Service\Calendar\Calendar;
use App\Services\Google;
use App\GoogleAccount;
// use App\Jobs\CalenderEventUpdated;
use App\Jobs\InsertGCalenderEvent;
use App\Models\Patient;


class GCalenderController extends Controller
{
    use AppointmentsTrait;

 
    public function add_calender_event($id){
      return $this->getUserClient($id);
    }

    // public function calender_event_updated(){
    //   CalenderEventUpdated::dispatch();
    // }
}
