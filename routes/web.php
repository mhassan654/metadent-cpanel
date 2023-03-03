<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Row;
use App\Models\SalaryGenerate;
use App\Models\AppointmentTest;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\SalarySheetGenerator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GCalenderController;
use App\Http\Controllers\Api\v2\QRCodeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pdfs.pdf_header');
});

Route::get('download', function () {
    $ssg_id = 2;
    $salary_sheet_generate_info = SalarySheetGenerator::where('id', $ssg_id)->first();

    $data = SalaryGenerate::select(
        'gmb_salary_generate.*',
        DB::raw('count(DISTINCT(gmb_salary_generate.id)) as emp_sal_pay_id'),
        'employees.id',
        'employees.first_name',
        'employees.last_name'
    )
        ->leftJoin('employees', function ($join) {
            $join->on('gmb_salary_generate.employee_id', '=', 'employees.id');
        }
        )->where('gmb_salary_generate.sal_month_year', $salary_sheet_generate_info->name)
        ->groupBy('gmb_salary_generate.id')
        ->orderBy('gmb_salary_generate.id', 'DESC')
        ->get()->toArray();

    Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
    $pdf = Pdf::loadView('pdfs.salary_chart', compact('data'));
    $pdf->setPaper('a3', 'landscape');
    // return view('pdfs.salary_chart')->with('data',$data);

    return $pdf->stream("Salary_chart_for_$salary_sheet_generate_info->name.pdf'");
});

Route::get('add-to-log', [HomeController::class, 'myTestAddToLog']);
Route::get('logActivity', [HomeController::class, 'logActivity'])->name('system.logs');

//QRCode
Route::get('/patient-qrcodes', [QRCodeController::class, 'index']);

Route::get('gcloud-get-auth-code', [GCalenderController::class, 'get_google_access_token']);
Route::get('gcloud-authurl/{id}', [GCalenderController::class, 'getAuthUrl'])->name('gcalender.auth.url');
Route::get('gcloud-add-event/{id}', [GCalenderController::class, 'add_calender_event'])->name('gcalender.create.event');
Route::match (['get', 'post'], '/g-calender-event-update', [GCalenderController::class, 'calender_event_updated'])->name('gcalender.update.event');
Route::get('/update-roles', function () {
    DB::table('model_has_roles')
        ->update(['model_type' => 'App\Models\Employee']);
});
