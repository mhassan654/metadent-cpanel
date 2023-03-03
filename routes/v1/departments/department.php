<?php

use App\Http\Controllers\Api\v1\DepartmentsController;
use Illuminate\Support\Facades\Route;

Route::prefix("departments")->group(function(){

    Route::post("all", [DepartmentsController::class, "index"]);

    Route::post("department", [DepartmentsController::class, "show"]);

    Route::post("create", [DepartmentsController::class, "store"]);

    Route::post("edit", [DepartmentsController::class, "update"]);

    Route::post("delete", [DepartmentsController::class, "destroy"]);
});
