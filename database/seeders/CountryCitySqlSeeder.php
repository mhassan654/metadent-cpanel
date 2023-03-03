<?php

namespace Database\Seeders;

use Config;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CountryCitySqlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

          // =============================================================
        // file Path -> Project/app/configs/database.php
        // get the database name, database username, database password
        // =============================================================
        $path = public_path('/sql/country_cities.sql');
        $country_path = public_path('/sql/countries.sql');

        Schema::dropIfExists('country_cities');
        Schema::dropIfExists('countries');

        ini_set('memory_limit', '-1');
        $sql = file_get_contents($path);
        $sql2 = file_get_contents($country_path);

        DB::unprepared($sql);
        DB::unprepared($sql2);
    }
}
