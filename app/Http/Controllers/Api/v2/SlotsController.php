<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Slot;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class SlotsController extends ApiBaseController
{

    public function __construct()
    {
        // $this->middleware(["auth:api"]);
//        $this->middleware('permission:View Invoices', ['only' => ['index','allInvoices']]);
//        $this->middleware('permission:Create Invoice', ['only' => ['store']]);
//        $this->middleware('permission:Update Invoice', ['only' => ['update']]);
//        $this->middleware('permission:Delete Invoice', ['only' => ['delete']]);
    }


    public function index() {

            $request_date = request()->date;
            $request_start_time = request()->startTime;
            $request_end_time = request()->endTime;

            $all_slots = [];


        for ($counter = 0; $counter < 5; $counter++):
            {
                /*
                * First make the start time to the official facility start time
                */
                $date = $request_date . ' 08:00:00';
                /*
                * Then if start time is selected, declare it as the the start time
                */
                if ($request_start_time):

                    $date = $request_date . ' ' . $request_start_time;
                endif;

                /*
                * Use the official facility end time
                */
                $end_of_passed_date = $request_date . ' 18:00:00';
                /*
                * Then if start time is selected, declare it as the the start time
                */
                if ($request_end_time):

                    $end_of_passed_date = $request_date . ' ' . $request_end_time;
                endif;

                $available_slots = $taken_appointments = array();
                $contract_start_date = '01-01-2022';
                $contract_end_date = '31-12-2022';
                $slot_duration = 20;
                $number_of_slots_in_an_hour = 60;
            }

            return response(['some message']);


            /*
             * Generate all the days valid before the contract ends
            */
            $contract_days_with_excluded_days = CarbonPeriod::create($contract_start_date, $contract_end_date);

            /*
             * Check if the date provided date is within the contract period
            */
            $is_appointment_date_in_contract = $contract_days_with_excluded_days->contains($date);
            /*
             * If the date provided date is within the contract period proceed with the following computation
            */
            if($is_appointment_date_in_contract):

                /*
                 * Get the day of the week the date provided is
                */
                $day_of_week = Carbon::parse($date)->dayOfWeek;
                /*
                 * Check if the user works on this day of the week
                */

                {
                    $common_days_between_doctors = [];
                    $request_doctors = request()->doctors;
                    $base_days = [];
                    $final_common_days = [];

                    /*
                    * Only run this block of code if the doctors provided are more than one
                    */
                    if (count($request_doctors) > 1):
                        /*
                        * Declare my container to track the first doctor week days
                        */
                        $controller = 0;
                        /*
                        * Loop through all the doctors provided via the api
                        */
                        foreach ($request_doctors as $doc):
                            $doctor = Employee::find($doc);
                            /*
                            * If the controller is still 0, then this means this is first doctor in the array
                            */
                            if ($controller === 0):
                                /*
                                * Then populate this doctor's week days as the base days for comparison
                                */
                                $base_days = $doctor->week_days;

                            else:
                                /*
                                * If the base week days are already set, compare and find common days between the doctors as an array
                                */
                                $intersections = array_intersect($base_days, $doctor->week_days);
                                /*
                                * Loop through the intersections array and push each day to the common days array
                                */
                                foreach ($intersections as $inters):
                                    $common_days_between_doctors[] = $inters;
                                endforeach;

                            endif;
                            /*
                            * Update the controller
                            */
                            $controller++;

                        endforeach;


                        if (count($request_doctors) > 2):

                            foreach($common_days_between_doctors as $day):

                                $count = $this->count_array_values($common_days_between_doctors, $day);

                                    if ($count === (count($common_days_between_doctors) - 1) ):

                                        if(!in_array($day, $final_common_days)):

                                            $final_common_days[] = $day;
                                        endif;
                                    endif;
                            endforeach;
                        else:

                            $final_common_days = $common_days_between_doctors;
                        endif;

                        if(count($final_common_days) === 0):

                            return response()->json(['message'=> 'doctors provided do not have a common working day']);
                        endif;
                    else:
                        /*
                        * If only one doctor has been provided, then just return his working days
                        */
                        dd(['some message here']);
                        $final_common_days = Employee::find($request_doctors)->week_days;

                        dd($final_common_days);
                    endif;
                }


                if(in_array($day_of_week, $final_common_days)):
                    {
                        foreach (request()->doctors as $doctor):
                            /*
                            * Get all appointments that are scheduled for this date
                            */
                            $appointments = Appointment::where('employee_id', $doctor)->where('date', date("d-m-Y", strtotime($date)))->get();
                            /*
                            * loop through all the fetched appointments and pick all their time slots
                            */
                            foreach($appointments as $appointment):

                                foreach($appointment->slots as $slot):
                                    $appointment_one_minute_slots = $this->slot_to_one_minute_slots($slot);

                                    foreach($appointment_one_minute_slots as $one_minute_slot):
                                        /*
                                        * pick each time slot and store it in the taken appointments container
                                        */
                                        $taken_appointments[] = $one_minute_slot;
                                    endforeach;
                                endforeach;

                                $break_one_minute_slots = $this->slot_to_one_minute_slots($appointment->break);

                                foreach($break_one_minute_slots as $one_minute_slot):
                                    /*
                                    * pick each time slot and store it in the taken appointments container
                                    */
                                    $taken_appointments[] = $one_minute_slot;
                                endforeach;
                            endforeach;
                        endforeach;
                    }

                    /*
                    * Return all the hours encapsulated with in the provided time range
                    */
                    $hours = Carbon::parse($date)->diffInHours(Carbon::parse($end_of_passed_date));
                    /*
                    * Loop through all the hours and compute time slots within those hours
                    */
                    for($i = 0; $i < $hours; $i ++):

                        $start_time = Carbon::parse($date)->addMinutes(1 * $i)->format('H:i');

                        for($j = 0; $j < $number_of_slots_in_an_hour; $j++):

                            $slot_start_time = Carbon::parse($start_time)->addMinutes(1 * $j);

                            $slot_end_time = Carbon::parse($start_time)->addMinutes(1 * ($j + 1));

                            {
                                $formated_slot_start_time = $slot_end_time->toTimeString();
                                $formated_end_of_passed_date = Carbon::parse($end_of_passed_date)->toTimeString();
                                $check = strtotime($formated_slot_start_time) > strtotime($formated_end_of_passed_date);

                                if(!$check):

                                    $available_slots[] = [
                                        'start-time' => $slot_start_time->format('H:i'),
                                        'end-time' => $slot_end_time->format('H:i')
                                    ];

                                endif;
                            }
                        endfor;
                    endfor;


                    {
                        $sorted_appointments = array();
                        $removed_slots = [];

                        $available_slots = $this->remove_time_breaks($available_slots);


                        foreach($available_slots as $available):

                            if($this->is_slot_found_in($available, $taken_appointments)):
                                // $removed_slots[] = $available;

                                array_push($removed_slots, $available);
                            else:
                                $sorted_appointments[] = $available;

                            endif;
                        endforeach;

                        $sorted_appointments = $this->convert_one_minute_slots_to_given_duration($sorted_appointments, 20, $request_start_time);
                    }


                    $collected_slots = [
                        'date' => $request_date,
                        'day' => Carbon::parse($date)->format('l'),
                        'slots' => $sorted_appointments
                    ];

                    $all_slots[] = $collected_slots;

                    $request_date = Carbon::parse($date)->addWeek(1)->format("d-m-Y");

                else:

                    if(count(request()->doctors) > 1):

                        return response()->json(['message'=> 'One or both of the doctors do not work on the provided day.']);
                    endif;

                    return response()->json(['message'=> 'The doctor does not work on the provided day.']);
                endif;
            else:

                return response()->json(['message'=> 'The selected date exists outside the Doctors contract period']);
            endif;
        endfor;

        return response()->json(['message' => $all_slots]);

    }




    private function count_array_values($my_array, $match)
    {
        $count = 0;

        foreach ($my_array as $value)
        {
            if ($value == $match)
            {
                $count++;
            }
        }

        return $count;
    }




    private function remove_time_breaks($all_slots)
    {

        $all_time_breaks_slots = $this->get_all_time_breaks_slots();

        $temporal_collector = [];

        foreach($all_slots as $slot):
            if (!$this->is_slot_found_in($slot, $all_time_breaks_slots)):
                $temporal_collector[] = $slot;
            endif;
        endforeach;

        return $temporal_collector;
    }




    private function is_slot_found_in ($slot_to_check, $list_to_check)
    {
        /*
         * loop through the provided slots list
        */
        foreach($list_to_check as $slot):
            $check1 = $slot['start-time'] === $slot_to_check['start-time'];
            $check2 = $slot['end-time'] === $slot_to_check['end-time'];
            /*
            * Check if start time and end time are the same
            */
            if($check1 === true && $check2 === true):

                return true;
            endif;

        endforeach;
        /*
         * return false if no slot has matched the provided slot
        */
        return false;
    }




    private function get_all_time_breaks_slots ()
    {
        /*
         * Get all the time breaks of the company
        */
        $time_breaks = TimeBreak::all();
        /*
         * Create a container to store all the slots with in the time breaks
        */
        $time_breaks_slots = [];
        /*
         * Loop through all the time breaks of a company
        */
        foreach($time_breaks as $break):

            foreach($break->slots as $slot):
                $one_minute_slots = $this->slot_to_one_minute_slots($slot);
                /*
                * Push all the individual slots into the time breaks slots container
                */
                foreach($one_minute_slots as $one_minute_slot):

                    $time_breaks_slots[] = $one_minute_slot;
                endforeach;

            endforeach;

        endforeach;
        /*
         * return all the time break slots
        */
        return $time_breaks_slots;
    }



    private function slot_to_one_minute_slots($slot)
    {

        $start_time = $slot['start-time'];
        $end_time = $slot['end-time'];

        $duration_between = Carbon::parse($start_time)->diffInMinutes(Carbon::parse($end_time));

        for($j = 0; $j < $duration_between; $j++):

            $slot_start_time = Carbon::parse($start_time)->addMinutes(1 * $j);

            $slot_end_time = Carbon::parse($start_time)->addMinutes(1 * ($j + 1));

            $all_slots[] = [
                'start-time' => $slot_start_time->format('H:i'),
                'end-time' => $slot_end_time->format('H:i')
            ];

        endfor;

        return $all_slots;
    }

    private function convert_one_minute_slots_to_given_duration($one_minute_slots, $duration, $start_time)
    {
        $final_slots = [];

        $start_time = in_array($start_time, $one_minute_slots) ? $start_time : Arr::first($one_minute_slots)['start-time'];

        foreach($one_minute_slots as $slot):

            $duration_between = Carbon::parse(strtotime($start_time))->diffInMinutes(Carbon::parse(strtotime($slot['end-time'])));

            if ($duration_between === $duration):

                $final_slots[] = [
                    'start-time' =>  $start_time,
                    'end-time' => $slot['end-time'],
                ];

                $start_time = $slot['end-time'];
            endif;
        endforeach;

        return $final_slots;
    }

    public function destroy()
    {
        request()->validate([
            'slotId'=>'required'
        ]);
        if($this->authUser()->can('Delete Slot')){
            $slot = Slot::find(request()->slotId);
            if($slot){
                $slot->delete();
                return $this->customSuccessResponseWithPayload('Slot Deleted');
            }else{
                return $this->customFailResponseWithPayload('Slot not found');
            }
        }else{
            return $this->customFailResponseWithPayload('Permission Denied');
        }
    }
}
