<?php

namespace Database\Seeders;

use App\Models\Frequency;
use Illuminate\Database\Seeder;

class FrequenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Frequency::create([
            'label' => 'Once'
        ]);

        Frequency::create([
            'label' => 'Weekly'
        ]);

        Frequency::create([
            'label' => 'Bi Weekly'
        ]);
    }
}
