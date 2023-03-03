<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVecozoColumnsToPatients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->integer('agb')->nullable();
            $table->integer('agb_code')->nullable();
            $table->integer('agb_number')->nullable();
            $table->text('reference_date')->nullable();
            $table->text('insured_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('agb');
            $table->dropColumn('agb_code');
            $table->dropColumn('agb_number');
            $table->dropColumn('reference_date');
            $table->dropColumn('insured_number');
        });
    }
}
