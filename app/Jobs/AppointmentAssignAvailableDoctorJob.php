<?php

namespace App\Jobs;

use Throwable;
use Carbon\Carbon;
use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\SlotsService\SlotsService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class AppointmentAssignAvailableDoctorJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 2;

    private $appointment;


    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            Log::alert("job: appointments:assign-available-doctors started");

            $slots_service = new SlotsService();

            $appointment = $this->appointment;;

            $available_doctors = array();
            $now = Carbon::now()->startOfDay();
            $appointment_date = Carbon::parse($appointment->date)->startOfDay();

            if ($appointment_date->lessThan($now)) {
                return;
            }

            $newDate = $slots_service->generate_week_and_day_from_date($appointment->date);

            $formatted_date = Carbon::parse($appointment->date)->format('d-m-Y');

            $doctors = $slots_service->get_available_doctors_based_on_day($newDate->day, $newDate->week, $appointment->facility_id);

            // TODO get for doctors with the least number of appointments and check if the appointment slot is available
            foreach ($doctors as $doctor) {

                $occupied_slots = $slots_service->get_doctors_occupied_slots($formatted_date, [$doctor->id]);

                $open_slots = $slots_service->get_available_open_slots_for_doctors(array(
                    array(
                        "start_time" => $appointment['slots'][0]['start-time'],
                        "end_time" => $appointment['slots'][0]['end-time'],
                    ),
                ), $occupied_slots);

                //  If doctor has an open slot, add the doctor to the list of available doctors
                if ($open_slots) {
                    array_push($available_doctors, $doctor->id);
                }
                Log::alert(print_r('Doctor: ' . $doctor->id . ' appointment: ' . $appointment->id . ' open slots ' . json_encode($open_slots) . ' occupied ' . json_encode($occupied_slots), true));
                // take the first two doctors
                if ($available_doctors && count($available_doctors) == 2) break;
            }
            if ($available_doctors) {

                $doctor_department = array_filter($doctors, function ($doc) use ($available_doctors) {
                    return $doc->id === $available_doctors[0];
                })[0]->department_id;

                Appointment::where('id', $appointment->id)->update([
                    'doctors' => json_encode($available_doctors),
                    'department_id' => $doctor_department,
                    'status_id' => APPOINTMENT_CONFIRMED,
                ]);
                // TODO send notifiction to doctors
            }

            Log::alert('job: appointments:assign-available-doctors finished');
        } catch (Throwable $th) {
            Log::error('job: appointments:assign-available-doctors error => ' . print_r($th->getMessage(), true));
        }
    }
}
