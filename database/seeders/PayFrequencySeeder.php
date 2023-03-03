<?php

namespace Database\Seeders;

use App\Models\PayFrequency;
use Illuminate\Database\Seeder;

class PayFrequencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PayFrequency::create(['frequency' => 'Weekly']);
        PayFrequency::create(['frequency' => 'BiWeekly']);
        PayFrequency::create(['frequency' => 'Monthly']);
        PayFrequency::create(['frequency' => 'Annually']);
    }
}
