<?php
/*
 *
 * @Author: Wavamuno Brandon Elijah
 * @Email: brandonelijah099@gmail.com
 * @Github: Elijahwb
 * @Tel: +256 753 659 098 / +256 770 944 854
 *
 */

namespace Database\Seeders;

use App\Models\FacilityStatus;
use Illuminate\Database\Seeder;

class FacilityStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FacilityStatus::create([
            "status" => "active",
        ]);

        FacilityStatus::create([
            "status" => "Suspended",
        ]);

        FacilityStatus::create([
            "status" => "Banned",
        ]);
    }
}
