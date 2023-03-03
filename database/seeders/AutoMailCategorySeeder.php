<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AutoMailCategory;

class AutoMailCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        AutoMailCategory::create(['name' => 'Appointment Remainder']);

        AutoMailCategory::create(['name' => 'Appointment Confirmation']);

        AutoMailCategory::create(['name' => 'Appointment Invitation']);

        AutoMailCategory::create(['name' => 'Newsletters']);

        AutoMailCategory::create(['name' => 'Register Online']);

    }
}
