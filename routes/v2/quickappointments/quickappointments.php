<?php
// Created by Mulindwa Denis

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v2\QuickAppointmentController;

Route::prefix('quickappointments')->group(function(){

    //create
    Route::post('create',[QuickAppointmentController::class,'store'])->name('quickappointments.create');

    //fetch all
    Route::post('all',[QuickAppointmentController::class,'index'])->name('quickappointments.index');

    //update
    Route::post('update',[QuickAppointmentController::class,'update'])->name('quickappointments.update');

    //delete
    Route::post('delete',[QuickAppointmentController::class,'destroy'])->name('quickappointments.delete');
});
