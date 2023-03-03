<?php

namespace Database\Seeders;

use App\Models\AppointmentStatus;
use Illuminate\Database\Seeder;

class AppointmentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppointmentStatus::truncate();

        AppointmentStatus::create(["status" => "Confirmed"]);

        AppointmentStatus::create(["status" => "Pending"]);

        AppointmentStatus::create(["status" => "Waiting"]);

        AppointmentStatus::create(["status" => "Closed"]);

        AppointmentStatus::create(["status" => "Canceled"]);

        AppointmentStatus::create(["status" => "Missed"]);
        
        AppointmentStatus::create(["status" => "Serving"]);
    }
}
