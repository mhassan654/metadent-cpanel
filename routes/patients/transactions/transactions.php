<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Patients\TransactionsController;

Route::prefix('payments')->middleware('jwt.verify')->group(function(){

    //process payments
    Route::post('process',[TransactionsController::class,'preparePayment']);

    //mollie confirm
    Route::post('webhooks/mollie',[TransactionsController::class,'handleWebhookNotification']);

    //test balance
    Route::post('balance',[TransactionsController::class,'balanceDueCalculator']);

    Route::post('invoice-transactions',[TransactionsController::class,'invoice_transactions']);
});