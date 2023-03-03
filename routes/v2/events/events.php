<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v2\EventsController;

Route::group(['prefix' =>'events', 'middleware' => ['api']],function(){
//Route::group(['prefix' =>'events', 'middleware' => ['role:Doctor|Super-Admin']],function(){

    // All the event route
    Route::post('all', [EventsController::class, 'index'])->name('events.index');

    // Specific event record route
    Route::post('event', [EventsController::class, 'show'])->name('events.show');

    // Create new event record route
//    Route::post('create', [EventsController::class, 'store'])->name('events.show');
    Route::post('create', [EventsController::class, 'create_event'])->name('events.create');

    // Create new event record route
    Route::post('update', [EventsController::class, 'update'])->name('events.update');

    // Create new event record route
    Route::post('delete', [EventsController::class, 'destroy'])->name('events.delete');
});
