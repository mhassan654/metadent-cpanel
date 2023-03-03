<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnsToMedicalHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medical_history', function (Blueprint $table) {
            $table->dropColumn('no');
            $table->dropColumn('status');
            $table->dropColumn('others');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medical_history', function (Blueprint $table) {
            $table->string('no');
            $table->string('status');
            $table->string('others');
        });
    }
}
