<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('doctors_agendas')):
            Schema::create('doctors_agendas', function (Blueprint $table) {
                $table->bigInteger('employee_id')->unsigned();
                $table->bigInteger('agenda_id')->unsigned();

                //FOREIGN KEY CONSTRAINTS
                $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('agenda_id')->references('id')->on('agendas')->onDelete('cascade')->onUpdate('cascade');

                //SETTING THE PRIMARY KEYS
                $table->primary(['employee_id','agenda_id']);
            });
        endif;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors_agendas');
    }
}
