<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment_procedures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('interval');
            $table->integer('set_period');
            $table->bigInteger('treatment_id')->unsigned();
            $table->timestamps();

//            $table->foreign('treatment_id')->references('id')->on('treatments')
//                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treatment_procedures');
    }
}
