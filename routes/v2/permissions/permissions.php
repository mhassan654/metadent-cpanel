<?php
/**
 **Created by MUWONGE HASSAN on 17/01/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

use App\Http\Controllers\Api\v2\PermissionsController;
use Illuminate\Support\Facades\Route;

Route::prefix("permissions")->group(function(){

    // All the users route
    Route::post("all", [PermissionsController::class, "index"]);

    // Create new user route
    Route::post("create", [PermissionsController::class, "store"]);

    // Edit user details route
    Route::post("update", [PermissionsController::class, "update"]);

    // Delete user route
    Route::post("delete", [PermissionsController::class, "destroy"]);
});
