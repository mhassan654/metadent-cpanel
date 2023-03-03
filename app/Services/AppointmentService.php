<?php

/**
 **Created by MUWONGE HASSAN on 10/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

namespace App\Services;

use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\Http\Resources\AppointmentResource;
use App\Jobs\AppointmentAssignAvailableDoctorJob;
use App\Models\Appointment;
use App\Models\AppointmentType;
use App\Models\Patient;
use App\Models\Employee;
use App\Traits\AppointmentsTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AppointmentService
{
    use AppointmentsTrait;

    public function all_appointments(): array
    {
        $controller = new Controller();
        try {
            $all_appointments = Appointment::with([
                    "patient.preferredAppointmentTime",
                    "patient.familyMembers",
                    "patient.mainDoctor",
                    "status",
                    "source",
                    "treatmentType",
                    "period",
                    "appointmentType",
                    'frequency',
                    'recurrencies',
                    'department',
                    "treatmentPlan"
                ])
                ->orderBy("date", "desc")
                ->get();

            $final_appointment_container = [];

            foreach ($all_appointments as $appointment):
                if ($appointment->status_id === 3 && ($appointment->date < Carbon::now()->format('d-m-Y'))) {
                    $appointment->status_id = 6;
                    $appointment->update();
                }
                $doctor_ids = $appointment->doctors;
                $doctors_list = [];

                foreach ($doctor_ids as $doctor_id):
                    $doctors_list[] = Employee::with('department')->find($doctor_id);
                endforeach;

                $appointment->doctors = $doctors_list;

                $final_appointment_container[] = $appointment;
            endforeach;

            return $final_appointment_container;
        } catch (\Throwable $th) {
            // catch and display exemption error messages
            throw $th;
        }
    }
    //generate optimised data object for main dashboard upcoming appointments
    public function dashboard_upcoming_appointments()
    {
        $controller = new Controller();
        try {
            $appointments = DB::table('appointments')->where([
                ['status_id', 1],
                // ['date','>',Carbon::now()],
                // ['appointments.facility_id', '=', auth()->user()->facility_id]
            ])
                ->join('patients', 'appointments.patient_id', '=', 'patients.id')
                ->leftjoin('appointment_types', 'appointments.appointment_type_id', '=', 'appointment_types.id')
                ->leftjoin('treatment_types', 'appointments.treatment_type_id', '=', 'treatment_types.id')
                ->select([
                    'appointments.id',
                    'date',
                    'patients.id as patient_id',
                    'patients.first_name as patient_first_name',
                    'patients.last_name as patient_last_name',
                    'patients.middle_name as patient_middle_name',
                    'patients.email as patient_email',
                    'patients.patient_phone',
                    'patients.country as patient_country',
                    'patients.city as patient_city',
                    'patients.street as street',
                    'patients.home_address',
                    'patients.gender',
                    'patients.birth_date',
                    'patients.nationality',
                    'patients.photo as patient_photo',
                    'patients.patient_insurer',
                    'patients.insurance_policy_number',
                    'appointment_types.title as appointment_type',
                    'treatment_types.title as treatment_type'
                ])
                ->orderBy('appointments.created_at', 'asc')
                ->get()->filter(function ($appointment, $key) {
                    return Carbon::now()->lte($appointment->date);
                });
            return $appointments;
        } catch (\Throwable $th) {
            // throw $th;
            return $controller->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function get_today_appointments()
    {
        return Appointment::with("patient:id,first_name,last_name,patient_phone,unique_identifier,email", "treatmentType")
            ->where('date', Carbon::now()->format('d-m-Y'))
            ->orderBy("date", "desc")
            ->get();
    }



    // function for creating an appointment / appointments
    public function create_new_appointment(Request $request)
    {
        try {
            $controller = new Controller();
            /*
            FREQUENCY ID MAPPINGS
            1 - Does not repeat
            2 - Weekly
            3 - Monthly
            4 - Annualy
            */

            $validator = Validator::make(request()->all(), [
                "appointments.*.slots" => "required|array",
                "appointments.*.slots.*.start-time" => "required|date_format:H:i",
                "appointments.*.slots.*.end-time" => "required|date_format:H:i",
                "appointments.*.doctors" => "required|array",
                "appointments.*.departmentId" => 'required|integer'
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return $controller->customFailResponseMessage($validator->messages(), 404);
            }


            $appointments = $request->appointments;
            // dd($appointments);
            $created_appointments = array();
            $failed_appointments = array();
            foreach ($appointments as $appointment) {

                $new_appointment = null;

                if (count($appointment['slots']) !== 0) {
                    $appointment_frequency_id = $appointment['frequencyId'];

                    if ($appointment_frequency_id && $appointment_frequency_id > 1) {
                        $appointment_date = $appointment['startDate'];
                        $counter = 1;
                        $parent_id = null;

                        while (
                            Carbon::parse($appointment_date)->betweenIncluded(
                                Carbon::parse($appointment['startDate']),
                                Carbon::parse($appointment['endDate'])
                            )
                        ) {

                            $new_appointment = Appointment::create([
                                "facility_id" => 1,
                                "patient_id" => $appointment['patientId'],
                                "type_id" => $appointment['typeId'],
                                "status_id" => $appointment['statusId'],
                                "frequency_id" => $appointment['frequencyId'],
                                "frequency_value" => $appointment['frequencyValue'],
                                "source_id" => $appointment['sourceId'],
                                "period_id" => $appointment['periodId'],
                                "interval" => $appointment['interval'],
                                "treatment_id" => $appointment['treatmentId'],
                                "department_id" => $appointment['departmentId'],
                                "treatment_type_id" => $appointment['treatmentTypeId'],
                                "parent_id" => $parent_id,
                                "appointment_type_id" => $appointment['appointmentTypeId'],
                                "doctors" => $appointment['doctors'],
                                "date" => $appointment_date,
                                "slots" => $appointment['slots'],
                                "comments" => $appointment['comments'],
                                "material_name" => $appointment['materialName'],
                                "material_date" => $appointment['materialDate'],
                                "treatment_plan_id" => $appointment['treatmentPlanId'],
                                "phase_id" => $appointment['phaseId'],
                                'is_recallable' => (int) $appointment['is_next'] ,
                            ]);


                            if ($counter === 1)
                                $parent_id = $new_appointment->id;

                            if ($new_appointment) {
                                $new_appointment->parent_id = $parent_id;
                                // $new_appointment->is_recallable =   true;
                                $new_appointment->employees()->attach($appointment['doctors']);
                                $new_appointment->save();
                                $this->send_created_appointment_email($new_appointment->id);
                                $created_appointments[] = $new_appointment;
                            } else
                                $failed_appointments[] = $appointment;
                            // dd

                            if ($appointment_frequency_id === 2)
                                $appointment_date = Carbon::parse($appointment_date)->addWeeks($appointment['frequencyValue'])->format('d-m-Y');
                            elseif ($appointment_frequency_id === 3)
                                $appointment_date = Carbon::parse($appointment_date)->addWeeks(4 * $appointment['frequencyValue'])->format('d-m-Y');
                            elseif ($appointment_frequency_id === 4)
                                $appointment_date = Carbon::parse($appointment_date)->addWeeks(48 * $appointment['frequencyValue'])->format('d-m-Y');


                            $counter++;
                        }
                    } else {
                        $appointment_date = $appointment['startDate'];

                        $new_appointment = Appointment::create([
                            "facility_id" => 1,
                            "patient_id" => $appointment['patientId'],
                            "type_id" => $appointment['typeId'],
                            "status_id" => $appointment['statusId'],
                            "frequency_id" => 1,
                            "frequency_value" => 1,
                            "source_id" => $appointment['sourceId'],
                            "period_id" => $appointment['periodId'],
                            "interval" => $appointment['interval'],
                            "treatment_id" => $appointment['treatmentId'],
                            "department_id" => $appointment['departmentId'],
                            "treatment_type_id" => $appointment['treatmentTypeId'],
                            "appointment_type_id" => $appointment['appointmentTypeId'],
                            "doctors" => $appointment['doctors'],
                            "date" => $appointment_date,
                            "slots" => $appointment['slots'],
                            "comments" => $appointment['comments'],
                            "material_name" => $appointment['materialName'],
                            "material_date" => $appointment['materialDate'],
                            "treatment_plan_id" => $appointment['treatmentPlanId'],
                            "phase_id" => $appointment['phaseId'],
                            'is_recallable' => (int) $appointment['is_next'] ,
                        ]);
                        // dd($new_appointment);

                        if ($new_appointment) {
                            $new_appointment->parent_id = $new_appointment->id ;
                            // $new_appointment->is_recallable =  true;
                            $new_appointment->employees()->attach($new_appointment['doctors']);
                            $new_appointment->save();
                            $created_appointments[] = $new_appointment;
                        } else
                            $failed_appointments[] = $appointment;
                    }
                } else
                    $failed_appointments[] = $appointment;
                LogActivity::addToLog('Appointment Created', 'Create', null, null, null, null, null, $new_appointment->id);
            }

            if (count($failed_appointments) === 0):
                return $controller->customSuccessResponseWithPayload("all appointments have been created");
            else:
                return $controller->customFailResponseWithPayload($failed_appointments);
            endif;
        } catch (\Throwable $th) {
            return $controller->customFailResponseWithPayload($th->getMessage());
        }
    }

    public static function checkin_using_date_of_birth(string $date_of_birth)
    {
        $patient = Patient::where('birth_date', Carbon::parse($date_of_birth)->format('d-m-Y'))->first();
        if (!$patient) {
            throw new Exception('Check your date of birth');
        }

        $appointments = Appointment::with([
            'patient' => function ($query) use ($date_of_birth) {
                return $query->select(['id', 'first_name', 'last_name', 'middle_name', 'birth_date'])
                    ->where('birth_date', Carbon::parse($date_of_birth)->format('d-m-Y'));
            }
        ])
            ->where('status_id', APPOINTMENT_CONFIRMED)
            ->where("date", Carbon::now('Europe/Amsterdam')->format('d-m-Y'))
            ->get();

        $start_times = [];
        $timezone = 'Europe/Amsterdam';
        foreach ($appointments as $appointment) {
            Log::alert('Appointment Data' . print_r($appointment, true));
            foreach ($appointment->slots as $slot) {

                $formatted_time = date('h:i', strtotime($slot['start-time']));

                $time_remaining = Carbon::parse(Carbon::now($timezone)->format('h:i'))->diffInMinutes($formatted_time);

                $appointment_start_time = [
                    'appointmentId' => $appointment->id,
                    'timeRemaining' => $time_remaining
                ];

                $start_times[] = $appointment_start_time;
            }
        }

        if (count($start_times) > 0) {
            //find item with lowest remaining time
            usort($start_times, function ($previous, $next) {
                return $previous['timeRemaining'] > $next['timeRemaining'] ? 1 : -1;
            });
            $max_minutes_before_checkin = 10;

            if ($start_times[0]['timeRemaining'] > 0 && $start_times[0]['timeRemaining'] <= $max_minutes_before_checkin) {
                $next_appointment = Appointment::where('id', $start_times[0]['appointmentId'])
                    ->first();
                $next_appointment->appointment_code = self::generate_appointment_code();
                $next_appointment->status_id = APPOINTMENT_WAITING;
                $next_appointment->checkin_time = Carbon::now($timezone)->format('d-m-Y H:i');
                $next_appointment->update();
                // $next_appointment->doctors = Employee::whereIn('id', $next_appointment->doctors)->get(['first_name', 'last_name', 'email', 'cell_phone'])->makeHidden(['roles', 'permissions']);
                Log::alert('Appointment checkin done' . print_r($next_appointment, true));
                // return new AppointmentResource($next_appointment);
                return 'Checkin successfull. Please go to the Waiting Room';
            } else {
                throw new Exception('You dont have an appointment within ' . $max_minutes_before_checkin . ' minutes. Your next appointment is within' . ' ' . $start_times[0]['timeRemaining'] . ' ' . 'minutes from now');
            }
        }
        throw new Exception("You don't have any pending appointments today");
    }

    public static function generate_appointment_code(): string
    {
        $appointment_code_format = 'MD'; //get_facility_setting_patient_portal('code_format');
        $string = $appointment_code_format . '-' . '0' . strval(mt_rand(100, 999));
        $new_id = substr($string, -4, 4) + 1;
        $new_id = str_pad($new_id, 4, '0', STR_PAD_LEFT);
        return $appointment_code_format . '-' . $new_id;
    }

    public static function get_checkin_patient(string $first_name, string $last_name, string $date_of_birth)
    {
        $patient = Patient::where('first_name', $first_name)
            ->where('last_name', $last_name)
            ->where('birth_date', Carbon::parse($date_of_birth)->format('d-m-Y'))
            ->first();

        if (!$patient) {
            throw new Exception('Not registered, Please go to front office to register you');
        }
        return $patient;
    }

    public static function get_appointments(string $date_of_birth)
    {
        $appointments = Appointment::with([
            'patient' => function ($query) use ($date_of_birth) {
                return $query->select(['id', 'first_name', 'last_name', 'birth_date'])
                    ->where('birth_date', Carbon::parse('23-01-2003')->format('d-m-Y'));
            }
        ])
            ->where('status_id', APPOINTMENT_PENDING)
            ->where("date", Carbon::parse("05-10-2022")->format('d-m-Y'))
            ->get();

        if (!count($appointments)) {
            throw new Exception('You dont have any pending appointment today');
        }
        return $appointments;
    }

    public static function appointment_types(int $facility_id)
    {
        $all_appointment_types = AppointmentType::where("facility_id", $facility_id)->orderBy("created_at", "desc")->get();
        $all_appointments = Appointment::where("facility_id", $facility_id)->get();

        foreach ($all_appointment_types as $appointment_type):

            if ($appointment_type->doctors):
                $all_doctors_attached = [];
                if (count($appointment_type->doctors)): foreach ($appointment_type->doctors as $doctor_id):
                        $all_doctors_attached[] = Employee::find($doctor_id);
                    endforeach;
                endif;
                $appointment_type->doctors = $all_doctors_attached;
            endif;
            $has_appointments = false; foreach ($all_appointments as $appointment):
                if ($appointment->appointment_type_id):
                    if ($appointment->appointment_type_id === $appointment_type->id):
                        $has_appointments = true;
                        break;
                    endif;
                endif;
            endforeach;

            $appointment_type->has_appointments = $has_appointments;
        endforeach;
        return $all_appointment_types;
    }

    public static function waiting_room(int $facility_id)
    {
        $all_appointments = Appointment::where("facility_id", $facility_id)
            ->whereIn("status_id", [APPOINTMENT_WAITING, APPOINTMENT_SERVING])
            ->where("date", date('d-m-Y'))
            ->with(["patient", "status", "source", "appointmentType", "treatmentType", "period", "department"])
            ->orderBy("checkin_time", "desc")
            ->get();

        $final_appointment_container = [];

        foreach ($all_appointments as $appointment):
            $appointment_day = Carbon::parse($appointment->date)->dayOfWeek;

            $appointment->day = $appointment_day;
            $doctor_ids = $appointment->doctors;
            $doctors_list = []; foreach ($doctor_ids as $doctor_id):
                $doctors_list[] = Employee::find($doctor_id);
            endforeach;

            $appointment->doctors = $doctors_list;

            $final_appointment_container[] = $appointment;
        endforeach;

        return AppointmentResource::collection($final_appointment_container);
    }

    public static function waiting_room_new(int $facility_id)
    {
        $all_appointments = Appointment::where("facility_id", $facility_id)
            ->whereIn("status_id", [APPOINTMENT_WAITING, APPOINTMENT_SERVING])
            ->where("date", date('d-m-Y'))
            ->with(["patient", "status", "source", "appointmentType", "treatmentType", "period", "department"])
            ->orderBy("checkin_time", "desc")
            ->get();

        return AppointmentResource::collection($all_appointments);
    }

    public static function create_appointment($patient_id, $facility_id, $sourceId, $periodId, $interval, $appointmentTypeId, $date, $slots, $comments)
    {
        $new_appointment = Appointment::create([
            "facility_id" => $facility_id,
            "patient_id" => $patient_id,
            "status_id" => APPOINTMENT_PENDING,
            "source_id" => $sourceId,
            "period_id" => $periodId,
            "interval" => $interval,
            "treatment_type_id" => null,
            "frequency_id" => 1,
            "department_id" => 3,
            "appointment_type_id" => $appointmentTypeId,
            "date" => $date,
            "slots" => $slots,
            "doctors" => [],
            "comments" => $comments,
        ]);

        if ($new_appointment) {
            dispatch(new AppointmentAssignAvailableDoctorJob($new_appointment));
            return $new_appointment;
        }
        ;

        throw new Exception("Appointment creation failed");
    }
}
