<?php

namespace Database\Seeders;

use App\Models\AppointmentReason;
use Illuminate\Database\Seeder;

class AppointmentReasonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppointmentReason::create([
            "reason" => "Surgery",
            "facility_id" => 1,
        ]);

        AppointmentReason::create([
            "reason" => "Treatment",
            "facility_id" => 1,
        ]);

        AppointmentReason::create([
            "reason" => "Consultation",
            "facility_id" => 1,
        ]);

        AppointmentReason::create([
            "reason" => "Routine checkup",
            "facility_id" => 1,
        ]);

        AppointmentReason::create([
            "reason" => "Extraction",
            "facility_id" => 1,
        ]);

        AppointmentReason::create([
            "reason" => "Surgery",
            "facility_id" => 2,
        ]);

        AppointmentReason::create([
            "reason" => "Treatment",
            "facility_id" => 2,
        ]);

        AppointmentReason::create([
            "reason" => "Consultation",
            "facility_id" => 2,
        ]);

        AppointmentReason::create([
            "reason" => "Routine checkup",
            "facility_id" => 2,
        ]);

        AppointmentReason::create([
            "reason" => "Extraction",
            "facility_id" => 2,
        ]);
    }
}
