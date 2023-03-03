<?php

use App\Http\Controllers\Api\v2\ProcedureController;
use Illuminate\Support\Facades\Route;

Route::prefix("procedures")->group(function(){

    Route::post("all", [ProcedureController::class, "index"])->name('procedures.index');

    Route::post("procedure", [ProcedureController::class, "show"])->name('procedures.show');

    Route::post("create", [ProcedureController::class, "store"])->name('procedures.create');

    Route::post("edit", [ProcedureController::class, "update"])->name('procedures.edit');

    Route::post("delete", [ProcedureController::class, "destroy"])->name('procedures.delete');
});
