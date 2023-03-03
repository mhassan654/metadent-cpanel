<?php
/*
 * Developer: MUHAMMED KASUJJA 30/09/2022
 * Email: al.kasmud.2@gmail.com
 * Github: https://github.com/MuhammedKasujja
 * Phone: +256774262923/+256705613444
*/

namespace App\Services\SlotsService;

use App\Models\Appointment;
use App\Models\AppointmentType;
use App\Models\TreatmentType;
use Metadent\AuthModule\Models\Employee;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

class SlotsService
{

    private $timezone;

    public function __construct($timezone = null)
    {
        // $this->timezone = $timezone;
        $this->timezone = 'Europe/Amsterdam';
    }

    public function generate_doctors_free_slots(int $appointment_type_id, int $facility_id, string $date)
    {
        $appointment_type = AppointmentType::find($appointment_type_id);

        if (!$appointment_type) {
            throw new Exception('Appointment type not found');
        }
        // return $this->get_available_open_slots_for_doctors([], []);

        $newDate =  $this->generate_week_and_day_from_date($date);

        $formatted_date =  Carbon::parse($date, $this->timezone)->format('d-m-Y');

        $doctors = $this->get_available_doctors_based_on_day($newDate->day, $newDate->week, $facility_id);

        $doctor_ids = array_map(function ($doctor) {
            return $doctor->id;
        }, $doctors);

        $occupied_slots = $this->get_doctors_occupied_slots($formatted_date, $doctor_ids);

        if ($doctors) {
            $slot =  $this->genereate_availability_slot_start_time_end_time($doctors);
            $arr_slots = $this->generate_slots($slot, $appointment_type->agenda_interval);
            $open_slots = $this->get_available_open_slots($arr_slots, $formatted_date);
            // return $open_slots;
            return $this->get_available_open_slots_for_doctors($open_slots, $occupied_slots);
        }
        throw new Exception('No slots available');
    }

    public function get_available_doctors_based_on_day(int $day, int $week, int $facility_id, $doctor_id = null): array
    {
        $doctors = $this->get_available_doctors_based_on_week($day, $week, $facility_id, $doctor_id);
        $doctor_available_in_day = array();
        foreach ($doctors as $doctor) {
            $doctor->date = array_reduce($doctor->availability->days, function ($carry, $item) use ($day) {
                return $carry ?? ($item->day === $day ? $item : $carry);
            }, null);
            /*
            * Remove unneccesary [doctor->availability] property
            */
            unset($doctor->availability);
            array_push($doctor_available_in_day, $doctor);
        }
        return $doctor_available_in_day;
    }

    public function get_available_doctors_based_on_week(int $day, int $week, int $facility_id, $doctor_id = null)
    {
        $doctors = DB::table('employees', 'e')
            ->where('e.facility_id', $facility_id)
            ->whereJsonContains('e.availability', [['week' => $week]])
            ->whereJsonContains('e.availability', ['days' => [['day' => $day]]])
            ->when($doctor_id, function ($q) use ($doctor_id) {
                return $q->where('id', $doctor_id);
            })
            ->get(['e.id', 'first_name', 'last_name', 'availability', 'department_id']);

        $doctor_in_weeks = array();

        foreach ($doctors as $doctor) {
            $availability_list = json_decode($doctor->availability);
            $doctor->availability = array_reduce($availability_list,  function ($carry, $item) use ($week) {
                return $carry ?? ($item->week === $week ? $item : $carry);
            }, null);
            array_push($doctor_in_weeks, $doctor);
        }
        return $doctor_in_weeks;
    }

    public function generate_week_and_day_from_date(string $date)
    {
        try {
            $now = Carbon::now($this->timezone)->startOfDay();
            $appointment_date = Carbon::parse($date, $this->timezone)->startOfDay();

            if ($appointment_date->lessThan($now)) {
                throw new Exception("Date has already passed", 301);
            }
            $objDate  = new \stdClass;
            $objDate->week = $appointment_date->weekNumberInMonth;
            $objDate->day = $appointment_date->dayOfWeek;

            return $objDate;
        } catch (Throwable $ex) {
            if ($ex->getCode() == 301) {
                throw $ex;
            }
            throw new Exception("Please use date format as dd-mm-yyyy");
        }
    }


    /**
     * get minimum start_time and maximum end_time from available doctors list slots
     * and create a slot that will be used to generate other slots
     */

    private function genereate_availability_slot_start_time_end_time(array $doctors): \stdClass
    {
        $result = array_reduce($doctors, function ($carry, $ele) {
            $start_time = (int) str_replace(':', '', $ele->date->{"start-time"});
            $end_time = (int) str_replace(':', '', $ele->date->{"end-time"});
            $carry = [
                "end_time" => $carry['end_time'] ?  max($carry['end_time'], $end_time) : $end_time,
                "start_time" => $carry['start_time'] ? min($carry['start_time'], $start_time) : $start_time
            ];

            return $carry;
        },  ["end_time" => 0, "start_time" => 0]);

        $objSlot  = new \stdClass;
        $objSlot->start_time = $this->convert_int_time_to_string_time($result['start_time'], ':', -2);
        $objSlot->end_time = $this->convert_int_time_to_string_time($result['end_time'], ':', -2);

        return $objSlot;
    }

    private function convert_int_time_to_string_time(string $str, string $insertstr, int $pos): string
    {
        return substr($str, 0, $pos) . $insertstr . substr($str, $pos);
    }

