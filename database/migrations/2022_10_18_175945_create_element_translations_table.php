<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('element_translations', function (Blueprint $table) {
            $table->index('language_id');
            $table->index('element_id');
            $table->index('id');
            $table->id();
            $table->integer('element_id');
            $table->integer('language_id');
            $table->string('translation');
            $table->integer('created_by');
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
        Schema::dropIfExists('element_translations');
    }
}
