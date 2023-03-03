<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->string('member_first_name');
            $table->string('member_middle_name')->nullable();
            $table->string('member_last_name');
            $table->integer('patient_id');
            $table->string('member_email');
            $table->string('member_date_of_birth');
            $table->string('member_gender');
            $table->string('member_image_path')->nullable();
            $table->string('member_marital_status');
            $table->string('member_phone_number');
            $table->string('member_second_phone_number')->nullable();
            $table->string('member_citizen_service_number');
            $table->string('member_nationality');
            $table->string('member_country');
            $table->string('member_region');
            $table->string('member_postal_code');
            $table->string('member_home_address');
            $table->string('member_state');
            $table->string('member_street');
            $table->string('member_relationship');
            $table->boolean('custodian')->nullable()->default(false);
            // $table->boolean('custodian')->default(false)->nullable();
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
        Schema::dropIfExists('family_members');
    }
}
