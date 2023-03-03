<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AgendaController extends Controller
{

    /**
     * Display a listing of the PatientAdmission.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return
     */

    public function index()
    {
        if ($this->authUser()->can('View Appointments')) {
            $agendas = Agenda::with(['doctors', 'appointmentType'])->get();
            return $this->customSuccessResponseWithPayload($agendas);
        }
        return $this->customFailResponseWithPayload('Permission denied');
    }

    public function store(Request $request)
    {
        if ($this->authUser()->can('Create Appointments')) {
            $validator = Validator::make($request->all(), [
                "doctors" => "required",
                "periodSchema" => "required",
                "startDate" => "required",
                "appointmentTypeId" => "required",
                "endDate" => "required",
                "startTime" => "required",
                "endTime" => "required",
                "notes" => "nullable",
                "days" => "required",
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json($errors->all(), 500);
            }

            //check if appointment has agenda
            // get logged in user data
            try {
                // Start transaction
                DB::beginTransaction();

                $agenda = new Agenda();
                $agenda->duration = request()->duration;
                $agenda->period_schema = request()->periodSchema;
                $agenda->appointment_type_id = request()->appointmentTypeId;
                $agenda->days = request()->days;
                $agenda->doctors = request()->doctors;
                $agenda->start_date = request()->startDate;
                $agenda->end_date = request()->endDate;
                $agenda->start_time = request()->startTime;
                $agenda->end_time = request()->endTime;
                $agenda->notes = request()->notes;
                $agenda->color = request()->color;
                $agenda->code = request()->code;
                $agenda->patient_id = request()->patientId;
                $agenda->save();

                $doctorsArr = (explode(',', $request->doctors));
                $agenda->doctors()->attach($doctorsArr);

                // Check if the new user creation is successful, then proceed
                if (!$agenda) {
                    DB::rollback();
                    // Notify the client that the desired action was successful
                    return $this->customFailResponseWithPayload("Agenda creation failed");
                }
                // else commit the queries
                DB::commit();
                // Notify the client that the desired action was successful
                return $this->customSuccessResponseWithPayload($this->agendaWithDoctors($agenda->id));

            } catch (\Exception $exception) {
                DB::rollBack();
                return $this->customFailResponseWithPayload($exception->getMessage());
            }
        }
        return $this->customFailResponseWithPayload('Permission denied');

    }

    public function update()
    {
        if ($this->authUser()->can('Update Appointment')) {
            $validator = Validator::make(request()->all(), [
                "title" => "required",
                "doctors" => "required",
                "periodSchema" => "required",
                "startDate" => "required",
                "endDate" => "required",
                "appointment_type_id" => "required",
                "startTime" => "required",
                "endTime" => "required",
                "notes" => "nullable",
                "days" => "required",
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json($errors->all(), 500);
            }

            // get logged in user data
            try {

                $agenda = Agenda::find(request()->agendaId);
                $agenda->duration = request()->duration;
                $agenda->period_schema = request()->periodSchema;
                $agenda->appointment_type_id = request()->appointmentTypeId;
                $agenda->days = request()->days;
                $agenda->doctors = request()->doctors;
                $agenda->start_date = request()->startDate;
                $agenda->end_date = request()->endDate;
                $agenda->start_time = request()->startTime;
                $agenda->end_time = request()->endTime;
                $agenda->notes = request()->notes;
                $agenda->color = request()->color;
                $agenda->code = request()->code;
                $agenda->patient_id = request()->patientId;
                $agenda->save();

                // Check if the new user creation is successful, then proceed
                if (!$agenda) {
                    // Notify the client that the desired action was successful
                    return $this->customFailResponseWithPayload("Agenda update failed");
                }
                // Notify the client that the desired action was successful
                return $this->customSuccessResponseWithPayload($agenda);

            } catch (\Exception $exception) {
                return $this->customFailResponseWithPayload($exception->getMessage());
            }
        }
        return $this->customFailResponseWithPayload('Permission denied');
    }

    public function destroy()
    {
        if ($this->authUser()->can('Delete Appointment')) {
            $validator = Validator::make(request()->all(), [
                "agendaId" => "required",
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json($errors->all(), 500);
            }

            $agenda = Agenda::find(\request()->agendaId);

            $agenda->delete();
            return $this->customSuccessResponseWithPayload('Deleted');
        }
        return $this->customFailResponseWithPayload('Permission denied');

    }

    public function agendaWithDoctors($id)
    {
        if ($this->authUser()->can('View Appointments')) {
            $agenda_with_doctors = Agenda::with(['doctors', 'appointmentType'])->where('id', $id)->first();

            return $agenda_with_doctors;
        }
        return $this->customFailResponseWithPayload('Permission denied');
    }

}
