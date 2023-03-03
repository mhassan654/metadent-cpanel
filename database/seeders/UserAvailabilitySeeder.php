<?php

namespace Database\Seeders;

use App\Models\UserAvailability;
use Illuminate\Database\Seeder;

class UserAvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserAvailability::create([
            "availability" => "Available"
        ]);

        UserAvailability::create([
            "availability" => "Occupied"
        ]);

        UserAvailability::create([
            "availability" => "Not Available"
        ]);
    }
}
