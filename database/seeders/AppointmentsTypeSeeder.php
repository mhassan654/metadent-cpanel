<?php

namespace Database\Seeders;

use App\Models\AppointmentType;
use Illuminate\Database\Seeder;

class AppointmentsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        AppointmentType::create([
            'title' => 'Children Care',
            'code' => 'APTCC',
            'color' => '#eeefff',
            'agenda_interval' => 10,
            'for_web' => false,
            'doctors' => [1, 2],
            'week_days' => [1, 4],
            'start_time' => '10:00',
            'end_time' => '12:00',
            'start_date' => '21-04-2022',
            'end_date' => '04-08-2022',
            'facility_id' => 1,
            'notes' => 'some simple notes here',
        ]);

        AppointmentType::create([
            'title' => 'Testing Appointment Type',
            'code' => 'TAT',
            'color' => '#eeeffe',
            'agenda_interval' => 20,
            'for_web' => false,
            'doctors' => [1, 2],
            'week_days' => [1, 2, 3, 4, 5, 6],
            'start_time' => '14:00',
            'end_time' => '16:00',
            'start_date' => '21-04-2022',
            'end_date' => '31-12-2022',
            'facility_id' => 1,
            'notes' => 'some simple notes here',
        ]);
    }
}
