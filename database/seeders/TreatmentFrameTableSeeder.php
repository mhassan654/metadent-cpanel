<?php

namespace Database\Seeders;

use App\Models\TreatmentFrame;
use Illuminate\Database\Seeder;

class TreatmentFrameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TreatmentFrame::create([
            "frame_name" => "Partial Crown",
            "frame_code" => "PC",
        ]);

        TreatmentFrame::create([
            "frame_name" => "Crown",
            "frame_code" => "C",
        ]);

        TreatmentFrame::create([
            "frame_name" => "Dummy",
            "frame_code" => "D",
        ]);
    }
}
