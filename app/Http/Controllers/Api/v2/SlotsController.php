<?php
/*
 * Developer: BRANDON ELIJAH WAVAMUNO
 * Email: brandonelijah099@gmail.com
 * Github: https://github.com/Elijahwb
*/

namespace App\Http\Controllers\Api\v2;

use Throwable;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Setting;
use App\Models\Employee;
use App\Models\Appointment;
use Illuminate\Support\Arr;
use App\Models\AppointmentType;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Services\SlotsService\SlotsService;
use Exception;

class SlotsController extends Controller
{
    private $default_interval;
    private $default_date_format = 'd-m-Y';


    public function __construct()
    {
//        $this->middleware("auth:api")->except(['appointment_type_slots_any_doctor', 'generate_doctors_free_slots']);
        $setting = Setting::where('key', '=', 'facility_default_interval')
            ->where('facility_id', 1)
            ->latest()
            ->first();
        $this->default_interval = 10;
    }

    public function index()
    {
        try {
            //code...

        // dd(request());
        $days_names = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
        // $request_appointment_date = request()->date ? request()->date : Carbon::parse()->format("d-m-Y");
        // $request_appointment_day = request()->day ? request()->day : Carbon::now()->dayOfWeek;
        // if(request()->date && Carbon::parse(request()->date)->gte(Carbon::today())){
        if(request()->date && $this->returnStandardDateFormat(request()->date)->gte(Carbon::today())){
            $request_appointment_date = request()->date;
            $request_appointment_day =  Carbon::parse(request()->date)->dayOfWeek;
        }else{
            $request_appointment_date = Carbon::parse()->format($this->default_date_format);
            $request_appointment_day =  Carbon::now()->dayOfWeek;

        }
        $doctors_ids = request()->doctors;
        $all_collected_appointment_slots = array();
        // dd($doctors_ids);
        // return response(['doctor ids', request()->doctors]);
        $all_concerned_doctors = $this->get_all_concerned_doctors($doctors_ids);
        /*
        * First find out if the concerned doctors do have common working day
        */
        $doctors_common_working_days = $this->get_doctors_common_working_days($all_concerned_doctors);
        // dd( $doctors_common_working_days);
        /*
        * if the concerned doctors have common working days, then proceed with the next code block
        */
        if (count($doctors_common_working_days) !== 0) {
            /*
            * Get all the concerned doctors common working weeks
            */
            $common_working_weeks = $this->get_doctors_common_working_weeks($all_concerned_doctors);
            // dd($common_working_weeks);
            /*
            * Check if the concerned doctors have some common working weeks
            */

            if (count($common_working_weeks) !== 0) {
                // if ($request_appointment_day) {
                /*
                    * Check if the concerned doctors work on the requested appointment day
                    */
                if (in_array($request_appointment_day, $doctors_common_working_days)) {
                    /*
                        * Get all the concerned doctor(s) contract dates details (start & end date)
                        */
                    $doctors_contract_dates = $this->get_doctors_contract_dates($all_concerned_doctors);
                    // dd($doctors_contract_dates);
                    /*
                        * Get the common contract dates details (start & end date) of the concerned doctor(s)
                        */
                    $doctors_common_contract_dates = $this->get_common_contract_date_range($doctors_contract_dates);
                    // dd($doctors_common_contract_dates );
                    /*
                        * Check if the concerned doctors do have common contract dates, then proceed with the next code block
                        */
                    if (count($doctors_common_contract_dates) !== 0) {

                        /*
                            * Get the valid appointment date in relation with the request appointment day NOT the request appointment date
                            */
                        $valid_appointment_date = $this->valid_request_appointment_day_date($request_appointment_date, $request_appointment_day, $days_names);

                        $mutable_valid_appointment_date = $valid_appointment_date;

                        $counter = 1;



                        while ($counter <= 10) {

                            $request_appointment_date_is_valid = $this->is_request_appointment_date_valid($doctors_common_contract_dates, $mutable_valid_appointment_date);
                            // dump( $all_collected_appointment_slots);
                            if (!$request_appointment_date_is_valid) {
                                $message = 'Contract(s) of some of the concerned doctor(s) end early';
                                $suggestions =  $all_collected_appointment_slots;
                                $customMessage = [
                                    'message' => $message,
                                    'suggestions' => $suggestions
                                ];
                                return $this->customFailResponseWithPayload($customMessage);
                            }
                            if ($request_appointment_date_is_valid) {
                                $mutable_valid_appointment_date_week = $this->carbonDate($mutable_valid_appointment_date)->weekOfMonth;
                                // dd( $common_working_weeks);
                                // dd(in_array($mutable_valid_appointment_date_week, $common_working_weeks));

                                if (in_array($mutable_valid_appointment_date_week, $common_working_weeks)) {
                                    $request_appointment_start_time = request()->startTime;
                                    $request_appointment_end_time = request()->endTime;
                                    $doctors_common_working_time = $this->get_doctors_common_start_and_end_time($all_concerned_doctors, $mutable_valid_appointment_date, $request_appointment_day, $mutable_valid_appointment_date_week, $request_appointment_start_time, $request_appointment_end_time);
                                    if (count($doctors_common_working_time) !== 0) {
                                        $all_one_minute_slots_between_common_working_time = $this->get_one_minute_time_slots($doctors_common_working_time);
                                        //todo:use facility start and endtime as fallback if doctor has no start and end time
                                        // dd($all_one_minute_slots_between_common_working_time);
                                        $available_appointment_slots = $this->bestAppointmentSlots($all_one_minute_slots_between_common_working_time, $doctors_ids, $doctors_common_working_time[0], request()->interval, $mutable_valid_appointment_date);
                                        $all_collected_appointment_slots[] = [
                                            'date' => $mutable_valid_appointment_date,
                                            'interval' => request()->interval > 0 ? request()->interval : $this->default_interval,
                                            'day' => Carbon::parse($mutable_valid_appointment_date)->format('l'),
                                            'slots' => $available_appointment_slots
                                        ];
                                        $counter++;
                                    } else {
                                        $message = 'The concerned doctor(s) do not have a common working time. ';
                                        $suggestions = [];
                                        $customMessage = [
                                            'message' => $message,
                                            'suggestions' => $suggestions
                                        ];
                                        return $this->customFailResponseWithPayload($customMessage);
                                    }
                                }
                                // else{
                                //     $message = 'The concerned doctor(s) do not have a common working time. ';
                                //         $suggestions = [];
                                //         $customMessage = [
                                //             'message'=>$message,
                                //             'suggestions' => $suggestions
                                //             ];
                                //         return $this->customFailResponseWithPayload($customMessage);
                                // }
                                $mutable_valid_appointment_date = $this->nextAppointmentDate($mutable_valid_appointment_date, $doctors_common_working_days)->format('d-m-Y');
                                $counter++;
                                // dd($mutable_valid_appointment_date);

                            }
                            // break;
                        }
                        return $this->customSuccessResponseWithPayload($all_collected_appointment_slots);
                    }
                    /*
                        * If the concerned doctors do have common contract dates, notify the client
                        */
                    $message = 'Contract(s) of some of the concerned doctor(s) end early';
                    $suggestions = $all_collected_appointment_slots;
                    $customMessage = [
                        'message' => $message,
                        'suggestions' => $suggestions
                    ];
                    return $this->customFailResponseWithPayload($customMessage);
                }
                /*
                    * if the concerned doctors do not work on the requested appointment day, notify the client
                    */

                $suggestions = $this->suggestAppointmentSlots($doctors_ids, request()->interval, $request_appointment_date, request()->startTime, request()->endTime);
                // dd($suggestions);
                $message = 'One or all of the concerned doctor(s) do not work on ' . $days_names[$request_appointment_day];
                $send_suggestions = [
                    'message' => $message,
                    'suggestions' => $suggestions
                ];
                return $this->customFailResponseWithPayload($send_suggestions);
            }
            $message = 'Doctors do not have common working weeks';
            $customMessage = [
                'message' => $message,
                'suggestions' => []
            ];

            return $this->customFailResponseWithPayload($customMessage);
        }
        /*
         * if the concerned doctors do not have common working days, notify the client
         */
        $message = 'The concerned doctor(s) do not have a common working day.';
        $customMessage = [
            'message' => $message,
            'suggestions' => []
        ];
        return $this->customFailResponseWithPayload($customMessage);
        } catch (\Throwable $th) {
        throw $th;
        }
    }

