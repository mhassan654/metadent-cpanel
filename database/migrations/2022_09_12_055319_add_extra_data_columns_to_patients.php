<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraDataColumnsToPatients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
           $table->boolean('defaulter')->default(false)->nullable();
           $table->boolean('no_appointment_creation')->default(false)->nullable();
           $table->boolean('no_payment_reminder')->default(false)->nullable();
           $table->boolean('no_insurance_claims')->default(false)->nullable();
           $table->boolean('customer_in_arrears')->default(false)->nullable();
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
            //
        });
    }
}
