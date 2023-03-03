<?php

use App\Http\Controllers\Api\v1\TaskController;
use Illuminate\Support\Facades\Route;

Route::prefix("tasks")->group(function(){

    Route::post("all", [TaskController::class, "index"]);

    Route::post("create", [TaskController::class, "store"]);

    Route::post("edit", [TaskController::class, "update"]);

    Route::post("delete", [TaskController::class, "destroy"]);
});
