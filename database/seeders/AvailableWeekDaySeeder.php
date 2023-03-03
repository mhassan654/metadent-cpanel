<?php

namespace Database\Seeders;

use App\Models\AvailableWeekDay;
use Illuminate\Database\Seeder;

class AvailableWeekDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AvailableWeekDay::create([
            'doctor_id' => 1,
            'days' => '1,2,5,',
        ]);
        AvailableWeekDay::create([
            'doctor_id' => 2,
            'days' => '2,4,5,',
        ]);
        AvailableWeekDay::create([
            'doctor_id' => 14,
            'days' => '1,2,5,',
        ]);
    }
}
