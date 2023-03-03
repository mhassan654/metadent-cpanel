<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoneTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('done_treatments', function (Blueprint $table) {
            $table->id();
            $table->integer("patient_id");
            $table->integer("visit_id")->nullable();
            $table->string('tooth')->nullable();
            $table->integer("treatment")->nullable();
            $table->integer("treatment_complete")->default("0")->nullable();
            $table->decimal("treatment_price", 21, 2)->default("0.00")->nullable();
            $table->text('tooth_sections')->nullable();
            $table->integer("facility_id")->nullable();
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
        Schema::dropIfExists('done_treatments');
    }
}
