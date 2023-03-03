<?php

namespace Database\Seeders;

use App\Models\TaxCalculation;
use Illuminate\Database\Seeder;

class TaxCalculationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 10) as $file) {
            
        }

        foreach(range(1,10) as $file){

            TaxCalculation::create([
                'tax_sl' => rand(1, 20),
                'min' => rand(1, 20),
                'max' => rand(10, 30),
                'add_smount' => rand(100, 200),
                'tax_percent' => rand(5, 90),
            ]);
           
        }
    }
}
