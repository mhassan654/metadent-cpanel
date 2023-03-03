<?php

namespace App\Http\Controllers\Api\v2;

use App\Models\Appointment;
use App\Models\QuickAppointment;
use App\Modules\Core\LogActivity;
use Metadent\AuthModule\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use slots;

class QuickAppointmentController extends BaseController
{
    public function __construct()
    {
//        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $final_appointments = [];
            $quick_appointments = QuickAppointment::where('facility_id',Auth::user()->facility_id)
                                                   ->with(["status", "source", "appointmentType",
                                                    "treatmentType", "period","department",
                                                    "patient.preferredAppointmentTime",
                                                    "patient.familyMembers",
                                                    "patient.mainDoctor",
                                                    "treatment","task"])
                                                   ->get();
            foreach($quick_appointments as $appointment){
                $appointment->doctors = !is_null($appointment->doctors) ? Employee::with(['department','employeeType'])->whereIn('id',$appointment->doctors)
                                                 ->get(['id','first_name','last_name','weeks','week_days','department_id','employee_type_id','frequency_id','contract_start_date','contract_end_date','availability','interval'])
                                                 ->makeHidden(['roles','permissions']) : [];
                $final_appointments[] = $appointment;
            }
            return $this->customSuccessResponseWithPayload($final_appointments);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            "patientId"=>"required|integer|exists:App\Models\Patient,id",
            "statusId"=>"required|integer|exists:App\Models\AppointmentStatus,id",
            "departmentId"=>"nullable|integer|exists:App\Models\Department,id",
            "taskId" => "nullable|integer|exists:App\Models\Task,id",
            "doctors" => "required|array"
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }

        try {
            $quick_appointment = QuickAppointment::create([
                "facility_id" => Auth::user()->facility_id,
                "patient_id" => $request->patientId,
                "type_id" => $request->typeId,
                "status_id" => $request->statusId,
                "source_id" => $request->sourceId,
                "period_id" => $request->periodId,
                "department_id" => $request->departmentId,
                "task_id" => $request->taskId,
                "interval" => $request->interval,
                "main_doctor" => $request->mainPDoctorId,
                "treatment_id" => $request->treatmentId,
                "treatment_type_id" => $request->treatmentTypeId,
                "appointment_type_id" => $request->appointmentTypeId,
                "doctors" => $request->doctors,
                "comments" => $request->comments,
                "date" => $request->date,
                "material_name" => $request->materialName,
                "material_date" => $request->materialDate,
            ]);
            if ($quick_appointment):
                return $this->customSuccessResponseWithPayload($quick_appointment);
            else:
                return $this->customFailResponseWithPayload('Appointment not Created');
            endif;
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            "appointments.*.slots"=>"required|array",
            "appointments.*.slots.*.start-time"=>"required|date_format:H:i",
            "appointments.*.slots.*.end-time"=>"required|date_format:H:i",
            "appointments.*.doctors" =>"required|array",
            "appointments.*.appointmentId" => "required",
            "appointments.*.departmentId" => "required"
        ]);
        if($validator->fails()){
            return $this->customFailResponseWithPayload($validator->errors()->all());
        } else {
            $created_appointments = [];
            $failed_appointments = [];
            foreach($request->appointments as $appointment) {
                $new_appointment = null;
                if(count($appointment['slots']) != 0) {
                    if($appointment['frequencyId'] && $appointment['frequencyId'] > 1){
                        $counter = 1;
                        $parent_id = null;
                        $appointment_date = $appointment['startDate'];
                        while (Carbon::parse($appointment_date)->betweenIncluded(Carbon::parse($appointment['startDate']),
                        Carbon::parse($appointment['endDate']) )):

                           $new_appointment = Appointment::create([
                            "facility_id" => Auth::user()->facility_id,
                            "patient_id" => $appointment['patientId'],
                            "type_id" => $appointment['typeId'],
                            "status_id" => $appointment['statusId'],
                            "frequency_id" => $appointment['frequencyId'],
                            "department_id" => $appointment['departmentId'],
                            "frequency_value" => $appointment['frequencyValue'],
                            "source_id" => $appointment['sourceId'],
                            "period_id" => $appointment['periodId'],
                            "interval" => $appointment['interval'],
                            "treatment_id" => $appointment['treatmentId'],
                            "treatment_type_id" => $appointment['treatmentTypeId'],
                            "parent_id" => $parent_id,
                            "appointment_type_id" => $appointment['appointmentTypeId'],
                            "doctors" => $appointment['doctors'],
                            "date" => $appointment_date,
                            "slots" => $appointment['slots'],
                            "comments" => $appointment['comments'],
                            "material_name" => $appointment['materialName'],
                            "material_date" => $appointment['materialDate']
                           ]);

                           if($counter === 1){
                            $parent_id = $new_appointment->id;
                           }

                           if($new_appointment){
                            $new_appointment->update(['parent_id'=>$parent_id]);
                            $quick_appointment = QuickAppointment::find($appointment['appointmentId']);
                            $quick_appointment->updated = true;
                            $quick_appointment->update();
                            $created_appointments[] = $new_appointment;
                           } else {
                            $failed_appointments[] = $new_appointment;
                           }

                           if($appointment['frequencyId'] === 2){
                            $appointment_date = Carbon::parse($appointment_date)->addWeeks($appointment['frequencyValue'])->format('d-m-Y');
                           } elseif($appointment['frequencyId'] === 3){
                            $appointment_date = Carbon::parse($appointment_date)->addWeeks($appointment['frequencyValue'])->format('d-m-Y');
                           } elseif($appointment['frequencyId'] === 4){
                            $appointment_date = Carbon::parse($appointment_date)->addWeeks($appointment['frequencyValue'])->format('d-m-Y');
                           }

                           $counter++;

                        endwhile;
                    } else {
                        $appointment_date = $appointment['startDate'];

                        $new_appointment = Appointment::create([
                            "facility_id" => Auth::user()->facility_id,
                            "patient_id" => $appointment['patientId'],
                            "type_id" => $appointment['typeId'],
                            "status_id" => $appointment['statusId'],
                            "frequency_id" => 1,
                            "frequency_value" => 1,
                            "source_id" => $appointment['sourceId'],
                            "department_id" => $appointment['departmentId'],
                            "period_id" => $appointment['periodId'],
                            "interval" => $appointment['interval'],
                            "treatment_id" => $appointment['treatmentId'],
                            "treatment_type_id" => $appointment['treatmentTypeId'],
                            "appointment_type_id" => $appointment['appointmentTypeId'],
                            "doctors" => $appointment['doctors'],
                            "date" => $appointment_date,
                            "slots" => $appointment['slots'],
                            "comments" => $appointment['comments'],
                            "material_name" => $appointment['materialName'],
                            "material_date" => $appointment['materialDate']
                        ]);

                        if($new_appointment){
                            $new_appointment->update(['parent_id'=>$new_appointment->id]);
                            $quick_appointment = QuickAppointment::find($appointment['appointmentId']);
                            $quick_appointment->updated = true;
                            $quick_appointment->update();
                            $created_appointments[] = $new_appointment;
                           } else {
                            $failed_appointments[] = $new_appointment;
                           }
                    }
                }
            }
            if(count($failed_appointments) === 0){
                return $this->customSuccessResponseWithPayload('Appointment Updated');
                LogActivity::addToLog('User with id ' . Auth::user()->id . ' created an appointment' );
            } else {
                return $this->customFailResponseWithPayload($failed_appointments);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $appointment = QuickAppointment::find($request->appointmentId);
            $appointment->delete();
            return $this->customSuccessResponseWithPayload('Appointment Deleted');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
}
