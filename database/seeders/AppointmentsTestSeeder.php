<?php

namespace Database\Seeders;

use App\Models\AppointmentTest;
use Illuminate\Database\Seeder;

class AppointmentsTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppointmentTest::create([
            'doctor_id' => 1,
            'treatement_id' => 1,
            'procedure_id' => 1,
            'date' => '21-03-2022',
            'slots' => json_encode([
                [
                    'start-time' => '11:00',
                    'end-time' => '11:20',
                ],
                [
                    'start-time' => '11:20',
                    'end-time' => '11:40',
                ],
            ]),
        ]);
    }
}
