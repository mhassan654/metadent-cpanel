<?php
// Authentication and validation routes section

use App\Http\Controllers\Api\v1\PermissionController;
use Illuminate\Support\Facades\Route;

Route::prefix("permissions")->group(function(){

    // create new roles
    Route::post("all", [PermissionController::class, "index"]);
////
//    // Check authenticated user route
//    Route::post('role', [PermissionController::class, 'show']);
//
//    // Refresh authenticated user token route
//    Route::post('update', [PermissionController::class, 'update']);
//
//    // Logout user route
//    Route::post('delete', [PermissionController::class, "destroy"]);
});
