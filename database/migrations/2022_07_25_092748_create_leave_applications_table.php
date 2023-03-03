<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_applications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->unsigned();
            $table->bigInteger('leave_type_id')->unsigned();
            $table->string('application_start_date');
            $table->string('application_end_date');
            $table->string('approve_start_date')->nullable();
            $table->string('approve_end_date')->nullable();
            $table->integer('is_approved')->nullable();
            $table->string('apply_day');
            $table->string('approve_day');
            $table->integer('approved_by');
            $table->string('application_hard_copy')->nullable();
            $table->bigInteger('facility_id')->unsigned()->nullable();
            $table->string('reason')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
                $table->foreign('leave_type_id')->references('id')->on('leave_types')
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
        Schema::dropIfExists('leave_applications');
    }
}
