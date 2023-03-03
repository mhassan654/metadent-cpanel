<?php
/**
 **Created by MUWONGE HASSAN on 24/02/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

//use App\Http\Controllers\Api\v1\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v2\EmployeeController;
use App\Http\Controllers\Api\v2\AppointmentsController;


Route::prefix("doctors")->group(function(){
    Route::post("all", [EmployeeController::class, "getDoctors"]);
    Route::post("show", [EmployeeController::class, "show"]);
    Route::post('cancelled-appointments', [AppointmentsController::class,'auth_doctor_cancelled_appointments']);
    Route::post('completed-appointments', [AppointmentsController::class,'auth_doctor_completed_appointments']);
    Route::post('serving-appointments', [AppointmentsController::class,'auth_doctor_serving_appointments']);
    Route::post("appointments", [AppointmentsController::class, "doctor_appointments"]);
});
