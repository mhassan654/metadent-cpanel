<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EndondoticTreatment;

class EndodonticTreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $treatments = array(
            array('name'=>'Cold Test', 'price'=>'140'),
            array('name'=>'Heat Test', 'price'=>'150'),
            array('name'=>'Electricity Test', 'price'=>'175'),
            array('name'=>'Palpation Test', 'price'=>'250'),
            array('name'=>'Percussion Test', 'price'=>'75'),
        );

        foreach ($treatments as $treatment):
            EndondoticTreatment::create([
                'name' => $treatment['name'],
                'price' => $treatment['price'],
                'created_by' => 1
            ]);
        endforeach;
    }
}
