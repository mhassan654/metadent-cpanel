<?php
/**
 **Created by MUWONGE HASSAN on 21/05/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */
namespace App\Http\Controllers\Api\v2;

use App\Models\Event;
use Metadent\AuthModule\Models\Employee;
use App\Services\EventService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventsController extends BaseController
{
    public function __construct()
    {
//        $this->middleware(["auth:api"]);
    }

    public function index()
    {
        $events = Event::where('facility_id', Auth::user()->facility_id)->get();
        $final_event_container = [];

        foreach ($events as $event):
            $event_day = Carbon::parse($event->date)->dayOfWeek;

            $event->day = $event_day;
            $doctor_ids = $event->doctors;
            $doctors_list = [];

            foreach ($doctor_ids as $doctor_id):
                $doctors_list[] = Employee::find($doctor_id);
            endforeach;

            $event->doctors = $doctors_list;
            $final_event_container[] = $event;

        endforeach;
        return $this->customSuccessResponseWithPayload($final_event_container);

    }

    public function create_event(Request $request, EventService $eventService)
    {
        $validator = Validator::make($request->all(), [
            'frequencyId' => 'required|integer',
            'title' => "required|string",
            'duration' => 'required',
            'recurrence' => 'nullable',
            'color' => 'nullable',
            'code' => 'required|string',
            'doctors' => 'required|array',
            'days' => 'nullable',
            'attendees' => 'nullable|array',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
            'startTime' => 'required|string',
            'endTime' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->messages(), 200);
        }

        /*
        FREQUENCY ID MAPPINGS
        1 - Does not repeat
        2 - Weekly
        3 - Monthly
        4 - Annualy
         */
        $event = $request->all();

        $selectedDays = [];

        // $week_day = 2;
        $checkDayPosition = $request->positionOfDay;
        $event_frequency_id = $request->frequencyId;
        $recurrence = $request->recurrence;
        $startDate = Carbon::parse($request->startDate)->format('d-m-Y');
        $endDate = Carbon::parse($request->endDate);
        $days = $request->days;

        // check weekly days
        $get_day_value = $request->positionOfDay;
        $get_day = $request->weekDay;

        if (isset($get_day)) {
            if ($get_day === 1) {
                $day_of_week = Carbon::MONDAY;
            }
            if ($get_day === 2) {
                $day_of_week = Carbon::TUESDAY;
            }
            if ($get_day === 3) {
                $day_of_week = Carbon::WEDNESDAY;
            }
            if ($get_day === 4) {
                $day_of_week = Carbon::THURSDAY;
            }
            if ($get_day === 5) {
                $day_of_week = Carbon::FRIDAY;
            }
            if ($get_day === 6) {
                $day_of_week = Carbon::SATURDAY;
            }
            if ($get_day === 7) {
                $day_of_week = Carbon::SUNDAY;
            }
        }

        // try {

            /**
             *  Storing events for recurring events.
             */

            if (isset($event_frequency_id) && $event_frequency_id !== 1) {

                /**
                 * Return dates if you want to determine the 'first day', 'second day', 'third day' or last day' of a
                 * specific day in a month. e.g first Monday in month
                 */

                if ($request->frequencyId === 3 && $get_day_value !== null && $day_of_week !== null) {

                    $event_period = $startDate->toPeriod($request->endDate, $recurrence, 'months');

                    $datesArr = $event_period->toArray();

                    foreach ($datesArr as $date):

                        $selectedDays[] = $date->nthOfMonth($get_day_value, $day_of_week)->format('Y-m-d');
                    endforeach;
                    /**
                     * Store events for only specified monthly days with positions
                     */
                    foreach ($selectedDays as $date):
                        $eventService->create_new_event($event, $date);
                    endforeach;
                    return $this->customSuccessResponseWithPayload('All Monthly Events with day created successfully');
                }

                /**
                 * Generate and save events for weekly frequency with selected days or day.
                 * e.g to generate events that occur on a specific day or days in a week
                 */
                if ($request->frequencyId === 2 && $request->days !== null) {

                    $endDate = $request->endDate;
                    $startDate = $request->startDate;
                    foreach ($eventService->get_selected_days($startDate, $endDate, $recurrence, 'weeks', $days) as $date) {
                        $this->create_new_event($event, $date);
                    }
                    return $this->customSuccessResponseWithPayload('All Weekly Events created successfully');
                }

                /**
                 * Generate and save events that occur every after a certain no. of months on specific days or day.
                 * e.g to generate events that occur in a given set of months like mondays
                 */
                if ($request->frequencyId === 3 && $request->days !== null && $checkDayPosition === null) {

                    foreach ($eventService->get_selected_days($startDate, $endDate, $recurrence, 'months', $days) as $date) {
                        $eventService->create_new_event($event, $date);
                    }

                    return $this->customSuccessResponseWithPayload('All Monthly Events created successfully');
                }

                /**
                 *  Generate recurring annual events
                 */
                if ($request->frequencyId === 4)
                {
                    $annual_dates = $this->get_annual_dates($startDate, $endDate,$recurrence);

                    foreach ($annual_dates as $date)
                    {
                        $eventService->create_new_event($event, $date);
                    }

                    if ($annual_dates)
                    {
                        return $this->customSuccessResponseWithPayload('All Annual Events created successfully');
                    }

                }

            } else {

                /**
                 * generate a single event if event does not repeat
                 */
                $date = $startDate;
                $new_event = $eventService->create_new_event($event, $date);
                if ($new_event) {
                    return $this->customSuccessResponseWithPayload('Single Event created successfully');
                }
            }

        // } catch (\Throwable $th) {
        //     return $this->customFailResponseWithPayload($th->getMessage());
        // }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'eventId' => 'required|integer',
            'frequencyId' => 'required|integer',
            'title' => 'required|string',
            'duration' => 'required',
            'recurrences' => 'nullable',
            'color' => 'required',
            'code' => 'required|string',
            'doctors' => 'required|array',
            'days' => 'nullable',
            'attendees' => 'required|array',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
            'startTime' => 'required|time',
            'endTime' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->messages(), 200);
        }

        $event = Event::find(request()->eventId);

        if ($event) {
            $event->update([
                "facility_id" => Auth::user()->facility_id,
                "frequency_id" => request()->frequencyId,
                "user_id" => request()->userId,
                "title" => request()->title,
                "duration" => request()->duration,
                "recurrences" => request()->recurrences,
                "color" => request()->color,
                "code" => request()->code,
                "doctors" => request()->doctors,
                "days" => request()->days,
                "attendees" => request()->attendees,
                "start-date" => request()->startDate,
                "end-date" => request()->endDate,
                "start-time" => request()->startTime,
                "end-time" => request()->endTime,
                "contact_name" => request()->contactName,
                "contact_email" => request()->contactEmail,
                "contact_phone" => request()->contactPhone,
                "contact_address" => request()->contactAddress,
                "comments" => request()->comments,
            ]);

            return $this->customSuccessResponseWithPayload($event);
        }

        return $this->customFailResponseWithPayload("Event not found");
    }

    // generate date ranges
    public function get_annual_dates($startDate,$endDate,$recurrence): array
    {
        return  (new EventService())->get_recurring_annual_event_dates($startDate,$endDate,$recurrence);

    }


    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'eventId' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->messages(), 200);
        }
        request()->validate(["eventId" => "required"]);

        $event = Event::find(request()->eventId);

        if ($event) {
            $event->delete();

            return $this->customSuccessResponseWithPayload('Event  has been deleted');
        }

        return $this->customFailResponseWithPayload("Event  not found");
    }

}
