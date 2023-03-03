<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\TimeBreak;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Arr;

class SlotController extends Controller
{
    public function index() {
        {
            $request_day = request()->day;
            $request_date = request()->date;
            // $request_date_copy = request()->date;

            $days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];

            $request_doctors = request()->doctors;
            $db_doctors = array();

            $doctor_contract_dates = [];

            foreach($request_doctors as $doctor_id):
                $doctor = User::find($doctor_id);
                $doctor_contract_dates[] = [
                    'start_date' => $doctor->contract_start_date,
                    'end_date' => $doctor->contract_end_date,
                ];

                $db_doctors[] = $doctor;
                // $doctor_contract_dates[] = $doctor->availability;
            endforeach;

            $common_contracts_start_date = '01-01-0001';
            $common_contracts_end_date = '31-12-2022';
            $first_setting = false;

            foreach($doctor_contract_dates as $contract_dates):
                $start_date = Carbon::parse($contract_dates['start_date']);
                $end_date = Carbon::parse($contract_dates['end_date']);


                if ($start_date->gte(Carbon::parse($common_contracts_start_date))):
                    $common_contracts_start_date = $start_date->format('d-m-Y');


                    if(!$first_setting):
                        $common_contracts_end_date = $end_date->format('d-m-Y');
                        $first_setting = true;
                    else:
                        if ($end_date->lte(Carbon::parse($common_contracts_end_date))):
                            $common_contracts_end_date = $end_date->format('d-m-Y');
                        endif;
                    endif;
                endif;
            endforeach;
            /*
            * Check if the day the date the user sends the request is the same as the request day,
            * if not, then look for the next date that day happens in the week
            */

            if (Carbon::parse($common_contracts_start_date)->dayOfWeek !== $request_day):

                Carbon::setTestNow(Carbon::parse($common_contracts_start_date));

                $day_query = 'this ' . $days[$request_day];

                // $desired = Carbon::parse($recommended_day);
                $recommended_day = Carbon::parse($day_query);

                $common_contracts_start_date = $recommended_day->format('d-m-Y');
            endif;

            if (Carbon::parse($common_contracts_start_date)->lt(Carbon::parse($request_date))):
                $common_contracts_start_date = $request_date;
            endif;

            // return response([
            //     'common contract start date' => $common_contracts_start_date,
            //     'request start date' => $request_date,
            // ]);

            /*
            * Global facility appointment duration
            */
            $interval = request()->interval;
            $all_slots = [];
        }

        // $request_times = array();

        for ($counter = 0; $counter < 5; $counter++):
            {
                /*
                * First make the start time to the official facility start time
                */
                $date = $common_contracts_start_date;

                $available_slots = $taken_appointments = array();

                $request_times[] = request()->startTime;

            }

            /*
             * Generate all the days valid before the contract ends
            */
            $contract_days_with_excluded_days = CarbonPeriod::create($common_contracts_start_date, $common_contracts_end_date);

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

                /*
                    * GET ALL THE THE DOCTORS'S WORKING DAYS AND GET THE DAYS THAT THEY ALL WORK,
                    */
                {
                    /*
                    * GET ALL THE THE DOCTORS'S WORKING DAYS AND GET THE DAYS THAT THEY ALL WORK,
                    */
                    $common_days_between_doctors = [];
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
                            $doctor = User::find($doc);
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

                            return $this->customFailResponseWithPayload('doctors provided do not have a common working day');
                        endif;
                    else:
                        /*
                        * If only one doctor has been provided, then just return his working days
                        */
                        $final_common_days = User::find(Arr::first($request_doctors))->week_days;
                    endif;

                    /*
                    * END OF GET ALL THE THE DOCTORS'S WORKING DAYS AND GET THE DAYS THAT THEY ALL WORK,
                    */
                }


