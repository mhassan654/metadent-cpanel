<?php
/**
 **Created by MUWONGE HASSAN on 21/02/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

use App\Http\Controllers\Api\v2\SlotsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'time-slots', 'middleware' => ['api']], function () {
    // All the users route
    Route::get("doctor-time-slots", [SlotsController::class, "index"]);

    // Create new user route
    Route::post("create", [SlotsController::class, "store"]);

    Route::post("show", [SlotsController::class, "getSingleDoctorTimeSlots"]);

//    // Edit user details route
//    Route::post("edit", [SlotsController::class, "update"]);
//
//    // Delete user route
    Route::post("delete", [SlotsController::class, "deleteSingleDoctorTimeSlots"]);
});
