<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v2\ReportController;

Route::prefix('reports')->group(function(){

    Route::get('counters', [ReportController::class, 'index'])->name('reports.counters');

    Route::prefix('annual_graph_data')->group(function(){

        Route::prefix('patients')->group(function(){

            Route::post('bar-graph',[ReportController::class,'bar_graph_data_patients_counters_system_reports'])->name('reports.patients_annual_graph');

            Route::post('appex-chart',[ReportController::class,'patient_appex_chart'])->name('reports.patients_annual_graph');

            Route::post('gender-pie-chart',[ReportController::class,'pie_chart_graph_data_patient_gender_counters_system_reports'])->name('reports.patients_annual_graph');

        });

        Route::prefix('appointments')->group(function(){

            Route::post('line-graph',[ReportController::class,'bar_graph_data_appointments_counters_system_reports'])->name('reports.appointments_graph');

            Route::post('appex-chart',[ReportController::class,'appointment_appex_chart'])->name('reports.appointments_graph');

        });

        Route::prefix('employees')->group(function(){

            Route::post('line-graph',[ReportController::class,'bar_graph_data_employees_counters_system_reports'])->name('reports.employees_graph');

            Route::post('appex-chart',[ReportController::class,'employee_appex_chart'])->name('reports.employees_graph');

        });

        Route::prefix('treatments')->group(function(){

            Route::post('line-graph',[ReportController::class,'bar_graph_data_donetreatments_counters_system_reports'])->name('reports.treatments_graph');

            Route::post('appex-chart',[ReportController::class,'done_treatment_appex_chart'])->name('reports.treatments_graph');

        });

        Route::prefix('invoices')->group(function(){

            Route::post('bar-graph', [ReportController::class,'bar_graph_data_invoices_counters_system_reports'])->name('reports.invoices_graph');

            Route::post('amount-bar-graph',[ReportController::class,'bar_graph_data_received_amount_counters_system_reports'])->name('reports.invoices_graph');

        });

    });

});