    private function returnStandardDateFormat($date=null){
        try {
            if($date){
                if(!Carbon::hasFormat($date,$this->default_date_format)) throw new Exception("Invalid date format");
                return Carbon::parse($date);
            }
            return Carbon::parse();
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    private function getSuggestionAppointmentDate(Carbon $date, $day, $same_week = false)
    {
        // dd($day);
        if ($same_week) {
            if ($day >= $date->dayOfWeek) return $date->addDays($day - $date->dayOfWeek);
            return $date->addDays($day - $date->dayOfWeek)->addWeek();
        }

        return $date->addWeek();
    }

    private function nextAppointmentDate($date, $working_days)
    {
        $date = Carbon::parse($date);
        $next = clone $date->addDay();
        // dd(in_array($next->dayOfWeek,$working_days));

        if (in_array($next->dayOfWeek, $working_days)) return $next;
        return $this->nextAppointmentDate($next, $working_days);
    }

    //function to get appointment type suggestions
    public function getAppointmentTypeSlotSuggestions(AppointmentType $type, $doctors, $appointment_date)
    {
        $suggestions = [];
        $all_concerned_doctors = $this->get_all_concerned_doctors($doctors);
        $doctors_common_working_days = $this->get_doctors_common_working_days($all_concerned_doctors);
        if (count($doctors_common_working_days) > 0) {
            $appointment_days = Arr::flatten(array_intersect($type->week_days, $doctors_common_working_days));
            // dd( $appointment_days);
            if (count($appointment_days)) {
                $counter = 1;
                $counter_dates = [];
                while ($counter <= 10) {
                    for ($i = 0; $i < count($appointment_days); $i++) {
                        $day = $appointment_days[$i];
                        $appointment_carbon_date = Carbon::parse($appointment_date);
                        $counter_dates[$i] = $this->getSuggestionAppointmentDate($counter == 1 ? $appointment_carbon_date : $counter_dates[$i], $day, $counter == 1);
                        $mutable_valid_appointment_date = $counter_dates[$i];
                        $mutable_valid_appointment_date_week = $mutable_valid_appointment_date->weekOfMonth;
                        $doctors_common_working_time = $this->get_doctors_common_start_and_end_time(
                            $all_concerned_doctors,
                            $mutable_valid_appointment_date->format('d-m-Y'),
                            $day,
                            $mutable_valid_appointment_date_week,
                            $type->start_time,
                            $type->end_time
                        );

                        if (count($doctors_common_working_time) !== 0) {
                            $all_one_minute_slots_between_common_working_time = $this->get_one_minute_time_slots($doctors_common_working_time);
                            $suggested_appointment_slots = $this->bestAppointmentSlots($all_one_minute_slots_between_common_working_time, $doctors, $doctors_common_working_time[0], $type->agenda_interval, $appointment_date, $doctors_common_working_time[1]);
                            $all_collected_appointment_slots = [
                                'date' => $mutable_valid_appointment_date->format('d-m-Y'),
                                'interval' => $type->agenda_interval,
                                'day' => $mutable_valid_appointment_date->format('l'),
                                'slots' => $suggested_appointment_slots,
                            ];
                            array_push($suggestions, $all_collected_appointment_slots);
                        }
                    }
                    $counter++;
                }
                return $suggestions;
            }
        }
    }


    private function suggestAppointmentSlots($doctors, $interval, $appointment_date, $request_appointment_start_time, $request_appointment_end_time)
    {
        $interval = $interval > 0 ? $interval : $this->default_interval;
        $suggestions = [];
        $all_concerned_doctors = $this->get_all_concerned_doctors($doctors);
        $doctors_common_working_days = $this->get_doctors_common_working_days($all_concerned_doctors);
        // dd( $doctors_common_working_days);
        if (count($doctors_common_working_days) > 0) {
            $counter = 1;
            $counter_dates = [];
            while ($counter <= 10) {
                for ($i = 0; $i < count($doctors_common_working_days); $i++) {
                    $day = $doctors_common_working_days[$i];
                    $counter_dates[$i] = $this->getSuggestionAppointmentDate($counter == 1 ? Carbon::parse($appointment_date) : $counter_dates[$i], $day, $counter == 1 ? true : false);
                    // dd($counter_dates[$i]);
                    $mutable_valid_appointment_date = $counter_dates[$i];
                    $mutable_valid_appointment_date_week = $mutable_valid_appointment_date->weekOfMonth;
                    $doctors_common_working_time = $this->get_doctors_common_start_and_end_time(
                        $all_concerned_doctors,
                        $mutable_valid_appointment_date->format('d-m-YYYY'),
                        $day,
                        $mutable_valid_appointment_date_week,
                        $request_appointment_start_time,
                        $request_appointment_end_time
                    );

                    if (count($doctors_common_working_time) > 0) {
                        $all_one_minute_slots_between_common_working_time = $this->get_one_minute_time_slots($doctors_common_working_time);
                        $suggested_appointment_slots = $this->bestAppointmentSlots($all_one_minute_slots_between_common_working_time, $doctors, $doctors_common_working_time[0], $interval, $appointment_date);
                        $all_collected_appointment_slots = [
                            'date' => $mutable_valid_appointment_date->format('d-m-Y'),
                            'interval' => $interval,
                            'day' => $mutable_valid_appointment_date->format('l'),
                            'slots' => $suggested_appointment_slots,
                        ];
                        array_push($suggestions, $all_collected_appointment_slots);
                    }
                }
                $counter++;
            }
            return $suggestions;
        }
    }



    private function bestAppointmentSlots($all_slots, $doctor_ids, $start_time, $interval, $appointment_date)
    {
        // dd($appointment_date);
        $index = 0;
        $available_appointment_slots = [];
        $previous = 0;
        // dd($interval);
        $interval = $interval > 0 ? $interval : $this->default_interval;
        $all_slots = $this->convert_one_minute_slots_to_given_interval($all_slots, $interval, $start_time);
        $taken_slots = $this->getTakenAppointmentSlots($doctor_ids, $appointment_date, $interval);
        // dd($taken_slots);
        // dd(count($taken_slots) == 0);
        if (count($taken_slots) == 0) {
            $all_slots[0]['is_best'] = true;
            return $all_slots;
        }

        for ($i = 0; $i < count($all_slots); $i++) {
            for ($k = 0; $k < count($taken_slots); $k++) {
                // dump("I = $i , k = $k ");
                if ($all_slots[$i]['start-time'] == $taken_slots[$k][0]['start-time']) {

                    if ($i == 0) {
                        $previous = 1;
                        break;
                    }
                    $previous = 1;
                    $available_appointment_slots[$index - 1]['is_best'] = true;
                    break;
                } else {

                    if ($k == count($taken_slots) - 1) {
                        if ($i == 0) {
                            $previous = 0;
                            $all_slots[$i]['is_best'] = true;
                            array_push($available_appointment_slots, $all_slots[0]);
                        } elseif ($previous == 1) {
                            $all_slots[$i]['is_best'] = true;
                            $previous = 0;
                            array_push($available_appointment_slots, $all_slots[$i]);
                        } else {
                            array_push($available_appointment_slots, $all_slots[$i]);
                        }
                        $index++;
                    }
                }
            }
        }
        if(array_key_exists(-1,$available_appointment_slots)) Arr::pull($available_appointment_slots,-1);
        // dd($available_appointment_slots);
        return $available_appointment_slots;
    }

    private function getDoctorAppointmentTypeSlots(Employee $doctor, $day, $interval = null)
    {
        $appointment_type_slots = [];
        $appointment_types = $doctor->appointmentTypes()->where('week_days', $day)->get();
        if (count($appointment_types) == 0) return $appointment_type_slots;
        foreach ($appointment_types as $type) {
            //todo:pending clarity on doctor assignments to appointments rather rthan for this type
        }
    }

    private function getDoctorBreakSlots(Employee $doctor, $interval, $appointment_date)
    {
        $interval = $interval > 0 ? $interval : $this->default_interval;
        $break_slots = [];
        $break_time_array = [];
        $availables = $doctor->availability;
        if (gettype($availables) == 'string') $availables = json_decode($availables, true);
        if (!$availables) return $break_slots;
        $date = Carbon::parse($appointment_date);
        $week = $date->weekOfMonth;
        $day_of_week = $date->dayOfWeek;
        $app_day = [];
        foreach ($availables as $available) {
            // dump($available);
            if ($available['week'] == $week) {
                $app_day = $available;
                break;
            }
        }
        // dd($app_day);
        if (count($app_day) > 0) {
            foreach ($app_day['days'] as $day) {
                if ($day['day'] == $day_of_week) {
                    $break_time_array = $day['break_time'];
                    break;
                }
            }
            if (count($break_time_array) == 0) return $break_slots;
            foreach ($break_time_array as $element) {
                $start_time = Carbon::parse($element['start-time']);
                $end_time = Carbon::parse($element['end-time']);
                $slot_start_time = clone $start_time;
                $slot_end_time = clone $slot_start_time;
                while ($slot_end_time->lt($end_time)) {
                    $slot_end_time = clone $slot_end_time->addMinutes($interval);
                    $slot = [
                        'start-time' => $slot_start_time->format('h:i'),
                        'end-time' => $slot_end_time->format('h:i')
                    ];
                    array_push($break_slots, [$slot]);
                    $slot_start_time = clone $slot_end_time;
                };
                // dd($break_slots);
                return $break_slots;
            }
        }
    }

    public function getTakenAppointmentSlots($doctor_ids, $appointment_date, $interval)
    {
        $interval = $interval > 0 ? $interval : $this->default_interval;
        $taken_slots = [];
        $doctors = Employee::find($doctor_ids);
        // dd($doctors);
        foreach ($doctors as $doctor) {
            $appointments = $doctor->appointments()->where([
                ['appointments.date', $appointment_date],
                ['appointments.status_id', '!=', 5],
                ['appointments.status_id', '!=', 4],
                ['appointments.status_id', '!=', 6],
            ])->get();
            // dd($appointments);
            if (count($appointments) != 0) {
                foreach ($appointments as $appointment) {

                    $slot = $appointment->slots;
                    array_push($taken_slots, $slot);
                }
            }
            // dump($taken_slots);

            $break_slots = $this->getDoctorBreakSlots($doctor, $interval, $appointment_date);
            // dump($break_slots);
            $taken_slots = [...$taken_slots, ...$break_slots];
            // dd($taken_slots);

        }

        // dd(($taken_slots));
        return $taken_slots;
    }



    public function any_free_doctor()
    {
        $days_names = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
        // $request_appointment_day = request()->day;
        // $request_appointment_date = request()->date;
        if(request()->date && Carbon::parse(request()->date)->gte(Carbon::today())){
            $request_appointment_date = request()->date;
            $request_appointment_day =  Carbon::parse(request()->date)->dayOfWeek;
        }else{
            $request_appointment_date = Carbon::parse()->format($this->default_date_format);
            $request_appointment_day =  Carbon::now()->dayOfWeek;

        }
        $doctors_ids = array();
        $doctors_ids[] = $this->doctor_with_least_appointments($request_appointment_date);
        // return response()->json([
        //     'Date' => $request_appointment_date,
        //     'Appointments' => $doctors_ids
        // ]);

        $all_concerned_doctors = $this->get_all_concerned_doctors($doctors_ids);
        /*
            * First find out if the concerned doctors do have common working days
            */
        $doctors_common_working_days = $this->get_doctors_common_working_days($all_concerned_doctors);
        /*
            * if the concerned doctors have common working days, then proceed with the next code block
            */
        if (count($doctors_common_working_days) !== 0) :
            /*
                * Get all the concerned doctors common working weeks
                */
            $common_working_weeks = $this->get_doctors_common_working_weeks($all_concerned_doctors);
            /*
                * Check if the concerned doctors have some common working weeks
                */
            if (count($common_working_weeks) !== 0) :
                // dd($request_appointment_day);
                if ($request_appointment_day) :
                    /*
                    * Check if the concerned doctors work on the requested appointment day
                    */
                    if (in_array($request_appointment_day, $doctors_common_working_days)) :
                        /*
                        * Get all the concerned doctor(s) contract dates details (start & end date)
                        */
                        $doctors_contract_dates = $this->get_doctors_contract_dates($all_concerned_doctors);
                        /*
                        * Get the common contract dates details (start & end date) of the concerned doctor(s)
                        */
                        $doctors_common_contract_dates = $this->get_common_contract_date_range($doctors_contract_dates);
                        /*
                        * Check if the concerned doctors do have common contract dates, then proceed with the next code block
                        */
                        if (count($doctors_common_contract_dates) !== 0) :

                            /*
                            * Get the valid appointment date in relation with the request appointment day NOT the request appointment date
                            */
                            $valid_appointment_date = $this->valid_request_appointment_day_date($request_appointment_date, $request_appointment_day, $days_names);

                            $mutable_valid_appointment_date = $valid_appointment_date;

                            $counter = 1;

                            $all_collected_appointment_slots = array();

                            while ($counter <= 5) :
                                $request_appointment_date_is_valid = $this->is_request_appointment_date_valid($doctors_common_contract_dates, $mutable_valid_appointment_date);

                                if ($request_appointment_date_is_valid) :
                                    $mutable_valid_appointment_date_week = $this->carbonDate($mutable_valid_appointment_date)->weekOfMonth;

                                    if (in_array($mutable_valid_appointment_date_week, $common_working_weeks)) :

                                        $request_appointment_start_time = request()->startTime;

                                        $request_appointment_end_time = request()->endTime;

                                        $doctors_common_working_time = $this->get_doctors_common_start_and_end_time($all_concerned_doctors, $mutable_valid_appointment_date, $request_appointment_day, $mutable_valid_appointment_date_week, $request_appointment_start_time, $request_appointment_end_time);

                                        if (count($doctors_common_working_time) !== 0) :
                                            $all_doctors_appointment_slots = $this->get_one_minutes_slots_of_doctors_appointments($mutable_valid_appointment_date, $doctors_ids);

                                            $all_doctors_break_slots = $this->get_all_doctors_one_minute_break_slots($request_appointment_day, $all_concerned_doctors, $mutable_valid_appointment_date_week);

                                            $all_doctors_appointment_type_bookings = $this->get_doctors_appointment_type_bookings($doctors_ids, $mutable_valid_appointment_date, $request_appointment_day);

                                            $all_taken_slots = Arr::flatten(array_unique(array_merge($all_doctors_break_slots, $all_doctors_appointment_slots, $all_doctors_appointment_type_bookings)));

                                            $all_one_minute_slots_between_common_working_time = $this->get_one_minute_time_slots($doctors_common_working_time);

                                            // $available_one_minute_slots = $this->get_available_one_minute_slots($all_one_minute_slots_between_common_working_time, $all_taken_slots);

                                            // $available_appointment_slots = $this->convert_one_minute_slots_to_given_interval($available_one_minute_slots, request()->interval, $doctors_common_working_time[0]);
                                            // $available_appointment_slots = $this->best_appointment_slot($available_appointment_slots);
                                            $available_appointment_slots = $this->bestAppointmentSlots($all_one_minute_slots_between_common_working_time, $doctors_ids, $doctors_common_working_time[0], request()->interval, $mutable_valid_appointment_date);
                                            $all_collected_appointment_slots[] = [
                                                'date' => $mutable_valid_appointment_date,
                                                'interval' => request()->interval > 0 ? request()->interval : $this->default_interval,
                                                'day' => $days_names[$request_appointment_day],
                                                // 'best_appointment_slot'=>$best_slot,
                                                'slots' => $available_appointment_slots,
                                            ];

                                            $counter++;
                                        endif;
                                    endif;

                                    $mutable_valid_appointment_date = $this->carbonDate($mutable_valid_appointment_date)->addWeek(1)->format("d-m-Y");
                                else :
                                    break;
                                endif;
                            endwhile;

                            return $this->customSuccessResponseWithPayload($all_collected_appointment_slots);

                        // return $this->customSuccessResponseWithPayload(['appointment date not given']);
                        endif;
                        /*
                        * If the concerned doctors do have common contract dates, notify the client
                        */
                        $message = 'Contract(s) of some of the concerned doctor(s) end early';
                        $customMessage = [
                            'message' => $message,
                            'suggestions' => []
                        ];

                        return $this->customFailResponseWithPayload($customMessage);
                    endif;
                    /*
                    * if the concerned doctors do not work on the requested appointment day, notify the client
                    */
                    $message = 'One or all of the concerned doctor(s) do not work on ' . $days_names[$request_appointment_day];
                    $customMessage = [
                        'message' => $message,
                        'suggestions' => []
                    ];

                    return $this->customFailResponseWithPayload($customMessage);


                else :
                    /*
                    * Get all the concerned doctor(s) contract dates details (start & end date)
                    */
                    $doctors_contract_dates = $this->get_doctors_contract_dates($all_concerned_doctors);
                    /*
                    * Get the common contract dates details (start & end date) of the concerned doctor(s)
                    */
                    $doctors_common_contract_dates = $this->get_common_contract_date_range($doctors_contract_dates);
                    /*
                    * Check if the concerned doctors do have common contract dates, then proceed with the next code block
                    */
                    if (count($doctors_common_contract_dates) !== 0) :

                        $mutable_valid_appointment_date = $request_appointment_date;

                        $counter = 1;

                        $all_collected_appointment_slots = array();

                        while ($counter <= 10) :
                            $request_appointment_date_is_valid = $this->is_request_appointment_date_valid($doctors_common_contract_dates, $mutable_valid_appointment_date);

                            if ($request_appointment_date_is_valid) :
                                $appointment_day = $this->carbonDate($mutable_valid_appointment_date)->dayOfWeek;
                                /*
                                * Check if the current date day is in the common workin days of the doctors
                                */
                                if (in_array($appointment_day, $doctors_common_working_days)) :

                                    $mutable_valid_appointment_date_week = $this->carbonDate($mutable_valid_appointment_date)->weekOfMonth;

                                    // dd(in_array($mutable_valid_appointment_date_week, $common_working_weeks));
                                    if (in_array($mutable_valid_appointment_date_week, $common_working_weeks)) :

                                        $request_appointment_start_time = request()->startTime;

                                        $request_appointment_end_time = request()->endTime;

                                        $doctors_common_working_time = $this->get_doctors_common_start_and_end_time($all_concerned_doctors, $mutable_valid_appointment_date, $appointment_day, $mutable_valid_appointment_date_week, $request_appointment_start_time, $request_appointment_end_time);

                                        if (count($doctors_common_working_time) !== 0) :
                                            $all_doctors_appointment_slots = $this->get_one_minutes_slots_of_doctors_appointments($mutable_valid_appointment_date, $doctors_ids);

                                            $all_doctors_break_slots = $this->get_all_doctors_one_minute_break_slots($appointment_day, $all_concerned_doctors, $mutable_valid_appointment_date_week);

                                            $all_doctors_appointment_type_bookings = $this->get_doctors_appointment_type_bookings($doctors_ids, $mutable_valid_appointment_date, $appointment_day);

                                            $all_taken_slots = Arr::flatten(array_unique(array_merge($all_doctors_break_slots, $all_doctors_appointment_slots, $all_doctors_appointment_type_bookings)));

                                            $all_one_minute_slots_between_common_working_time = $this->get_one_minute_time_slots($doctors_common_working_time);

                                            // $available_one_minute_slots = $this->get_available_one_minute_slots($all_one_minute_slots_between_common_working_time, $all_taken_slots);

                                            // $available_appointment_slots = $this->convert_one_minute_slots_to_given_interval($available_one_minute_slots, request()->interval, $doctors_common_working_time[0]);
                                            // $available_appointment_slots = $this->best_appointment_slot($available_appointment_slots);
                                            $available_appointment_slots = $this->bestAppointmentSlots($all_one_minute_slots_between_common_working_time, $doctors_ids, $doctors_common_working_time[0], request()->interval, $mutable_valid_appointment_date);
                                            // dd($available_appointment_slots);
                                            $all_collected_appointment_slots[] = [
                                                'date' => $mutable_valid_appointment_date,
                                                'interval' => request()->interval > 0 ? request()->interval : $this->default_interval,
                                                'day' => $days_names[$appointment_day],
                                                // 'best_appointment_slot'=>$best_slot,
                                                'slots' => $available_appointment_slots,
                                            ];

                                            $counter++;
                                        endif;
                                    endif;
                                endif;
                            else :
                                break;
                            endif;

                            $mutable_valid_appointment_date = $this->carbonDate($mutable_valid_appointment_date)->addDay()->format("d-m-Y");
                        endwhile;

                        return $this->customSuccessResponseWithPayload($all_collected_appointment_slots);

                    // return $this->customSuccessResponseWithPayload(['appointment date not given']);
                    endif;
                    /*
                    * If the concerned doctors do have common contract dates, notify the client
                    */
                    $message = 'Contract(s) of some of the concerned doctor(s) end early';
                    $customMessage = [
                        'message' => $message,
                        'suggestions' => []
                    ];

                    return $this->customFailResponseWithPayload($customMessage);

                endif;

                $message = 'day has not been provided';
                $customMessage = [
                    'message' => $message,
                    'suggestions' => []
                ];

                return $this->customFailResponseWithPayload($customMessage);
            endif;

            $message = 'Doctors do not have common working weeks';
            $customMessage = [
                'message' => $message,
                'suggestions' => []
            ];

            return $this->customFailResponseWithPayload($customMessage);
        endif;
        /*
         * if the concerned doctors do not have common working days, notify the client
         */
        $message = 'The concerned doctor(s) do not have a common working day.';
        $customMessage = [
            'message' => $message,
            'suggestions' => []
        ];

        return $this->customFailResponseWithPayload($customMessage);
    }

    public function checkProcedureAvailability($doctors_common_working_days, $start_date, $treatment_series)
    {
        if (count($doctors_common_working_days) === 0) return false;
        $next_sery_date = $this->getNextSeriesDate($treatment_series, $start_date);
        // dump($next_sery_date);
        $dayOfNext_sery_date = Carbon::parse($next_sery_date)->dayOfWeek;
        if (in_array($dayOfNext_sery_date, $doctors_common_working_days)) return true;
        return false;
    }

    public function getNextSeriesDate($treatment_series, $start_date)
    {
        if ($treatment_series['metric'] === 'day') {
            $mutable_appointment_date = $this->carbonDate($start_date)->addDays($treatment_series['duration'])->format("d-m-Y");
        } elseif ($treatment_series['metric'] === 'week') {
            $mutable_appointment_date = $this->carbonDate($start_date)->addWeeks($treatment_series['duration'])->format("d-m-Y");
        } elseif ($treatment_series['metric'] === 'month') {
            $mutable_appointment_date = $this->carbonDate($start_date)->addWeeks($treatment_series['duration'] * 4)->format("d-m-Y");
        } else {
            $mutable_appointment_date = $this->carbonDate($start_date)->addYears($treatment_series['duration'])->format("d-m-Y");
        }

        return $mutable_appointment_date;
    }

    public function treatment_series()
    {
        $doctors_ids = request()->doctors;
        $all_concerned_doctors = $this->get_all_concerned_doctors($doctors_ids);
        $mutable_start_date = request()->date;
        if(request()->date && Carbon::parse(request()->date)->gte(Carbon::today())){
            $mutable_start_date = request()->date;
        }else{
            $mutable_start_date = Carbon::parse()->format("d-m-YYYY");

        }
        // dd($mutable_start_date);
        /*
        * Get all the concerned doctors common working weeks
        */
        $common_working_weeks = $this->get_doctors_common_working_weeks($all_concerned_doctors);
        // dd($common_working_weeks);
        $doctors_common_working_days = array();

        /*
        * Check if the concerned doctors have some common working weeks
        */
        if (count($common_working_weeks) === 0) :
            $message = 'The provided doctor(s) do not work in the same weeks of the month';
            $customMessage = [
                'message' => $message,
                'suggestions' => []
            ];

            return $this->customFailResponseWithPayload($customMessage);
        endif;
        /*
        * First find out if the concerned doctors do have common working days
        */
        $doctors_common_working_days = $this->get_doctors_common_working_days($all_concerned_doctors);
        // dd($doctors_common_working_days);
        //check if all the doctors will be available for all procedures
        // $procedure_availability = $this->checkProcedureAvailability($doctors_common_working_days,$mutable_start_date);
        /*
         * if the concerned doctors have common working days, then proceed with the next code block
         */
        if (count($doctors_common_working_days) === 0) {
            $message = 'The provided doctor(s) do not have similar working days in a week';
            $customMessage = [
                'message' => $message,
                'suggestions' => []
            ];

            return $this->customFailResponseWithPayload($customMessage);
        }


        /*
        * Get all the concerned doctor(s) contract dates details (start & end date)
        */
        $doctors_contract_dates = $this->get_doctors_contract_dates($all_concerned_doctors);

        /*
        * Get the common contract dates details (start & end date) of the concerned doctor(s)
        */
        $doctors_common_contract_dates = $this->get_common_contract_date_range($doctors_contract_dates);

        /*
        * Check if the concerned doctors do not have common contract dates, then proceed with the next code block
        */
        if (count($doctors_common_contract_dates) === 0) {
            $message = 'The provided doctor(s) do not have colliding contract days';
            $customMessage = [
                'message' => $message,
                'suggestions' => []
            ];
            return $this->customFailResponseWithPayload($customMessage);
        }

        $days_names = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
        $treatment_series = request()->series;
        $treatment_series_slots = array();
        $all_slots_found = false;



        while ($all_slots_found === false) {
            $treatment_series_slots = [];


            $start_date_slots = $this->get_series_doctors_slots($mutable_start_date, request()->interval, $doctors_ids, $all_concerned_doctors, $doctors_common_contract_dates, $common_working_weeks, $doctors_common_working_days, request()->startTime, request()->endTime);
            // dump($start_date_slots);
            // $start_date_slots = count($start_date_slots) > 0 ? $this->best_appointment_slot($start_date_slots) :$start_date_slots ;
            // $start_date_slots = count($start_date_slots) > 0 ? $this->best_appointment_slot($start_date_slots) :$start_date_slots ;
            // $available_appointment_slots = $this->bestAppointmentSlots($start_date_slots,$doctors_ids,$doctors_common_working_time[0],request()->interval,$mutable_start_date );
            // dd( count($start_date_slots));

            if (count($start_date_slots) !== 0) {
                $treatment_series_slots[] = [
                    'serie' => 0,
                    'date' => $mutable_start_date,
                    'interval' => request()->interval > 0 ? request()->interval : $this->default_interval, //todo:use facility default interval, if doctor has no interval set
                    'day' => $days_names[$this->carbonDate($mutable_start_date)->dayOfWeek],
                    // 'best_appointment_slot'=>$best_slot,
                    'slots' => $start_date_slots,
                ];
                $secondary_mutable_start_date = $mutable_start_date;
                // dump($secondary_mutable_start_date);
                $slots_counter = 0;
                //check if all the doctors will be available for all procedures
                $procedure_availability = $this->checkProcedureAvailability($doctors_common_working_days, $mutable_start_date, $treatment_series[0]);
                if (!$procedure_availability) {
                    if (count($doctors_common_contract_dates) === 0) {
                        $message = 'One or more of the provided doctor(s) will not be available for one or more of the treatment procedures';
                        $customMessage = [
                            'message' => $message,
                            'suggestions' => []
                        ];
                        return $this->customFailResponseWithPayload($customMessage);
                    }
                }
                for ($i = 0; $i < count($treatment_series); $i++) {
                    if ($i > 0) {
                        $mutable_appointment_date = '';

                        $mutable_appointment_date = $this->getNextSeriesDate($treatment_series[$i], $secondary_mutable_start_date);
                        $mutable_date_slots = $start_date_slots = $this->get_series_doctors_slots($mutable_appointment_date, $treatment_series[$i]['interval'], $doctors_ids, $all_concerned_doctors, $doctors_common_contract_dates, $common_working_weeks, $doctors_common_working_days, null, null);
                        // $mutable_date_slots = $this->best_appointment_slot($mutable_date_slots);
                        // dd($mutable_date_slots);

                        if (count($mutable_date_slots) !== 0) {
                            $treatment_series_slots[] = [
                                'serie' => $i,
                                'date' => $mutable_appointment_date,
                                'interval' => request()->interval > 0 ? request()->interval : $this->default_interval,
                                'day' => $days_names[$this->carbonDate($mutable_appointment_date)->dayOfWeek],
                                // 'best_appointment_slot'=>$best_slot,
                                'slots' => $mutable_date_slots,
                            ];

                            $slots_counter++;

                            $secondary_mutable_start_date = $mutable_appointment_date;
                        } else {
                            $message = 'One or more of the provided doctor(s) will not be available for one or more of the treatment procedures';
                            $customMessage = [
                                'message' => $message,
                                'suggestions' => []
                            ];
                            return $this->customFailResponseWithPayload($customMessage);
                        }
                    }
                }
                if ((count($treatment_series) - 1) === $slots_counter)
                    $all_slots_found = true;
            }
            if ($all_slots_found === false)
                $mutable_start_date = Carbon::parse($mutable_start_date)->addDay()->format("d-m-Y");
            // dump($mutable_start_date);
        }
        // dd($treatment_series_slots);
        if (Carbon::parse($treatment_series_slots[0]['date'])->gt(Carbon::parse(request('date')))) {
            $message = 'One or all of the concerned doctor(s) do not work on ' . Carbon::parse(request('date'))->format('l');
            $customMessage = [
                'message' => $message,
                'suggestions' => $treatment_series_slots
            ];
            return $this->customFailResponseWithPayload($customMessage);
        }
        return $this->customSuccessResponseWithPayload($treatment_series_slots);
    }

    public function next_treatment_doctor_slots()
    {
        $days_names = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
        // $request_appointment_day = request()->day;
        // $request_appointment_date = request()->date;
        if(request()->date && Carbon::parse(request()->date)->gte(Carbon::today())){
            $request_appointment_date = request()->date;
            $request_appointment_day =  Carbon::parse(request()->date)->dayOfWeek;
        }else{
            $request_appointment_date = Carbon::parse()->format("d-m-Y");
            $request_appointment_day =  Carbon::now()->dayOfWeek;

        }
        $doctors_ids = request()->doctors;
        $all_concerned_doctors = $this->get_all_concerned_doctors($doctors_ids);
        /*
         * First find out if the concerned doctors do have common working days
         */
        $doctors_common_working_days = $this->get_doctors_common_working_days($all_concerned_doctors);
        /*
         * if the concerned doctors have common working days, then proceed with the next code block
         */
        if (count($doctors_common_working_days) !== 0) :
            /*
             * Get all the concerned doctors common working weeks
             */
            $common_working_weeks = $this->get_doctors_common_working_weeks($all_concerned_doctors);
            /*
             * Check if the concerned doctors have some common working weeks
             */
            if (count($common_working_weeks) !== 0) :
                /*
                 * Check if the concerned doctors work on the requested appointment day
                 */
                if (in_array($request_appointment_day, $doctors_common_working_days)) :
                    /*
                     * Get all the concerned doctor(s) contract dates details (start & end date)
                     */
                    $doctors_contract_dates = $this->get_doctors_contract_dates($all_concerned_doctors);
                    /*
                     * Get the common contract dates details (start & end date) of the concerned doctor(s)
                     */
                    $doctors_common_contract_dates = $this->get_common_contract_date_range($doctors_contract_dates);
                    /*
                     * Check if the concerned doctors do have common contract dates, then proceed with the next code block
                     */
                    if (count($doctors_common_contract_dates) !== 0) :
                        /*
                         * Get the valid appointment date in relation with the request appointment day NOT the request appointment date
                        */
                        $valid_appointment_date = $this->valid_request_appointment_day_date($request_appointment_date, $request_appointment_day, $days_names);

                        $mutable_valid_appointment_date = $valid_appointment_date;

                        $all_collected_appointment_slots = array();

                        $request_appointment_date_is_valid = $this->is_request_appointment_date_valid($doctors_common_contract_dates, $mutable_valid_appointment_date);

                        if ($request_appointment_date_is_valid) :
                            $mutable_valid_appointment_date_week = $this->carbonDate($mutable_valid_appointment_date)->weekOfMonth;

                            if (in_array($mutable_valid_appointment_date_week, $common_working_weeks)) :

                                $request_appointment_start_time = request()->startTime;

                                $request_appointment_end_time = request()->endTime;

                                $doctors_common_working_time = $this->get_doctors_common_start_and_end_time($all_concerned_doctors, $mutable_valid_appointment_date, $request_appointment_day, $mutable_valid_appointment_date_week, $request_appointment_start_time, $request_appointment_end_time);

                                if (count($doctors_common_working_time) !== 0) :
                                    $all_doctors_appointment_slots = $this->get_one_minutes_slots_of_doctors_appointments($mutable_valid_appointment_date, $doctors_ids);

                                    $all_doctors_break_slots = $this->get_all_doctors_one_minute_break_slots($request_appointment_day, $all_concerned_doctors, $mutable_valid_appointment_date_week);

                                    $all_doctors_appointment_type_bookings = $this->get_doctors_appointment_type_bookings($doctors_ids, $mutable_valid_appointment_date, $request_appointment_day);

                                    $all_taken_slots = Arr::flatten(array_unique(array_merge($all_doctors_break_slots, $all_doctors_appointment_slots, $all_doctors_appointment_type_bookings)));

                                    $all_one_minute_slots_between_common_working_time = $this->get_one_minute_time_slots($doctors_common_working_time);

                                    $available_one_minute_slots = $this->get_available_one_minute_slots($all_one_minute_slots_between_common_working_time, $all_taken_slots);

                                    $indexOfStartTime = array_search(request()->startTime, $available_one_minute_slots);

                                    if ($indexOfStartTime >= 0) :
                                        $slots_that_start_with_request_startTime = array_slice($available_one_minute_slots, $indexOfStartTime);

                                        $available_appointment_slots = $this->convert_one_minute_slots_to_given_interval($slots_that_start_with_request_startTime, request()->interval, $doctors_common_working_time[0]);

                                        $next_treatment_slot = null;

                                        foreach ($available_appointment_slots as $slot) :
                                            if ($slot['start-time'] === request()->startTime) :
                                                $next_treatment_slot = $slot;
                                                break;
                                            endif;
                                        endforeach;

                                        if ($next_treatment_slot) :

                                            // $available_appointment_slots = $this->bestAppointmentSlot($available_appointment_slots);
                                            // dd($best_slot);
                                            $all_collected_appointment_slots[] = [
                                                'date' => $mutable_valid_appointment_date,
                                                'interval' => request()->interval > 0 ? request()->interval : 10,
                                                'day' => $days_names[$request_appointment_day],
                                                // 'best_appointment_slots'=> $available_appointment_slots,
                                                'slots' => [$next_treatment_slot],
                                            ];

                                            return $this->customSuccessResponseWithPayload($all_collected_appointment_slots);
                                        endif;
                                        /*
                                        * Suggestions should now be computed here
                                        */
                                        $suggestions_parameters = request()->suggestionsDetails;

                                        $suggestions = $this->suggestions(null, $request_appointment_date, $suggestions_parameters['doctors'], $suggestions_parameters['interval'], null, null, null);

                                        $all_collected_appointment_slots[] = [
                                            'date' => $mutable_valid_appointment_date,
                                            'interval' => request()->interval > 0 ? request()->interval : $this->default_interval,
                                            'day' => $days_names[$request_appointment_day],
                                            'slots' => [],
                                            'suggestions' => $suggestions,
                                        ];

                                        return $this->customSuccessResponseWithPayload($all_collected_appointment_slots);
                                    endif;
                                endif;
                            endif;
                        endif;

                        return $this->customSuccessResponseWithPayload($all_collected_appointment_slots);
                    endif;
                    /*
                     * If the concerned doctors do have common contract dates, notify the client
                    */
                    $message = 'Contract(s) of some of the concerned doctor(s) end early';
                    $suggestions = [];
                    $customMessage = [
                        'message' => $message,
                        'suggestions' => $suggestions
                    ];
                    return $this->customFailResponseWithPayload($customMessage);
                endif;
                /*
                 * if the concerned doctors do not work on the requested appointment day, notify the client
                */
                $message = 'One or all of the concerned doctor(s) do not work on ' . $days_names[$request_appointment_day];
                $suggestions = $this->suggestAppointmentSlots($doctors_ids, request()->interval, $request_appointment_date, request()->startTime, request()->endTime);
                $customMessage = [
                    'message' => $message,
                    'suggestions' => $suggestions
                ];
                return $this->customFailResponseWithPayload($customMessage);
            endif;

            $message = 'Doctors do not have common working weeks';
            $suggestions = [];
            $customMessage = [
                'message' => $message,
                'suggestions' => $suggestions
            ];
            return $this->customFailResponseWithPayload($customMessage);
        endif;
        /*
         * if the concerned doctors do not have common working days, notify the client
         */
        $message = 'The concerned doctor(s) do not have a common working day.';
        $suggestions = [];
        $customMessage = [
            'message' => $message,
            'suggestions' => $suggestions
        ];
        return $this->customFailResponseWithPayload($customMessage);
    }

    public function appointment_type_slots()
    {
        $days_names = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];

        $appointment_type = AppointmentType::find(request()->appointmentTypeId);

        if ($appointment_type) {
            $appointment_type_layed_days = $appointment_type->week_days;
            $doctors_ids = request()->doctors;

            $all_doctors = $this->get_all_concerned_doctors($doctors_ids);

            $doctors_common_working_days = $this->get_doctors_common_working_days($all_doctors);
            /*
            * Check if doctors have common working days, then proceed with the next code block
            */
            if (count($doctors_common_working_days) !== 0) {
                /*
                * Get all the common days where the appointment type is set to happen
                */
                $recommended_appointment_days = Arr::flatten(array_intersect($doctors_common_working_days, $appointment_type_layed_days));
                /*
                * Check if there are common days where the appointment type is set to happen, then proceed with the next code block
                */
                if (count($recommended_appointment_days) !== 0) {
                    $request_appointment_day = request()->day ? request()->day : Carbon::now()->dayOfWeek;
                    $request_appointment_date = request()->date ? request()->date : Carbon::parse()->format('d-m-Y');
                    $appointment_type_start_date = $this->carbonDate($appointment_type->start_date);
                    $appointment_type_end_date = $this->carbonDate($appointment_type->end_date);
                    // dd($appointment_type_end_date);
                    if ($request_appointment_day) {
                        /*
                        * Check if the requested appointment day is within the recommended days the appointment should be created in, then proceed with the next code block
                        */
                        // dd(in_array($request_appointment_day, $recommended_appointment_days));
                        if (in_array($request_appointment_day, $recommended_appointment_days)) {

                            $all_collected_appointment_slots = array();
                            /*
                            * Get the valid appointment date in relation with the request appointment day NOT the request appointment date
                            */
                            $valid_appointment_date = $this->valid_request_appointment_day_date($request_appointment_date, $request_appointment_day, $days_names);

                            $mutable_valid_appointment_date = $valid_appointment_date;

                            $counter = 1;

                            while ($counter <= 10) {
                                /*
                                * Check if the valid appointment date is with in the appointment type start and end dates, then proceed with the next code block
                                */
                                if ($this->carbonDate($mutable_valid_appointment_date)->betweenIncluded($appointment_type_start_date, $appointment_type_end_date)) {
                                    $mutable_valid_appointment_date_week = $this->carbonDate($mutable_valid_appointment_date)->weekOfMonth;

                                    $appointment_type_start_time = $appointment_type->start_time;

                                    $appointment_type_end_time = $appointment_type->end_time;

                                    $common_doctors_working_time = $this->get_doctors_common_start_and_end_time($all_doctors, $mutable_valid_appointment_date, $request_appointment_day, $mutable_valid_appointment_date_week, $appointment_type_start_time, $appointment_type_end_time);


                                    if (count($common_doctors_working_time) !== 0) {

                                        // $all_doctors_appointments = $this->get_one_minutes_slots_of_doctors_appointments($mutable_valid_appointment_date, $doctors_ids);
                                        $all_doctors_appointments = $this->get_one_minutes_slots_of_doctors_appointments_of_type($mutable_valid_appointment_date, $doctors_ids, $appointment_type->id, 1);

                                        $all_doctors_time_breaks = $this->get_all_doctors_one_minute_break_slots($request_appointment_day, $all_doctors, $mutable_valid_appointment_date_week);

                                        $taken_slots = Arr::flatten(array_unique(array_merge($all_doctors_time_breaks, $all_doctors_appointments)));

                                        $all_appointment_type_one_minute_slots = $this->get_one_minute_time_slots($common_doctors_working_time);
                                        // dd($common_doctors_working_time);

                                        $available_one_minute_slots = $this->get_available_one_minute_slots($all_appointment_type_one_minute_slots, $taken_slots);

                                        $available_appointment_slots = $this->convert_one_minute_slots_to_given_interval($available_one_minute_slots, $appointment_type->agenda_interval, $common_doctors_working_time[0]);

                                        // $available_appointment_slots = $this->best_appointment_slot($available_appointment_slots);
                                        $available_appointment_slots = $this->bestAppointmentSlots($all_appointment_type_one_minute_slots, $doctors_ids, $common_doctors_working_time, $appointment_type->agenda_interval, $mutable_valid_appointment_date);
                                        $all_collected_appointment_slots[] = [
                                            'date' => $mutable_valid_appointment_date,
                                            'interval' => $appointment_type->agenda_interval,
                                            'day' => Carbon::parse($mutable_valid_appointment_date)->format('l'),
                                            // 'best_appointment_slot'=>$best_slot,
                                            'slots' => $available_appointment_slots,
                                        ];

                                        $counter++;
                                        // if($counter == 2) dd($all_collected_appointment_slots);
                                        // $mutable_valid_appointment_date = $this->carbonDate($mutable_valid_appointment_date)->addWeek(1)->format("d-m-Y");
                                        $mutable_valid_appointment_date = $this->nextAppointmentDate($mutable_valid_appointment_date, $doctors_common_working_days)->format('d-m-Y');
                                        // dd($mutable_valid_appointment_date);

                                    } else {
                                        $message = 'The concerned doctor(s) do not have a common working time. ';
                                        $suggestions = [];
                                        $customMessage = [
                                            'message' => $message,
                                            'suggestions' => $suggestions
                                        ];
                                        // return $this->customFailResponseWithPayload($customMessage);
                                        return $this->customFailResponseWithPayload($customMessage);
                                    }
                                } else {
                                    /*
                                    * if the valid appointment date is not in the range of the appointment type dates, just break from the loop
                                    */
                                    break;
                                }
                            }

                            return $this->customSuccessResponseWithPayload($all_collected_appointment_slots);
                        }
                        /*
                        * If request appointment day is not among the common working days where the appointment type is to happen
                        */
                        $request_appointment_date = request()->date ? request()->date : Carbon::parse()->format('d-m-Y');
                        $message = $days_names[$request_appointment_day] . ' is not among the common working days where the appointment type is to happen';
                        $suggestions = $this->getAppointmentTypeSlotSuggestions($appointment_type, $doctors_ids, $request_appointment_date);
                        $customMessage = [
                            'message' => $message,
                            'suggestions' => $suggestions
                        ];
                        return $this->customFailResponseWithPayload($customMessage);
                        // return $this->customFailResponseWithPayload($customMessage);


                    }
                }
                /*
                 * If there are no common days where the appointment type is set to happen, notify the client
                 */
                $message = 'The common working days of the concerned doctor(s) do not correspond with the appointment type days.';
                $suggestions = [];
                $customMessage = [
                    'message' => $message,
                    'suggestions' => $suggestions
                ];
                // return $this->customFailResponseWithPayload($customMessage);
                return $this->customFailResponseWithPayload($customMessage);
            }
            /*
             * if the concerned doctors do not have common working days, notify the client
             */
            $message = 'The concerned doctor(s) do not have a common working day.';
            $suggestions = [];
            $customMessage = [
                'message' => $message,
                'suggestions' => $suggestions
            ];
            // return $this->customFailResponseWithPayload($customMessage);
            return $this->customFailResponseWithPayload($customMessage);
        }

        $message = 'No appointment type of the id provided in the database';
        $suggestions = [];
        $customMessage = [
            'message' => $message,
            'suggestions' => $suggestions
        ];
        // return $this->customFailResponseWithPayload($customMessage);
        return $this->customFailResponseWithPayload($customMessage);
    }




    public function appointment_type_slots_any_doctor()
    {
        $validator = Validator::make(request()->all(), [
            'appointmentTypeId' => 'required|exists:appointment_types,id',
            'facilityId' => 'required|exists:facilities,id',
            'date' => 'required'
        ]);

        if ($validator->fails()) return $this->customFailResponseWithPayload($validator->errors());

        $validated = $validator->validated();

        $days_names = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
        $request_appointment_date = $validated['date'];

        $appointment_type = AppointmentType::find($validated['appointmentTypeId']);

        if ($appointment_type) :
            $appointment_type_layed_days = $appointment_type->week_days;

            $doctors_ids = array();

            $doctors_ids[] = $this->appointment_type_doctor_with_least_appointments($request_appointment_date, $appointment_type->doctors, $validated['facilityId']);

            $all_doctors = $this->get_all_concerned_doctors($doctors_ids);

            $doctors_common_working_days = $this->get_doctors_common_working_days($all_doctors);
            /*
             * Check if doctors have common working days, then proceed with the next code block
             */
            if (count($doctors_common_working_days) !== 0) :
                /*
                * Get all the common days where the appointment type is set to happen
                */
                $recommended_appointment_days = Arr::flatten(array_intersect($doctors_common_working_days, $appointment_type_layed_days));
                /*
                 * Check if there are common days where the appointment type is set to happen, then proceed with the next code block
                 */
                if (count($recommended_appointment_days) !== 0) :
                    $request_appointment_day = request()->day;

                    $appointment_type_start_date = $this->carbonDate($appointment_type->start_date);
                    $appointment_type_end_date = $this->carbonDate($appointment_type->end_date);

                    if ($request_appointment_day) :
                        /*
                        * Check if the requested appointment day is within the recommended days the appointment should be created in, then proceed with the next code block
                        */
                        if (in_array($request_appointment_day, $recommended_appointment_days)) :

                            $all_collected_appointment_slots = array();
                            /*
                            * Get the valid appointment date in relation with the request appointment day NOT the request appointment date
                            */
                            $valid_appointment_date = $this->valid_request_appointment_day_date($request_appointment_date, $request_appointment_day, $days_names);

                            $mutable_valid_appointment_date = $valid_appointment_date;

                            $counter = 1;

                            while ($counter <= 5) :
                                /*
                                * Check if the valid appointment date is with in the appointment type start and end dates, then proceed with the next code block
                                */
                                if ($this->carbonDate($mutable_valid_appointment_date)->betweenIncluded($appointment_type_start_date, $appointment_type_end_date)) :
                                    $mutable_valid_appointment_date_week = $this->carbonDate($mutable_valid_appointment_date)->weekOfMonth;

                                    $appointment_type_start_time = $appointment_type->start_time;

                                    $appointment_type_end_time = $appointment_type->end_time;

                                    $common_doctors_working_time = $this->get_doctors_common_start_and_end_time($all_doctors, $mutable_valid_appointment_date, $request_appointment_day, $mutable_valid_appointment_date_week, $appointment_type_start_time, $appointment_type_end_time);

                                    if (count($common_doctors_working_time) !== 0) :

                                        // $all_doctors_appointments = $this->get_one_minutes_slots_of_doctors_appointments($mutable_valid_appointment_date, $doctors_ids);
                                        $all_doctors_appointments = $this->get_one_minutes_slots_of_doctors_appointments_of_type($mutable_valid_appointment_date, $doctors_ids, $appointment_type->id, $validated['facilityId']);

                                        $all_doctors_time_breaks = $this->get_all_doctors_one_minute_break_slots($request_appointment_day, $all_doctors, $mutable_valid_appointment_date_week);

                                        $taken_slots = Arr::flatten(array_unique(array_merge($all_doctors_time_breaks, $all_doctors_appointments)));

                                        $all_appointment_type_one_minute_slots = $this->get_one_minute_time_slots($common_doctors_working_time);

                                        $available_one_minute_slots = $this->get_available_one_minute_slots($all_appointment_type_one_minute_slots, $taken_slots);

                                        $available_appointment_slots = $this->convert_one_minute_slots_to_given_interval($available_one_minute_slots, $appointment_type->agenda_interval, $common_doctors_working_time[0]);

                                        // $available_appointment_slots = $this->best_appointment_slot($available_appointment_slots);
                                        $available_appointment_slots = $this->bestAppointmentSlots($all_appointment_type_one_minute_slots, $doctors_ids, $common_doctors_working_time, request()->interval, $mutable_valid_appointment_date);
                                        // dd($best_slot);
                                        $all_collected_appointment_slots[] = [
                                            'date' => $mutable_valid_appointment_date,
                                            'doctor' => collect($all_doctors[0]->toArray())->except(['availability', 'permissions', 'roles']),
                                            'interval' => $appointment_type->agenda_interval,
                                            'day' => $days_names[$request_appointment_day],
                                            // 'best_appointment_slot'=>$best_slot,
                                            'slots' => $available_appointment_slots,
                                        ];

                                        $counter++;
                                    endif;

                                    $mutable_valid_appointment_date = $this->carbonDate($mutable_valid_appointment_date)->addWeek(1)->format("d-m-Y");
                                else :
                                    /*
                                    * if the valid appointment date is not in the range of the appointment type dates, just break from the loop
                                    */
                                    break;
                                endif;
                            endwhile;

                            return $this->customSuccessResponseWithPayload($all_collected_appointment_slots);
                        endif;
                        /*
                        * If request appointment day is not among the common working days where the appointment type is to happen
                        */
                        return $this->customFailResponseWithPayload($days_names[$request_appointment_day] . ' is not among the common working days where the appointment type is to happen');

                    else :

                        $all_collected_appointment_slots = array();

                        $mutable_valid_appointment_date = $request_appointment_date;

                        $counter = 1;

                        while ($counter <= 5) :
                            $appointment_day = $this->carbonDate($mutable_valid_appointment_date)->dayOfWeek;
                            /*
                            * Check if the requested appointment day is within the recommended days the appointment should be created in, then proceed with the next code block
                            */
                            if (in_array($appointment_day, $recommended_appointment_days)) :
                                /*
                                * Check if the valid appointment date is with in the appointment type start and end dates, then proceed with the next code block
                                */
                                if ($this->carbonDate($mutable_valid_appointment_date)->betweenIncluded($appointment_type_start_date, $appointment_type_end_date)) :
                                    $mutable_valid_appointment_date_week = $this->carbonDate($mutable_valid_appointment_date)->weekOfMonth;

                                    $appointment_type_start_time = $appointment_type->start_time;

                                    $appointment_type_end_time = $appointment_type->end_time;

                                    $common_doctors_working_time = $this->get_doctors_common_start_and_end_time($all_doctors, $mutable_valid_appointment_date, $appointment_day, $mutable_valid_appointment_date_week, $appointment_type_start_time, $appointment_type_end_time);

                                    if (count($common_doctors_working_time) !== 0) :

                                        $all_doctors_appointments = $this->get_one_minutes_slots_of_doctors_appointments_of_type($mutable_valid_appointment_date, $doctors_ids, $appointment_type->id, $validated['facilityId']);

                                        $all_doctors_time_breaks = $this->get_all_doctors_one_minute_break_slots($appointment_day, $all_doctors, $mutable_valid_appointment_date_week);

                                        $taken_slots = Arr::flatten(array_unique(array_merge($all_doctors_time_breaks, $all_doctors_appointments)));

                                        $all_appointment_type_one_minute_slots = $this->get_one_minute_time_slots($common_doctors_working_time);

                                        $available_one_minute_slots = $this->get_available_one_minute_slots($all_appointment_type_one_minute_slots, $taken_slots);

                                        // $available_appointment_slots = $this->convert_one_minute_slots_to_given_interval($available_one_minute_slots, $appointment_type->agenda_interval, $common_doctors_working_time[0]);
                                        $available_appointment_slots = $this->bestAppointmentSlots($all_appointment_type_one_minute_slots, $doctors_ids, $common_doctors_working_time, request()->interval, $mutable_valid_appointment_date);
                                        // $best_slot = $this->best_appointment_slot($available_appointment_slots);
                                        // dd($best_slot);
                                        $all_collected_appointment_slots[] = [
                                            'date' => $mutable_valid_appointment_date,
                                            'interval' => $appointment_type->agenda_interval,
                                            'day' => $days_names[$appointment_day],
                                            // 'best_appointment_slot'=>$best_slot,
                                            'slots' => $available_appointment_slots,
                                        ];

                                        $counter++;
                                    endif;
                                else :
                                    /*
                                    * if the valid appointment date is not in the range of the appointment type dates, just break from the loop
                                    */
                                    break;
                                endif;
                            endif;

                            $mutable_valid_appointment_date = $this->carbonDate($mutable_valid_appointment_date)->addDay()->format("d-m-Y");
                        endwhile;

                        return $this->customSuccessResponseWithPayload($all_collected_appointment_slots);
                    endif;
                endif;
                /*
                 * If there are no common days where the appointment type is set to happen, notify the client
                 */
                $message = 'The common working days of the concerned doctor(s) do not correspond with the appointment type days.';
                $suggestions = [];
                $customMessage = [
                    'message' => $message,
                    'suggestions' => $suggestions
                ];
                return $this->customFailResponseWithPayload($customMessage);
            endif;
            /*
             * if the concerned doctors do not have common working days, notify the client
             */
            $message = 'The concerned doctor(s) do not have a common working day.';
            $suggestions = [];
            $customMessage = [
                'message' => $message,
                'suggestions' => $suggestions
            ];
            return $this->customFailResponseWithPayload($customMessage);
        endif;

        $message = 'No appointment type of the id provided in the database';
        $suggestions = [];
        $customMessage = [
            'message' => $message,
            'suggestions' => $suggestions
        ];
        return $this->customFailResponseWithPayload($customMessage);
    }

    public function next_appointmenttype_doctors_slots()
    {
        $days_names = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];

        $appointment_type = AppointmentType::find(request()->appointmentTypeId);

        if ($appointment_type) {
            $appointment_type_layed_days = $appointment_type->week_days;

            $doctors_ids = request()->doctors;

            $all_doctors = $this->get_all_concerned_doctors($doctors_ids);

            $doctors_common_working_days = $this->get_doctors_common_working_days($all_doctors);
            /*
            * Check if doctors have common working days, then proceed with the next code block
            */
            if (count($doctors_common_working_days) !== 0) {
                /*
                * Get all the common days where the appointment type is set to happen
                */
                $recommended_appointment_days = Arr::flatten(array_intersect($doctors_common_working_days, $appointment_type_layed_days));
                /*
                * Check if there are common days where the appointment type is set to happen, then proceed with the next code block
                */
                if (count($recommended_appointment_days) !== 0) {
                    $request_appointment_day = request()->day ? request()->day : Carbon::now()->dayOfWeek;
                    /*
                    * Check if the requested appointment day is within the recommended days the appointment should be created in, then proceed with the next code block
                    */
                    if (in_array($request_appointment_day, $recommended_appointment_days)) {
                        $request_appointment_date = request()->date ? request()->date : Carbon::parse()->format('d-m-Y');

                        $all_collected_appointment_slots = array();
                        /*
                        * Get the valid appointment date in relation with the request appointment day NOT the request appointment date
                        */
                        $valid_appointment_date = $this->valid_request_appointment_day_date($request_appointment_date, $request_appointment_day, $days_names);

                        $mutable_valid_appointment_date = $valid_appointment_date;

                        $appointment_type_start_date = $this->carbonDate($appointment_type->start_date);

                        $appointment_type_end_date = $this->carbonDate($appointment_type->end_date);

                        /*
                        * Check if the valid appointment date is with in the appointment type start and end dates, then proceed with the next code block
                        */
                        if ($this->carbonDate($mutable_valid_appointment_date)->betweenIncluded($appointment_type_start_date, $appointment_type_end_date)) {
                            $mutable_valid_appointment_date_week = $this->carbonDate($mutable_valid_appointment_date)->weekOfMonth;

                            $appointment_type_start_time = $appointment_type->start_time;

                            $appointment_type_end_time = $appointment_type->end_time;

                            $common_doctors_working_time = $this->get_doctors_common_start_and_end_time($all_doctors, $mutable_valid_appointment_date, $request_appointment_day, $mutable_valid_appointment_date_week, $appointment_type_start_time, $appointment_type_end_time);
                            // dd($common_doctors_working_time);

                            if (count($common_doctors_working_time) !== 0) {

                                $all_doctors_appointments = $this->get_one_minutes_slots_of_doctors_appointments($mutable_valid_appointment_date, $doctors_ids);

                                $all_doctors_time_breaks = $this->get_all_doctors_one_minute_break_slots($request_appointment_day, $all_doctors, $mutable_valid_appointment_date_week);

                                $taken_slots = Arr::flatten(array_unique(array_merge($all_doctors_time_breaks, $all_doctors_appointments)));

                                $all_appointment_type_one_minute_slots = $this->get_one_minute_time_slots($common_doctors_working_time);

                                $available_one_minute_slots = $this->get_available_one_minute_slots($all_appointment_type_one_minute_slots, $taken_slots);

                                $indexOfStartTime = array_search(request()->startTime, $available_one_minute_slots);

                                if ($indexOfStartTime >= 0) {
                                    $slots_that_start_with_request_startTime = array_slice($available_one_minute_slots, $indexOfStartTime);

                                    $available_appointment_slots = $this->convert_one_minute_slots_to_given_interval($slots_that_start_with_request_startTime, $appointment_type->agenda_interval, $common_doctors_working_time[0]);
                                    // $available_appointment_slots = $available_appointment_slots = $this->bestAppointmentSlots($all_appointment_type_one_minute_slots,$doctors_ids,$common_doctors_working_time,$appointment_type->agenda_interval,$mutable_valid_appointment_date);
                                    $next_treatment_slot = null;

                                    foreach ($available_appointment_slots as $slot) {
                                        if ($slot['start-time'] === request()->startTime) {
                                            $next_treatment_slot = $slot;
                                            break;
                                        }
                                    }

                                    // dd($next_treatment_slot);
                                    if ($next_treatment_slot) {
                                        // $available_appointment_slots = $this->best_appointment_slot($available_appointment_slots);
                                        // $available_appointment_slots = $this->bestAppointmentSlots($all_appointment_type_one_minute_slots,$doctors_ids,$common_doctors_working_time,request()->interval,$mutable_valid_appointment_date);
                                        // dd($next_treatment_slot);
                                        $all_collected_appointment_slots[] = [
                                            'date' => $mutable_valid_appointment_date,
                                            'interval' => $appointment_type->agenda_interval,
                                            'day' => $days_names[$request_appointment_day],
                                            // 'best_appointment_slots'=> $available_appointment_slots,
                                            'slots' => $next_treatment_slot,
                                        ];

                                        return $this->customSuccessResponseWithPayload($all_collected_appointment_slots);
                                    }
                                    /*
                                    * Suggestions should now be computed here
                                    */
                                    $suggestions_parameters = request()->suggestionsDetails ? request()->suggestionsDetails : ['doctors' => request()->doctors, 'interval' => request()->interval];

                                    $suggestions = $this->suggestions(null, $request_appointment_date, $suggestions_parameters['doctors'], $suggestions_parameters['interval'], $appointment_type_start_time, $appointment_type_end_time, $appointment_type_layed_days);

                                    $all_collected_appointment_slots[] = [
                                        'date' => $mutable_valid_appointment_date,
                                        'interval' => $appointment_type->agenda_interval,
                                        'day' => $days_names[$request_appointment_day],
                                        'slots' => [],
                                        'suggestions' => $suggestions
                                    ];

                                    return $this->customSuccessResponseWithPayload($all_collected_appointment_slots);
                                }
                            }
                        }
                        return $this->customSuccessResponseWithPayload($all_collected_appointment_slots);
                    }
                    /*
                     * If request appointment day is not among the common working days where the appointment type is to happen
                     */
                    $request_appointment_date = request()->date ? request()->date : Carbon::parse()->format('d-m-Y');
                    $appointment_type_start_time = $appointment_type->start_time;

                    $appointment_type_end_time = $appointment_type->end_time;
                    $message = $days_names[$request_appointment_day] . ' is not among the common working days where the appointment type is to happen';
                    $suggestions = $this->suggestions(null, $request_appointment_date, request()->doctors, request()->interval, $appointment_type_start_time, $appointment_type_end_time, $appointment_type_layed_days);
                    $customMessage = [
                        'message' => $message,
                        'suggestions' => $suggestions
                    ];
                    return $this->customFailResponseWithPayload($customMessage);
                }
                /*
                 * If there are no common days where the appointment type is set to happen, notify the client
                 */
                $message = 'The common working days of the concerned doctor(s) do not correspond with the appointment type days.';
                $suggestions = [];
                $customMessage = [
                    'message' => $message,
                    'suggestions' => $suggestions
                ];
                return $this->customFailResponseWithPayload($customMessage);
            }
            /*
             * if the concerned doctors do not have common working days, notify the client
             */
            $message = 'The concerned doctor(s) do not have a common working day.';
            $suggestions = [];
            $customMessage = [
                'message' => $message,
                'suggestions' => $suggestions
            ];
            return $this->customFailResponseWithPayload($customMessage);
        }
        $message = 'No appointment type of the id provided in the database';
        $suggestions = [];
        $customMessage = [
            'message' => $message,
            'suggestions' => $suggestions
        ];
        return $this->customFailResponseWithPayload($customMessage);
    }



