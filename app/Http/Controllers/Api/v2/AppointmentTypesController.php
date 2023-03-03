<?php

namespace App\Http\Controllers\Api\v2;

use App\Models\Appointment;
use App\Models\AppointmentType;
use Metadent\AuthModule\Models\Employee;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AppointmentTypesController extends BaseController
{

    public function construct()
    {
//        $this->middleware(["auth:api"]);
    }

    public function index()
    {
        return $this->allTypes();
    }

    public function create_appointment_type()
    {
        $new_appointment = AppointmentType::create([
            'title' => request()->title,
            'code' => request()->code,
            'color' => request()->color,
            'agenda_interval' => request()->agendaInterval,
            'for_web' => request()->forWeb,
            'start_time' => request()->startTime,
            'end_time' => request()->endTime,
            'start_date' => request()->startDate,
            'end_date' => request()->endDate,
            'notes' => request()->notes,
            'doctors' => [],
            'week_days' => Arr::flatten(array_unique(request()->weekDays)),
            'for_web' => request()->forWeb,
            'facility_id' => Auth::user()->facility_id,
        ]);

        return $this->customSuccessResponseWithPayload($new_appointment);

        if ($new_appointment):
            return $this->customSuccessResponseWithPayload($new_appointment);
        endif;

        return $this->customFailResponseWithPayload('Appointment has not been created');
    }

    public function attach_doctors () {
        try {

            $appointment_type = AppointmentType::findOrFail(request()->appointmentTypeId);
            $appointment_type->update(['doctors' => request()->doctors]);
            $doctors = Employee::findOrFail(request()->doctors);
            foreach($doctors as $doctor){
                $doctor->appointmentTypes()->attach($appointment_type->id);
            }
            return $this->customSuccessResponseWithPayload($appointment_type);

        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($appointment_type);
            // throw $th;
        }
    }

    public function show()
    {
        request()->validate(["typeId" => "required"]);

        $type = AppointmentType::find(request()->typeId);

        if($type)
        {
            return $this->customSuccessResponseWithPayload($type);
        }

        return $this->customFailResponseWithPayload("Appointment type not found");

    }

    public function update()
    {

        $type = AppointmentType::find(request()->id);

        if($type)
        {
            $type->update([
                'title' => request()->title,
                'code' => request()->code,
                'color' => request()->color,
                'agenda_interval' => request()->agenda_interval,
                'for_web' => request()->for_web,
                'start_time' => request()->start_time,
                'end_time' => request()->end_time,
                'start_date' => request()->start_date,
                'end_date' => request()->end_date,
                'notes' => request()->notes,
                'week_days' => Arr::flatten(array_unique(request()->week_days)),
            ]);

            return $this->customSuccessResponseWithPayload("appointment has been updated");
        }

        return $this->customFailResponseWithPayload("Appointment type not found");
    }

    public function destroy()
    {
        request()->validate(["appointmentTypeId" => "required"]);

        $type = AppointmentType::find(request()->appointmentTypeId);

        if($type)
        {
            $type->delete();

            return $this->customSuccessResponseWithPayload('Appointment has been deleted');
        }

        return $this->customFailResponseWithPayload("Appointment type not found");
    }


    private function allTypes()
    {
        $all_appointment_types = AppointmentType::where("facility_id", Auth::user()->facility_id)->orderBy("created_at", "desc")->get();
        $all_appointments = Appointment::where("facility_id", Auth::user()->facility_id)->get();

        foreach ($all_appointment_types as $appointment_type):

            if($appointment_type->doctors):
                $all_doctors_attached = [];
                if (count($appointment_type->doctors)):
                    foreach ($appointment_type->doctors as $doctor_id):
                        $all_doctors_attached[] = Employee::find($doctor_id);
                        // $all_doctors_attached[] = User::find($doctor_id);
                    endforeach;
                endif;
                $appointment_type->doctors = $all_doctors_attached;
            endif;
            $has_appointments = false;

            foreach($all_appointments as $appointment):
                if ($appointment->appointment_type_id):
                    if ($appointment->appointment_type_id === $appointment_type->id):
                        $has_appointments = true;
                        break;
                    endif;
                endif;
            endforeach;

            $appointment_type->has_appointments = $has_appointments;
        endforeach;

        return $this->customSuccessResponseWithPayload($all_appointment_types);
    }
}
