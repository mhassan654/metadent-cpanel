<?php

namespace App\Http\Controllers\v3;

use stdClass;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\Employee;
use App\Models\Facility;
use App\Models\Appointment;
use App\Traits\FrontOfficeTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\EventResource;
use App\Http\Resources\AppointmentResource;

class CalendarController extends Controller
{
    use FrontOfficeTrait;

    public function __construct()
    {
//        $this->middleware(["auth:api"]);
    }
    private $appointment_columns_filter = [
        'appointments.id', 'appointments.date', 'appointments.slots', 'appointments.doctors', 'appointments.comments', 'appointments.appointment_type_id',
        'patients.id as patient_id', 'patients.gender', 'patients.first_name', 'patients.last_name', 'patients.birth_date', 'patients.country', 'patients.city',
        'treatment_types.id as treatment_type_id', 'treatment_types.title', 'treatment_types.color',
        'appointment_sources.id as source_id', 'appointment_sources.source',
        'appointment_statuses.id as status_id', 'appointment_statuses.status',
        'frequencies.id as frequency_id', 'frequencies.label as frequency_label',
        'appointment_types.id as appointment_type_id', 'appointment_types.title as appointment_type_title', 'appointment_types.code as appointment_type_code', 'appointment_types.color as appointment_type_color',
    ];

    public function all_appointments()
    {

        try {
            $all_appointments = Appointment::latest()
                // ->where('status_id', '!=', APPOINTMENT_PENDING)
                ->with([
                    'patient', 'department',
                    'appointmentType', 'treatmentType', 'source', 'frequency', 'recurrencies', 'treatmentPlan',
                    'status'
                ])->get();

            return $this->customSuccessResponseWithPayload(AppointmentResource::collection($all_appointments));
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function frontOfficeAppointments(){
        try {
            $all_appointments = Appointment::latest()
                // ->where('status_id', '!=', APPOINTMENT_PENDING)
                ->where('date',  Carbon::today()->format('d-m-Y'))
                ->with([
                    'patient', 'department',
                    'appointmentType', 'treatmentType', 'source', 'frequency', 'recurrencies', 'treatmentPlan',
                    'status'
                ])->get();

            return $this->customSuccessResponseWithPayload(AppointmentResource::collection($all_appointments));
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function all_events()
    {

        try {
            $all_events = Event::with('frequency')->get();
            $all_events = EventResource::collection($all_events);
            return $this->customSuccessResponseWithPayload($all_events);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function doctor_ids()
    {
        $all_doctor_ids = DB::table('model_has_roles')
            ->where('role_id', 3)
            ->select('model_id')
            ->orderBy('model_id', 'desc')
            ->lazy()->pluck('model_id')->toArray();

        return $all_doctor_ids;
    }

    public function all_doctors()
    {
        try {
            $all_doctor_ids = $this->doctor_ids();

            // $all_doctors = DB::table('employees')
            // ->whereIn('employees.id', $all_doctor_ids)
            // ->select('employees.id', 'first_name', 'last_name', 'week_days','employee_type_id')
            // ->leftJoin('employee_types', function($join){
            //     $join->on('employees.employee_type_id','=','employee_types.id');
            // })
            // ->orderBy('employees.created_at', 'desc')
            // ->lazy()->map(function($doctor) {
            //     $doctor->week_days = json_decode($doctor->week_days);
            //     return $doctor;
            // });

            $all_doctors = Employee::with(['employeeType', 'department'])
                ->whereIn('id', $all_doctor_ids)
                ->get(['id', 'first_name', 'last_name', 'weeks', 'week_days', 'department_id', 'employee_type_id',
                    'frequency_id', 'contract_start_date', 'contract_end_date', 'availability', 'interval'])
                ->makeHidden(['roles', 'permissions']);

            return $this->customSuccessResponseWithPayload($all_doctors);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function assistants()
    {
        $all_assistants = Employee::with(['department', 'employeeType'])
            ->whereHas('employeeType', function ($query) {
                $query->where('type', 'LIKE', '%' . 'Assistant' . '%');
            })
            ->get(['id', 'first_name', 'last_name', 'weeks', 'week_days', 'department_id', 'employee_type_id', 'frequency_id',
                'contract_start_date', 'contract_end_date', 'availability', 'interval'])
            ->makeHidden(['roles', 'permissions']);

        return $all_assistants;
    }

    public function all_assistants()
    {
        try {

            $all_assistants = $this->assistants();

            return $this->customSuccessResponseWithPayload($all_assistants);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function front_office_users()
    {
        try {
            $assistant_ids = $this->assistants()->pluck('id')->toArray();
            $doctor_ids = $this->doctor_ids();
            $assistant_doctor_ids = array_unique(array_merge($assistant_ids, $doctor_ids), SORT_REGULAR);
            $all_front_office_users = Employee::with(['department', 'employeeType'])
                ->whereNotIn('id', $assistant_doctor_ids)
                ->get(['id', 'first_name', 'last_name', 'weeks', 'week_days', 'department_id', 'employee_type_id', 'frequency_id', 'contract_start_date', 'contract_end_date', 'availability', 'interval'])
                ->makeHidden(['roles', 'permissions']);
            return $this->customSuccessResponseWithPayload($all_front_office_users);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function doctor_assistants()
    {
            try {
                $assistant_ids = $this->assistants()->pluck('id')->toArray();
                $doctor_ids = $this->doctor_ids();
                $assistant_doctor_ids = array_unique(array_merge($assistant_ids, $doctor_ids), SORT_REGULAR);
                $doctor_assistants = Employee::whereIn('id', $assistant_doctor_ids)
                    ->get(['id', 'first_name', 'last_name'])
                    ->makeHidden(['roles', 'permissions']);
                return $this->customSuccessResponseWithPayload($doctor_assistants);
            } catch (\Throwable $th) {
                return $this->customFailResponseWithPayload($th->getMessage());
            }
    }
}
