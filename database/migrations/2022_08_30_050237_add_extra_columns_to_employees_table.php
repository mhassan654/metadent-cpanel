<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraColumnsToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->json('week_days')->nullable();
            $table->json('weeks')->nullable();
            $table->json('availability')->nullable();
            $table->integer('interval')->nullable();
            $table->string('contract_start_date')->nullable();
            $table->string('contract_end_date')->nullable();
            $table->integer('frequency_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('week_days');
            $table->dropColumn('weeks');
            $table->dropColumn('availability');
            $table->dropColumn('interval');
            $table->dropColumn('contract_start_date');
            $table->dropColumn('contract_end_date');
            $table->dropColumn('frequency_id');
        });
    }
}
