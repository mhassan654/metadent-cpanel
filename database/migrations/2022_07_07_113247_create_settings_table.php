<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('settings', function (Blueprint $table) {
            $table->id()->unsigned(true);
            $table->string('key');
            $table->string('value')->nullable();
            $table->bigInteger('facility_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('facility_id')
                ->references('id')
                ->on('facilities')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('settings');
    }
}
