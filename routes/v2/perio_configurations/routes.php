<?php

use App\Http\Controllers\Api\v2\PerioConfigurationController;
use Illuminate\Support\Facades\Route;

// Route::apiResource('perio_configurations', PerioConfigurationController::class);
Route::prefix("perio_configurations")->group(function(){
  Route::post("all",[PerioConfigurationController::class,'all'])->name('perio_configurations.all');
  Route::post("archive",[PerioConfigurationController::class,'archive'])->name('perio_configurations.achive');
});
