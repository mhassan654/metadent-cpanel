<?php

use App\Http\Controllers\Api\v1\AppointmentTypesController;
use Illuminate\Support\Facades\Route;

Route::prefix("appointmenttypes")->group(function(){

    // All the patients route
    Route::post('all', [AppointmentTypesController::class, 'index']);

    // Specific patient record route
    Route::post('type', [AppointmentTypesController::class, 'show']);

    // Create new patient record route
    Route::post('create', [AppointmentTypesController::class, 'store']);

    // Edit patient details route
    Route::post('edit', [AppointmentTypesController::class, 'update']);

    // Edit patient details route
    Route::post('delete', [AppointmentTypesController::class, 'destroy']);
});
