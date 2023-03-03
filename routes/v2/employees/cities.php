<?php
/**
 **Created by MUWONGE HASSAN on 08/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */
// Route::resource('cities', \App\Http\Controllers\Api\v2\CityController::class);

/**
 **Created by MUWONGE HASSAN on 08/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://
 */
use App\Http\Controllers\Api\v2\CityController;

    // All the translation route
    // Route::resource('translations', TranslationsController::class);
    // Route::get('translations', TranslationsController::class);
    Route::group(['prefix' =>'cities'],function(){

        // All the event route
        Route::get('/', [CityController::class, 'index']);

        Route::post('/show', [CityController::class, 'show']);

        // Specific event record route
        Route::post('store', [CityController::class, 'store']);

         // Specific event record route
         Route::post('update', [CityController::class, 'update']);

         Route::post('update_status', [CityController::class, 'change_status']);
         Route::post('update_image', [CityController::class, 'update_image']);
         Route::post('delete', [CityController::class, 'destroy']);

    });

