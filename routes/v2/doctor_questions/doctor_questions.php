<?php

use App\Http\Controllers\MedicalQuestionController;
use Illuminate\Support\Facades\Route;

Route::resource('doctor_questions', \App\Http\Controllers\Api\v2\DoctorQuestionsController::class);

Route::group(['prefix'=>'questions'], function(){
    Route::get('all', [MedicalQuestionController::class, 'index']);
    Route::get('all/v2', [MedicalQuestionController::class, 'index_v2']);
    Route::post('save', [MedicalQuestionController::class, 'save_question']);
    Route::post('view', [MedicalQuestionController::class, 'view']);
    Route::post('delete', [MedicalQuestionController::class, 'destroy']);
});
