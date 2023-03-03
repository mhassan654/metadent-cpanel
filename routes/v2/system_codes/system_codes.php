<?php

use App\Http\Controllers\Api\v2\SystemCodesController;
use Illuminate\Support\Facades\Route;

Route::prefix('system-codes')->group(function(){

    //all codes
    Route::get('all', [SystemCodesController::class, 'index']);

    //create code
    Route::post('create', [SystemCodesController::class, 'store'])->name('system_codes.create');

    //update code
    Route::post('update', [SystemCodesController::class, 'update'])->name('system_codes.update');

    //delete code
    Route::post('delete', [SystemCodesController::class, 'destroy'])->name('system_codes.delete');

    //singe code
    Route::post('code', [SystemCodesController::class, 'show']);

});