                if(in_array($day_of_week, $final_common_days)):
                    {
                        $request_start_time = request()->startTime;
                        $request_end_time = request()->endTime;

                        $common_doctors_start_time = 0;
                        $first_start_time_set = false;
                        $common_doctors_end_time = 0;
                        $first_end_time_set = false;

                        $doctors_times = array();

                        // $doctors_times = [
                        //     [
                        //         'start-time' => '08:00',
                        //         'end-time' => '13:00',
                        //     ],
                        //     [
                        //         'start-time' => '09:00',
                        //         'end-time' => '15:00',
                        //     ],
                        //     [
                        //         'start-time' => '10:00',
                        //         'end-time' => '16:00',
                        //     ],
                        // ];

                        foreach($db_doctors as $doctor):
                            foreach($doctor->availability[0]['days'] as $day):
                                // dd($day);
                                if($day['day'] === $day_of_week):
                                    $doctors_times[] = [
                                        'start-time' => $day['start-time'],
                                        'end-time' => $day['end-time'],
                                    ];
                                endif;
                            endforeach;
                        endforeach;

                        foreach($doctors_times as $slot):
                            $start_time = Carbon::parse(strtotime($slot['start-time']));
                            $end_time = Carbon::parse(strtotime($slot['end-time']));

                            if(!$first_start_time_set):
                                $common_doctors_start_time = $start_time;
                                $first_start_time_set = true;
                            else:
                                if($start_time->gte(Carbon::parse($common_doctors_start_time))):
                                    $common_doctors_start_time = $start_time;
                                endif;
                            endif;


                            if(!$first_end_time_set):
                                $common_doctors_end_time = $end_time;
                                $first_end_time_set = true;
                            else:
                                if($end_time->lte(Carbon::parse($common_doctors_end_time))):
                                    $common_doctors_end_time = $end_time;
                                endif;
                            endif;
                        endforeach;

                        // return response([
                        //     'request start time' => $request_start_time,
                        //     'common start time' => $common_doctors_start_time->format('H:i'),
                        //     'common start time is greater than requested start time' => $common_doctors_start_time->gte(Carbon::parse($request_start_time)),
                        // ]);

                        if($common_doctors_start_time->lte(Carbon::parse($request_start_time))):
                            $common_doctors_start_time = $request_start_time;
                        else:
                            $common_doctors_start_time = $common_doctors_start_time->format('H:i');
                        endif;

                        // return response($request_start_time);


                        if(Carbon::parse($request_end_time)->lte($common_doctors_end_time)):
                            $common_doctors_end_time = $request_end_time;
                        else:
                            $common_doctors_end_time = $common_doctors_end_time->format('H:i');
                        endif;

                        // return response ([
                        //     'start time' => $common_doctors_start_time->format('H:i'),
                        //     'end time' => $common_doctors_end_time,
                        // ]);

                        /*
                        * Use the official facility end time
                        */
                        $end_of_passed_date = $common_doctors_end_time;
                        /*
                        * GET ALL THE THE DOCTORS APPOINTMENTS AND GET THEIR TIME SLOTS,
                        * STORE ALL THE DOCTORS' TAKEN APPOINTMENTS INTO THE taken_appointments container
                        */
                        /*
                        * Get all appointments that are scheduled for this date
                        */
                        $doctors_appointments = [];

                        // $all_appointments = Appointment::where('date', date("d-m-Y", strtotime($date)))->where('status_id', '<', 4)->get();
                        $all_appointments = Appointment::where('date', '=', $date)->where('status_id', '<', 4)->get();

                        // dd($all_appointments);
                        foreach (request()->doctors as $doctor):

                            foreach($all_appointments as $appointment):
                                $appointment_doctors = $appointment->doctors;

                                if(in_array($doctor, $appointment_doctors)):
                                    $doctors_appointments[] = $appointment;
                                endif;
                            endforeach;
                            /*
                            * loop through all the fetched appointments and pick all their time slots
                            */
                            foreach($doctors_appointments as $appointment):

                                foreach($appointment->slots as $slot):
                                    $appointment_one_minute_slots = $this->slot_to_one_minute_slots($slot);

                                    foreach($appointment_one_minute_slots as $one_minute_slot):
                                        /*
                                        * pick each time slot and store it in the taken appointments container
                                        */
                                        $taken_appointments[] = $one_minute_slot;
                                    endforeach;
                                endforeach;
                            endforeach;
                        endforeach;
                    }
                    // return response ([
                    //     'start time' => $common_doctors_start_time->format('H:i'),
                    //     'end time' => $common_doctors_end_time,
                    //     'request start time' => $request_start_time,
                    //     'request end time' => $request_end_time,
                    // ]);
                    /*
                    * CALCULATE ALL THE MINUTES BETWEEN THE PROVIDED TIME
                    */
                    $minutes = Carbon::parse($common_doctors_start_time)->diffInMinutes(Carbon::parse($common_doctors_end_time));

