<?php

use App\Http\Controllers\Api\v2\SpecializationsController;
use Illuminate\Support\Facades\Route;

Route::prefix("specializations")->group(function(){

    Route::post("all", [SpecializationsController::class, "index"])->name('specializations.index');

    Route::post("specialization", [SpecializationsController::class, "show"])->name('specializations.show');

    Route::post("create", [SpecializationsController::class, "store"])->name('specializations.create');

    Route::post("edit", [SpecializationsController::class, "update"])->name('specializations.edit');

    Route::post("delete", [SpecializationsController::class, "destroy"])->name('specializations.delete');
});
