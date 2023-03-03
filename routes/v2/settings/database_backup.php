<?php
/**
 **Created by MUWONGE HASSAN on 08/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */
use App\Http\Controllers\Api\v2\SettingController;
use App\Http\Controllers\Api\v2\DatabaseBackupController;

// All the translation route
Route::group(['prefix' => 'db_backup_settings', 'middleware' => ['role:Super-Admin|Doctor']], function () {

    Route::post('update',[SettingController::class,'dbBackSettings']);

    Route::post('all',[SettingController::class,'BDBackup']);

    Route::get('backup-list', [DatabaseBackupController::class, 'getBackupFiles']);
    Route::get('backup-download/{filename}', [DatabaseBackupController::class, 'downloadBackFile']);

});
