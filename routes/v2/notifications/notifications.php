<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v2\EmployeeNotificationController;

// Route::resource('attendance_times', AttendanceTimeController::class);

Route::group(['prefix' =>'notifications'],function(){
    Route::get('/my-notifications', [EmployeeNotificationController::class, 'getUnreadNotifications']);
    Route::get('/read-notification/{id}', [EmployeeNotificationController::class, 'readNotification']);
    // Route::post('delete', [AttendanceTimeController::class, 'destroy']);
});