    private function get_doctors_appointment_type_bookings($doctor_ids, $appointment_date, $appointment_day)
    {
        $all_appointment_types = AppointmentType::all();
        $all_appointment_types_one_minute_slots = array();

        foreach ($all_appointment_types as $type) :
            if ($type->doctors) :
                if (count($type->doctors) !== 0) :
                    $attached_doctors = Arr::flatten(array_intersect($type->doctors, $doctor_ids));

                    if (count($attached_doctors) !== 0) :

                        if ($this->carbonDate($appointment_date)->gte($this->carbonDate($type->start_date)) && $this->carbonDate($appointment_date)->lte($this->carbonDate($type->end_date))) :
                            if (in_array($appointment_day, $type->week_days)) :

                                $one_minute_slots = $this->slot_to_one_minute_slots([
                                    'start-time' => $type->start_time,
                                    'end-time' => $this->carbonDate($type->end_time)->subMinute()->format('H:i'),
                                ]);

                                $all_appointment_types_one_minute_slots = Arr::flatten(array_merge($all_appointment_types_one_minute_slots, $one_minute_slots));
                            endif;
                        endif;
                    endif;
                endif;
            endif;
        endforeach;

        // return Arr::flatten(array_unique($all_appointment_types_one_minute_slots));
        return [];
    }

