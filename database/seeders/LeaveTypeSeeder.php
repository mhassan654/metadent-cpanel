<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LeaveType;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LeaveType::create([
            'type' => 'Christmas Holiday',
            'facility_id' => 1,
            'number_of_leave_days' => 3,
            'leave_hours' => 24,
        ]);
    }
}
