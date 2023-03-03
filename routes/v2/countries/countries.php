<?php

use App\Http\Controllers\Api\v2\CountryController;
use Illuminate\Support\Facades\Route;
/**
 **Created by MUWONGE HASSAN on 08/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */
// Route::resource('countries', \App\Http\Controllers\Api\v2\CountryController::class);

Route::prefix('countries')->group(function() {
    Route::get('', [CountryController::class, 'index']);
    Route::get('cities/{id}', [CountryController::class, 'cities']);
});

// Route::group(['prefix' =>'countries'],function(){

//     // All the event route
//     Route::post('/', [CountryController::class, 'index']);

// });