                    /*
                    * Loop through all the hours and compute time slots within those hours
                    */
                    for($i = 0; $i < $minutes; $i ++):

                        $start_time = Carbon::parse($common_doctors_start_time)->addMinutes($i)->format('H:i');

                        $slot_start_time = $start_time;

                        $slot_end_time = Carbon::parse($start_time)->addMinutes(1);

                        {
                            $formated_slot_start_time = $slot_end_time->toTimeString();
                            $formated_end_of_passed_date = Carbon::parse($end_of_passed_date)->toTimeString();
                            $check = strtotime($formated_slot_start_time) > strtotime($formated_end_of_passed_date);

                            if(!$check):

                                $available_slots[] = [
                                    'start-time' => $slot_start_time,
                                    'end-time' => $slot_end_time->format('H:i')
                                ];

                            endif;
                        }
                    endfor;
                    /*
                    * END OF MINUTES CALCULATIONS BETWEEN THE GIVEN TIME
                    */

                    // return response ([
                    //     'start time' => $common_doctors_start_time,
                    //     'end time' => $common_doctors_end_time,
                    //     'request start time' => $request_start_time,
                    //     'request end time' => $request_end_time,
                    // ]);


                    {
                        $sorted_appointments = array();
                        $removed_slots = [];

                        foreach($available_slots as $available):

                            if($this->is_slot_found_in($available, $taken_appointments)):
                                // $removed_slots[] = $available;

                                array_push($removed_slots, $available);
                            else:
                                $sorted_appointments[] = $available;

                            endif;
                        endforeach;
                        // return response([
                        // 'sorted appointments' => $sorted_appointments,
                        // ]);

                        if (count($sorted_appointments) > 0):

                            $sorted_appointments = $this->convert_one_minute_slots_to_given_interval($sorted_appointments, $interval, $common_doctors_start_time);
                        endif;
                    }


                    $collected_slots = [
                        'date' => $common_contracts_start_date,
                        'interval' => $interval,
                        'day' => Carbon::parse($common_contracts_start_date)->format('l'),
                        'slots' => $sorted_appointments
                    ];

                    $all_slots[] = $collected_slots;

                    $common_contracts_start_date = Carbon::parse($date)->addWeek(1)->format("d-m-Y");

                else:

                    if(count(request()->doctors) > 1):

                        return $this->customFailResponseWithPayload('One or both of the doctors do not work on the provided day.');
                    endif;

                    return $this->customFailResponseWithPayload('The doctor does not work on the provided day.');
                endif;
            else:

                return $this->customFailResponseWithPayload('The selected date exists outside the Doctors contract period');
            endif;
        endfor;

        // return response($request_times);

        return $this->customSuccessResponseWithPayload($all_slots);

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

        $interval_between = Carbon::parse($start_time)->diffInMinutes(Carbon::parse($end_time));

        for($j = 0; $j < $interval_between; $j++):

            $slot_start_time = Carbon::parse($start_time)->addMinutes(1 * $j);

            $slot_end_time = Carbon::parse($start_time)->addMinutes(1 * ($j + 1));

            $all_slots[] = [
                'start-time' => $slot_start_time->format('H:i'),
                'end-time' => $slot_end_time->format('H:i')
            ];

        endfor;

        return $all_slots;
    }

    private function convert_one_minute_slots_to_given_interval($one_minute_slots, $interval, $start_time)
    {
        $final_slots = array();

        $start_time = in_array(['start-time'=>$start_time], $one_minute_slots) ? $start_time : Arr::first($one_minute_slots)['start-time'];

        foreach($one_minute_slots as $slot):

            $interval_between = Carbon::parse(strtotime($start_time))->diffInMinutes(Carbon::parse(strtotime($slot['end-time'])));


            if ($interval_between === $interval):

                $final_slots[] = [
                    'start-time' =>  $start_time,
                    'end-time' => $slot['end-time'],
                ];

                $start_time = $slot['end-time'];
            endif;
        endforeach;

        return $final_slots;
    }

}
