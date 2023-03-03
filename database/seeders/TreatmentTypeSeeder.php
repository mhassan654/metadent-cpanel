<?php

namespace Database\Seeders;

use App\Models\TreatmentType;
use Illuminate\Database\Seeder;

class TreatmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TreatmentType::factory(3)->create();
    }
}
