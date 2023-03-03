<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Patients\MedicalHistoryController;

Route::prefix('history')->middleware('jwt.verify')->group(function(){

    //Store history
    Route::post('store',[MedicalHistoryController::class,'store']);

    //Fetch all
    Route::post('all', [MedicalHistoryController::class,'index']);

    //edit
    Route::post('update',[MedicalHistoryController::class,'update']);

    //delete
    Route::post('delete',[MedicalHistoryController::class,'destroy']);
    
});