    private function get_doctors_common_working_weeks($all_doctors)
    {
        $common_working_weeks = array();
        $common_working_weeks_initialized = false;

        foreach ($all_doctors as $doctor) :
            $weeks = $doctor->weeks;
            if (gettype($weeks) == 'string') $weeks = json_decode($weeks);
            if (is_null($weeks))  return [];
            if (!$common_working_weeks_initialized) :
                $common_working_weeks = $weeks;
                $common_working_weeks_initialized = true;
            endif;
            $common_working_weeks = Arr::flatten(array_intersect($common_working_weeks, $weeks));
        endforeach;

        return $common_working_weeks;
    }

    private function get_all_doctors_one_minute_break_slots($appointment_day, $all_doctors, $week)
    {
        $all_doctors_time_breaks = array();

        foreach ($all_doctors as $doctor) :
            $week_days = array();
            $availabilities = $doctor->availability;
            if (gettype($availabilities) == 'string') $availabilities = json_decode($availabilities);
            // dd($availabilities);
            if (!$availabilities) continue;
            foreach ($availabilities as $availability) :
                if ($availability['week'] === $week) :
                    $week_days = $availability['days'];
                endif;
            endforeach;

            foreach ($week_days as $week_day) :
                if ($week_day['day'] === $appointment_day) :
                    $break_slots = $week_day['break_time'];

                    foreach ($break_slots as $break_slot) :
                        $break_slot['end-time'] = $this->carbonDate($break_slot['end-time'])->subMinute()->format('H:i');

                        $one_minutes_slots = $this->slot_to_one_minute_slots($break_slot);
                        $all_doctors_time_breaks = array_merge($all_doctors_time_breaks, $one_minutes_slots);
                    endforeach;

                    break;
                endif;
            endforeach;
        endforeach;

        return Arr::flatten(array_unique($all_doctors_time_breaks));
    }

