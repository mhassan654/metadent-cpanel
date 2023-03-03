<?php
/**
 **Created by MUWONGE HASSAN on 28/02/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

use App\Http\Controllers\Api\v2\SlotsController;
use Illuminate\Support\Facades\Route;

// Route::post("slots", [SlotController::class, "index"]);

Route::prefix('slots')->group(function(){
    Route::post('doctors', [SlotsController::class, 'index']);
    Route::post('free-doctor', [SlotsController::class, 'any_free_doctor']);
    Route::post('free-appointment-type-doctor', [SlotsController::class, 'appointment_type_slots_any_doctor']);
    /// patient access slots
    Route::post('free-slots', [SlotsController::class, 'generate_doctors_free_slots'])->middleware('jwt.verify');
    ///
    Route::post('next-doctors-treatment', [SlotsController::class, 'next_treatment_doctor_slots']);
    Route::post('appointment-type', [SlotsController::class, 'appointment_type_slots']);
    Route::post('next-appointmenttype-slots', [SlotsController::class, 'next_appointmenttype_doctors_slots']);
    Route::post('treatment-series', [SlotsController::class, 'treatment_series']);

});
