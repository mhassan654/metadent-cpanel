<?php

namespace Database\Seeders;

use App\Models\AttendanceTime;
use Illuminate\Database\Seeder;

class AttendanceTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AttendanceTime::create([
            'name' => 'Attendance time',
            'start_time' => '15:20',
            'end_time' => '20:30',
            'facility_id' => 1
        ]);
        AttendanceTime::create([
            'name' => 'Test attendance ',
            'start_time' => '08:39',
            'end_time' => '16:30',
            'facility_id' => 1
        ]);
        AttendanceTime::create([
            'name' => 'Regular ',
            'start_time' => '10:39',
            'end_time' => '18:30',
            'facility_id' => 1
        ]);
    }
}
