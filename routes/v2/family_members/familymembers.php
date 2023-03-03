<?php
// created by mulindwa denis

use App\Http\Controllers\Api\v2\FamilyMemberController;
use Illuminate\Support\Facades\Route;

Route::prefix('family_members')->group(function(){

    //add members
    Route::post('create', [FamilyMemberController::class, 'store']);

    //fetch all
    Route::post('all', [FamilyMemberController::class, 'index']);

    //fetch one
    Route::post('show',[FamilyMemberController::class, 'show']);

    //update
    Route::post('update',[FamilyMemberController::class, 'update']);

    //delete
    Route::post('delete',[FamilyMemberController::class,'destroy']);

    //patient members
    Route::post('patient_members',[FamilyMemberController::class, 'patient_members']);

    Route::post('add_as_existing_patient',[FamilyMemberController::class,'existing_patient']);

});
