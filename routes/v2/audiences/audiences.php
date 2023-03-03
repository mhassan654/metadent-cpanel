<?php

//created by Mulindwa Denis on 17th Jan 2023

use App\Http\Controllers\Api\v2\AudiencesController;
use \Illuminate\Support\Facades\Route;

Route::prefix('audiences')->group(function () {

    //fetch all audiences
    Route::post('test_markerting', [AudiencesController::class, 'test_markerting']);

    //fetch all audiences
    Route::get('all', [AudiencesController::class, 'index']);

    // create new audience
    Route::post('store', [AudiencesController::class, 'store']);

    //update existing audience
    Route::post('update', [AudiencesController::class, 'update']);

    //delete existing audience
    Route::post('delete', [AudiencesController::class, 'destroy']);

    // fetch single audience
    Route::post('audience', [AudiencesController::class, 'show']);

    Route::post('add_contact', [AudiencesController::class, 'add_contact']);
    Route::post('unsubscribe_contacts', [AudiencesController::class, 'unsubscribe_contacts']);
    Route::post('add_campaign', [AudiencesController::class, 'add_campaign']);
    Route::post('schedule_campaign', [AudiencesController::class, 'schedule_campaign']);
    Route::post('un_schedule_campaign', [AudiencesController::class, 'un_schedule_campaign']);
    Route::post('list_campaign', [AudiencesController::class, 'list_campaign']);
    Route::post('cancel_campaign', [AudiencesController::class, 'cancel_campaign']);
    Route::post('send_campaign', [AudiencesController::class, 'send_campaign']);

    //attach patients
    Route::post('attach-patients', [AudiencesController::class, 'attach_patients']);
});
