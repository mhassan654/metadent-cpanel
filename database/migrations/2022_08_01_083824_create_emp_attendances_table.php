<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_attendances', function (Blueprint $table) {
            // $table->id();
            $table->bigInteger('att_id')->unsigned();
            $table->bigInteger('employee_id')->unsigned();
            $table->bigInteger('facility_id')->unsigned();
            $table->string('date');
            $table->string('check_in')->nullable();
            $table->string('check_out')->nullable();
            $table->string('staytime')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

                $table->foreign('facility_id')->references('id')->on('facilities')
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
        Schema::dropIfExists('emp_attendances');
    }
}
