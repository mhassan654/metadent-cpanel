<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Invoice::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Invoice::factory(300)->create();
    }
}