<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChattingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('chattings', function (Blueprint $table) {
            $table->id();
            $table->integer('from_user_id');
            $table->string('from_fname');
            $table->string('from_lname');
            $table->string('from_email');
            $table->json('to_user');
            $table->integer('to_user_id');
            $table->string('sender_model');
            $table->string('subject');
            $table->longText('message');
            $table->string('read_at')->nullable();
            $table->string('status')->nullable();
            $table->string('snooze_date')->nullable();
            $table->timestamps();

            // $table->foreign('id')->references('id')->on('replyings')
            //     ->onDelete('CASCADE');
        });

        Schema::enableForeignKeyConstraints();
    }
        /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('chattings');
    }
}
