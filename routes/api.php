<?php
/*
 *
 * @Author: Wavamuno Brandon Elijah
 * @Email: brandonelijah099@gmail.com
 * @Github: Elijahwb
 * @Tel: +256753659098 / +256770944854
 *
 */

use App\Http\Controllers\Api\v2\PaymentPlanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmsController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DefineDataController;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\AzureStorageTestController;
use App\Http\Controllers\Api\v2\MailingController;
use App\Http\Controllers\Api\v1\AppointmentsController;
use App\Http\Controllers\Api\v2\AuthenticationController;
use App\Http\Controllers\Api\v2\DatabaseBackupController;
use App\Http\Controllers\Api\v2\EmployeeNotificationController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// API VERSION 1.0 (one)

require __DIR__ . "/v1/v1.php";
require __DIR__ . "/v2/v2.php";
require __DIR__ . "/v3/all.php";
require __DIR__ . "/patients/patients.php";

Route::prefix('translations')
    ->group(function() {
        Route::get('languages', [LanguageController::class, 'index']);
        Route::post('add-language', [LanguageController::class, 'store']);

        Route::get('/all', [TranslationController::class, 'all']);
        Route::get('/{view_id}', [TranslationController::class, 'index']);
        Route::post('create-update', [TranslationController::class, 'create_translation']);


});

//Route::get('env-variables',function(){
//    $path = base_path('.env');
//    return file_get_contents($path);
//});

Route::get('run-database-backup',function(){
   return Artisan::call('backup:run');
});

Route::get('clear-routes',function(){
    return Artisan::call('route:clear');
});

Route::get('clear-cache',function(){
    return Artisan::call('cache:clear');
});

Route::get('optimize',function(){
    return Artisan::call('optimize:clear');
});

Route::post('test/filters', [\App\Http\Controllers\DateFilterController::class, 'get_months']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('session',[App\Http\Controllers\SessionController::class, 'sessionCheck']);

// Route::post('2fa', [App\Http\Controllers\Api\v2\TwoFAController::class, 'store']);
// Route::get('2fa/reset', [App\Http\Controllers\Api\v2\TwoFAController::class, 'resend']);
Route::get('sendmail-appointment',[\App\Http\Controllers\Api\v2\AppointmentsController::class,'sendAppointmentEmailBeforeOneHour']);

Route::get('post-data',[App\Http\Controllers\DefineDataController::class,'define_users']);
Route::get('user-permissions',[\App\Http\Controllers\Api\v2\RolesController::class,'getUserPermissions']);

Route::get('send-mail',[MailingController::class,'send_patient_treatments_concent_form']);
Route::post('azure-test',[AzureStorageTestController::class,'fileUpload']);

Route::get('/azure/{file}',[AzureStorageTestController::class,'getList']);
Route::get('/azure/{file}/delete',[AzureStorageTestController::class,'deleteImage']);
Route::get('/fetch/{folder?}/{file?}',function ($file_name=null, $folder = null)
{
    if(!$file_name) return '';
    return get_disk_file($folder,$file_name);
})->name('fetch.photo');
Route::group(['prefix' =>'notifications'],function(){
    Route::post('/my-notifications', [EmployeeNotificationController::class, 'getUnreadNotifications']);
    Route::post('/read-notification/{id}', [EmployeeNotificationController::class, 'readNotification']);
    // Route::post('delete', [AttendanceTimeController::class, 'destroy']);
});

Route::post('/sms/send',[SmsController::class,'send_sms']);

Route::post('/sms/test',[SmsController::class,'test']);


Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@projectcode.ug'], 404);
});

Route::post('/2fa/verify',[AuthenticationController::class,'verify2faOtp']);
Route::get('payment_plans',[PaymentPlanController::class,'refund_process_calculator']);
