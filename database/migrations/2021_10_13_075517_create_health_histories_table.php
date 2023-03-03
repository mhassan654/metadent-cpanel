<?php
/*
 *
 * @Author: Wavamuno Brandon Elijah
 * @Email: brandonelijah099@gmail.com
 * @Github: Elijahwb
 * @Tel: +256 753 659 098 / +256 770 944 854
 *
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_histories', function (Blueprint $table) {
            $table->id();
            $table->integer("patient_id");
            $table->integer("facility_id");
            $table->longText("history")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('health_histories');
    }
}
