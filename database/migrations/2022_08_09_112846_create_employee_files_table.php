<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_files', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->unsigned()->nullable();
            $table->integer('tin_no')->nullable();
            $table->string('gross_salary');
            $table->string('basic');
            $table->string('transport');
            $table->string('medical');
            $table->string('other_allowance');
            $table->string('state_income');
            $table->string('soc_sec_npf_tax');
            $table->string('loan_deduct');
            $table->string('salary_advance');
            $table->string('lwp');
            $table->string('stamp');
            $table->string('medical_benefit');
            $table->string('family_benefit');
            $table->string('transportation_benefit');
            $table->string('other_benefit');
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
        Schema::dropIfExists('employee_files');
    }
}
