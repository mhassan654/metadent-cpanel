<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v2\BulkDataImportController;

Route::prefix('bulk-imports')->group(function () {

    // Route::group(['middleware' => 'jwt.verify'], function () {
        //fetch all appointments
        Route::post('patients', [BulkDataImportController::class, 'import_patients'])->name('bulk_imports.import_patients');
    // });

});
