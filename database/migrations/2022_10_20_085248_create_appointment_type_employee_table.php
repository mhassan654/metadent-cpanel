<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTypeEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_type_employee', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('appointment_type_id')->unsigned();
            $table->bigInteger('employee_id')->unsigned();
            $table->foreign('appointment_type_id')->references('id')->on('appointment_types')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('appointment_type_employee');
    }
}
