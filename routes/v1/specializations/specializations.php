<?php

use App\Http\Controllers\Api\v1\SpecializationsController;
use Illuminate\Support\Facades\Route;

Route::prefix("specializations")->group(function(){

    Route::post("all", [SpecializationsController::class, "index"]);

    Route::post("specialization", [SpecializationsController::class, "show"]);

    Route::post("create", [SpecializationsController::class, "store"]);

    Route::post("edit", [SpecializationsController::class, "update"]);

    Route::post("delete", [SpecializationsController::class, "destroy"]);
});
