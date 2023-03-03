<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailAndCodeVerificationsToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dateTime('email_verified_at')->nullable();
            $table->string('verification_code')->nullable();
            $table->string('new_email_verification_code')->nullable();
            $table->boolean('is_temp_password_updated')->default(false)->nullable();
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
            $table->dropColumn('email_verified_at');
            $table->dropColumn('verification_code');
            $table->dropColumn('new_email_verification_code');
            $table->dropColumn('is_temp_password_updated');

        });
    }
}
