<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v2\PatientsController;

// Patients routes section
Route::group(['prefix' => 'patients', 'middleware' => ['api']], function () {

    // All the patients route
    Route::post('all', [PatientsController::class, 'index']);

    // Search the patients route
    Route::post('search', [PatientsController::class, 'search']);

    // All the patients paginated route
    Route::post('all-paginated', [PatientsController::class, 'paginated']);

    // Specific patient record route
    Route::post('patient', [PatientsController::class, 'getPatientWithDoctor']);

    // Create new patient record route
    Route::post('create', [PatientsController::class, 'store']);

    // Edit patient details route
    Route::post('edit', [PatientsController::class, 'update']);

    // assign doctor to a patient route
    Route::post('assign-doctor', [PatientsController::class, 'assignDoctor']);

    // assign patient with assigned doctors route
    Route::post('assigned-doctors', [PatientsController::class, 'getPatientWithDoctor']);

    Route::post('appointments', [PatientsController::class, 'patient_appointments']);

    Route::post('delete', [PatientsController::class, 'destroy']);

    Route::post('delete/all', [PatientsController::class, 'deleteSelected']);

    // patients with imaging
    Route::post('waiting', [PatientsController::class, 'waiting_room']);

    Route::post('appointment-update-status', [PatientsController::class, 'update_appointment_status']);

    //update image
    Route::post('update_image', [PatientsController::class, 'update_image']);

    //appointment invitation
    Route::post('invitation', [PatientsController::class, 'appointment_invitation']);

    //extra info update
    Route::post('update-extra-info', [PatientsController::class, 'update_extra_info']);

    //total facility patients
    Route::post('total-facility-patients', [PatientsController::class, 'patient_number']);

    //expected patients today
    Route::post('expected-patients-today', [PatientsController::class, 'expected_patients_today']);

    //recent patients
    Route::post('recent-patients', [PatientsController::class, 'recent_patients']);

    //patients in given time
    Route::post('patients-in-a-given-time', [PatientsController::class, 'patients_in_given_time']);

    Route::post('front-office-patients', [PatientsController::class, 'front_office_patients']);

    //fetch single patient
    Route::post('single-patient', [PatientsController::class, 'show']);

    //patients landing page route
    Route::post('patients-all', [PatientsController::class, 'patients_landing_page']);

    //patients landing page search route
    Route::post('search-patients', [PatientsController::class, 'search_landing_page']);

    //confirm patient
    Route::post('confirm-patient', [PatientsController::class, 'confirm_patient']);

    //fetch approved patients
    Route::get('approved', [PatientsController::class, 'approved_patients']);

    //fetch pending patients
    Route::get('pending', [PatientsController::class, 'pending_patients']);

    //search approved patients
    Route::post('search-approved', [PatientsController::class, 'search_approved_patients']);

    // search pending patients
    Route::post('search-pending', [PatientsController::class, 'search_pending_patients']);

    // download patient pdf file
    Route::get('download-pdf', [PatientsController::class, 'download_pdf']);

    // download patient csv file
    Route::get('download-csv', [PatientsController::class, 'download_csv']);

    // download patient excel file
    Route::get('download-excel', [PatientsController::class, 'download_excel']);

    //download logs patient pdf
    Route::get('download-patient-logs-pdf', [PatientsController::class, 'download_patient_logs_pdf']);

    //download logs patient csv
    Route::get('download-patient-logs-csv', [PatientsController::class, 'download_patient_logs_csv']);

    //download logs patient excel
    Route::get('download-patient-logs-excel', [PatientsController::class, 'download_patient_logs_excel']);

    //count pending and approved patients
    Route::get('count-pending-approved', [PatientsController::class, 'count_pending_approved_patients']);

    //archive patient
    Route::post('archive-patient', [PatientsController::class, 'archive_patient']);

    //search archived patients
    Route::post('search-archived', [PatientsController::class, 'search_archived_patients']);

    //get archive patients
    Route::get('archived', [PatientsController::class, 'get_archived_patients']);

    //restore patient
    Route::post('restore-patient', [PatientsController::class, 'restore_patient']);

    //print patient
    Route::get('print-patient', [PatientsController::class, 'print_single_patient']);

    //patient latest treatment
    Route::post('patient-latest-treatment', [PatientsController::class, 'paginated_patient_done_treatments']);

    //download patient with latest treatment pdf
    Route::get('download-patient-with-treatment-pdf', [PatientsController::class, 'download_patient_treatment_pdf']);

    //download patient with latest treatment csv
    Route::get('download-patient-with-treatment-csv', [PatientsController::class, 'download_patient_treatment_csv']);

    //download patient with latest treatment excel
    Route::get('download-patient-with-treatment-excel', [PatientsController::class, 'download_patient_treatment_excel']);

    //patient with appointments
    Route::post('patient-today-appointments', [PatientsController::class, 'patients_with_today_appointments']);

    //download patients with today appointments pdf
    Route::get('download-patients-with-today-appointments-pdf', [PatientsController::class, 'download_patients_today_appointments_pdf']);

    //download patients with today appointments csv
    Route::get('download-patients-with-today-appointments-csv', [PatientsController::class, 'download_patients_today_appointments_csv']);

    //download patients with today appointments excel
    Route::get('download-patients-with-today-appointments-excel', [PatientsController::class, 'download_patients_today_appointments_excel']);

});
