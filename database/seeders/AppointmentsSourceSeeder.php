<?php

namespace Database\Seeders;

use App\Models\AppointmentSource;
use Illuminate\Database\Seeder;

class AppointmentsSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppointmentSource::create([
            "source" => "Online"
        ]);

        AppointmentSource::create([
            "source" => "Phone"
        ]);

        AppointmentSource::create([
            "source" => "Manual"
        ]);
    }
}
