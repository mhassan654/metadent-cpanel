<?php

use App\Http\Controllers\CalendarFrequencyController;
use Illuminate\Support\Facades\Route;

Route::prefix("calendar-frequencies")->group(function(){

    Route::post("all", [CalendarFrequencyController::class, "index"])->name('calendar_frequencies.all');
});
