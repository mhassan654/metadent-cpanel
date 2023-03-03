<?php
//Created by Mulindwa Denis

use App\Http\Controllers\Api\v2\ToggleController;
use Illuminate\Support\Facades\Route;

Route::prefix('toggle')->group(function(){

    //Fetch all
    Route::post('all',[ToggleController::class,'index']);

    //update
    Route::post('save',[ToggleController::class,'update'])->name('toggle.update');;
});
