<?php
use App\Http\Controllers\Api\v2\XrayfileController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'xray'], function(){

    // uploading xray file
    Route::post('upload', [XrayfileController::class, 'upload'])->name('xray_images.upload');

    Route::post('xray_images', [XrayfileController::class, 'xray_images'])->name('xray_images.view_all');
});

