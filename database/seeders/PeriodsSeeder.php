<?php

namespace Database\Seeders;

use App\Models\Period;
use Illuminate\Database\Seeder;

class PeriodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Period::create([
            'facility_id' => 1,
            'label' => 'Morning',
            'slot' => [
                'start-time' => '08:00',
                'end-time' => '12:00',
            ],
        ]);
        Period::create([
            'facility_id' => 1,
            'label' => 'Noon',
            'slot' => [
                'start-time' => '12:00',
                'end-time' => '13:00',
            ],
        ]);
        Period::create([
            'facility_id' => 1,
            'label' => 'Afternoon',
            'slot' => [
                'start-time' => '13:00',
                'end-time' => '16:00',
            ],
        ]);
        Period::create([
            'facility_id' => 1,
            'label' => 'Evening',
            'slot' => [
                'start-time' => '16:00',
                'end-time' => '17:00',
            ],
        ]);
    }
}
