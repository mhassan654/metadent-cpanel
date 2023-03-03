<?php


use App\Http\Controllers\Api\v2\PontoController;
use Illuminate\Support\Facades\Route;

Route::prefix("ponto")->group(function(){
    Route::get('/', [PontoController::class,'generateAuthUrl']);
    Route::get('connect', [PontoController::class,'generateAuthUrl']);
    Route::get('callback', [PontoController::class,'callback']);
    Route::get('payment-success', [PontoController::class,'paymentSuccess']);
    Route::get('requestToken', [PontoController::class,'requestAccessToken']);
    Route::get('request-access-token', [PontoController::class,'requestAccessToken']);
    Route::get('request-client-access-token', [PontoController::class,'requestClientAccessToken']);

    Route::prefix('financial-institutions')->group(function (){
        Route::get('/', [PontoController::class,'getFinancialInstitutionsList']);
        Route::get('/financial-institution/{financialInstitution}', [PontoController::class,'getSingleFinancialInstitution']);
    });

    Route::post('onboarding-details', [PontoController::class,'onBoardingDetails']);
    Route::get('get-user-info', [PontoController::class,'getUserinfo']);
    Route::get('organisation-usage-info', [PontoController::class,'Usage']);

    Route::prefix('accounts')->group(function (){
        Route::get('/', [PontoController::class,'listAccounts']);
        Route::get('{accountId}/account', [PontoController::class,'getAccount']);// todo update route to include account id parameter
        Route::get('{accountId}/transactions', [PontoController::class,'getTransaction']);//todo update url to include route parameters
        Route::post('{accountId}/create-payment',[PontoController::class,'createPayment']);
    });

});
