<?php

namespace Database\Seeders;

use App\Models\ToggleSettings;
use Illuminate\Database\Seeder;

class ToggleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ToggleSettings::create(['name'=>'Users','status'=>false]);
        ToggleSettings::create(['name'=>'Patients','status'=>false]);
        ToggleSettings::create(['name'=>'Treatments','status'=>false]);
        ToggleSettings::create(['name'=>'Appointments','status'=>false]);
    }
}
