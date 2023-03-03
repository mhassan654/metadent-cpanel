<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalarySetupHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_setup_header', function (Blueprint $table) {
            $table->increments('ssh_id');
            $table->integer('employee_id');
            $table->float('salary_payable')->nullable();
            $table->float('abscent_payable')->nullable();
            $table->string('tax_manager');
            $table->string('status');
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
        Schema::dropIfExists('salary_setup_header');
    }
}
