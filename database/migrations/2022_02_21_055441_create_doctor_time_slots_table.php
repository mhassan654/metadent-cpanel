<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorTimeSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_time_slots', function (Blueprint $table) {
            $table->id();
            $table->string('contract_start_date');
            $table->string('contract_end_date');
            $table->string('contract_title');
            $table->string('contract_duration')->nullable();
            $table->string('agenda_interval');
            $table->integer('intervals')->nullable();
            $table->string('appointment_duration')->nullable();
            $table->integer('weekly_format');
            $table->bigInteger('doctor_id')->unsigned();
            $table->timestamps();

            $table->foreign('doctor_id')->references('id')->on('users')
                ->onUpdate('CASCADE');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_time_slots');
    }
}
