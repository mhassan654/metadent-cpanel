<?php
/**
 **Created by MUWONGE HASSAN on 04/03/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

use App\Http\Controllers\Api\v1\UsersController;

Route::prefix("doctors")->group(function(){

    Route::post("all", [UsersController::class, "getDoctors"]);
    Route::post("show", [UsersController::class, "doctorDetails"]);
});
