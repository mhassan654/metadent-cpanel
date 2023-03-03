<?php

use App\Http\Controllers\Api\v2\TransactionsController;
use Illuminate\Support\Facades\Route;

Route::prefix("transactions")->group(function(){

    Route::post('invoice-transactions', [TransactionsController::class,'invoice_transactions'])->name('transactions.view_invoice_transactions');

    // All the appointment route
    Route::post('process', [TransactionsController::class, 'preparePayment']);

    Route::post('webhooks/mollie', [TransactionsController::class, 'handleWebhookNotification']);

    Route::get('download-transaction-pdf/{id}', [TransactionsController::class, 'download_transaction_info'])->name('transactions.download_pdf');

});
