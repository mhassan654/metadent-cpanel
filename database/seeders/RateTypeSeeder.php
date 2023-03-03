<?php

namespace Database\Seeders;

use App\Models\RateType;
use Illuminate\Database\Seeder;

class RateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RateType::create(['name' => 'Hourly']);
        RateType::create(['name' => 'Salary']);
    }
}
