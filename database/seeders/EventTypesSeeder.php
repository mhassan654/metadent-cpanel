<?php

namespace Database\Seeders;

use App\Models\EventType;
use Illuminate\Database\Seeder;

class EventTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeOne =EventType::create([
            'title' => 'Callback (InHouse)',
            'code' => 'CBINH',
            'color' => '#eeefff',
            'facility_id' => 1,
        ]);

        $typeTwo =EventType::create([
            'title' => 'Callback Patient',
            'code' => 'CBPAT',
            'color' => '#eee222',
            'facility_id' => 1,
        ]);
    }
}
