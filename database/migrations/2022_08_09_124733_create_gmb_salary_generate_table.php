<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGmbSalaryGenerateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gmb_salary_generate', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('sal_month_year', 11);
            $table->string('employee_id', 11);
            $table->integer('tin_no')->nullable()->comment('TIN No');
            $table->string('total_attendance', 11)->nullable()->comment('tagret_hours / days');
            $table->string('total_count', 11)->nullable()->comment('weorked_hours / days');
            $table->decimal('atten_allowance', 11)->nullable()->comment('based on taget hours / days');
            $table->decimal('gross', 11)->comment('from employee_file table');
            $table->decimal('basic', 11)->comment('from employee_file table');
            $table->decimal('transport', 11);
            $table->decimal('house_rent', 11)->nullable();
            $table->decimal('medical', 11)->nullable();
            $table->decimal('other_allowance', 11)->nullable();
            $table->decimal('gross_salary', 11)->comment('after adding all allowance with basic');
            $table->decimal('income_tax', 11)->nullable()->comment('from employee_file table it will convert to amount');
            $table->decimal('soc_sec_npf_tax', 11)->nullable()->comment('from employee_file table it will convert to amount');
            $table->decimal('employer_contribution', 11)->nullable()->comment('10 % of basic if there soc.sec.tax available ');
            $table->decimal('icf_amount', 11, 0)->comment('Id social security tax available');
            $table->decimal('loan_deduct', 11)->nullable();
            $table->integer('loan_id')->nullable()->comment('From grand_loan table');
            $table->decimal('salary_advance', 11)->nullable();
            $table->integer('salary_adv_id')->nullable()->comment('From gmb_salary_advance table');
            $table->decimal('lwp', 11)->nullable()->comment('leave without pay ');
            $table->decimal('pf', 11)->nullable()->comment('providend fund');
            $table->decimal('stamp', 11)->nullable()->comment('deduct type');
            $table->decimal('net_salary', 11)->comment('after deduct net amount from gross salary');
            $table->date('createDate');
            $table->string('createBy', 11);
            $table->date('updateDate')->nullable();
            $table->string('updateBy', 11)->nullable();
            $table->decimal('medical_benefit', 11);
            $table->decimal('family_benefit', 11);
            $table->decimal('transportation_benefit', 11);
            $table->decimal('other_benefit', 11);
            $table->decimal('normal_working_hrs_month', 20);
            $table->decimal('actual_working_hrs_month', 20);
            $table->decimal('hourly_rate_basic', 20);
            $table->decimal('hourly_rate_trasport_allowance', 20);
            $table->decimal('basic_salary_pro_rated', 20);
            $table->decimal('transport_allowance_pro_rated', 20);
            $table->decimal('basic_transport_allowance', 20);
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
        Schema::dropIfExists('gmb_salary_generate');
    }
}
