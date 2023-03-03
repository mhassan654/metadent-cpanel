<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('care_plans', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->integer('appointment_id');
            $table->string('long_term_goal_one')->nullable();
            $table->string('goal_period')->nullable();
            $table->string('long_term_goal_two')->nullable();
            $table->string('caries_risk')->nullable();
            $table->string('bitewing_interval')->nullable();
            $table->string('caries_risk_explanation')->nullable();
            $table->string('periodontal_risk')->nullable();
            $table->string('periodontal_risk_explanation')->nullable();
            $table->string('wear_risk')->nullable();
            $table->string('wear_risk_explanation')->nullable();
            $table->string('soft_tissue_risk')->nullable();
            $table->string('soft_tissue_risk_explanation')->nullable();
            $table->string('medical_risk')->nullable();
            $table->string('medical_risk_explanation')->nullable();
            $table->string('mouth_hygiene_risk')->nullable();
            $table->string('mouth_hygiene_risk_explanation')->nullable();
            $table->string('pps_number')->nullable();
            $table->string('bleeding_index_percentage')->nullable();
            $table->string('plaque_index_parcentage')->nullable();
            $table->integer('created_by')->nullable();
            $table->date('pps_number_date')->nullable();
            $table->date('plaque_index_date')->nullable();
            $table->date('bleeding_index_date')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('care_plans');
    }
}
