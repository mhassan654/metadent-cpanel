<?php

use App\Http\Controllers\Patients\PatientsController;
use App\Http\Controllers\Patients\SlotsController;
use Illuminate\Support\Facades\Route;

Route::prefix('appointments')->group(function () {

    Route::get('/recall_appointment', [PatientsController::class, 'recall']);

    Route::group(
        ['middleware' => 'jwt.verify'],
        function () {
            //fetch all appointments
            Route::post('all', [PatientsController::class, 'appointments']);

            Route::post('all-paginated', [PatientsController::class, 'paginated_appointments']);

            Route::post('upcoming', [PatientsController::class, 'upcoming_appointments']);

            //Create appointment
            Route::post('create', [PatientsController::class, 'create_appointment']);

            //Update Appointment
            Route::post('edit', [PatientsController::class, 'update_appointment']);

            //update appointment status
            Route::post('update_appointment_status', [PatientsController::class, 'update_appointment_status']);

            //confirm appointment
            Route::post('checkin', [PatientsController::class, 'confirm_appointment']);

            // show
            Route::post('show', [PatientsController::class, 'show']);

            Route::get('download-pdf', [PatientsController::class, 'download_pdf']);

            Route::get('download-excel', [PatientsController::class, 'download_excel']);

            Route::get('download-csv', [PatientsController::class, 'download_csv']);
        }
    );

    // appointment types
    Route::post('types', [PatientsController::class, 'allTypes']);
    Route::post('periods', [PatientsController::class, 'periods']);
    Route::post('statuses', [PatientsController::class, 'status']);
    Route::post('treatments', [PatientsController::class, 'treatments']);
    Route::post('sources', [PatientsController::class, 'sources']);
    Route::post('doctorslist', [PatientsController::class, 'getDoctors']);

    // self checkin app 

    Route::post('self_checkin', [PatientsController::class, 'self_checkin']);

    Route::post('get_checkin_patient_slots', [PatientsController::class, 'get_checkin_patient_slots']);

    Route::post('appointment_types', [PatientsController::class, 'appointment_types']);

    Route::post('waiting_room', [PatientsController::class, 'waiting_room']);

    Route::post('waiting_room_new', [PatientsController::class, 'waiting_room_new']);

    Route::post('create_appointment_checkin', [PatientsController::class, 'create_appointment_checkin']);

    Route::post('generate_single_doctor_slots', [PatientsController::class, 'generate_single_doctor_free_slots']);

    /// patient access slots
    Route::post('free-slots', [SlotsController::class, 'generate_doctors_free_slots'])->middleware('jwt.verify');
});