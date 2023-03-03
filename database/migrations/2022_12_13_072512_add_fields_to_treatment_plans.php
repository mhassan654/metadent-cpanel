<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToTreatmentPlans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('treatment_plans', function (Blueprint $table) {
            $table->integer('quantity')->nullable();
            $table->string('doctor_name')->nullable();
            $table->longText('vektis_surface')->nullable();
            $table->boolean('lower_upper_jaw')->nullable()->comment('0 for lower and 1 upper');
            $table->string('technical_costs')->nullable();
            $table->string('material_costs_to_insurance')->nullable();
            $table->string('material_costs_to_patient')->nullable();
            $table->string('fee_to_insurance')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('treatment_plans', function (Blueprint $table) {
            $table->dropColumn('quantity');
            $table->dropColumn('doctor_name');
            $table->dropColumn('vektis_surface');
            $table->dropColumn('lower_upper_jaw');
            $table->dropColumn('technical_costs');
            $table->dropColumn('material_costs_to_insurance');
            $table->dropColumn('material_costs_to_patient');
            $table->dropColumn('fee_to_insurance');
        });
    }
}
