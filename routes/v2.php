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

Route::prefix("v2")->group(function() {
    require __DIR__ . "/permissions/permissions.php";

    require __DIR__ . "/roles/roles.php";

    require __DIR__ . "/agendas/agendas.php";

    require __DIR__ . "/users/users.php";

    require __DIR__ . "/patients/patients.php";

    require __DIR__ . "/treatments/treatments.php";

    require __DIR__ . "/auth/auth.php";

    require __DIR__ . "/doneprocedures/doneprocedures.php";

    require __DIR__ . "/departments/departments.php";

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

    require __DIR__ . "/configurations/slots.php";

    require __DIR__ . "/periods/periods.php";
    
    require __DIR__ . "/doctor_config/doctorConfig.php";

    require __DIR__ . "/general_remarks/routes.php";

});
