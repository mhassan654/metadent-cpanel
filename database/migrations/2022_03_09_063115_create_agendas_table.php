<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('duration')->nullable();
            $table->longText('doctors');
            $table->longText('days');
            $table->integer('period_schema');
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('notes')->nullable();
            $table->string('color')->nullable();
            $table->string('code')->nullable();
            $table->bigInteger('appointment_type_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('appointment_type_id')->references('id')->on('appointment_types')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
}