    private function generate_slots(\stdClass $slot, int $interval)
    {

        $start_time = Carbon::parse($slot->start_time, $this->timezone);
        $end_time = Carbon::parse($slot->end_time, $this->timezone);

        $arr_slots = array();

        for ($j = 0;; $j++) {
            if ($start_time->greaterThanOrEqualTo($end_time)) {
                break;
            }
            array_push($arr_slots, [
                "start_time" => $start_time->format('H:i'),
                "end_time" => $start_time->addMinutes($interval)->format('H:i')
            ]);
            /*
            * strip start time that overlaps the available slots and stop
            */
            if ($start_time->greaterThan($end_time)) {
                array_pop($arr_slots);
                break;
            }
        }

        return $arr_slots;
    }

    private function get_available_open_slots(array $arr_slots, string $date): array
    {
        $now = Carbon::now($this->timezone);
        $appointment_date = Carbon::parse($date, $this->timezone);

        $open_slots = $arr_slots;
        /*
        * remove all slots that passed time
        */
        if ($appointment_date->lessThan($now)) {
            $open_slots = array_filter($arr_slots, function ($slot) use ($now) {
                return Carbon::parse($slot['start_time'], $this->timezone)->greaterThan($now);
            });
        }
        // remove index keys from the list
        return array_values($open_slots);
    }

    public function get_doctors_occupied_slots(string $date, array $available_doctors_ids): array
    {
        $appointments = Appointment::where('date', $date)
            ->whereIn('status_id', [APPOINTMENT_CONFIRMED, APPOINTMENT_PENDING, APPOINTMENT_WAITING])
            ->whereJsonContains('doctors', $available_doctors_ids)
            // ->get(['id', 'doctors', 'slots'])->toArray();
            ->get(['slots'])->toArray();

        return $appointments;
    }

    public function get_already_occupied_slots_for_doctors(string $date, array $available_doctors_ids)
    {
        $appointments = Appointment::where('date', $date)
            ->whereIn('status_id', [APPOINTMENT_CONFIRMED, APPOINTMENT_PENDING, APPOINTMENT_WAITING])
            ->whereJsonContains('doctors', $available_doctors_ids)
            // ->get(['id', 'doctors', 'slots'])->toArray();
            ->get(['doctors', 'slots'])->toArray();

        return $appointments;
    }
    /**
     * generate slots based on single doctor availablity , returning only slots with no appointments
     */
    public function get_only_available_open_slots(array $open_slots, array $doctor_occupied_slots): array
    {
        /// check if open_slot[start_time] is within all the occupied slots and remove it from the list of available slots

        $available_slots = array();

        foreach ($open_slots as $slot_op) {
            $arr = array_filter($doctor_occupied_slots, function ($element) use ($slot_op) {
                return ($element['slots'][0]['start-time'] === $slot_op['start_time']);
            });
            if (!$arr)
                array_push($available_slots,  $slot_op);
        }

        return $available_slots;
    }

    /**
     * generate slots based on doctors availablity , returning only slots with no appointments
     */
    public function get_available_open_slots_for_doctors(array $open_slots, array $doctors_occupied_slots): array
    {
        /// check if open_slot[start_time] is within all the occupied slots and remove it from the list of available slots
        // dd($open_slots)

        $available_slots = array();
        // var_dump($open_slots);
        foreach ($open_slots as $slot_op) {
            $is_slot_available = false;
            // only check if doctor has slots already occupied
            if (count($doctors_occupied_slots)) {
                foreach ($doctors_occupied_slots as $ele) {
                    // var_dump($ele['slots'][0]);
                    /*
                     * if any slot start_time is not in the occupied slots, the slot is rendered open
                    */
                    if ($ele['slots'][0]['start-time'] !== $slot_op['start_time']) {
                        $is_slot_available = true;
                        break;
                    }
                }
            } else {
                $is_slot_available = true;
            }
            if ($is_slot_available)
                array_push($available_slots,  $slot_op);
        }

        return $available_slots;
    }

    public function generate_single_doctor_free_slots(int $facility_id, string $date, int $doctor_id, $appointment_type_id = null, $treatment_type = null)
    {
        if ($appointment_type_id) {
            $appointment_type = AppointmentType::find($appointment_type_id);
            $interval = $appointment_type->agenda_interval;
        }

        if ($treatment_type) {
            $appointment_type = TreatmentType::find($treatment_type);
            $interval = Employee::find($doctor_id)->interval ?? 10;
        }

        if (!$appointment_type) {
            $error = $appointment_type_id != null ? 'Appointment type not found' : 'Treatment type not found';
            throw new Exception($error);
        }

        $newDate =  $this->generate_week_and_day_from_date($date);

        $formatted_date =  Carbon::parse($date, $this->timezone)->format('d-m-Y');

        $doctors = $this->get_available_doctors_based_on_day($newDate->day, $newDate->week, $facility_id, $doctor_id);

        $doctor_ids = array_map(function ($doctor) {
            return $doctor->id;
        }, $doctors);

        $occupied_slots = $this->get_doctors_occupied_slots($formatted_date, $doctor_ids);

        if ($doctors) {
            $slot =  $this->genereate_availability_slot_start_time_end_time($doctors);
            $arr_slots = $this->generate_slots($slot, $interval);
            $open_slots = $this->get_available_open_slots($arr_slots, $formatted_date);
            return $this->get_available_open_slots_for_doctors($open_slots, $occupied_slots);
        }
        throw new Exception('No slots available');
    }
}
