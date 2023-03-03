<?php

use App\Http\Controllers\Api\v1\TransactionsController;
use Illuminate\Support\Facades\Route;

Route::prefix("transactions")->group(function(){

    // All the appointment route
    Route::post('process', [TransactionsController::class, 'preparePayment']);
    // Route::post('webhook', [TransactionsController::class, 'handleWebhookNotification'])->name('webhooks.mollie');
    // routes/web.php

    Route::post('webhooks/mollie', [TransactionsController::class, 'handleWebhookNotification']);
});
