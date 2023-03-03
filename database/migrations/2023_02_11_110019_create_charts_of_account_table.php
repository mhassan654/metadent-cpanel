<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartsOfAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charts_of_account', function (Blueprint $table) {
            $table->id();
            $table->string('account_name')->nullable();
            $table->string('account_sub_type')->nullable();
            $table->string('account_type')->nullable();
            $table->bigInteger('gl_code')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('charts_of_account');
    }
}
