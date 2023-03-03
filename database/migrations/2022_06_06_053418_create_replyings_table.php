<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplyingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replyings', function (Blueprint $table) {
            $table->id();
            $table->integer('chatting_id');
            $table->integer('message_id');
            $table->string('subject');
            $table->string('from_user_id');
            $table->string('sender_model');
            $table->string('from_fname');
            $table->string('from_lname');
            $table->string('to_user');
            $table->longText('replyMessage');
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
        Schema::dropIfExists('replyings');
    }
}
