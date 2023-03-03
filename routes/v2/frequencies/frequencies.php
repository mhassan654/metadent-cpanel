<?php

use App\Http\Controllers\FrequenciesContoller;
use Illuminate\Support\Facades\Route;

Route::prefix("frequencies")->group(function(){

    Route::post("all", [FrequenciesContoller::class, "index"]);
});
