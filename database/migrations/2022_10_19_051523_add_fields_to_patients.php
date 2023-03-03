<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPatients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->integer('ext')->nullable();
            $table->string('landline_phone')->nullable();
            $table->string('insurance_uzovi_code')->nullable();
            $table->string('additional_insurance_uzovi_code')->nullable();
            $table->boolean('receive_physical_mails')->default(false)->nullable();
            $table->string('account_status')->nullable();
            $table->string('account_status_reason')->nullable();
            $table->string('account_number_iban')->nullable();
            $table->string('last_dentist_recall')->nullable();
            $table->string('last_mouth_hygienist_recall')->nullable();
            $table->string('last_preventive_assistant_recall')->nullable();
            $table->string('last_orthodontist_recall')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            //
        });
    }
}
