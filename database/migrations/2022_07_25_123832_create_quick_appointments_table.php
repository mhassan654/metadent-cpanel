<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuickAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quick_appointments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('facility_id')->unsigned(true);
            $table->bigInteger('patient_id')->unsigned(true);
            $table->bigInteger('status_id')->unsigned(true);
            $table->bigInteger('source_id')->unsigned(true);
            $table->bigInteger('main_doctor')->unsigned(true)->nullable();
            $table->bigInteger('treatment_id')->unsigned(true)->nullable();
            $table->bigInteger('treatment_type_id')->unsigned(true)->nullable();
            $table->bigInteger('type_id')->unsigned(true)->nullable();
            $table->bigInteger('period_id')->unsigned(true)->nullable();
            $table->bigInteger('appointment_type_id')->unsigned(true)->nullable();
            $table->integer('interval')->nullable();
            $table->string('material_date')->nullable();
            $table->string('material_name')->nullable();
            $table->string('date')->nullable();
            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->json('doctors');
            $table->longtext('comments')->nullable();
            $table->boolean('updated')->default(false)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('quick_appointments');
    }
}
