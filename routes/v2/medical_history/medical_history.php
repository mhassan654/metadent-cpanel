<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v2\MedicalHistoryController;

// Route::resource('medical_history', \App\Http\Controllers\Api\v2\MedicalHistoryController::class);
Route::prefix('medical_history')->group(function(){
    //fetch all patient
    Route::post('all',[MedicalHistoryController::class, 'index']);
    //post
    Route::post('create',[MedicalHistoryController::class,'store']);
    //update
    Route::post('update/{id}',[MedicalHistoryController::class,'update']);
    //delete
    Route::post('delete/{id}',[MedicalHistoryController::class,'destroy']);
});
