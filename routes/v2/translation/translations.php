<?php

/**
 **Created by MUWONGE HASSAN on 08/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://
 */

use App\Http\Controllers\Api\v2\TranslationsController;

// All the translation route
// Route::resource('translations', TranslationsController::class);
// Route::get('translations', TranslationsController::class);
Route::group(['prefix' => 'translations'], function () {
    // All the event route
    Route::get('all', [TranslationsController::class, 'index'])->name('translations.index');

    // Specific event record route
    Route::post('store', [TranslationsController::class, 'store'])->name('translations.store');

    // Specific event record route
    Route::post('update', [TranslationsController::class, 'update'])->name('translations.update');

    // Create new event record route
    Route::get('facility', [TranslationsController::class, 'get_all_translations']);
});

Route::get('locale/{locale}', [TranslationsController::class, 'locale']);
