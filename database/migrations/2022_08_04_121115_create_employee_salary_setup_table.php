<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeSalarySetupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_salary_setup', function (Blueprint $table) {
            $table->increments('ess_id');
            $table->integer('employee_id');
            $table->string('salary_type');
            $table->integer('salary_type_id');
            $table->float('amount');
            $table->float('gross_salary');
            $table->boolean('is_percentage')->nullable()->default(false);
            $table->integer('update_id');
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
        Schema::dropIfExists('employee_salary_setup');
    }
}
