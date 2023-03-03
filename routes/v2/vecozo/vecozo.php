<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\v2\Integrations\Vecozo\VecozoController;

// vecozo routes section

Route::prefix("vecozo")->group(function () {
    Route::post("insurance-data", [VecozoController::class, "verifyInsuranceData"])->name('vecozo.view-insurance-data');
    Route::post("update-agb-code", [VecozoController::class, "updateAgbCode"])->name('vecozo.update-agb-code');
    Route::get("agb", [VecozoController::class, "get_agb"])->name('vecozo.get-agb');
});