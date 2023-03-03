<?php
// Authentication and validation routes section

use App\Http\Controllers\Api\v1\RolesController;
use Illuminate\Support\Facades\Route;

Route::prefix("roles")->group(function(){


    // create new roles
    Route::post("all", [RolesController::class, "index"]);
//
        // Check authenticated user route
        Route::post('role', [RolesController::class, 'show']);

        // Refresh authenticated user token route
        Route::post('update', [RolesController::class, 'update']);

        // Logout user route
        Route::post('delete', [RolesController::class, "destroy"]);
//
});
