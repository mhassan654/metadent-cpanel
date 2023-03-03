<?php
/**
 **Created by MUWONGE HASSAN on 06/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

namespace App\Services;

use Carbon\Carbon;
use App\Models\Event;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;

class EventService
{
    /**
     * @param $event
     * @param $date
     * @return mixed
     */
    public function create_new_event($event, $date)
    {
        // dd($event);
        $event = Event::create([
            "facility_id" => Auth::id(),
            "frequency_id" => $event['frequencyId'],
            "title" => $event['title'],
            "duration" => $event['duration'],
            "recurrence" => $event['recurrence'],
            "color" => $event['color'],
            "code" => $event['code'],
            "doctors" => $event['doctors'],
            "days" => $event['days'],
            "attendees" => $event['attendees'],
            "start_time" => $event['startTime'],
            "end_time" => $event['endTime'],
            "contact_name" => $event['contactName'],
            "contact_email" => $event['contactEmail'],
            "contact_phone" => $event['contactPhone'],
            "contact_address" => $event['contactAddress'],
            "comments" => $event['comments'],
            "date" => $date,
        ]);
        $employees_ids = array_merge($event->doctors, $event->attendees);
        $event->employees()->attach($employees_ids);

        return $event;

    }

    /**
     * @param $startDate
     * @param $endDate
     * @param $recurrence
     * @param $frequency
     * @param null $days
     * @return array
     */
    public function get_selected_days($startDate, $endDate, $recurrence, $frequency, $days = null): array
    {
        $daysArray = $days;
        $startDate = Carbon::parse($startDate);
        $event_period = $startDate->toPeriod($endDate, $recurrence, $frequency);
        $datesArr = $event_period->toArray();

        // defined array variables
        $getDays = [];
        $daysInWeek = [];
        $finalDaysList = [];
        $selectedDays = [];
        $getSelectedDay = [];

        /**
         * return all dates in a range of dates
         */
        foreach ($datesArr as $date) {
            $selectedDays[] = $date->format('Y-m-d');
        }

        /**
         *  return all days of every recurring week
         */
        foreach ($selectedDays as $date) {
            // return weekly days for a weekly frequency format
            if ($frequency === 'weeks'):
                $getDays[] = Carbon::parse($date)->getCurrentWeekDays();

            // return weekly days for a monthly frequency format
            elseif ($frequency === 'months'):
                $getDays[] = Carbon::parse($date)->getCurrentMonthDays();
            endif;
        }

        foreach ($getDays as $date) {
            $getSelectedDay[] = $date;
        }

        foreach ($getSelectedDay as $iValue) {
            foreach ($iValue as $lValue) {
                $daysInWeek[] = $lValue;
            }
        }
//
        //        foreach ($getSelectedDay as $i => $iValue) {
        //            foreach ($iValue as $lValue) {
        //                $daysInWeek[] = $lValue;
        //            }
        //        }

        /**
         *  return all selected days from the weekly days
         */
        foreach ($daysInWeek as $day) {

            if (in_array("1", $daysArray) && Carbon::parse($day)->isMonday() === true) {
                $finalDaysList[] = $day;
            }
            if (in_array("2", $daysArray) && Carbon::parse($day)->isTuesday() === true) {
                $finalDaysList[] = $day;
            }
            if (in_array("3", $daysArray) && Carbon::parse($day)->isWednesday() === true) {
                $finalDaysList[] = $day;
            }
            if (in_array("4", $daysArray) && Carbon::parse($day)->isThursday() === true) {
                $finalDaysList[] = $day;
            }
            if (in_array("5", $daysArray) && Carbon::parse($day)->isFriday() === true) {
                $finalDaysList[] = $day;
            }
            if (in_array("6", $daysArray) && Carbon::parse($day)->isSaturday() === true) {
                $finalDaysList[] = $day;
            }
            if (in_array("7", $daysArray) && Carbon::parse($day)->isSunday() === true) {
                $finalDaysList[] = $day;
            }
        }

        //   dd($finalDaysList);
        return $finalDaysList;
    }

    /**
     * @param $startDate
     * @param $endDate
     * @param $recurrence
     * @param null $annualDay
     * @param null $positionInMonth
     * @param null $annualDate
     * @param null $annualMonth
     * @return array
     */
    public function get_recurring_annual_event_dates($startDate, $endDate, $recurrence, $annualDay =null,
                                                     $positionInMonth=null, $annualDate=null, $annualMonth=null): array
    {
        $startDate = Carbon::parse($startDate);
        $event_period = $startDate->toPeriod($endDate, $recurrence, 'years');
        $datesArr = $event_period->toArray();

        $yearsArr = [];
        $finalDaysList = [];

        foreach($datesArr as $years){
            $yearsArr[] = $years->format('Y-m-d');
        }

        $firstValue = array_key_first($yearsArr);
        $lastValue = array_key_last($yearsArr);
        $newList = CarbonPeriod::create($yearsArr[$firstValue],  $yearsArr[$lastValue]);
        $newList->toArray();

        $newMonths =[];

        foreach($newList as $month_data){

            $newMonths[] =  $month_data->format('Y-m-d');
        }

//        dd($yearsArr);

        $set_date_month = "{$annualDate} {$annualMonth}";

        $set_day_month = "{$positionInMonth} {$annualDay} of {$annualMonth}";

        /**
         *  annual recurring events for a specific month and date
         */
        if ($annualDate !== null){
            foreach ($newMonths as $day) {
                if (Carbon::parse($day)->is($set_date_month) === true) {
                    $finalDaysList[] = $day;
                }
            }
        }elseif($annualMonth !== null && $positionInMonth !== null && $annualDay !== null){
            /**
             * annual recuring events for a specific month and day
             */
            foreach ($newMonths as $day) {

                if (Carbon::parse($day)->is($set_day_month) === true) {
                    $finalDaysList[] = $day;
                }
            }
        }


        return $finalDaysList;
    }
}
