<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeSalaryPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_salary_payment', function (Blueprint $table) {
            $table->increments('employee_salary_payment_id');
            $table->integer('employee_id');
            $table->float('total_salary');
            $table->integer('total_working_minutes');
            $table->string('working_period');
            $table->string('payment_due');
            $table->string('payment_date');
            $table->string('salary_name')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('paid_by');
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
        Schema::dropIfExists('employee_salary_payment');
    }
}
