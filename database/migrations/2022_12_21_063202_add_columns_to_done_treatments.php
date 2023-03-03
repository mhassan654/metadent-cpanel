<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToDoneTreatments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('done_treatments', function (Blueprint $table) {
            $table->string('treatment_status')->after('facility_id')->nullable();
            $table->integer('doctor_id')->after('facility_id')->nullable();
            $table->integer('invoice_id')->after('facility_id')->nullable();
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
            $table->dropColumn('treatment_status');
            $table->dropColumn('doctor_id');
            $table->dropColumn('invoice_id');
        });
    }
}
