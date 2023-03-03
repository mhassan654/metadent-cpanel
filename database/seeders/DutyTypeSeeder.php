<?php

namespace Database\Seeders;

use App\Models\DutyType;
use Illuminate\Database\Seeder;

class DutyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DutyType::create(['name' => 'Full Time']);
        DutyType::create(['name' => 'Part Time']);
        DutyType::create(['name' => 'Constructual']);
        DutyType::create(['name' => 'Other']);

    }
}
