<?php

namespace Database\Seeders;

use App\Models\TreatmentCategory;
use Illuminate\Database\Seeder;

class TreatmentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TreatmentCategory::create(["name" => "Pathology"]);
        TreatmentCategory::create(["name" => "Restoration"]);
    }
}
