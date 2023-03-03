<?php

use App\Http\Controllers\Api\v2\StatusController;
use Illuminate\Support\Facades\Route;

Route::prefix("status")->group(function(){

    Route::post("all", [StatusController::class, "index"]);

    Route::post("doctor", [StatusController::class, "get_doctors_tasks"]);

    Route::post("create", [StatusController::class, "store"]);

    Route::post("edit", [StatusController::class, "update"]);

    Route::post("delete", [StatusController::class, "destroy"]);
});
