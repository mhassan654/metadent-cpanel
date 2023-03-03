<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TreatmentBridgeConnector;

class BridgeConnectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $connector =TreatmentBridgeConnector::create([
            'connector_name' => 'None [Default]',
            'connector_code' => 'N001'
        ]);
    }
}
