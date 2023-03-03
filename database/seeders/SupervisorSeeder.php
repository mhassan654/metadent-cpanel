<?php

namespace Database\Seeders;

use App\Models\Supervisor;
use Illuminate\Database\Seeder;

class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supervisor::create(['name' => 'Samuel Lubowa']);
        Supervisor::create(['name' => 'Benjamin Kooma']);
        Supervisor::create(['name' => 'Andrew Onyango']);
        Supervisor::create(['name' => 'Brandon Wavamuno']);
    }
}
