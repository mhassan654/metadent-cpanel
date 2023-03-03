<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer("frequency_id")->nullable();
            $table->integer("facility_id")->nullable();
            $table->string('title');
            $table->json("doctors");
            $table->json("days")->nullable();;
            $table->string("color")->nullable();;
            $table->string("code")->nullable();;
            $table->json("attendees")->nullable();;
            $table->integer("duration")->nullable();
            $table->integer("recurrence")->nullable();
            $table->string("date");
            $table->string("start_time");
            $table->string("end_time");
            $table->string("contact_email")->nullable();
            $table->string("contact_name")->nullable();
            $table->string("contact_phone")->nullable();
            $table->string("contact_address")->nullable();
            $table->longtext("comments")->nullable();
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
        Schema::dropIfExists('events');
    }
}