    private function convert_one_minute_slots_to_given_interval($one_minute_slots, $duration, $start_time)
    {
        $duration = $duration > 0 ? $duration : $this->default_interval;
        $final_slots = array();

        $start_time = in_array($start_time, $one_minute_slots) ? $start_time : $this->carbonDate(Arr::first($one_minute_slots))->format('H:i');
        foreach ($one_minute_slots as $slot) :
            $interval_between = $this->carbonDate(strtotime($start_time))->diffInMinutes($this->carbonDate(strtotime($slot)));
            // dump($interval_between);
            if ($interval_between === $duration) :
                $final_slots[] = [
                    'start-time' => $start_time,
                    'end-time' => $slot,
                    'is_best' => false
                ];

                $start_time = $slot;
            elseif ($interval_between > $duration) :
                $start_time = $this->carbonDate(strtotime($slot))->format('H:i');
            endif;
        endforeach;
        return $final_slots;
    }



    private function get_available_one_minute_slots($all_one_minute_slots_between_common_working_time, $taken_slots)
    {
        $available_one_minute_slots = array();
        foreach ($all_one_minute_slots_between_common_working_time as $one_minute_slot) :
            if (!in_array($one_minute_slot, $taken_slots, true)) :
                $available_one_minute_slots[] = $one_minute_slot;
            endif;
        endforeach;
        return $available_one_minute_slots;
    }

