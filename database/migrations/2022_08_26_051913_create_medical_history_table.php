<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_history', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->string('approved_at')->nullable();
            $table->boolean('approved')->default(false)->nullable();
            $table->integer('approved_by')->nullable();
            $table->string('no');
            $table->string('question');
            $table->string('status')->nullable();
            $table->json('others')->nullable();
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
        Schema::dropIfExists('medical_history');
    }
}
