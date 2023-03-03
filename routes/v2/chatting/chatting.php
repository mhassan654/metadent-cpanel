<?php

use App\Http\Controllers\Api\v2\ChatingController;
use App\Http\Controllers\Api\v2\ZorgController;
use Illuminate\Support\Facades\Route;

// communication channels route

Route::group(['prefix' => 'mail', 'middleware' => ['api']], function () {

    //DOCTORS API COMMUNICATION
    Route::middleware(['auth:api'])->group(function () {

            // unread mails internally
            Route::post('sendmail', [ChatingController::class, 'sendmail']);

            Route::post('outbox', [ChatingController::class, 'outbox']);

            Route::post('view_sent', [ChatingController::class, 'view_sent']);

            Route::post('testing', [ChatingController::class, 'zorg']);

            Route::post('test', [ChatingController::class, 'test']);

            Route::post('add_folder', [ChatingController::class, 'add_folder']);

            Route::post('list_folders', [ChatingController::class, 'list_folders']);

            Route::post('move_to_folder', [ChatingController::class, 'move_to_folder']);

            Route::post('my_Folder', [ChatingController::class, 'my_Folder']);
            //from emails
            Route::post('fromemail', [ChatingController::class, 'fromemail']);
            //filter inbox
            Route::post('filterEmail', [ChatingController::class, 'filterEmail']);
            // unread mails internally
            Route::post('zorg', [ChatingController::class, 'zorg']);

            Route::post('send_sms_patient', [ChatingController::class, 'send_sms_patient']);

            Route::post('messageList', [ChatingController::class, 'messageList']);

            Route::post('view_message', [ChatingController::class, 'view_message']);

            //sending to other health
            Route::post('send_zorg', [ChatingController::class, 'send_zorg']);

            Route::post('openMessage', [ChatingController::class, 'openMessage']);
            // save draft
            Route::post('save_draft', [ChatingController::class, 'save_draft']);

            // snooze email
            Route::post('snoozing', [ChatingController::class, 'snoozing']);

            Route::post('mySnoozed', [ChatingController::class, 'mySnoozed']);

            Route::post('notification', [ChatingController::class, 'notification']);

            Route::post('markAsRead', [ChatingController::class, 'markAsRead']);

            Route::post('mark_all_read', [ChatingController::class, 'mark_all_read']);

            Route::post('draft', [ChatingController::class, 'draft']);

            //trash
            Route::post('trash', [ChatingController::class, 'trash']);

            Route::post('trashList', [ChatingController::class, 'trashList']);

            Route::post('all_mail', [ChatingController::class, 'all_mail']);

            // unread mails internally
            Route::post('all_action', [ChatingController::class, 'all_action']);

            Route::post('uploads', [ChatingController::class, 'uploads']);

            // Route::post('addresbook', [ChatingController::class, 'addresbook']);

            Route::post('address_book3', [ChatingController::class, 'address_book3']);

            //zorgmail inbox
            Route::post('zorgmail_inbox', [ChatingController::class, 'zorgmail_inbox']);

            //sent
            Route::post('zorgmail_sent', [ChatingController::class, 'zorgmail_sent']);

            Route::post('zorgmail_draft', [ChatingController::class, 'zorgmail_draft']);

            Route::post('zorgmail_junk', [ChatingController::class, 'zorgmail_junk']);

            Route::post('zorgmail_trash', [ChatingController::class, 'zorgmail_trash']);

            //replying zorgmail
            Route::post('replying', [ChatingController::class, 'replying']);

            // total emails
            Route::post('total_mail', [ChatingController::class, 'total_mail']);

            //replying emails
            Route::post('reply', [ChatingController::class, 'reply']);

                    // onboard document
        Route::post('word_process', [ChatingController::class, 'word_doc']);
        Route::post('onboard_treatment_doc', [ChatingController::class, 'onboard_treatment_doc']);
        Route::post('onboard_xrayfile_doc', [ChatingController::class, 'onboard_xrayfile_doc']);
        Route::post('onboard_referalfile_doc', [ChatingController::class, 'onboard_referalfile_doc']);
        Route::post('onboard_billing_doc', [ChatingController::class, 'onboard_billing_doc']);
        Route::post('dr_onboard_doc', [ChatingController::class, 'dr_onboard_doc']);
        Route::post('searchfile', [ChatingController::class, 'searchfile']);

        //general mails
        Route::post('general_sendMail',[ChatingController::class,'general_sendMail'])->name('mail.general_sendMail');
        Route::post('generalInbox',[ChatingController::class,'generalInbox'])->name('mail.generalInbox');
        Route::post('generalSent',[ChatingController::class,'generalSent'])->name('mail.generalSent');
        Route::post('generalDraft',[ChatingController::class,'generalDraft'])->name('mail.generalDraft');
        Route::post('generalJunk',[ChatingController::class,'generalJunk'])->name('mail.generalJunk');
        Route::post('general_view_message',[ChatingController::class,'general_view_message'])->name('mail.general_view_message');
        Route::post('general_forwarding',[ChatingController::class,'general_forward'])->name('mail.general_forward');

    });
});

Route::prefix('zorg-mail-settings')->group(function () {
    Route::get('get-settings', [ZorgController::class, 'get_zorg_mail_settings'])->name('zorg-mail-settings.zorg-mail-settings.get_settings');
    Route::post('save-zorg-mail-setting', [ZorgController::class, 'save_zorg_mail_settings'])->name('zorg-mail-settings.zorg-mail-settings.env_settings');
    Route::post('save-zorg-imap-setting', [ZorgController::class, 'save_zorgmail_imap_settings'])->name('zorg-mail-settings.zorg-mail-settings.imap_settings');
    Route::post('save-general-imap-setting', [ZorgController::class, 'save_general_imap_settings'])->name('zorg-mail-settings.zorg-mail-settings.general_imap_settings');
    Route::post('generate-adress-book-credentials', [ZorgController::class, 'zorg_mail_address_book_credentials'])->name('zorg-mail-settings.zorg-mail-settings.address_book_credentials');
});
