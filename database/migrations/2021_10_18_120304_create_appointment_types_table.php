<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_types', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("code");
            $table->string("color");
            $table->integer("agenda_interval");
            $table->boolean("for_web");
            $table->json("doctors")->nullable();
            $table->json("week_days")->nullable();
            $table->string("start_time");
            $table->string("end_time");
            $table->string("start_date");
            $table->string("end_date");
            $table->longText("notes")->nullable();
            $table->integer("facility_id");
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
        Schema::dropIfExists('appointment_types');
    }
}
