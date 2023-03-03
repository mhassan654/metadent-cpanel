<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_messages', function (Blueprint $table) {
            $table->id();
            $table->string('level_name');
            $table->unsignedSmallInteger('level');
            $table->string('message');
            $table->dateTime('logged_at');
            $table->json('context');
            $table->json('extra');
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
        Schema::dropIfExists('log_messages');
    }
}
