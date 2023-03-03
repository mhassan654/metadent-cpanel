<?php

use Illuminate\Support\Facades\Route;

Route::resource('currencies', \App\Http\Controllers\Api\v2\CurrencyController::class);
