<?php

namespace App\Http\Controllers\Api\v2;

use App\Exports\AppointmentsExport;
use App\Exports\patientAppointmentExport;
use App\Http\Controllers\ApiBaseController;
use App\Http\Resources\AppointmentResource;
use App\Mail\AppointmentReminderMail;
use App\Mail\PatientAppointmentReminder;
use App\Models\Appointment;
use App\Models\AppointmentStatus;
use App\Models\AutoMail;
use App\Models\Department;
use App\Models\Patient;
use App\Models\User;
use App\Modules\Common\Helper;
use App\Modules\Core\LogActivity;
use App\Models\Employee;
use App\Services\AppointmentService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class AppointmentsController extends ApiBaseController
{
    protected AppointmentService $appointmentService;
    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

    //TIED TO v1/patients/all ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    public function index()
    {
        try {
            LogActivity::addToLog("Read Appointment List", "Read");
            return $this->customSuccessResponseWithPayload($this->appointmentService->all_appointments());
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function current_day_appointments()
    {
        LogActivity::addToLog("Read Daily Appointment List", "Read");
        return $this->customSuccessResponseWithPayload($this->appointmentService->get_today_appointments());

    }
    public function dashboard_upcoming_appointments()
    {
        LogActivity::addToLog("Read Upcoming Appointment List", "Read");
        return $this->customSuccessResponseWithPayload($this->appointmentService->dashboard_upcoming_appointments());
    }

    public function number_current_day_appointments()
    {
        return $this->customSuccessResponseWithPayload(count($this->appointmentService->get_today_appointments()));
    }

    public function create_appointment(Request $request)
    {
        return $this->appointmentService->create_new_appointment($request);

    }

    // returns all appointments for a single doctor
    public function single_doctor_appointments()
    {
        try {
            $all_appointments = Appointment::with(["patient", "status", "source", "appointmentType", "treatmentType", 'frequency', 'department'])
                ->orderBy("date", "asc")->whereJsonContains('doctors', [$this->authUser()->id])
                ->get()
                ->makeHidden(['doctors']);
            LogActivity::addToLog("Read Doctor Appointment List", "Read");

            return $this->customSuccessResponseWithPayload($all_appointments);
        } catch (Exception $e) {
            return $this->customSuccessResponseWithPayload($e->getMessage());
        }

    }

    public function cancel_recurring_appointments()
    {
        $validator = Validator::make(request()->all(), [
            'appointmentId' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->customFailResponseWithPayload($validator->errors()->all());
        }
        try {
            $appointment = Appointment::find(request()->appointmentId);
            if ($appointment) {
                $child_appointments = Appointment::where('parent_id', $appointment->parent_id)->get();
                foreach ($child_appointments as $child) {
                    $child->status_id = 5;
                    $child->update();
                    LogActivity::addToLog("Cancel Appointment", "Update", null, null, null, null, null, $child->id);
                }
                $appointment->status_id = 5;
                $appointment->update();
                LogActivity::addToLog("Cancel Appointment", "Update", null, null, null, null, null, $appointment->id);
                return $this->customSuccessResponseWithPayload('Appointments Cancelled');
            } else {
                return $this->customFailResponseWithPayload('Appointment not Found');
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function archive_recurring_appointments()
    {
        $validator = Validator::make(request()->all(), [
            'appointmentId' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->customFailResponseWithPayload($validator->errors()->all());
        }
        try {
            $appointment = Appointment::find(request()->appointmentId);
            if ($appointment) {
                $child_appointments = Appointment::where('parent_id', $appointment->parent_id)->get();
                foreach ($child_appointments as $child) {
                    LogActivity::addToLog("Appointment Deleted", "Delete", null, null, null, null, null, $child->id);
                    $child->delete();
                }
                LogActivity::addToLog("Appointment Deleted", "Delete", null, null, null, null, null, $appointment->id);
                $appointment->delete();
                return $this->customSuccessResponseWithPayload('Appointments Archived');
            } else {
                return $this->customFailResponseWithPayload('Appointment not Found');
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function restore_appointments()
    {
        try {
            $restored_appointment = Appointment::onlyTrashed()->restore();
            if ($restored_appointment) {
                LogActivity::addToLog("Restored Archived Appointments", "Update");
                return $this->customSuccessResponseWithPayload('Appointments Restored');
            } else {
                return $this->customFailResponseWithPayload(' No Appointments to Restore');
            }

        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function update_with_recurrence()
    {
        $validator = Validator::make(request()->all(), [
            "slots" => "required|array",
            "slots.*.start-time" => "required|date_format:H:i",
            "slots.*.end-time" => "required|date_format:H:i",
            "doctors" => "required|array",
            "departmentId" => 'required|integer',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }
        $appointment_to_update = Appointment::find(request()->appointmentId);
        //check if appointment has child appointments
        $child_appointments = Appointment::where('parent_id', $appointment_to_update->parent_id)->get();
        $slot_interval = request()->interval;
        $start_time = Carbon::parse(request()->endTime);
        $end_time = Carbon::parse(request()->endTime)->addMinutes($slot_interval);
        $appointment_date = request()->startDate;

        $break = [
            'start-time' => $start_time->format('H:i'),
            'end-time' => $end_time->format('H:i'),
        ];

        try {
            // update all appointment series without mutating the recurrence
            if (request()->isSeries === true) {
                if (count($child_appointments) > 0) {

                    foreach ($child_appointments as $appointment) {

                        $appointment->update([
                            "facility_id" => 1,
                            "patient_id" => request()->patientId,
                            "type_id" => request()->typeId,
                            "source_id" => request()->sourceId,
                            "interval" => request()->interval,
                            "department_id" => request()->departmentId,
                            "treatment_type_id" => request()->treatmentTypeId,
                            "material_name" => request()->materialName,
                            "material_date" => request()->materialDate,
                            "break" => $break,
                            "status_id" => request()->statusId,
                            "comments" => request()->comments,
                            "period_id" => request()->periodId,
                            "doctors" => request()->doctors,
                            "appointment_type_id" => request()->appointmentTypeId,
                            "treatment_id" => request()->procedureId,
                            "slots" => request()->slots,
                            "treatment_plan_id" => request()->treatmentPlanId,
                            "phase_id" => request()->phaseId
                        ]);
                        LogActivity::addToLog("Appointment Updated", "Update", null, null, null, null, null, $appointment->id);
                    }
                    return $this->customSuccessResponseWithPayload('Appointments series updated successful');
                }
            }

            // check if appointments form data has slots
            if (count(request()->slots) !== 0) {
                $appointment_frequency_id = request()->frequencyId;

                // check if to update appointment recurrecies
                if (request()->updateFrequency === true) {
                    if ($appointment_frequency_id && $appointment_frequency_id > 1) {
                        if ($appointment_to_update) {

                            $appointment_date = request()->startDate;
                            $counter = 1;
                            $parent_id = null;

                            while (
                                Carbon::parse($appointment_date)->betweenIncluded(
                                    Carbon::parse(request()->startDate),
                                    Carbon::parse(request()->endDate)
                                )
                            ):
                                $new_appointment = Appointment::create([
                                    "facility_id" => 1,
                                    "patient_id" => request()->patientId,
                                    "status_id" => request()->statusId,
                                    "frequency_id" => request()->frequencyId,
                                    "department_id" => request()->departmentId,
                                    "frequency_value" => request()->frequencyValue,
                                    "source_id" => request()->sourceId,
                                    "period_id" => request()->periodId,
                                    "interval" => request()->interval,
                                    "treatment_id" => request()->treatmentId,
                                    "treatment_type_id" => request()->treatmentTypeId,
                                    "parent_id" => $parent_id,
                                    "appointment_type_id" => request()->appointmentTypeId,
                                    "doctors" => request()->doctors,
                                    "date" => $appointment_date,
                                    "slots" => request()->slots,
                                    "comments" => request()->comments,
                                    "material_date" => request()->materialDate,
                                    "material_name" => request()->materialName,
                                    "treatment_plan_id" => request()->treatmentPlanId,
                                    "phase_id" => request()->phaseId
                                ]);

                                LogActivity::addToLog("Appointment Created", "Create", null, null, null, null, null, $new_appointment->id);

                                if ($counter === 1):
                                    $parent_id = $new_appointment->id;
                                endif;

                                if ($new_appointment):
                                    $new_appointment->update(['parent_id' => $parent_id]);
                                    $created_appointments[] = $new_appointment;
                                else:
                                    $failed_appointments[] = $new_appointment;
                                endif;

                                if ($appointment_frequency_id === 2):
                                    $appointment_date = Carbon::parse($appointment_date)->addWeeks(request()->frequencyValue)->format('d-m-Y');
                                elseif ($appointment_frequency_id === 3):
                                    $appointment_date = Carbon::parse($appointment_date)->addWeeks(4 * request()->frequencyValue)->format('d-m-Y');
                                elseif ($appointment_frequency_id === 4):
                                    $appointment_date = Carbon::parse($appointment_date)->addWeeks(48 * request()->frequencyValue)->format('d-m-Y');
                                endif;

                                $counter++;
                            endwhile;
                            // \DB::table('appointments')->where('parent_id', $appointment_to_update->parent_id)->delete();
                            $recurring_appointments = Appointment::where('parent_id', $appointment_to_update->parent_id)->get();
                            foreach ($recurring_appointments as $appointment) {
                                LogActivity::addToLog("Appointment Deleted", "Delete", null, null, null, null, null, $appointment->id);
                                $appointment->delete();
                            }
                            return $this->customSuccessResponseWithPayload($this->appointmentService->all_appointments());
                        }

                    } else if ($appointment_frequency_id && $appointment_frequency_id = 1) {

                        $parent_appointment_id = $appointment_to_update->id;
                        $child_appointments = Appointment::where('parent_id', $parent_appointment_id)->get();

                        if (count($child_appointments) > 1) {
                            foreach ($child_appointments as $child) {
                                if ($child->id !== $parent_appointment_id) {
                                    LogActivity::addToLog("Appointment Deleted", "Delete", null, null, null, null, null, $child->id);
                                    $child->delete();
                                }
                            }

                            $appointment_to_update->frequency_id = 1;
                            $appointment_to_update->frequency_value = 1;
                            $appointment_to_update->period_id = request()->periodId;
                            $appointment_to_update->treatment_id = request()->treatmentId;
                            $appointment_to_update->status_id = request()->statusId;
                            $appointment_to_update->treatment_type_id = request()->treatmentTypeId;
                            $appointment_to_update->appointment_type_id = request()->appointmentTypeId;
                            $appointment_to_update->doctors = request()->doctors;
                            $appointment_to_update->date = $appointment_date;
                            $appointment_to_update->interval = request()->interval;
                            $appointment_to_update->department_id = request()->departmentId;
                            $appointment_to_update->slots = request()->slots;
                            $appointment_to_update->comments = request()->comments;
                            $appointment_to_update->material_date = request()->materialDate;
                            $appointment_to_update->material_name = request()->materialName;
                            $appointment_to_update->treatment_plan_id = request()->treatmentPlanId;
                            $appointment_to_update->phase_id = request()->phaseId;
                            $appointment_to_update->update();

                            return $this->customSuccessResponseWithPayload('Child appointments or series have been archived');
                        } else {
                            return $this->customFailResponseWithPayload('Appointment has no series');
                        }
                    }

                } else {
                    //prepare to update a non recurring appointment
                    $get_appointment = Appointment::find(request()->appointmentId);
                    $appointment_date = request()->startDate;

                    $get_appointment->update([
                        "material_date" => request()->materialDate ?? $appointment_to_update->material_date,
                        "material_name" => request()->materialName ?? $appointment_to_update->material_name,
                        "date" => $appointment_date,
                        "status_id" => request()->statusId,
                        "department_id" => request()->departmentId,
                        "comments" => request()->comments,
                        "treatment_type_id" => request()->treatmentTypeId,
                        "treatment_id" => request()->treatmentId,
                        "appointment_type_id" => request()->appointmentTypeId,
                        "doctors" => request()->doctors,
                        "break" => $break,
                        "period_id" => request()->periodId,
                        "slots" => request()->slots,
                    ]);

                    if ($get_appointment) {
                        $get_appointment->update(['parent_id' => $get_appointment->id]);
                        LogActivity::addToLog("Appointment Updated", "Update", null, null, null, null, null, $get_appointment->id);
                        return $this->customSuccessResponseWithPayload("Single Appointment successfully updated");
                    } else {
                        $failed_appointments[] = $appointment_to_update;
                        return $this->customFailResponseWithPayload('Appointment Update Failed');
                    }
                }
                $failed_appointments[] = $appointment_to_update;

            }

            // return $this->customSuccessResponseWithPayload('done');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }

    }

    public function rescheduling()
    {
        $appointment = Appointment::find(request()->appointmentId);

        $slot_interval = request()->interval;
        $start_time = Carbon::parse(request()->endTime);
        $end_time = Carbon::parse(request()->endTime)->addMinutes($slot_interval);

        $break = [
            'start-time' => $start_time->format('H:i'),
            'end-time' => $end_time->format('H:i'),
        ];

        $appointment->update([
            "date" => request()->date,
            "break" => $break,
            "period_id" => request()->periodId,
            "slots" => [
                [
                    'start-time' => request()->startTime,
                    'end-time' => request()->endTime,
                ],
            ],
            "status_id" => 1,
        ]);
        LogActivity::addToLog("Appointment Rescheduled", "Update", null, null, null, null, null, $appointment->id);
        return $this->customSuccessResponseWithPayload('Appointment rescheduling is successful');
    }

    public function extend_appointment()
    {
        $appointment_id = request()->appointmentId;

        $appointment = Appointment::find($appointment_id);

        if ($appointment):
            $appointment_slot = $appointment->slots[0];

            $appointment_start_time = $appointment_slot['start-time'];
            $appointment_end_time = $appointment_slot['end-time'];

            $new_appointment_end_time = Carbon::parse($appointment_end_time)->addMinutes($appointment->interval);

            $appointment->update([
                'slots' => [
                    [
                        'start-time' => $appointment_start_time,
                        'end-time' => $new_appointment_end_time->format('H:i'),
                    ],
                ],
            ]);

            LogActivity::addToLog("Appointment Extended", "Update", null, null, null, null, null, $appointment->id);

            return $this->customSuccessResponseWithPayload($appointment);
        endif;

        return $this->customFailResponseWithPayload('Appointment is found in the database');

    }

    public function confirm_appointment()
    {
        $appointment = Appointment::where('id', request()->appointmentId)
            ->with(["patient", "appointmentType", "treatmentType"])
            ->first();

        if ($appointment):

            $appointment->update([
                "status_id" => 1,
            ]);
            LogActivity::addToLog("Appointment Confirmed", "Update", null, null, null, null, null, $appointment->id);

            if ($this->authUser()->can('Appointments View')):

                return $this->appointmentService->all_appointments();
            endif;

            return $this->customFailResponseWithPayload('Not Authorized');
        endif;

        return $this->customFailResponseWithPayload('Appointment not found');
    }

    public function close_appointment()
    {
        $appointment = Appointment::find(request()->appointmentId);

        if ($appointment):

            $appointment->update([
                "status_id" => 4,
            ]);

            LogActivity::addToLog("Appointment Closed", "Update", null, null, null, null, null, $appointment->id);

            // Return all patients falling in the given facility id
            if ($this->authUser()->can('Appointments View')):

                return $this->appointmentService->all_appointments();
            endif;
        endif;

        return $this->customFailResponseWithPayload('Appointment not found');
    }

    public function cancel_appointment()
    {
        $appointment = Appointment::find(request()->appointmentId);

        if ($appointment):

            $appointment->update([
                "status_id" => 5,
            ]);
            LogActivity::addToLog("Appointment Cancelled", "Update", null, null, null, null, null, $appointment->id);
            // Return all patients falling in the given facility id
            if ($this->authUser()->can(' View Appointments')):

                return $this->appointmentService->all_appointments();
            endif;
        endif;

        return $this->customFailResponseWithPayload('Appointment not found');
    }

    // Start serving patient by updating serving time
    public function serving_time()
    {
        $validator = Validator::make(request()->all(), [
            'appointmentId' => 'required|integer',
            'servingTime' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->messages(), 200);
        }
        $appointment = Appointment::find(request()->appointmentId);

        if ($appointment):

            $appointment->servingtime = request()->servingTime;
            $appointment->status_id = 7;
            $appointment->save();

            if ($this->authUser()->can('View Appointments')):
                LogActivity::addToLog("Appointment Updated", "Update", null, null, null, null, null, $appointment->id);
                return Appointment::with(["patient", "status", "source", "appointmentType", "treatmentType", "period", "department"])->where('id', $appointment->id)->first();
            endif;

            return $this->customFailResponseWithPayload('Not Authorized');
        endif;

        return $this->customFailResponseWithPayload('Appointment not found');
    }

    public function show()
    {
        $appointment = request()->appointmentId;
        LogActivity::addToLog("Read Appointment Details", "Read", null, null, null, null, null, $appointment->id);
        return $this->customSuccessResponseWithPayload(Appointment::find($appointment));
    }

    // update appointment status
    public function updateStatus(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "appointmentId" => "required",
                "statusId" => "required",
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json($errors->all(), 500);
            }

            $appointment = Appointment::find(request()->appointmentId);

            if ($appointment) {
                $appointment_code_format = get_facility_setting('code_format');
                $string = $appointment_code_format . '-' . '0' . strval(mt_rand(100, 999));
                $new_id = substr($string, -4, 4) + 1;
                $new_id = str_pad($new_id, 4, '0', STR_PAD_LEFT);
                $code = $appointment_code_format . '-' . $new_id;
                if (request()->statusId === 3 && request()->checkinTime) {

                    $validator = Validator::make($request->all(), [
                        "appointmentId" => "required",
                        "statusId" => "required",
                        "checkinTime" => "required",
                    ]);

                    if ($validator->fails()) {
                        $errors = $validator->errors();
                        return response()->json($errors->all(), 500);
                    }

                    $appointment->status_id = request()->statusId;
                    $appointment->appointment_code = $code;
                    $appointment->checkin_time = request()->checkinTime;
                    $appointment->update();
                    LogActivity::addToLog("Appointment Updated", "Update", null, null, null, null, null, $appointment->id);
                    return $this->customSuccessResponseWithPayload($appointment);
                } elseif (request()->statusId === 7 && request()->patientId) {
                    $validator = Validator::make($request->all(), [
                        "appointmentId" => "required",
                        "statusId" => "required",
                        "patientId" => "required",
                    ]);

                    if ($validator->fails()) {
                        $errors = $validator->errors();
                        return response()->json($errors->all(), 500);
                    }
                    $appointment->status_id = 7;
                    $appointment->update();
                    $patient = Patient::find(request()->patientId);
                    $patient->is_serving = true;
                    $patient->update();
                    LogActivity::addToLog("Appointment Updated", "Update", null, null, null, null, null, $appointment->id);
                    return $this->customSuccessResponseWithPayload($appointment);
                } else {
                    $appointment->status_id = request()->statusId;
                    $appointment->update();
                    LogActivity::addToLog("Appointment Updated", "Update", null, null, null, null, null, $appointment->id);
                    return $this->customSuccessResponseWithPayload($appointment);
                }

            }

            return $this->customFailResponseWithPayload("Appointment status was not updated");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }

    }

    public function getStatus()
    {
        $confirmed_statuses = AppointmentStatus::where('status', 'confirmed')->get();
        $pending_statuses = AppointmentStatus::where('status', 'pending')->get();
        $waiting_statuses = AppointmentStatus::where('status', 'waiting')->get();
        $missed_statuses = AppointmentStatus::where('status', 'missed')->get();
        $closed_statuses = AppointmentStatus::where('status', 'closed')->get();
        $canceled_statuses = AppointmentStatus::where('status', 'canceled')->get();

        return $confirmed_statuses
            ->concat($pending_statuses)
            ->concat($waiting_statuses)
            ->concat($missed_statuses)
            ->concat($closed_statuses)
            ->concat($canceled_statuses);
    }

    public function nextAppointments()
    {
        $nextAppointments = Appointment::with(['nextAppointments', '']);
    }

    public function sendAppointmentConfirmationEmail()
    {
        $appointments = Appointment::where('status_id', 2)
            ->where('date', Carbon::now()->format('d-m-Y'))
            ->with(["patient", "appointmentType", "treatmentType"])
            ->get();
        foreach ($appointments as $appointment) {
            foreach ($appointment->slots as $slot) {
                $time_remaining = Carbon::parse(Carbon::now()->format('h:i'))->diffInMinutes($slot['start-time']);
                if ($time_remaining > 0 && $time_remaining <= 30) {
                    $doctors = [];
                    foreach ($appointment->doctors as $doctor) {
                        $doctors[] = User::where('id', $doctor)->first(['first_name', 'last_name', 'email']);
                    }
                    $mail_details = AutoMail::where('category_id', 1)->first();
                    $subject = '';
                    $body = '';
                    if (is_null($mail_details)) {
                        $subject = 'Appointment Remainder';
                        $body = 'Thank you for choosing Meta Dent for your dental services.
                        You have a pending appointment that starts within 30 minutes from now!!';
                    } else {
                        $subject = $mail_details->subject;
                    }
                    foreach ($doctors as $current_doctor) {
                        try {
                            $doctor_details = [
                                'problem' => $appointment->treatment_type ? $appointment->treatment_type->title : 'To be discussed with Patient',
                                'firstName' => $current_doctor->first_name,
                                'lastName' => $current_doctor->last_name,
                                'doctorEmail' => $current_doctor->email,
                                'patientFirstName' => $appointment->patient->first_name,
                                'patientLastName' => $appointment->patient->last_name,
                                'body' => $body,
                                'subject' => $subject,
                            ];
                            Mail::to($doctor_details['doctorEmail'])->send(new AppointmentReminderMail($doctor_details));
                        } catch (\Throwable $th) {
                            return $this->customFailResponseWithPayload($th->getMessage());
                        }
                    }
                    try {
                        $doctor_detail = User::where('id', $appointment->doctors[0])->first(['first_name', 'last_name']);
                        $patient_details = [
                            'patientEmail' => $appointment->patient->email,
                            'firstName' => $appointment->patient->first_name,
                            'lastName' => $appointment->patient->last_name,
                            'appointmentDate' => $appointment->date,
                            'doctorFirstName' => $doctor_detail->first_name,
                            'doctorLastName' => $doctor_detail->last_name,
                            'body' => $body,
                            'subject' => $subject,
                        ];
                        Mail::to($patient_details['patientEmail'])->send(new PatientAppointmentReminder($patient_details));
                    } catch (\Throwable $th) {
                        return $this->customFailResponseWithPayload($th->getMessage());
                    }
                }
            }
        }
    }

    /**
     * @return bool
     */
    public function sendAppointmentEmailCurrentDay()
    {
        $all_appointments = Appointment::where("status_id", 2)
            ->with(["patient", "appointmentType", "treatmentType"])
            ->get();

        $final_appointment_container = [];

        foreach ($all_appointments as $appointment):

            $doctors_list = []; foreach ($appointment->doctors as $doctor_id):
                $current_doctor = Employee::where('id', $doctor_id)->first(['first_name', 'last_name', 'email']);
                // $current_doctor = User::where('id', $doctor_id)->first(['first_name', 'last_name', 'email']);
                $doctors_list[] = $current_doctor;
            endforeach;

            $appointment->doctors = $doctors_list;

            $final_appointment_container[] = $appointment;
        endforeach;

        $appointment_treatment = null; foreach ($final_appointment_container as $final_appointment) {
            $mail_details = AutoMail::where('category_id', 1)->first();
            $subject = '';
            $body = '';
            if (is_null($mail_details)) {
                $subject = 'Appointment Remainder';
                $body = 'Thank you for choosing Meta Dent for your dental services.
                You have a pending appointment that within 30 minutes from now!!. Below are some of the appointment details.';
            } else {
                $body = $mail_details->body;
                $subject = $mail_details->subject;
            }
            foreach ($final_appointment->doctors as $doctor) {
                $final_doctor = (object) $doctor;
                try {
                    $doctor_details = [
                        'problem' => $final_appointment->treatment_type ? $final_appointment->treatment_type->title : 'To be discussed with Patient',
                        'firstName' => $final_doctor->first_name,
                        'lastName' => $final_doctor->last_name,
                        'doctorEmail' => $final_doctor->email,
                        'patientFirstName' => $final_appointment->patient->first_name,
                        'patientLastName' => $final_appointment->patient->last_name,
                        'body' => $body,
                        'subject' => $subject,
                    ];
                    Mail::to($doctor_details['doctorEmail'])->send(new AppointmentReminderMail($doctor_details));
                } catch (\Throwable $th) {
                    return $this->customFailResponseWithPayload($th->getMessage());
                }
            }
            try {
                $patient_details = [
                    'patientEmail' => $final_appointment->patient->email,
                    'firstName' => $final_appointment->patient->first_name,
                    'lastName' => $final_appointment->patient->last_name,
                    'appointmentDate' => $final_appointment->date,
                    'doctorFirstName' => $final_appointment->doctors[0]['first_name'],
                    'doctorLastName' => $final_appointment->doctors[0]['last_name'],
                    'body' => $body,
                    'subject' => $subject,
                ];
                Mail::to($patient_details['patientEmail'])->send(new PatientAppointmentReminder($patient_details));
            } catch (\Throwable $th) {
                return $this->customFailResponseWithPayload($th->getMessage());
            }
        }

    }

    // waiting room appointments for logged in doctor

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function waiting_room_doctor()
    {
        $all_appointments = Appointment::where("status_id", APPOINTMENT_WAITING)
            ->with(["patient", "status", "source", "appointmentType", "treatmentType", "period", "department"])
            ->whereJsonContains('doctors', [$this->authUser()->id])
            ->get()->makeHidden(['doctors']);
        LogActivity::addToLog("Read Doctor Waiting List", "Read");

        return $this->customSuccessResponseWithPayload($all_appointments);
    }

    // getting all appointments in the waiting room
    public function waiting_room()
    {
        $all_appointments = Appointment::where("status_id", APPOINTMENT_WAITING)
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

        LogActivity::addToLog("Read Waiting List Appointment", "Read");

        return $this->customSuccessResponseWithPayload($final_appointment_container);
    }

    // getting all appointments in the waiting room
    public function closed_appointments()
    {
        $all_appointments = Appointment::where("status_id", APPOINTMENT_CLOSED)
            ->with(["patient", "status", "source", "appointmentType", "treatmentType", "period", "department"])
            ->orderBy("date", "asc")
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
            $appointment->department = Department::find($appointment->department_id);

            $final_appointment_container[] = $appointment;
        endforeach;

        LogActivity::addToLog("Read Closed Appointments", "Read");

        return $this->customSuccessResponseWithPayload($final_appointment_container);
    }

    //logged in doctor completed appointments
    public function auth_doctor_completed_appointments()
    {
        try {
            $response = [];
            $completed_appointments = Appointment::with(["patient", "status", "source", "appointmentType", "treatmentType", "period", "department"])
                ->where('status_id', 4)
                ->orderBy('date', 'asc')
                ->get();
            foreach ($completed_appointments as $appointment) {
                foreach ($appointment->doctors as $doctor) {
                    if ($doctor == auth()->user()->id) {
                        $response[] = $appointment;
                    }
                }
            }
            LogActivity::addToLog("Read Doctor Completed Appointments", "Read");
            return $this->customSuccessResponseWithPayload($response);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    //logged in doctor cancelled appointments
    public function auth_doctor_cancelled_appointments()
    {
        try {
            $response = [];
            $cancelled_appointments = Appointment::with(["patient", "status", "source", "appointmentType", "treatmentType", "period", "department"])
                ->where('status_id', 5)
                ->orderBy('date', 'asc')
                ->get();
            foreach ($cancelled_appointments as $appointment) {
                foreach ($appointment->doctors as $doctor) {
                    if ($doctor == auth()->user()->id) {
                        $response[] = $appointment;
                    }
                }
            }
            LogActivity::addToLog("Read Doctor Cancelled Appointments", "Read");
            return $this->customSuccessResponseWithPayload($response);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    //logged in doctor serving appointments
    public function auth_doctor_serving_appointments()
    {
        try {
            $response = [];
            $serving_appointments = Appointment::with(["patient", "status", "source", "appointmentType", "treatmentType", "period", "department"])
                ->where('status_id', 7)
                ->orderBy('date', 'asc')
                ->get();

            foreach ($serving_appointments as $appointment) {
                foreach ($appointment->doctors as $doctor) {
                    if ($doctor == auth()->user()->id) {
                        $response[] = $appointment;
                    }
                }
            }
            LogActivity::addToLog("Read Doctor Serving Appointments", "Read");
            return $this->customSuccessResponseWithPayload($response);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    // fetch all doctor appointments
    public function doctor_appointments()
    {
        $all_appointments = Appointment::with(["patient", "status", "source", "appointmentType", "treatmentType", "period", "department"])
            ->orderBy("date", "asc")->whereJsonContains('doctors', [$this->authUser()->id])
            ->get()
            ->makeHidden(['doctors']);

        LogActivity::addToLog("Read Doctor Appointments", "Read");

        return $this->customSuccessResponseWithPayload($all_appointments);
    }

    public function destroy()
    {
        request()->validate([
            'appointmentId' => 'required',
        ]);

        $appointment = Appointment::find(request()->appointmentId);
        if ($appointment) {
            LogActivity::addToLog("Appointment Deleted", "Deleted", null, null, null, null, null, $appointment->id);
            $appointment->delete();
            return $this->customSuccessResponseWithPayload('Appointment has been archived');
        }

        return $this->customFailResponseWithPayload('Appointment not Found');
    }

    public function completed_appointments_today()
    {
        try {
            $completed_appointments_today = Appointment::where('date', Carbon::now()->format('d-m-Y'))
                ->where('status_id', 4)
                ->count();
            LogActivity::addToLog("Read Appointments Completed today", "Read");
            return $this->customSuccessResponseWithPayload($completed_appointments_today);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }


    public function patient_appointments()
    {

        try {
            $final_appointments = [];
            $patient_appointments = Appointment::where('patient_id', request()->patientId)
                ->with(["status", "source", "appointmentType", "treatmentType", "period", "department"])
                ->get();
            foreach ($patient_appointments as $appointment) {
                $doctor_list = [];
                foreach ($appointment->doctors as $doctor) {
                    $doctor_list[] = Employee::with('department')->find($doctor);
                }
                $appointment->doctors = $doctor_list;
                $final_appointments[] = $appointment;
            }
            LogActivity::addToLog("Read Patient Appointments", "Read");
            return $this->customSuccessResponseWithPayload($final_appointments);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function waiting_patient_list()
    {
        try {
            $final_patient_list = [];
            $waiting_appointments = Appointment::orderBy('created_at', 'desc')->where('status_id', 3)->latest()->get();
            if ($waiting_appointments) {
                foreach ($waiting_appointments as $appointment) {
                    $final_patient_list[] = Patient::with(['mainDoctor', 'familyMembers', 'preferredAppointmentTime'])
                        ->where('id', $appointment->patient_id)
                        ->first();
                }
                LogActivity::addToLog("Read Waiting List", "Read");
                return $this->customSuccessResponseWithPayload($final_patient_list);
            }
            return $this->customSuccessResponseWithPayload($final_patient_list);

        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function front_office_department_appointment()
    {
        try {
            $appointment = [];
            $serving_appointment = Appointment::with(["patient", "status", "source", "appointmentType", "treatmentType", "period", "department"])
                ->whereHas('department', function ($query) {
                    $query->where('department', 'LIKE', 'Front Office');
                })
                ->where('status_id', 7)
                ->latest()
                ->first();
            if (!is_null($serving_appointment)) {
                $doctors = [];
                foreach ($serving_appointment->doctors as $doctor) {
                    $doctors[] = Employee::with('department')->find($doctor);
                }
                $serving_appointment->doctors = $doctors;
                $appointment[] = $serving_appointment;
                LogActivity::addToLog("Read Appointment Details", "Read", null, null, null, null, null, $serving_appointment->id);
                return $this->customSuccessResponseWithPayload($appointment);
            } else {
                return $this->customSuccessResponseWithPayload($appointment);
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function appointments_counter()
    {
        try {
            return $this->customSuccessResponseWithPayload([
                'all_appointments' => count(Appointment::all()),
                'closed' => count(Appointment::where('status_id', 4)->get()),
                'pending' => count(Appointment::where('status_id', 2)->get()),
                'cancelled' => count(Appointment::where('status_id', 5)->get()),
                'confirmed' => count(Appointment::where('status_id', 1)->get()),
            ]);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function update_waiting_appointments_to_missed()
    {
        try {
            $waiting_appointments = Appointment::where('status_id', 3)->get();
            if (count($waiting_appointments) > 0) {
                foreach ($waiting_appointments as $appointment) {
                    if ($appointment->date < Carbon::now()->format('d-m-Y')) {
                        $appointment->status_id = 6;
                        $appointment->update();
                    }
                }
                return $this->customSuccessResponseWithPayload('Successful Done');
            } else {
                return $this->customSuccessResponseWithPayload('No waiting Appointment is Over due');
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function upcoming_appointments()
    {
        try {
            Helper::custom_validator(
                request()->all(),
                ['year' => 'nullable|max:4|min:4', "month_range" => 'nullable|date_format:m-Y']
            );
            $query_appointments = Appointment::with([
                    "patient",
                    "status",
                    "source",
                    "appointmentType",
                    "employees.country",
                    "employees.city",
                    "treatmentType",
                    "period",
                    "department",
                    "employees.department",
                    "employees.position"
                ])
                ->whereRaw('STR_TO_DATE(date,"%d-%m-%Y") > STR_TO_DATE("' . request()->date . '","%d-%m-%Y")')->has('patient');

            $query_appointments->when(request("status"), function ($query) {
                return $query->where('status_id', request("status"));
            });
            $query_appointments->when(request("year"), function ($query) {
                $year = request("year");
                return $query->where('date', 'LIKE', '%' . $year . '%');
            });
            $query_appointments->when(request("doctors"), function ($query) {
                $doctors = request("doctors");
                return $query->where(
                    function ($q) use ($doctors) {
                        foreach ($doctors as $doctor) {
                            $q->orWhereJsonContains('doctors', $doctor);
                        }
                    }
                );
            });
            $query_appointments->when(request("search_term"), function ($query) {
                $search_term = request("search_term");
                $query->where(
                    function ($q) use ($search_term) {
                        $q->whereHas(
                            'patient',
                            function ($query_patients) use ($search_term) {
                                    $query_patients->where('first_name', 'LIKE', '%' . $search_term . '%')
                                        ->orWhere('last_name', 'LIKE', '%' . $search_term . '%');
                                }
                        )->orWhereHas(
                                'status',
                                function ($query_status) use ($search_term) {
                                        $query_status->where('status', 'LIKE', '%' . $search_term . '%');
                                    }
                            )->orWhereHas(
                                'source',
                                function ($query_source) use ($search_term) {
                                        $query_source->where('source', 'LIKE', '%' . $search_term . '%');
                                    }
                            )->orWhereHas(
                                'appointmentType',
                                function ($query_appt_type) use ($search_term) {
                                        $query_appt_type->where('title', 'LIKE', '%' . $search_term . '%');
                                    }
                            )->orWhereHas(
                                'treatmentType',
                                function ($query_treatment_type) use ($search_term) {
                                        $query_treatment_type->where('title', 'LIKE', '%' . $search_term . '%');
                                    }
                            )->orWhereHas(
                                'employees',
                                function ($query_employees) use ($search_term) {
                                        $query_employees->where('last_name', 'LIKE', '%' . $search_term . '%')
                                            ->orWhere('first_name', 'LIKE', '%' . $search_term . '%');
                                    }
                            );
                    }
                );
            });
            $query_appointments->when(request('month_range'), function ($query) {
                $month = request("month_range");
                return $query->where('date', 'LIKE', '%' . $month . '%');
            });
            $query_appointments->when(request('date_range'), function ($query) {
                $date_range = request("date_range");
                return $query->whereRaw('STR_TO_DATE(date,"%d-%m-%Y") >= STR_TO_DATE("' . $date_range[0] . '","%d-%m-%Y")')
                    ->whereRaw('STR_TO_DATE(date,"%d-%m-%Y") <= STR_TO_DATE("' . $date_range[1] . '","%d-%m-%Y")');
            });
            $upcoming_appointments = $query_appointments->latest()->paginate(20);
            LogActivity::addToLog("Read Upcoming Appointment List", "Read");
            return $this->customSuccessResponseWithPayload($upcoming_appointments);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function past_appointments()
    {
        try {
            Helper::custom_validator(
                request()->all(),
                ['year' => 'nullable|max:4|min:4', "month_range" => 'nullable|date_format:m-Y']
            );
            $query_appointments = Appointment::with([
                    "patient",
                    "status",
                    "source",
                    "appointmentType",
                    "employees.country",
                    "employees.city",
                    "treatmentType",
                    "period",
                    "department",
                    "employees.department",
                    "employees.position"
                ])
                ->whereRaw('STR_TO_DATE(date,"%d-%m-%Y") < STR_TO_DATE("' . request()->date . '","%d-%m-%Y")')->has('patient');

            $query_appointments->when(request("status"), function ($query) {
                return $query->where('status_id', request("status"));
            });
            $query_appointments->when(request("year"), function ($query) {
                $year = request("year");
                return $query->where('date', 'LIKE', '%' . $year . '%');
            });
            $query_appointments->when(request("doctors"), function ($query) {
                $doctors = request("doctors");
                return $query->where(
                    function ($q) use ($doctors) {
                        foreach ($doctors as $doctor) {
                            $q->orWhereJsonContains('doctors', $doctor);
                        }
                    }
                );
            });
            $query_appointments->when(request("search_term"), function ($query) {
                $search_term = request("search_term");
                $query->where(
                    function ($q) use ($search_term) {
                        $q->whereHas(
                            'patient',
                            function ($query_patients) use ($search_term) {
                                    $query_patients->where('first_name', 'LIKE', '%' . $search_term . '%')
                                        ->orWhere('last_name', 'LIKE', '%' . $search_term . '%');
                                }
                        )->orWhereHas(
                                'status',
                                function ($query_status) use ($search_term) {
                                        $query_status->where('status', 'LIKE', '%' . $search_term . '%');
                                    }
                            )->orWhereHas(
                                'source',
                                function ($query_source) use ($search_term) {
                                        $query_source->where('source', 'LIKE', '%' . $search_term . '%');
                                    }
                            )->orWhereHas(
                                'appointmentType',
                                function ($query_appt_type) use ($search_term) {
                                        $query_appt_type->where('title', 'LIKE', '%' . $search_term . '%');
                                    }
                            )->orWhereHas(
                                'treatmentType',
                                function ($query_treatment_type) use ($search_term) {
                                        $query_treatment_type->where('title', 'LIKE', '%' . $search_term . '%');
                                    }
                            )->orWhereHas(
                                'employees',
                                function ($query_employees) use ($search_term) {
                                        $query_employees->where('last_name', 'LIKE', '%' . $search_term . '%')
                                            ->orWhere('first_name', 'LIKE', '%' . $search_term . '%');
                                    }
                            );
                    }
                );
            });
            $query_appointments->when(request('month_range'), function ($query) {
                $month = request("month_range");
                return $query->where('date', 'LIKE', '%' . $month . '%');
            });
            $query_appointments->when(request('date_range'), function ($query) {
                $date_range = request("date_range");
                return $query->whereRaw('STR_TO_DATE(date,"%d-%m-%Y") >= STR_TO_DATE("' . $date_range[0] . '","%d-%m-%Y")')
                    ->whereRaw('STR_TO_DATE(date,"%d-%m-%Y") <= STR_TO_DATE("' . $date_range[1] . '","%d-%m-%Y")');
            });
            $past_appointments = $query_appointments->latest()->paginate(20);
            LogActivity::addToLog("Read Past Appointment List", "Read");
            return $this->customSuccessResponseWithPayload($past_appointments);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function paginated_appointments()
    {
        try {

            Helper::custom_validator(
                request()->all(),
                ['year' => 'nullable|max:4|min:4', "month_range" => 'nullable|date_format:m-Y']
            );
            $query_appointments = Appointment::with([
                    "patient",
                    "status",
                    "source",
                    "appointmentType",
                    "employees.country",
                    "employees.city",
                    "treatmentType",
                    "period",
                    "department",
                    "employees.department",
                    "employees.position"
                ])->has('patient');

            $query_appointments->when(request("status"), function ($query) {
                return $query->where('status_id', request("status"));
            });
            $query_appointments->when(request("year"), function ($query) {
                $year = request("year");
                return $query->where('date', 'LIKE', '%' . $year . '%');
            });
            $query_appointments->when(request("doctors"), function ($query) {
                $doctors = request("doctors");
                return $query->where(
                    function ($q) use ($doctors) {
                        foreach ($doctors as $doctor) {
                            $q->orWhereJsonContains('doctors', $doctor);
                        }
                    }
                );
            });
            $query_appointments->when(request("search_term"), function ($query) {
                $search_term = request("search_term");
                return $query->whereHas(
                    'patient',
                    function ($query_patients) use ($search_term) {
                        $query_patients->where('first_name', 'LIKE', '%' . $search_term . '%')
                            ->orWhere('last_name', 'LIKE', '%' . $search_term . '%');
                    }
                )->orWhereHas(
                        'status',
                        function ($query_status) use ($search_term) {
                            $query_status->where('status', 'LIKE', '%' . $search_term . '%');
                        }
                    )->orWhereHas(
                        'source',
                        function ($query_source) use ($search_term) {
                            $query_source->where('source', 'LIKE', '%' . $search_term . '%');
                        }
                    )->orWhereHas(
                        'appointmentType',
                        function ($query_appt_type) use ($search_term) {
                            $query_appt_type->where('title', 'LIKE', '%' . $search_term . '%');
                        }
                    )->orWhereHas(
                        'treatmentType',
                        function ($query_treatment_type) use ($search_term) {
                            $query_treatment_type->where('title', 'LIKE', '%' . $search_term . '%');
                        }
                    )->orWhereHas(
                        'employees',
                        function ($query_employees) use ($search_term) {
                            $query_employees->where('first_name', 'LIKE', '%' . $search_term . '%')
                                ->orWhere('last_name', 'LIKE', '%' . $search_term . '%');
                        }
                    );
            });
            $query_appointments->when(request("past_appointments"), function ($query) {
                $date_time = request("past_appointments");
                $date = substr($date_time, 0, 10);
                // $time = substr($date_time,-5);
                return $query->whereRaw('STR_TO_DATE(date,"%d-%m-%Y") < STR_TO_DATE("' . $date . '","%d-%m-%Y")');
                //  ->whereRaw('JSON_CONTAINS(slots->>end-time,?)',$time);
            });
            $query_appointments->when(request("upcoming_appointments"), function ($query) {
                $date_time = request("upcoming_appointments");
                $date = substr($date_time, 0, 10);
                // $time = substr($date_time,-5);
                return $query->whereRaw('STR_TO_DATE(date,"%d-%m-%Y") > STR_TO_DATE("' . $date . '","%d-%m-%Y")');
                // ->whereRaw('STR_TO_DATE(slots->start-time,"%H:%i") > STR_TO_TIME("'.$time.'","%H:%i")');
            });
            $query_appointments->when(request('month_range'), function ($query) {
                $month = request("month_range");
                return $query->where('date', 'LIKE', '%' . $month . '%');
            });
            $query_appointments->when(request('date_range'), function ($query) {
                $date_range = request("date_range");
                return $query->whereRaw('STR_TO_DATE(date,"%d-%m-%Y") >= STR_TO_DATE("' . $date_range[0] . '","%d-%m-%Y")')
                    ->whereRaw('STR_TO_DATE(date,"%d-%m-%Y") <= STR_TO_DATE("' . $date_range[1] . '","%d-%m-%Y")');
            });
            $paginated_appointments = $query_appointments->latest()->paginate(20);
            LogActivity::addToLog("Read Appointment List", "Read");
            return $this->customSuccessResponseWithPayload($paginated_appointments);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }


    //download pdf appointment
    public function download_pdf()
    {
        try {
            $request_appointments = json_decode(request("appointments"));
            // dd($request_appointments);
            $final_appointments = Appointment::with(['patient:id,first_name,last_name', 'status', 'source', 'treatmentType', 'appointmentType', 'employees:id,first_name,last_name'])
                ->whereIn('id', $request_appointments)->latest()->get();
            // dd($final_appointments);
            Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = Pdf::loadView('pdfs.appointment_list', compact('final_appointments'));
            $pdf->setPaper('a3', 'landscape');
            LogActivity::addToLog("Print PDF Appointment Details", "Execute");
            return $pdf->stream("Appointments PDF");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }


    //download excel file

    public function download_excel()
    {
        try {
            $appointments = request("appointments");
            $final_appointments = json_decode($appointments);
            LogActivity::addToLog("Print Excel Appointment Details", "Execute");
            return Excel::download(new AppointmentsExport($final_appointments), 'Appointments.xlsx');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    //download csv file

    public function download_csv()
    {
        try {
            $appointments = request("appointments");
            $final_appointments = json_decode($appointments);
            LogActivity::addToLog("Print CSV Appointment Details", "Execute");
            return Excel::download(new AppointmentsExport($final_appointments), 'Appointments.csv');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function recallAppointments(){
        try {
            $appointments = Appointment::where('is_recallable', true)->latest()
                ->where('date','>=' , Carbon::today()->format('d-m-Y'))
                ->with([
                    'patient', 'department',
                    'appointmentType', 'treatmentType', 'source', 'frequency', 'recurrencies', 'treatmentPlan',
                    'status'
                ])->get();

            return $this->customSuccessResponseWithPayload(AppointmentResource::collection($appointments));
        }catch(\Throwable $th){
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
    //download pdf patient appointment
    public function download_patient_appointments_pdf()
    {
        try {
            Helper::custom_validator(request()->all(), ['patientId' => 'required|integer']);
            $final_appointments = Appointment::with(['status', 'source', 'treatmentType', 'appointmentType', 'employees:id,first_name,last_name'])
                ->where('id', request()->patientId)->latest()->get();
            $patient = Patient::where('id', request()->patientId)->get(['id', 'unique_identifier', 'first_name', 'last_name']);
            Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = Pdf::loadView('pdfs.patient_appointment', compact('final_appointments', 'patient'));
            $pdf->setPaper('a3', 'landscape');
            LogActivity::addToLog("Print PDF Appointment Details", "Execute");
            return $pdf->stream("Appointments PDF");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    //download patient appointment excel file

    public function download_patient_appointments_excel()
    {
        try {
            $appointments = request("appointments");
            $final_appointments = json_decode($appointments);
            LogActivity::addToLog("Print Excel Appointment Details", "Execute");
            return Excel::download(new PatientAppointmentExport($final_appointments), 'PatientAppointments.xlsx');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    //download patient appointment csv file

    public function download_patient_appointments_csv()
    {
        try {
            $appointments = request("appointments");
            $final_appointments = json_decode($appointments);
            LogActivity::addToLog("Print CSV Appointment Details", "Execute");
            return Excel::download(new PatientAppointmentExport($final_appointments), 'PatientAppointments.csv');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

}
