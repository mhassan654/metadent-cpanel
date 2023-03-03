<?php

use App\Http\Controllers\Api\v1\AppointmentReasonController;
use Illuminate\Support\Facades\Route;

Route::prefix("appointmentreasons")->group(function(){

    // All the patients route
    Route::post('all', [AppointmentReasonController::class, 'index']);

    // Specific patient record route
    Route::post('reason', [AppointmentReasonController::class, 'show']);

    // Create new patient record route
    Route::post('create', [AppointmentReasonController::class, 'store']);

    // Edit patient details route
    Route::post('edit', [AppointmentReasonController::class, 'update']);

    // Edit patient details route
    Route::post('delete', [AppointmentReasonController::class, 'destroy']);
});
