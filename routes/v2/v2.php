<?php
/**
 **Created by MUWONGE HASSAN on 13/01/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoekhoudenController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\Api\v2\PatientsController;

Route::prefix("v2")->group(function () {
    require __DIR__ . "/permissions/permissions.php";

    require __DIR__ . "/roles/roles.php";

    require __DIR__ . "/agendas/agendas.php";

    require __DIR__ . "/treatment_plan/index.php";

    require __DIR__ . "/care_plan/index.php";

    require __DIR__ . "/donetreatments/donetreatments.php";

    require __DIR__ . "/general_remarks/routes.php";

    require __DIR__ . "/perio_configurations/routes.php";

    require __DIR__ . "/users/users.php";

    require __DIR__ . "/patients/patients.php";

    require __DIR__ . "/chatting/chatting.php";

    require __DIR__ . "/vecozo/vecozo.php";

    require __DIR__ . "/filemangerXray/xrayfile.php";

    require __DIR__ . "/chatting/patientmails.php";

    require __DIR__ . "/treatments/treatments.php";

    require __DIR__ . "/treatments/other_specified_treatments.php";

    require __DIR__ . "/auth/auth.php";

    require __DIR__ . "/doneprocedures/doneprocedures.php";

    require __DIR__ . "/procedures/procedures.php";

    require __DIR__ . "/treatments/procedures.php";

    require __DIR__ . "/endodontic_treatment_results/endodontic_treatment_results.php";

    require __DIR__ . "/specializations/specializations.php";

    require __DIR__ . "/treatments/treatments.php";

    require __DIR__ . "/tasks/tasks.php";

    require __DIR__ . "/appointments/appointments.php";

    require __DIR__ . "/appointmentstypes/appointmentstypes.php";

    require __DIR__ . "/appointmentreasons/appointmentreasons.php";

    require __DIR__ . "/invoices/invoices.php";

    require __DIR__ . "/doctors/doctors.php";

    require __DIR__ . "/doctors/employee_doctors.php";

    require __DIR__ . "/configurations/slots.php";

    require __DIR__ . "/periods/periods.php";

    require __DIR__ . "/frequencies/frequencies.php";

    require __DIR__ . "/events/events.php";

    require __DIR__ . "/events/event_types.php";

    require __DIR__ . "/charting/adhesive_types.php";

    require __DIR__ . "/charting/composite_types.php";

    require __DIR__ . "/charting/treatment_frame.php";

    require __DIR__ . "/charting/bridge_connectors.php";

    require __DIR__ . "/calendarfrequencies/calendar_frequencies.php";

    require __DIR__ . "/treatments/treatmentCategories.php";

    require __DIR__ . "/treatment_types/treatment_types.php";

    require __DIR__ . "/treatments/bundled_treatments.php";

    require __DIR__ . "/family_members/familymembers.php";

    require __DIR__ . "/auto_mails/auto_mails.php";

    require __DIR__ . "/toggle/toggle.php";

    require __DIR__ . "/translation/translations.php";

    require __DIR__ . "/transactions/transactions.php";

    require __DIR__ . "/settings/settings.php";

    require __DIR__ . "/quickappointments/quickappointments.php";

    require __DIR__ . "/languages/language.php";

    require __DIR__ . "/currencies/currencies.php";

    require __DIR__ . "/doctor_questions/doctor_questions.php";

    require __DIR__ . "/medical_history/medical_history.php";

    require __DIR__ . "/reports/reports.php";

    require __DIR__ . "/tasks/taskmessages.php";

    require __DIR__ . "/time_zones/time_zones.php";

    require __DIR__ . "/password_reset/password_reset.php";

    require __DIR__ . "/log_activities/log_activities.php";

    require __DIR__ . "/system_codes/system_codes.php";

    require __DIR__ . "/audiences/audiences.php";

    require __DIR__."/time_zones/time_zones.php";

    require __DIR__ ."/password_reset/password_reset.php";

    require __DIR__ ."/log_activities/log_activities.php";

    require __DIR__ ."/system_codes/system_codes.php";

    // ===============================HRM ROUTES START============================
    require __DIR__ . "/employees/employees.php";

    require __DIR__ . "/employees/duty_types.php";

    require __DIR__ . "/employees/positions.php";

    require __DIR__ . "/employees/rate_types.php";

    require __DIR__ . "/employees/supervisors.php";

    require __DIR__ . "/countries/countries.php";

    require __DIR__ . "/employees/cities.php";

    require __DIR__ . "/employees/employee_types.php";

    require __DIR__ . "/employees/pay_frequencies.php";

    require __DIR__ . "/employees/attendance_times.php";

    require __DIR__ . "/employees/leave_application.php";

    require __DIR__ . "/employees/leave_types.php";

    require __DIR__ . "/employees/leave.php";

    require __DIR__ . "/departments/departments.php";

    require __DIR__ . "/departments/sub_departments.php";

    require __DIR__ . "/hrm/attendance_history.php";

    require __DIR__ . "/payroll/salary_types.php";

    require __DIR__ . "/payroll/employee_salary_setup.php";

    require __DIR__ . "/payroll/salary_advance.php";

    require __DIR__ . "/payroll/salary_sheet_generator.php";

    // ===============================HRM ROUTES END ============================

    // ===============================DATABASE BACKUP CONFIGURATION ROUTES START============================
    require __DIR__ . '/settings/database_backup.php';
    // ===============================DATABASE BACKUP CONFIGURATION ROUTES END============================

    require __DIR__ . "/status/status.php";

    require __DIR__ . "/imports/bulk_importer.php";

    Route::post('update-availability', [AvailabilityController::class, 'update_employee_availability']);

    Route::post('getsessionid', [BoekhoudenController::class, 'postMutatie']);

    Route::post('approve-all-patients',[PatientsController::class,'activeAll']);

    //==================INVOICE REFUND API ROUTES START========================
    require __DIR__ ."/invoice_refunds/routes.php";
    //==================INVOICE REFUND API ROUTES END========================

    require __DIR__ ."/invoice_payment_plans/routes.php";

    // =============================== PONTO API CONNECTION ROUTES START============================
    require __DIR__ . '/ponto-api/routes.php';
    // =============================== PONTO API CONNECTION ROUTES END============================

});
