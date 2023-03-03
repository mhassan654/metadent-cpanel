<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_remarks', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id')->nullable();
            $table->text('treatment_ids')->nullable();
            $table->text('treatment_codes')->nullable();
            $table->text('treatment_amounts')->nullable();
            $table->string('tooth_element')->nullable();
            $table->text('general_remark_category')->nullable();
            $table->text('general_remark_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_remarks');
    }
}
