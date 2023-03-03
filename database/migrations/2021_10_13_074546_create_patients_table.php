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

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->integer("facility_id")->nullable();
            $table->tinyInteger('main_doctor_id')->nullable();
            $table->integer('secondary_doctor_id')->nullable();
            $table->string("unique_identifier")->unique();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("middle_name")->nullable();
            $table->string("gender")->nullable();
            $table->string("marital_status")->nullable();
            $table->string("birth_date")->nullable();
            $table->string("email")->nullable();
            $table->string("reviews")->nullable()->default(null);
            $table->string("home_phone")->nullable();
            $table->string("nationality")->nullable();
            $table->string("country")->nullable();
            $table->string("state")->nullable();
            $table->string("city")->nullable();
            $table->string("street")->nullable();
            $table->string("home_address")->nullable();
            $table->text('patient_phone')->nullable();
            $table->text('photo')->nullable();
            $table->string("postalcode")->nullable();
            $table->string("occupation")->nullable();
            $table->string("patient_insurer")->nullable();
            $table->string("insurance_policy_number")->nullable();
            $table->string("guardian_name")->nullable();
            $table->string("guardian_phone")->nullable();
            $table->string("guardian_email")->nullable();
            $table->string("guardian_address")->nullable();
            $table->string("fm_relationship")->nullable();;
            $table->string("fm_name")->nullable();;
            $table->string("fm_phone_number")->nullable();;
            $table->string("fm_email")->nullable();;
            $table->string("fill_if_not_filled")->nullable();
            $table->string("referred_by")->nullable();
            $table->string("referree_email")->nullable();
            $table->string("referree_phone")->nullable();
            $table->string('nok_name')->nullable()->default(null);
            $table->string('nok_email')->nullable()->default(null);
            $table->string('nok_phone_number')->nullable()->default(null);
            $table->string('citizen_service_number')->nullable()->default(null);
            $table->integer('preferred_appointment_time')->nullable();
            $table->integer('any_extra_time')->nullable();
            $table->string('password')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
