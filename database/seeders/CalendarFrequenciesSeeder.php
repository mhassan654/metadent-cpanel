<?php

namespace Database\Seeders;

use App\Models\CalendarFrequency;
use Illuminate\Database\Seeder;

class CalendarFrequenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CalendarFrequency::create([
            'label' => 'Does not repeat'
        ]);

        CalendarFrequency::create([
            'label' => 'Weekly'
        ]);

        CalendarFrequency::create([
            'label' => 'Monthly'
        ]);

        CalendarFrequency::create([
            'label' => 'Yearly'
        ]);
    }
}
