<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment_plans', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->text('main_description')->nullable();
            $table->text('phase_number')->nullable();
            $table->text('tooth')->nullable();
            $table->text('treatment_ids')->nullable();
            $table->text('treatment_codes')->nullable();
            $table->text('treatment_amounts')->nullable();
            $table->text('treatment_descriptions')->nullable();
            $table->integer('save_type')->default(0)->comment('Save type ie draft or approved.')->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('treatment_plans');
    }
}
