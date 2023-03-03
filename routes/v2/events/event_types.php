<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v2\EventTypesController;

Route::prefix("events-types")->group(function(){

    // All the event types route
    Route::post('all', [EventTypesController::class, 'index'])->name('events_types.index');

    // Specific event type record route
    Route::post('event', [EventTypesController::class, 'show'])->name('events_types.show');

    // Create new event type record route
    Route::post('create', [EventTypesController::class, 'create_event_type'])->name('events_types.create');

    Route::post('update', [EventTypesController::class, 'update'])->name('events_types.update');

    Route::post('delete', [EventTypesController::class, 'destroy'])->name('events_types.delete');
});
