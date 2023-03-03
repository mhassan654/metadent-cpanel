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

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("frequency_id")->nullable();
            $table->integer("department_id")->nullable();
            $table->bigInteger("sub_department_id")->nullable();
            $table->integer("account_status_id");
            $table->integer("facility_id");
            $table->string("first_name");
            $table->string("last_name");
            $table->string("birth_date")->nullable();
            $table->string("gender");
            $table->string("address");
            $table->string("phonenumber");
            $table->integer("role_id")->nullable();
            $table->longText("specializations")->nullable();
            $table->string("password");
            $table->json("week_days");
            $table->json("weeks");
            $table->string("treatment_id")->nullable();
            $table->string("contract_start_date")->nullable();
            $table->string("contract_end_date")->nullable();
            $table->integer("interval")->nullable();
            $table->json("availability")->nullable();
            $table->string("email")->unique();
            $table->timestamp("email_verified_at")->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('users');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
