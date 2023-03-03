<?php

use App\Http\Controllers\Api\v2\ChatingController;
use App\Http\Controllers\Api\v2\ZorgController;
use Illuminate\Support\Facades\Route;

// open communication channels route

Route::group(['prefix' => 'mails', 'middleware' => ['api']], function () {

    //zorgmail
    Route::post('inbox_os', [App\Http\Controllers\Api\v2\ZorgMailController::class, "inbox_os"]);
    Route::post('listFolder', [App\Http\Controllers\Api\v2\ZorgMailController::class, "listFolder"]);
    Route::post('openMessage', [App\Http\Controllers\Api\v2\ZorgMailController::class, "openMessage"]);
    Route::post('replying', [App\Http\Controllers\Api\v2\ZorgMailController::class, "replying"]);
    //end zorgmail
    Route::post('openzorg', [ZorgController::class, "openzorg"]);

    Route::post('body', [ChatingController::class, 'body']);
    // general reply customer care
    Route::post('general_reply', [ChatingController::class, 'general_reply']);

    // open_inbox  reply customer care
    Route::post('open_inbox', [ChatingController::class, 'open_inbox']);

    // all mail on patient profile
    Route::post('patient_mail', [ChatingController::class, 'patient_mail']);

    // close open communication
    //patients
    Route::middleware(['jwt.verify'])->group(function () {

        // list drs
        Route::post('drs_list', [ChatingController::class, 'drs_list']);
        //from emails
        Route::post('fromemail', [ChatingController::class, 'fromemail']);

        //filter inbox
        Route::post('filterEmail', [ChatingController::class, 'filterEmail']);

        Route::post('save_draft', [ChatingController::class, 'save_draft']);

        Route::post('draft', [ChatingController::class, 'draft']);

        //trash
        Route::post('trash', [ChatingController::class, 'trash']);

        Route::post('trashList', [ChatingController::class, 'trashList']);
        //notification
        Route::post('notification', [ChatingController::class, 'notification']);

        // snooze email
        Route::post('snoozing', [ChatingController::class, 'snoozing']);

        Route::post('mySnooze', [ChatingController::class, 'mySnooze']);

        // mark all notification read
        Route::post('markAsRead', [ChatingController::class, 'markAsRead']);

        Route::post('mark_all_read', [ChatingController::class, 'mark_all_read']);

        //all doctors email
        Route::post('drs_emailist', [ChatingController::class, 'drs_emailist']);

        // unread mails internally
        Route::post('all_action', [ChatingController::class, 'all_action']);

        Route::post('notification', [ChatingController::class, 'notification']);

        // unread mails internally
        Route::post('sendmail', [ChatingController::class, 'sendmail']);

        //  Route::post('inbox', [ChatingController::class, 'inbox']);
        // total emails
        Route::post('total_mail', [ChatingController::class, 'total_mail']);

        //replying emails
        Route::post('reply', [ChatingController::class, 'reply']);

        //view_reply
        Route::post('view_reply', [ChatingController::class, 'view_reply']);

        // view_sent
        Route::post('view_sent', [ChatingController::class, 'view_sent']);

        // unread mails internally
        Route::post('inbox', [ChatingController::class, 'inbox']);

        Route::post('inbox2', [ChatingController::class, 'inbox2']);

        //outbox mail
        Route::post('outbox', [ChatingController::class, 'outbox']);

        Route::post('outbox_patient', [ChatingController::class, 'outbox_patient']);
        //outbox mobile
        Route::post('inbox/mobile', [ChatingController::class, 'inbox_patient']);

        //view mail
        Route::post('view', [ChatingController::class, 'view']);

        //view mail
        Route::post('category_view', [ChatingController::class, 'category_view']);

        //change status and category of email
        Route::post('status', [ChatingController::class, 'status']);

        //change status and category of email
        Route::post('privatebox', [ChatingController::class, 'privatebox']);

        //change status and category of email
        Route::post('workbox', [ChatingController::class, 'workbox']);

        //change status and category of email
        Route::post('socialbox', [ChatingController::class, 'socialbox']);

        //change status and category of email
        Route::post('supportbox', [ChatingController::class, 'supportbox']);

        // mark_read reply
        Route::post('mark_read', [ChatingController::class, 'mark_read']);

        // mark_Unread
        Route::post('mark_Unread', [ChatingController::class, 'mark_Unread']);

        Route::post('importantMail', [ChatingController::class, 'importantMail']);
    });
});
