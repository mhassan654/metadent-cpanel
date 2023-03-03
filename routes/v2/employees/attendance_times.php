<?php

use App\Http\Controllers\Api\v2\AttendanceTimeController;
/**
 **Created by MUWONGE HASSAN on 08/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */
Route::resource('attendance_times', AttendanceTimeController::class);

Route::group(['prefix' =>'attendance_times'],function(){
    Route::post('update', [AttendanceTimeController::class, 'update']);
    Route::post('delete', [AttendanceTimeController::class, 'destroy']);
});
