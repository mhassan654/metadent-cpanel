<?php

use App\Http\Controllers\Api\v2\TimezoneController;
use Illuminate\Support\Facades\Route;

Route::prefix('time_zones')->group(function(){
    // Fetch all timezones
    Route::get('all',[TimezoneController::class, 'all']);
});