    private function get_one_minutes_slots_of_doctors_appointments($date, $all_doctor_ids)
    {
        if (!$date) $date = Carbon::now()->format('d-m-Y');
        // dump($date);
        $all_doctors_appointments_slots = [];

        $all_appointments = Appointment::where('date', '=', $date)->where('status_id', '<', 4)->get();

        // dd($all_appointments);
        foreach ($all_doctor_ids as $doctor_id) :

            foreach ($all_appointments as $appointment) :
                $appointment_doctors = $appointment->doctors;

                if (in_array($doctor_id, $appointment_doctors)) :

                    foreach ($appointment->slots as $slot) :
                        $slot['end-time'] = $this->carbonDate($slot['end-time'])->subMinute()->format('H:i');

                        $appointment_one_minute_slots = $this->slot_to_one_minute_slots($slot);

                        foreach ($appointment_one_minute_slots as $one_minute_slot) :
                            /*
                             * pick each time slot and store it in the taken appointments container
                             */
                            $all_doctors_appointments_slots[] = $one_minute_slot;
                        endforeach;
                    endforeach;

                endif;
            endforeach;
        endforeach;

        return Arr::flatten(array_unique($all_doctors_appointments_slots));
    }

    private function get_one_minutes_slots_of_doctors_appointments_of_type($date, $all_doctor_ids, $appointment_type_id, $facility_id)
    {
        $all_doctors_appointments_slots = [];

        $all_appointments = Appointment::where('appointment_type_id', $appointment_type_id)->where('date', '=', $date)->where('status_id', '<', 4)->get();

        // dd($all_appointments);
        foreach ($all_doctor_ids as $doctor_id) :

            foreach ($all_appointments as $appointment) :
                $appointment_doctors = $appointment->doctors;

                if (in_array($doctor_id, $appointment_doctors)) :

                    foreach ($appointment->slots as $slot) :
                        $slot['end-time'] = $this->carbonDate($slot['end-time'])->subMinute()->format('H:i');
                        $appointment_one_minute_slots = $this->slot_to_one_minute_slots($slot);

                        foreach ($appointment_one_minute_slots as $one_minute_slot) :
                            /*
                             * pick each time slot and store it in the taken appointments container
                             */
                            $all_doctors_appointments_slots[] = $one_minute_slot;
                        endforeach;
                    endforeach;

                endif;
            endforeach;
        endforeach;

        return Arr::flatten(array_unique($all_doctors_appointments_slots));
    }


