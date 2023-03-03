<?php

use App\Http\Controllers\Api\v1\PatientsController;
use Illuminate\Support\Facades\Route;

// Patients routes section
Route::prefix("patients")->group(function(){

    // All the patients route
    Route::post('all', [PatientsController::class, 'index']);

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

    Route::post('appointments', [PatientsController::class, 'patientAppointments']);

//    patients with imaging
    Route::get('appointments', [PatientsController::class, 'patientAppointments']);
});
