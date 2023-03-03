<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v3')->group(function() {
    require __DIR__ . '/calendar.php';
});
