<?php

use App\Http\Controllers\Api\v1\AppointmentsController;
use Illuminate\Support\Facades\Route;

Route::prefix("appointments")->group(function(){

    // All the appointment route
    Route::post('all', [AppointmentsController::class, 'index']);

    // Specific appointment record route
    Route::post('appointment', [AppointmentsController::class, 'show']);

    // Create new appointment record route
    Route::post('create', [AppointmentsController::class, 'store']);

    // Edit appointment details route
    Route::post('update', [AppointmentsController::class, 'update']);

    // Edit appointment status route
    Route::post('update/status', [AppointmentsController::class, 'updateStatus']);

    // All the appointment route
    Route::post('status/all', [AppointmentsController::class, 'getStatus']);

    Route::post('waitingroom', [AppointmentsController::class, 'waiting_room']);

    Route::post('servingroom', [AppointmentsController::class, 'serving_room']);

    Route::post('closed', [AppointmentsController::class, 'closed_appointments']);
});
