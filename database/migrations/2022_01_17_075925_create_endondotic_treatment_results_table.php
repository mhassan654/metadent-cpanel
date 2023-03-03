<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEndondoticTreatmentResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endondotic_treatment_results', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->integer('tooth_number')->nullable();
            $table->integer('appointment_id')->nullable();
            $table->string('treatment_id')->nullable();
            $table->json('treatment_results')->nullable();
            $table->string('treatment_price')->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('endondotic_treatment_results');
    }
}
