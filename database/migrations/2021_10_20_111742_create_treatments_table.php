<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->string("treatment");
            $table->string("code")->nullable();
            $table->decimal("price", 21, 2)->default("0.00");
            $table->integer("facility_id")->nullable();
            $table->integer("treatment_category")->nullable();
            $table->integer("subcategory")->nullable();
            $table->string('tooth_sections')->nullable();
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
        Schema::dropIfExists('treatments');
    }
}
