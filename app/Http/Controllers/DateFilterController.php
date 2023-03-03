<?php

namespace App\Http\Controllers;

use App\Services\EventService;
use Carbon\Carbon;
use App\Models\Event;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Request;

class DateFilterController extends Controller
{
    public function filter(\Illuminate\Http\Request $request)
    {
        /*
        FREQUENCY ID MAPPINGS
        1 - Does not repeat
        2 - Weekly
        3 - Monthly
        4 - Annually
         */
        $event = $request->all();

        $selectedDays = [];

        $monthDays = 2;
        $checkDayPosition = $request->postionDay;
        $event_frequency_id = $request->frequencyId;
        // $frequencyValue = $request->frequencyId;
        $frequency =null;


        if ($event_frequency_id === 2) {
            $frequency = 'weeks';
        }
        if ($event_frequency_id === 3) {
            $frequency = 'months';
        }

        $recurrence = $request->recurrence;

        $startDate = Carbon::parse('2022-05-10');
        $endDate = Carbon::parse('2022-11-10');

        if ($event_frequency_id === 3):

            $event_period = $startDate->toPeriod('2023-01-30', 1, 'months');

            $datesArr = $event_period->toArray();

        elseif ($event_frequency_id === 2):

            $event_period = $startDate->toPeriod('2023-01-30', 1, 'weeks');

            $datesArr = $event_period->toArray();

        endif;

        // check weekly days
        switch ($monthDays) {
            case 1:
                echo Carbon::MONDAY;
                break;
            case 2:
                echo Carbon::TUESDAY;
                break;
            case 3:
                echo Carbon::WEDNESDAY;
                break;
            case 4:
                echo Carbon::THURSDAY;
                break;
            case 5:
                echo Carbon::FRIDAY;
                break;
            case 6:
                echo Carbon::SATURDAY;
                break;
            case 7:
                echo Carbon::SUNDAY;
                break;
            default:Carbon::MONDAY;
        }

        // check if it's day of week
        // check weekly days
        switch ($checkDayPosition) {
            case 'first':
                echo 1;
                break;
            case 'second':
                echo 2;
                break;
            case 'third':
                echo 3;
                break;
            case 'forth':
                echo 4;
                break;
            default:1;
        }

        try {

            /**
             *  Storing events for recurring events.
             */

            if (isset($event_frequency_id) && $event_frequency_id !== 1) {

                /**
                 * Return dates if you want to determine the 'first day', 'second day', 'third day' or last day' of a
                 * specific day in a month. e.g first Monday in month
                 */

                if ($request->frequencyId === 3 && $checkDayPosition !== null) {

                    foreach ($datesArr as $date) {
                        //    $days = $this->isSelectedDay($date);
                        //    $selectedDays[]=$days;
                        //                    if ($date->isTuesday() === true):
                        //                        $selectedDays[] = $date->format('Y-m-d');
                        $selectedDays[] = $date->nthOfMonth($checkDayPosition, $monthDays)->format('Y-m-d');


                    }
                    /**
                     * Store events for only specified monthly days with positions
                     */
                    foreach ($selectedDays as $date) {
                        $this->create_event($event, $date);
                    }
                }

                /**
                 * Generate and save events for weekly frequency with selected days or day.
                 * e.g to generate events that occur on a specific day or days in a week
                 */
                if ($request->frequencyId === 2 && $request->days !== null) {
                    $days = $request->days;

                    foreach ($this->get_selected_days('2022-05-10','2022-11-10',1,
                        'weeks',$days) as $date) {
                        $this->create_event($event, $date);
                    }
                }

                /**
                 * Generate and save events that occur every after a certain no. of months on specific days or day.
                 * e.g to generate events that occur in a given set of months like mondays
                 */
                if ($request->frequencyId === 3 && $request->days !== null && $checkDayPosition === null) {
                    $days = $request->days;

                    //         foreach ($selectedDays as $key => $date) {
                    //             $this->create_event($event, $date);
                    //         }
                    foreach ($this->get_selected_days('2022-05-10','2022-11-10',1,
                        'months') as $date) {
                        $this->create_event($event, $date);
                    }
                    return response()->json('All Events created successfullye');
                }

            } else {

                /**
                 * generate a single event if event does not repeat
                 */
                $date = $startDate;
                $new_event = $this->create_event($event, $date);
                if ($new_event) {
                    return $this->customSuccessResponseWithPayload('Event created successfully');
                }

            }

        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function get_months(EventService $eventService)
    {
       return $eventService->get_recurring_annual_event_dates();
    }

    public function get_selected_days($startDate, $endDate,$recurrence, $frequency): array
    {
        try {
            $startDate = Carbon::parse($startDate);
            $event_period = $startDate->toPeriod($endDate, $recurrence, $frequency);
            $datesArr = $event_period->toArray();
            $days_data = $days;

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
                if ($frequency === 2):
                    $getDays[] = Carbon::parse($date)->getCurrentWeekDays();

                // return weekly days for a monthly frequency format
                elseif ($frequency === 3):
                    $getDays[] = Carbon::parse($date)->getCurrentMonthDays();
                endif;
            }

            foreach ($getDays as $date) {
                $getSelectedDay[] = $date;
            }

            for ($i = 0, $iMax = count($getSelectedDay); $i < $iMax; $i++) {
                for ($l = 0, $lMax = count($getSelectedDay[$i]); $l < $lMax; $l++) {
                    $daysInWeek[] = $getSelectedDay[$i][$l];
                }
            }


            $days_data = [2, 6, 4];
            foreach ($daysInWeek as $day) {

                if (in_array("1", $days_data, true) && Carbon::parse($day)->isMonday() === true) {
                    $finalDaysList[] = $day;
                }
                if (in_array("2", $days_data, true) && Carbon::parse($day)->isTuesday() === true) {
                    $finalDaysList[] = $day;
                }
                if (in_array("3", $days_data, true) && Carbon::parse($day)->isWednesday() === true) {
                    $finalDaysList[] = $day;
                }
                if (in_array("4", $days_data, true) && Carbon::parse($day)->isThursday() === true) {
                    $finalDaysList[] = $day;
                }
                if (in_array("5", $days_data, true) && Carbon::parse($day)->isFriday() === true) {
                    $finalDaysList[] = $day;
                }
                if (in_array("6", $days_data, true) && Carbon::parse($day)->isSaturday() === true) {
                    $finalDaysList[] = $day;
                }
                if (in_array("7", $days_data, true) && Carbon::parse($day)->isSunday() === true) {
                    $finalDaysList[] = $day;
                }
            }

            dd($finalDaysList);
        }catch(\Throwable $throwable){
            return $this->customFailResponseWithPayload($throwable->getMessage());

        }

    }

    private function create_event($event, $date)
    {

        return Event::create([
            "facility_id" => 1,
            "frequency_id" => $event['frequencyId'],
            "user_id" => $event['userId'],
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

    }

}
