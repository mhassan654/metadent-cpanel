<?php
use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::prefix("v1")->group(function(){

    require __DIR__ . "/donetreatments/donetreatments.php";
    require __DIR__ ."/password_reset/passwordReset.php";

    require __DIR__ . "/transactions/transactions.php";

    require __DIR__ . "/invoices/invoices.php";

    require __DIR__ . "/appointmentstypes/appointmentstypes.php";

    require __DIR__ . "/appointments/appointments.php";

    require __DIR__ . "/treatments/treatmentCategories.php";



    require __DIR__ . "/donetreatments/donetreatmentspatient.php";

    require __DIR__ . "/doneprocedures/doneprocedures.php";

    require __DIR__ . "/appointmentreasons/appointmentreasons.php";

    require __DIR__ ."/users/doctors.php";

    require __DIR__ . "/auth/auth.php";

    require __DIR__ . "/patients/patients.php";

    require __DIR__ . "/patients/imaging.php";

    require __DIR__ . "/users/users.php";


    require __DIR__ . "/endodontic_treatment_results/endodontic_treatment_results.php";

    require __DIR__ . "/tasks/tasks.php";

    require __DIR__ . "/departments/department.php";

    require __DIR__ . "/treatments/treatments.php";

    return __DIR__ . "/treatments/procedures.php";

    require __DIR__ . "/departments/department.php";

    require __DIR__ . "/specializations/specializations.php";


    require __DIR__ . "/auth/roles.php";

    require __DIR__ . "/auth/permissions.php";


    Route::get('/default', function () {
        $password = Hash::make("Translate12!");

        User::create([
            "first_name" => "Frank",
            "last_name" => "Schinkel",
            "birth_date" => null,
            "gender" => "Male",
            "address" => "Netherlands",
            "phonenumber" => "00349230342",
            "role_id" => 1,
            "account_status_id" => 1,
            "facility_id" => 1,
            "specializations" => null,
            "password" => $password,
            "email" => "frankschinkel@icloud.com"
        ]);
    });
});