    private function slot_to_one_minute_slots($slot)
    {

        $start_time = $slot['start-time'];
        $end_time = $slot['end-time'];
        $one_minute_slots = array();

        $interval_between = $this->carbonDate($start_time)->diffInMinutes($this->carbonDate($end_time));

        for ($j = 0; $j < $interval_between; $j++) :

            $slot_start_time = $this->carbonDate($start_time)->addMinutes(1 * $j);

            $slot_end_time = $this->carbonDate($start_time)->addMinutes(1 * ($j + 1));

            array_push($one_minute_slots, $slot_start_time->format('H:i'), $slot_end_time->format('H:i'));
        endfor;

        return $one_minute_slots;
    }

    private function get_one_minute_time_slots($doctors_common_working_time)
    {
        $common_start_time = $doctors_common_working_time[0];
        $common_end_time = $doctors_common_working_time[1];
        $all_minutes_between_common_working_time = $this->carbonDate($common_start_time)->diffInMinutes($this->carbonDate($common_end_time));
        $one_minute_slots = array();

        for ($i = 0; $i < $all_minutes_between_common_working_time; $i++) :

            $start_time = $this->carbonDate($common_start_time)->addMinutes($i)->format('H:i');

            $slot_start_time = $start_time;

            $slot_end_time = $this->carbonDate($start_time)->addMinutes(1);

            array_push($one_minute_slots, $slot_start_time, $slot_end_time->format('H:i'));
        endfor;

        return Arr::flatten(array_unique($one_minute_slots));
    }

    private function get_doctors_common_start_and_end_time($all_doctors, $appointment_date, $appointment_day, $week, $appointment_start_time, $appointment_end_time)
    {
        if ($appointment_start_time && $appointment_end_time) :
            $request_start_time = $this->convert_time_to_desired_date($appointment_date, $appointment_start_time);
            $request_end_time = $this->convert_time_to_desired_date($appointment_date, $appointment_end_time);
        else :
            $request_start_time = null;
            $request_end_time = null;
        endif;

        $common_doctors_start_time = '';
        $first_start_time_set = false;
        $common_doctors_end_time = '';
        $first_end_time_set = false;
        $common_start_and_end_time_valid = true;
        $doctors_times = array();

        foreach ($all_doctors as $doctor) :
            $week_days = array();
            $availabilities = $doctor->availability;
            if (gettype($availabilities) == 'string') $availabilities = json_decode($availabilities, true);
            foreach ($availabilities as $availability) :
                if ($availability['week'] === $week) :
                    $week_days = $availability['days'];
                endif;
            endforeach;

            foreach ($week_days as $day) :
                if ($day['day'] === $appointment_day) :
                    // dd($day);
                    $doctors_times[] = [
                        'start-time' => $this->convert_time_to_desired_date($appointment_date, $day['start-time']),
                        'end-time' => $this->convert_time_to_desired_date($appointment_date, $day['end-time']),
                    ];
                    break;
                endif;
            endforeach;
        endforeach;

        foreach ($doctors_times as $slot) :
            // dd($slot);
            $start_time = $this->carbonDate($slot['start-time']);
            $end_time = $this->carbonDate($slot['end-time']);

            if (!$first_start_time_set) :
                $common_doctors_start_time = $start_time;
                $first_start_time_set = true;
            else :
                if ($start_time->gte($this->carbonDate($common_doctors_start_time))) :
                    $common_doctors_start_time = $start_time;
                endif;
            endif;

            if (!$first_end_time_set) :
                $common_doctors_end_time = $end_time;
                $first_end_time_set = true;
            else :
                if ($end_time->lte($this->carbonDate($common_doctors_end_time))) :
                    $common_doctors_end_time = $end_time;
                endif;
            endif;
        endforeach;

        if ($request_start_time && $this->carbonDate($common_doctors_start_time)->lte($this->carbonDate($request_start_time))) :
            $common_doctors_start_time = $request_start_time;
        else :
            $common_doctors_start_time = $this->convert_time_to_desired_date($appointment_date, $this->carbonDate($common_doctors_start_time)->format('H:i'));
        endif;

        if ($request_end_time && $this->carbonDate($request_end_time)->lte($this->carbonDate($common_doctors_end_time))) :
            $common_doctors_end_time = $request_end_time;
        else :
            $common_doctors_end_time = $this->convert_time_to_desired_date($appointment_date, $this->carbonDate($common_doctors_end_time)->format('H:i'));
        endif;

        foreach ($doctors_times as $slot) :
            $start_time = $slot['start-time'];
            $end_time = $slot['end-time'];

            if ($this->carbonDate($common_doctors_start_time)->betweenIncluded($this->carbonDate($start_time), $this->carbonDate($end_time)) && $this->carbonDate($common_doctors_end_time)->betweenIncluded($this->carbonDate($start_time), $this->carbonDate($end_time))) :
                continue;
            else :
                $common_start_and_end_time_valid = false;
                break;
            endif;
        endforeach;

        if ($common_start_and_end_time_valid) :
            return [$this->carbonDate($common_doctors_start_time)->format('H:i'), $this->carbonDate($common_doctors_end_time)->format('H:i')];
        endif;

        return [];
    }

    private function convert_time_to_desired_date($date, $time_string)
    {
        return $date . ' ' . $time_string;
    }

    private function appointment_date_within_contract_dates($appointment_date, $common_contract_dates)
    {
        if ($this->carbonDate($appointment_date)->between($this->carbonDate($common_contract_dates[0]), $this->carbonDate($common_contract_dates[1]))) :
            return true;
        endif;

        return false;
    }

    private function valid_request_appointment_day_date($request_appointment_date, $request_appointment_day, $days_names)
    {
        if ($this->carbonDate($request_appointment_date)->dayOfWeek !== $request_appointment_day) :

            Carbon::setTestNow($this->carbonDate($request_appointment_date));

            $day_query = 'this ' . $days_names[$request_appointment_day];

            $recommended_date = $this->carbonDate($day_query);

            return $recommended_date->format('d-m-Y');
        endif;

        return $request_appointment_date;
    }

    private function is_request_appointment_date_valid($common_contract_dates, $appointment_date)
    {
        // dd($appointment_date);
        $start_contract_date = $this->carbonDate($common_contract_dates[0]);
        $end_contract_date = $this->carbonDate($common_contract_dates[1]);
        $carbon_appointment_date = $this->carbonDate($appointment_date);

        if ($carbon_appointment_date->betweenIncluded($start_contract_date, $end_contract_date)) :
            return true;
        endif;

        return false;
    }

    private function get_common_contract_date_range($concerned_doctor_contract_dates)
    {
        $common_contracts_start_date = '';
        $common_contracts_end_date = '';
        $start_date_initialized = false;
        $end_date_initialized = false;
        $common_start_and_end_contract_dates_valid = true;

        foreach ($concerned_doctor_contract_dates as $contract_dates) {
            $contract_start_date = $this->carbonDate($contract_dates['start_date']);
            $contract_end_date = $this->carbonDate($contract_dates['end_date']);

            if (!$start_date_initialized) {
                $common_contracts_start_date = $contract_start_date->format('d-m-Y');

                $start_date_initialized = true;
            } else {
                if ($contract_start_date->gte($this->carbonDate($common_contracts_start_date)))
                    $common_contracts_start_date = $contract_start_date->format('d-m-Y');
                // endif;
            }
            // endif;

            if (!$end_date_initialized) {
                $common_contracts_end_date = $contract_end_date->format('d-m-Y');
                $end_date_initialized = true;
            } else {
                if ($contract_end_date->lte($this->carbonDate($common_contracts_end_date)))
                    $common_contracts_end_date = $contract_end_date->format('d-m-Y');
                // endif;

            }
            // endif;
        }

        foreach ($concerned_doctor_contract_dates as $contract_dates) {
            $contract_start_date = $this->carbonDate($contract_dates['start_date']);
            $contract_end_date = $this->carbonDate($contract_dates['end_date']);
            // dd($common_contracts_end_date);

            $common_start_date = $this->carbonDate($common_contracts_start_date);
            $common_end_date = $this->carbonDate($common_contracts_end_date);

            if (
                $common_start_date->betweenIncluded($contract_start_date, $contract_end_date)
                && $common_end_date->betweenIncluded($contract_start_date, $contract_end_date)
            )  continue;
            else {
                $common_start_and_end_contract_dates_valid = false;
                break;
            }
            // endif;
        }

        if ($common_start_and_end_contract_dates_valid)
            return [$common_contracts_start_date, $common_contracts_end_date];
        // endif;

        return [];
    }

    private function get_doctors_common_working_days($all_doctors)
    {
        // dd($all_doctors);
        $common_working_days = array();
        $initialized_common_working_days = false;

        foreach ($all_doctors as $doctor) :
            // dump($doctor->week_days);
            $working_days = $doctor->week_days;
            if (gettype($working_days) == 'string') $working_days = json_decode($working_days);
            if (is_null($working_days) || count($working_days) == 0) return [];
            if (!$initialized_common_working_days) :
                $common_working_days = $working_days;
                $initialized_common_working_days = true;
            else :
                $common_working_days = Arr::flatten(array_intersect($common_working_days, $working_days));
            endif;
        endforeach;

        // dd($common_working_days);
        return $common_working_days;
    }

    private function get_doctors_contract_dates($all_doctors)
    {
        $contract_dates = array();

        foreach ($all_doctors as $doctor) :
            $contract_dates[] = [
                'start_date' => $doctor->contract_start_date,
                'end_date' => $doctor->contract_end_date,
            ];
        endforeach;

        return $contract_dates;
    }

    private function get_all_concerned_doctors($doctor_ids)
    {
        // dd($doctor_ids);
        $all_doctors = array();

        foreach ($doctor_ids as $doctor_id) :
            $all_doctors[] = Employee::find($doctor_id);
        endforeach;

        return $all_doctors;
    }

    private function carbonDate($date)
    {
        try {
           $return_date = Carbon::parse($date);
           return $return_date;
        } catch (\Throwable $th) {
            //throw $th;
        }


    }

    private function doctor_with_least_appointments($date)
    {
        $all_appointments = Appointment::where('date', '=', $date)
            ->where('status_id', '<', 4)
            ->get(['date', 'doctors']);

        $doctors = Employee::where('id', '!=', 1)->get(['id']);

        $info = array();

        foreach ($doctors as $doctor) :
            $app_count = 0;

            foreach ($all_appointments as $appointment) :
                if (in_array($doctor->id, $appointment->doctors)) :
                    $app_count += 1;
                endif;
            endforeach;

            if (count($info) !== 0) :
                if ($app_count < $info['count']) :
                    $info = [
                        'doctor' => $doctor->id,
                        'count' => $app_count
                    ];
                endif;
            else :
                $info = [
                    'doctor' => $doctor->id,
                    'count' => $app_count
                ];
            endif;
        endforeach;

        return $info['doctor'];
    }


    private function appointment_type_doctor_with_least_appointments($date, $doctor_ids, $facility_id)
    {
        $all_appointments = Appointment::where('date', '=', $date)
            ->where('status_id', '<', 4)
            ->get(['date', 'doctors']);

        $info = array();

        foreach ($doctor_ids as $doctor_id) :
            if ($doctor_id !== 1) :
                $app_count = 0;

                foreach ($all_appointments as $appointment) :
                    if (in_array($doctor_id, $appointment->doctors)) :
                        $app_count += 1;
                    endif;
                endforeach;

                if (count($info) !== 0) :
                    if ($app_count < $info['count']) :
                        $info = [
                            'doctor' => $doctor_id,
                            'count' => $app_count
                        ];
                    endif;
                else :
                    $info = [
                        'doctor' => $doctor_id,
                        'count' => $app_count
                    ];
                endif;
            endif;
        endforeach;

        return $info['doctor'];
    }

