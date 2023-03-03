<?php
//created by mulindwa denis

use App\Http\Controllers\Api\v2\AutoMailController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auto_mails', 'middleware' => ['api']], function () {

    //add auto mail
    Route::post('add_auto_mail', [AutoMailController::class, 'add_auto_mail']);

    //fetch auto mails
    Route::post('fetch_auto_mails', [AutoMailController::class, 'fetch_auto_mails']);

    //fetch auto mails categories
    Route::post('fetch_auto_mails_category', [AutoMailController::class, 'fetch_auto_mails_category']);

    //update auto mail
    Route::post('update_auto_mail', [AutoMailController::class, 'update_auto_mail']);

    //delete auto mail
    Route::post('delete_auto_mail', [AutoMailController::class, 'delete_auto_mail']);

});
