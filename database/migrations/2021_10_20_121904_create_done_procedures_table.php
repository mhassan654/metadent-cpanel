<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoneProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('done_procedures', function (Blueprint $table) {
            $table->id();
            $table->integer("patient_id");
            $table->integer("visit_id");
            $table->integer("procedure");
            $table->integer("complete")->default("0");
            $table->decimal("procedure_price", 21, 2)->default("0.00");
            $table->integer("facility_id");
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
        Schema::dropIfExists('done_procedures');
    }
}
