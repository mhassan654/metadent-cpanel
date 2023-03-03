<?php

use App\Http\Controllers\Api\v2\AppointmentTypesController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'appointmenttypes', 'middleware' => ['api']], function () {

    // All the patients route
    Route::post('all', [AppointmentTypesController::class, 'index'])->name('appointmenttypes.all');

    // Specific patient record route
    Route::post('type', [AppointmentTypesController::class, 'show'])->name('appointmenttypes.type');

    // Create new patient record route
    Route::post('create', [AppointmentTypesController::class, 'create_appointment_type'])->name('appointmenttypes.create');

    // Create new patient record route
    Route::post('attach-doctors', [AppointmentTypesController::class, 'attach_doctors'])->name('appointmenttypes.attach_doctors');

    // Edit patient details route
    Route::post('edit', [AppointmentTypesController::class, 'update'])->name('appointmenttypes.edit');

    // Edit patient details route
    Route::post('delete', [AppointmentTypesController::class, 'destroy'])->name('appointmenttypes.delete');
});
