<?php

// Users routes section

use App\Http\Controllers\Api\v1\UsersController;
use Illuminate\Support\Facades\Route;

Route::prefix("users")->group(function(){

    // All the users route
    Route::post("all", [UsersController::class, "index"]);

    // Create new user route
    Route::post("create", [UsersController::class, "store"]);

    Route::post("show", [UsersController::class, "show"]);

    // Edit user details route
    Route::post("edit", [UsersController::class, "update"]);

    // Delete user route
    Route::post("delete", [UsersController::class, "destroy"]);

});
