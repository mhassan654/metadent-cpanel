<?php

use App\Http\Controllers\Api\v1\DoneProducersController;
use Illuminate\Support\Facades\Route;

Route::prefix("doneprocedures")->group(function(){
    Route::post("all", [DoneProducersController::class, "index"]);

    Route::post("create", [DoneProducersController::class, "store"]);

    Route::post("edit", [DoneProducersController::class, "update"]);
});
