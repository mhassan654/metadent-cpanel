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

use App\Models\AccountStatus;
use Illuminate\Database\Seeder;

class AccountStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AccountStatus::create([
            "status" => "Active"
        ]);

        AccountStatus::create([
            "status" => "suspended"
        ]);

        AccountStatus::create([
            "status" => "Deleted"
        ]);
    }
}
