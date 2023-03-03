<?php
/*
 *
 * @Author: Wavamuno Brandon Elijah
 * @Email: brandonelijah099@gmail.com
 * @Github: Elijahwb
 * @Tel: +256 753 659 098 / +256 770 944 854
 *
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('appointments', function (Blueprint $table) {
            $table->id()->unsigned(true);
            $table->integer("facility_id");
            $table->integer("patient_id");
            $table->integer("type_id");
            $table->integer("status_id");
            $table->integer("frequency_id")->default(1);
            $table->integer("frequency_value")->default(1);
            $table->integer("source_id");
            $table->integer("treatment_type_id")->nullable();
            $table->integer("treatment_id")->nullable();
            $table->integer("parent_id")->nullable();
            $table->integer("period_id")->nullable();
            $table->integer("interval")->nullable();
            $table->integer("appointment_type_id")->nullable();
            $table->json("doctors");
            $table->string("date");
            $table->json("slots");
            $table->longtext("comments")->nullable();
            $table->string('material_name')->nullable();
            $table->string('material_date')->nullable();
            $table->string('servingtime')->nullable();
            $table->date('checkin_time')->nullable();
            $table->softDeletes();
            $table->timestamps();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('appointments');
    }
}
