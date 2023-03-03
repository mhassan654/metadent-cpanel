<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Patient::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Patient::factory(10000)->create();
    }
}
