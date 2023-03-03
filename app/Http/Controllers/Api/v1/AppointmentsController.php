<?php

namespace App\Http\Controllers\Api\v1;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Appointment;
use App\Helpers\LogActivity;
use App\Models\AppointmentStatus;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AppointmentsController extends Controller
{
    public function __construct()
    {
//        $this->middleware("auth:api");
    }


    //TIED TO v1/patients/all ROUTE IN THE api.php FILE IN THE ROUTES FOLDER
    public function index()
    {
        // Return all patients falling in the given facility id
        return $this->all_appointments();
    }

    public function show()
    {
        return $this->customSuccessResponseWithPayload(Appointment::find(request()->appointmentId));
    }


    public function store()
    {

        $validator = Validator::make(request() -> all(),[
            "patientId" => "required",
//            "doctorId" => "required",
            "date" => "required",
            "end" => "required",
            "sourceId" => "required",
            "statusId" => "nullable",
            "treatmentId" => "required",
            "typeId" => "required",
            "start" => "required",
            "comments" => "nullable",
        ]);

        if ($validator -> fails()){
            $errors = $validator -> errors();
            return response() -> json($errors -> all(),500);
        }

//        check if appointment exists
        $isExists = Appointment::select("*")
            ->where('start', request()->start)
            ->where('date',request()->date)
            ->where('end', request()->end)
            ->where("facility_id", Auth::user()->facility_id)
            ->exists();

        $doctorsArr = (explode(',', request()->doctorId));

        $doctorAppointment = DB::table('doctors_appointments')->whereIn('user_id', $doctorsArr)->exists();

//        dd($doctorAppointment);

        if($isExists && $doctorAppointment){

            return $this->customFailResponseWithPayload("Doctor already booked at this time");

        }else{
            $new_appointment = new Appointment();
            $new_appointment-> patient_id = request()->patientId;
            $new_appointment-> main_doctor_id = request()->mainDoctorId;
            $new_appointment->facility_id = Auth::user()->facility_id;
            $new_appointment->date = request()->date;
            $new_appointment->status_id = request()->statusId;
            $new_appointment->source_id = request()->sourceId;
            $new_appointment->treatment_id = request()->treatmentId;
            $new_appointment->type_id = request()->typeId;
            $new_appointment->start = request()->start;
            $new_appointment->end = request()->end;
            $new_appointment->comments = request()->comments;
            $new_appointment->save();

            $doctorsArr = (explode(',', request()->doctorId));
            $new_appointment->doctors()->attach($doctorsArr);

            if($new_appointment) {
                // Return all patients falling in the given facility id
                LogActivity::addToLog('New Appointment created with id: ' . $new_appointment->id);
                return $this->allAppointments();
            }

            if (!empty(request()->patientId1))
            {
                $appointment2 = new Appointment();
                $appointment2-> patient_id = request()->patientId1;
                $appointment2-> main_doctor_id = request()->mainDoctorId1;
                $appointment2->facility_id = Auth::user()->facility_id;
                $appointment2->date = request()->date1;
                $appointment2->status_id = request()->statusId1;
                $appointment2->source_id = request()->sourceId1;
                $appointment2->treatment_id = request()->treatmentId1;
                $appointment2->type_id = request()->typeId1;
                $appointment2->start = request()->start1;
                $appointment2->end = request()->end1;
                $appointment2->comments = request()->comments1;
                $appointment2->save();

                $doctorsArr2 = (explode(',', request()->doctorId1));
                $appointment2->doctors()->attach($doctorsArr2);

                if($appointment2) {
                    // Return all patients falling in the given facility id
                    LogActivity::addToLog('New Appointment created with id: ' . $appointment2->id);
                    return $this->allAppointments();
                }
            }

        }

        return $this->allAppointments();
    }

// updaate an existing appoinmtent
    public function update()
    {
        request()->validate([
            "appointmentId" => "required",
        ]);

        $appointment = Appointment::find(request()->appointmentId);

        if($appointment) {
            $appointment->patient_id = request()->patientId;
//            $new_appointment-> doctor_id = request()->doctorId;
            $appointment->main_doctor_id = request()->mainDoctorId;
            $appointment->facility_id = Auth::user()->facility_id;
            $appointment->date = request()->date;
            $appointment->status_id = request()->statusId;
            $appointment->source_id = request()->sourceId;
            $appointment->treatment_id = request()->treatmentId;
            $appointment->type_id = request()->typeId;
            $appointment->start = request()->start;
            $appointment->end = request()->end;
            $appointment->comments = request()->comments;
            $appointment->save();


            DB::table('doctors_appointments')->where('appointment_id',$appointment->id)->delete();

            $doctorsArr = (explode(',', request()->doctorId));
            $appointment->doctors()->attach($doctorsArr);

            // Return all patients falling in the given facility id
            LogActivity::addToLog('Appointment Updated with id: ' . $appointment->id);

            return $this->customSuccessResponseWithPayload($appointment);
        }

        return $this->customFailResponseWithPayload("Appointment was not updated");
    }

    // update appointment status
    public function updateStatus()
    {
        request()->validate([
            "appointmentId" => "required",
        ]);

        $appointment = Appointment::with(["patient","doctors","mainDoctor", "status", "source", "appointmentType", "treatment"])->find(request()->appointmentId);

        if($appointment)
        {
            $appointment->update([
                "status_id" => request()->statusId,
            ]);

            LogActivity::addToLog('Appointment status with id:' . $appointment->id . 'was changed' );
            // Return all patients falling in the given facility id
            return $this->customSuccessResponseWithPayload($appointment);
        }

        return $this->customFailResponseWithPayload("Appointment status was not updated");
    }


    public function getStatus()
    {
        $confirmed_statuses = AppointmentStatus::where('status', 'confirmed')->get();
        $pending_statuses = AppointmentStatus::where('status', 'pending')->get();
        $waiting_statuses = AppointmentStatus::where('status', 'waiting')->get();
        $missed_statuses = AppointmentStatus::where('status', 'missed')->get();
        $closed_statuses = AppointmentStatus::where('status', 'closed')->get();
        $canceled_statuses = AppointmentStatus::where('status', 'canceled')->get();
        $serving_statuses = AppointmentStatus::where('status', 'serving')->get();

        return $confirmed_statuses->concat($pending_statuses)->concat($waiting_statuses)->concat($missed_statuses)->concat($closed_statuses)->concat($canceled_statuses)->concat($serving_statuses);
    }

    // fetch all statuses
    private function all_appointments()
    {
        $all_appointments = Appointment::where("facility_id", Auth::user()->facility_id)
        ->with(["patient", "status", "source", "appointmentType", "treatment"])
        ->orderBy("date", "asc")
        ->get();

        $final_appointment_container = [];

        foreach($all_appointments as $appointment):
            $doctor_ids = $appointment->doctors;
            $doctors_list = [];

            foreach($doctor_ids as $doctor_id):
                $doctors_list[] = User::find($doctor_id);
            endforeach;

            $appointment->doctors = $doctors_list;

            $final_appointment_container[] = $appointment;
        endforeach;

        return $this->customSuccessResponseWithPayload($final_appointment_container);
    }

    // getting all appointments in the waiting room
    public function waiting_room()
    {
        $all_appointments = Appointment::where("facility_id", Auth::user()->facility_id)
        ->where("status_id", APPOINTMENT_WAITING)
        ->with(["patient", "status", "source", "appointmentType", "treatment", "period"])
        ->orderBy("date", "asc")
        ->get();

        $final_appointment_container = [];

        foreach($all_appointments as $appointment):
            $appointment_day = Carbon::parse($appointment->date)->dayOfWeek;

            $appointment->day = $appointment_day;
            $doctor_ids = $appointment->doctors;
            $doctors_list = [];

            foreach($doctor_ids as $doctor_id):
                $doctors_list[] = Employee::find($doctor_id);
            endforeach;

            $appointment->doctors = $doctors_list;

            $final_appointment_container[] = $appointment;
        endforeach;

        return $this->customSuccessResponseWithPayload($final_appointment_container);
    }

     // getting all appointments in the waiting room
     public function closed_appointments()
     {
             $all_appointments = Appointment::where("facility_id", Auth::user()->facility_id)
                 ->where("status_id", 4)
                 ->with(["patient", "status", "source", "appointmentType", "treatment", "period"])
                 ->orderBy("date", "asc")
                 ->get();

             $final_appointment_container = [];

             foreach ($all_appointments as $appointment):
                 $appointment_day = Carbon::parse($appointment->date)->dayOfWeek;

                 $appointment->day = $appointment_day;
                 $doctor_ids = $appointment->doctors;
                 $doctors_list = [];

                 foreach ($doctor_ids as $doctor_id):
                     $doctors_list[] = User::find($doctor_id);
                 endforeach;

                 $appointment->doctors = $doctors_list;

                 $final_appointment_container[] = $appointment;
             endforeach;

             return $this->customSuccessResponseWithPayload($final_appointment_container);
     }

     // getting all appointments in the waiting room
     public function serving_room()
     {
         $all_appointments = Appointment::where("facility_id", Auth::user()->facility_id)
         ->where("status_id",7)
         ->with(["patient", "status", "source", "appointmentType", "treatment", "period"])
         ->orderBy("date", "asc")
         ->get();

         $final_appointment_container = [];

         foreach($all_appointments as $appointment):
             $appointment_day = Carbon::parse($appointment->date)->dayOfWeek;

             $appointment->day = $appointment_day;
             $doctor_ids = $appointment->doctors;
             $doctors_list = [];

             foreach($doctor_ids as $doctor_id):
                 $doctors_list[] = User::find($doctor_id);
             endforeach;

             $appointment->doctors = $doctors_list;

             $final_appointment_container[] = $appointment;
         endforeach;

         return $this->customSuccessResponseWithPayload($final_appointment_container);
     }

}
