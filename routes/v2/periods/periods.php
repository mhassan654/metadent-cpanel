<?php

use App\Http\Controllers\PeriodsController;
use Illuminate\Support\Facades\Route;

Route::prefix("periods")->group(function(){
    
    Route::post("all", [PeriodsController::class, "index"]);
});
