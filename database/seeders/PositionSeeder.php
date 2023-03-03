<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
            'name' => 'Team Lead',
            "details" => "Team Lead management",
            "facility_id" =>1
        ]);

        Position::create([
            'name' => 'Manager',
            "details" => "management",
            "facility_id" =>1
        ]);

        Position::create([
            'name' => 'Senior Programmer',
            "details" => "Developing systems",
            "facility_id" =>1
        ]);
    }
}
