<?php

namespace App\Mixins;

use Carbon\Carbon;

class CurrentDaysCarbonMixin
{
    /**
     * Get the all dates of week
     *
     * @return array
     */
    public static function getCurrentWeekDays()
    {
        return static function () {
            $startOfWeek = self::this()->startOfWeek()->subDay();
            $weekDays = [];

            for ($i = 0; $i < static::DAYS_PER_WEEK; $i++) {
                $weekDays[] = $startOfWeek->addDay()->startOfDay()->copy()->format('Y-m-d');
            }

            return $weekDays;
        };
    }

    /**
     * Get the all dates of month
     *
     * @return array
     */
    public static function getCurrentMonthDays()
    {
        return static function () {
            $date = self::this();
            $startOfMonth = $date->copy()->startOfMonth()->subDay();
            $endOfMonth = $date->copy()->endOfMonth()->format('d');
            $monthDays = [];

            for ($i = 0; $i < $endOfMonth; $i++) {
                $monthDays[] = $startOfMonth->addDay()->startOfDay()->copy()->format('Y-m-d');
            }

            return $monthDays;
        };
    }
}

Carbon::mixin(new CurrentDaysCarbonMixin());

// function dumpDateList()
// {
//     return getSelected();
// }

// dumpDateList(Carbon::getCurrentWeekDays());
// dumpDateList(Carbon::getCurrentMonthDays());
// dumpDateList(Carbon::now()->subMonth()->getCurrentWeekDays());
// function getSelected()
// {
//     $startDate = Carbon::parse('2022-05-10');
//     $event_period = $startDate->toPeriod('2023-03-30', 2, 'months');
//     $datesArr = $event_period->toArray();
//     $selectedDays = [];

//     foreach ($datesArr as $date) {
//         $selectedDays[] = $date->format('Y-m-d');
//     }

//     foreach ($selectedDays as $date) {
//         $getDays[] = Carbon::parse($date)->getCurrentMonthDays();
//         // $getDays[] = Carbon::parse($date)->getCurrentWeekDays();
//         // dumpDateList(Carbon::parse($date)->getCurrentWeekDays());
//     }

// // dd($getDays);
//     $getSelectedDay = [];
//     $finalDaysArr = [];
//     $daysInWeek = [];
//     $getDays = [];
//     $days = [];


//     foreach ($getDays as $key => $date) {
//         $getSelectedDay[] = $date;
//     }

//     for ($i = 0; $i < count($getSelectedDay); $i++) {
//         for ($l = 0; $l < count($getSelectedDay[$i]); $l++) {
//             $daysInWeek[] = $getSelectedDay[$i][$l];
//         }
//         ;
//     }
//     ;

//     foreach ($daysInWeek as $day) {
//         if (Carbon::parse($day)->isWednesday() === true) {
//             //    echo $day ."\n";
//             $finalDaysArr[] = $day;
//         }
//     }
// // dumpDateList(Carbon::parse('2022-05-10')->getCurrentWeekDays());
//     // dumpDateList(Carbon::now()->subMonth()->getCurrentMonthDays());
//     return $finalDaysArr;
// }
