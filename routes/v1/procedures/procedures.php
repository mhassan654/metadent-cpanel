<?php

use App\Http\Controllers\Api\v1\ProcedureController;
use Illuminate\Support\Facades\Route;

Route::prefix("treatmentprocedures")->group(function(){

    Route::post("all", [ProcedureController::class, "index"]);

    Route::post("procedure", [ProcedureController::class, "show"]);

    Route::post("create", [ProcedureController::class, "store"]);

    Route::post("edit", [ProcedureController::class, "update"]);

    Route::post("delete", [ProcedureController::class, "destroy"]);
});
