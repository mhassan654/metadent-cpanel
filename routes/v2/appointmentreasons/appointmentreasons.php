<?php

use App\Http\Controllers\Api\v2\AppointmentReasonController;
use Illuminate\Support\Facades\Route;


    Route::group(['prefix' => 'appointmentreasons','middleware' => ['api']], function() {

    // All the patients route
    Route::post('all', [AppointmentReasonController::class, 'index'])->name('appointmentreasons.all');

    // Specific patient record route
    Route::post('reason', [AppointmentReasonController::class, 'show'])->name('appointmentreasons.reason');

    // Create new patient record route
    Route::post('create', [AppointmentReasonController::class, 'store'])->name('appointmentreasons.create');

    // Edit patient details route
    Route::post('edit', [AppointmentReasonController::class, 'update'])->name('appointmentreasons.edit');

    // Edit patient details route
    Route::post('delete', [AppointmentReasonController::class, 'destroy'])->name('appointmentreasons.delete');
});
