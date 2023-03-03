<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('countries')): 
            Schema::disableForeignKeyConstraints();
            Schema::create('countries', function (Blueprint $table) {
                $table->id();
                $table->string('country');
                $table->string('code');
                $table->timestamps();
            });
            Schema::enableForeignKeyConstraints();
        endif;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('countries');
    }
}
