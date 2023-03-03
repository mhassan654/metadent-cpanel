<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGmbTaxCalculationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gmb_tax_calculation', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('tax_sl');
            $table->integer('min');
            $table->integer('max');
            $table->string('add_smount', 11)->default('0');
            $table->string('tax_percent', 11);
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
        Schema::dropIfExists('gmb_tax_calculation');
    }
}
