<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DoneTreatment;

use Illuminate\Support\Facades\DB;

class DoneTreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DoneTreatment::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        DoneTreatment::factory(300)->create();
    }
}