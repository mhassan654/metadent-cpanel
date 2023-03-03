<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableDoneTreatments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('done_treatments', function (Blueprint $table) {
            $table->longText('treatment_price')->default(0)->change('treatment_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('done_treatments', function (Blueprint $table) {
            $table->dropColumn('treatment_price');
        });
    }
}
