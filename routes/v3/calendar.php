<?php

use App\Http\Controllers\v3\CalendarController;
use Illuminate\Support\Facades\Route;

Route::prefix('calendar')->group(function() {
    Route::get('appointments', [CalendarController::class, 'all_appointments']);
    Route::get('events', [CalendarController::class, 'all_events']);
    Route::get('doctors', [CalendarController::class, 'all_doctors']);
    Route::get('assistants',[CalendarController::class,'all_assistants']);
    Route::get('resource_appointments', [CalendarController::class, 'all_appointments']);
    Route::get('front-office-users',[CalendarController::class,'front_office_users']);
    Route::get('doctor-assistants',[CalendarController::class,'doctor_assistants']);
    Route::get('front-office-appointments',[CalendarController::class,'frontOfficeAppointments'])->name('frontoffice.appointments');
});
