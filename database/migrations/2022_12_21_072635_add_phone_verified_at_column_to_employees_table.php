<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneVerifiedAtColumnToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dateTime('phone_verified_at')->nullable();
            $table->tinyInteger('is_phone_verified')->default(0)->nullable();
            $table->tinyInteger('is_email_verified')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('phone_verified_at');
            $table->dropColumn('is_phone_verified');
            $table->dropColumn('is_email_verified');
        });
    }
}