    private function suggestions($appointment_day, $start_date, $doctors, $suggested_interval, $appointment_start_time, $appointment_end_time, $appointment_week_days)
    {
        $suggested_interval = $suggested_interval > 0 ? $suggested_interval : $this->default_interval;
        $days_names = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
        $request_appointment_day = $appointment_day;
        $request_appointment_date = $start_date;
        $doctors_ids = $doctors;
        // return response(['doctor ids', request()->doctors]);
        $all_concerned_doctors = $this->get_all_concerned_doctors($doctors_ids);
        /*
         * First find out if the concerned doctors do have common working days
         */
        $doctors_common_working_days = $this->get_doctors_common_working_days($all_concerned_doctors);
        /*
         * if the concerned doctors have common working days, then proceed with the next code block
         */
        // Arr::flatten(array_intersect($common_working_days, $working_days));
        if ($appointment_week_days) :
            $doctors_common_working_days = Arr::flatten(array_intersect($doctors_common_working_days, $appointment_week_days));
        endif;

        if (count($doctors_common_working_days) !== 0) :

            /*
             * Get all the concerned doctors common working weeks
             */
            $common_working_weeks = $this->get_doctors_common_working_weeks($all_concerned_doctors);
            /*
             * Check if the concerned doctors have some common working weeks
            */
            if (count($common_working_weeks) !== 0) :
                if ($request_appointment_day) :
                    /*
                    * Check if the concerned doctors work on the requested appointment day
                    */
                    if (in_array($request_appointment_day, $doctors_common_working_days)) :
                        /*
                        * Get all the concerned doctor(s) contract dates details (start & end date)
                        */
                        $doctors_contract_dates = $this->get_doctors_contract_dates($all_concerned_doctors);
                        /*
                        * Get the common contract dates details (start & end date) of the concerned doctor(s)
                        */
                        $doctors_common_contract_dates = $this->get_common_contract_date_range($doctors_contract_dates);
                        /*
                        * Check if the concerned doctors do have common contract dates, then proceed with the next code block
                        */
                        if (count($doctors_common_contract_dates) !== 0) :

                            /*
                            * Get the valid appointment date in relation with the request appointment day NOT the request appointment date
                            */
                            $valid_appointment_date = $this->valid_request_appointment_day_date($request_appointment_date, $request_appointment_day, $days_names);

                            $mutable_valid_appointment_date = $valid_appointment_date;

                            $counter = 1;

                            $all_collected_appointment_slots = array();

                            // dd(['valid appointment date' => $mutable_valid_appointment_date]);

                            while ($counter <= 5) :
                                $request_appointment_date_is_valid = $this->is_request_appointment_date_valid($doctors_common_contract_dates, $mutable_valid_appointment_date);

                                if ($request_appointment_date_is_valid) :
                                    $mutable_valid_appointment_date_week = $this->carbonDate($mutable_valid_appointment_date)->weekOfMonth;

                                    if (in_array($mutable_valid_appointment_date_week, $common_working_weeks)) :

                                        $request_appointment_start_time = null;

                                        $request_appointment_end_time = null;

                                        $doctors_common_working_time = $this->get_doctors_common_start_and_end_time($all_concerned_doctors, $mutable_valid_appointment_date, $request_appointment_day, $mutable_valid_appointment_date_week, $request_appointment_start_time, $request_appointment_end_time);

                                        if (count($doctors_common_working_time) !== 0) :
                                            $all_doctors_appointment_slots = $this->get_one_minutes_slots_of_doctors_appointments($mutable_valid_appointment_date, $doctors_ids);

                                            $all_doctors_break_slots = $this->get_all_doctors_one_minute_break_slots($request_appointment_day, $all_concerned_doctors, $mutable_valid_appointment_date_week);

                                            $all_doctors_appointment_type_bookings = $this->get_doctors_appointment_type_bookings($doctors_ids, $mutable_valid_appointment_date, $request_appointment_day);

                                            $all_taken_slots = Arr::flatten(array_unique(array_merge($all_doctors_break_slots, $all_doctors_appointment_slots, $all_doctors_appointment_type_bookings)));

                                            $all_one_minute_slots_between_common_working_time = $this->get_one_minute_time_slots($doctors_common_working_time);

                                            $available_one_minute_slots = $this->get_available_one_minute_slots($all_one_minute_slots_between_common_working_time, $all_taken_slots);

                                            $available_appointment_slots = $this->convert_one_minute_slots_to_given_interval($available_one_minute_slots, $suggested_interval, $doctors_common_working_time[0]);

                                            // $available_appointment_slots= $this->best_appointment_slot($available_appointment_slots);
                                            $available_appointment_slots = $this->bestAppointmentSlots($all_one_minute_slots_between_common_working_time, $doctors_ids, $doctors_common_working_time, request()->interval, $mutable_valid_appointment_date);
                                            // dd($best_slot);
                                            $all_collected_appointment_slots[] = [
                                                'date' => $mutable_valid_appointment_date,
                                                'interval' => $suggested_interval,
                                                'day' => $days_names[$request_appointment_day],
                                                // 'best_appointment_slot'=>$best_slot,
                                                'slots' => $available_appointment_slots,
                                            ];

                                            $counter++;
                                        endif;
                                    endif;

                                    $mutable_valid_appointment_date = $this->carbonDate($mutable_valid_appointment_date)->addWeek(1)->format("d-m-Y");
                                else :
                                    break;
                                endif;
                            endwhile;

                            // dd(['valid appointment date' => $all_collected_appointment_slots]);

                            return $all_collected_appointment_slots;

                        // return $this->customSuccessResponseWithPayload(['appointment date not given']);
                        endif;
                        /*
                        * If the concerned doctors do have common contract dates, notify the client
                        */
                        return 'Contract(s) of some of the concerned doctor(s) end early';
                    endif;
                    /*
                    * if the concerned doctors do not work on the requested appointment day, notify the client
                    */
                    return 'One or all of the concerned doctor(s) do not work on ' . $days_names[$request_appointment_day];

                else :
                    /*
                    * Get all the concerned doctor(s) contract dates details (start & end date)
                    */
                    $doctors_contract_dates = $this->get_doctors_contract_dates($all_concerned_doctors);
                    /*
                    * Get the common contract dates details (start & end date) of the concerned doctor(s)
                    */
                    $doctors_common_contract_dates = $this->get_common_contract_date_range($doctors_contract_dates);
                    /*
                    * Check if the concerned doctors do have common contract dates, then proceed with the next code block
                    */
                    if (count($doctors_common_contract_dates) !== 0) :

                        $mutable_valid_appointment_date = $request_appointment_date;

                        $counter = 1;

                        $all_collected_appointment_slots = array();

                        $passed_through_days = array();

                        while ($counter <= 10) :
                            $request_appointment_date_is_valid = $this->is_request_appointment_date_valid($doctors_common_contract_dates, $mutable_valid_appointment_date);

                            if ($request_appointment_date_is_valid) :
                                $appointment_day = $this->carbonDate($mutable_valid_appointment_date)->dayOfWeek;
                                /*
                                * Check if the current date day is in the common workin days of the doctors
                                */
                                if (in_array($appointment_day, $doctors_common_working_days)) :

                                    $mutable_valid_appointment_date_week = $this->carbonDate($mutable_valid_appointment_date)->weekOfMonth;

                                    if (in_array($mutable_valid_appointment_date_week, $common_working_weeks)) :

                                        $request_appointment_start_time = $appointment_start_time;

                                        $request_appointment_end_time = $appointment_end_time;

                                        $doctors_common_working_time = $this->get_doctors_common_start_and_end_time($all_concerned_doctors, $mutable_valid_appointment_date, $appointment_day, $mutable_valid_appointment_date_week, $request_appointment_start_time, $request_appointment_end_time);

                                        if (count($doctors_common_working_time) !== 0) :
                                            $all_doctors_appointment_slots = $this->get_one_minutes_slots_of_doctors_appointments($mutable_valid_appointment_date, $doctors_ids);

                                            $all_doctors_break_slots = $this->get_all_doctors_one_minute_break_slots($appointment_day, $all_concerned_doctors, $mutable_valid_appointment_date_week);

                                            $all_doctors_appointment_type_bookings = $this->get_doctors_appointment_type_bookings($doctors_ids, $mutable_valid_appointment_date, $appointment_day);

                                            $all_taken_slots = Arr::flatten(array_unique(array_merge($all_doctors_break_slots, $all_doctors_appointment_slots, $all_doctors_appointment_type_bookings)));

                                            $all_one_minute_slots_between_common_working_time = $this->get_one_minute_time_slots($doctors_common_working_time);

                                            $available_one_minute_slots = $this->get_available_one_minute_slots($all_one_minute_slots_between_common_working_time, $all_taken_slots);

                                            $available_appointment_slots = $this->convert_one_minute_slots_to_given_interval($available_one_minute_slots, $suggested_interval, $doctors_common_working_time[0]);

                                            if (count($available_appointment_slots) !== 0) :
                                                // $available_appointment_slots = $this->best_appointment_slot($available_appointment_slots);
                                                $available_appointment_slots = $this->bestAppointmentSlots($all_one_minute_slots_between_common_working_time, $doctors_ids, $doctors_common_working_time, request()->interval, $mutable_valid_appointment_date);
                                                // dd($best_slot);
                                                $all_collected_appointment_slots[] = [
                                                    'date' => $mutable_valid_appointment_date,
                                                    'interval' => $suggested_interval,
                                                    'day' => $days_names[$appointment_day],
                                                    // 'best_appointment_slot'=>$best_slot,
                                                    'slots' => $available_appointment_slots,
                                                ];

                                                $counter++;
                                            endif;
                                        endif;
                                    endif;
                                endif;
                            else :
                                break;
                            endif;

                            $mutable_valid_appointment_date = $this->carbonDate($mutable_valid_appointment_date)->addDay()->format("d-m-Y");
                        endwhile;

                        return $all_collected_appointment_slots;

                    // return $this->customSuccessResponseWithPayload(['appointment date not given']);
                    endif;
                    /*
                    * If the concerned doctors do have common contract dates, notify the client
                    */
                    return 'Contract(s) of some of the concerned doctor(s) end early';
                endif;

                return 'day has not been provided';
            endif;

            return 'Doctors do not have common working weeks';
        endif;
        /*
         * if the concerned doctors do not have common working days, notify the client
         */
        return 'The concerned doctor(s) do not have a common working day.';
    }

    public function get_series_doctors_slots($provided_date, $interval, $doctors_ids, $all_concerned_doctors, $doctors_common_contract_dates,  $common_working_weeks, $doctors_common_working_days, $startTime, $endTime)
    {
        $interval = $interval > 0 ? $interval : $this->default_interval;
        $provided_date_is_valid = $this->is_request_appointment_date_valid($doctors_common_contract_dates, $provided_date);
        if ($provided_date_is_valid) {
            $provided_date_week = $this->carbonDate($provided_date)->weekOfMonth;

            if (in_array($provided_date_week, $common_working_weeks)) {
                $provided_day = $this->carbonDate($provided_date)->dayOfWeek;
                // dd( in_array($provided_day, $doctors_common_working_days));
                /*
                * Check if the current date day is in the common workin days of the doctors
                */
                if (in_array($provided_day, $doctors_common_working_days)) {
                    $request_appointment_start_time = $startTime;
                    $request_appointment_end_time = $endTime;

                    $doctors_common_working_time = $this->get_doctors_common_start_and_end_time($all_concerned_doctors, $provided_date, $provided_day, $provided_date_week, $request_appointment_start_time, $request_appointment_end_time);

                    if (count($doctors_common_working_time) !== 0) {
                        $all_doctors_appointment_slots = $this->get_one_minutes_slots_of_doctors_appointments($provided_date, $doctors_ids);

                        $all_doctors_break_slots = $this->get_all_doctors_one_minute_break_slots($provided_day, $all_concerned_doctors, $provided_date_week);

                        $all_doctors_appointment_type_bookings = $this->get_doctors_appointment_type_bookings($doctors_ids, $provided_date, $provided_day);

                        $all_taken_slots = Arr::flatten(array_unique(array_merge($all_doctors_break_slots, $all_doctors_appointment_slots, $all_doctors_appointment_type_bookings)));

                        $all_one_minute_slots_between_common_working_time = $this->get_one_minute_time_slots($doctors_common_working_time);

                        $available_one_minute_slots = $this->get_available_one_minute_slots($all_one_minute_slots_between_common_working_time, $all_taken_slots);

                        // $available_appointment_slots = $this->convert_one_minute_slots_to_given_interval($available_one_minute_slots, $interval, $doctors_common_working_time[0]);
                        $available_appointment_slots = $this->bestAppointmentSlots($all_one_minute_slots_between_common_working_time, $doctors_ids, $doctors_common_working_time, request()->interval, $provided_date);
                        // If there are available slots on this specific day
                        if (count($available_appointment_slots) !== 0)
                            return $available_appointment_slots;
                        return [];
                    }
                    return [];
                }
                return [];
            }
            return [];
        }
        return [];
    }

    public function generate_doctors_free_slots()
    {
        try {
            $slots = (new SlotsService)->generate_doctors_free_slots(request()->appointmentTypeId, 1, request()->date);
            return $this->customPatientSuccessResponse($slots);
        } catch (Throwable $ex) {
            return $this->customPatientErrorResponse($ex->getMessage());
        }
    }
}
