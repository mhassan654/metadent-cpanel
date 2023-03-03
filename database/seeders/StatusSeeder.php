<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('statuses')->truncate();
        Status::create(["title" => "New"]);

        Status::create(["title" => "InProgress"]);
        Status::create(["title" => "Done"]);
        Status::create(["title" => "OverDue"]);
    }
}
