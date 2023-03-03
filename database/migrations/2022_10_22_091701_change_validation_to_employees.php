<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeValidationToEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('employees', function (Blueprint $table) {
            $table->bigInteger('position_id')->unsigned()->nullable()->change();
            $table->string('hire_date')->nullable()->change();
            $table->string('date_of_birth')->nullable()->change();
            $table->string('gender')->nullable()->change();
            $table->string('marital_status')->nullable()->change();
            $table->string('cell_phone')->nullable()->change();
            $table->string('business_email')->nullable()->change();
            $table->string('business_phone')->nullable()->change();
            $table->string('branch_address')->nullable()->change();
            $table->decimal('gross_salary',21,2)->default('0.00')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->integer('rate')->nullable()->change();
            $table->integer('attendance_time_id')->nullable()->change();
            $table->string('emergency_person_name')->nullable()->change();
            $table->string('emergency_relationship')->nullable()->change();
            $table->string('emergency_phone')->nullable()->change();
            $table->string('emergency_another_phone')->nullable()->change();
            $table->string('emergency_home_phone')->nullable()->change();
            $table->string('emergency_work_phone')->nullable()->change();
            $table->string('emergency_address')->nullable()->change();
            $table->bigInteger('department_id')->unsigned()->change();
            $table->string('password')->change();
            $table->integer('facility_id')->change();
            $table->string('tin_number')->nullable()->change();
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
        Schema::table('employees', function (Blueprint $table) {
            //
        });
    }
}
