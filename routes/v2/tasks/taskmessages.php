<?php

use App\Http\Controllers\Api\v2\TaskMessagesController;
use Illuminate\Support\Facades\Route;

Route::prefix("task_messages")->group(function(){

    Route::post("all", [TaskMessagesController::class, "index"])->name('task_messages.index');

    Route::post("create", [TaskMessagesController::class, "store"])->name('task_messages.create');

    Route::post("edit", [TaskMessagesController::class, "update"])->name('task_messages.edit');

    Route::post("delete", [TaskMessagesController::class, "destroy"])->name('task_messages.delete');

    Route::post("task-messages", [TaskMessagesController::class, "task_messages"])->name('task_messages.view_task_messages');
});
