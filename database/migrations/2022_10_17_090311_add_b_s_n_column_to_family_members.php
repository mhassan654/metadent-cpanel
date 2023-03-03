<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBSNColumnToFamilyMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('family_members', function (Blueprint $table) {
            $table->string('BSN')->after('member_relationship')->nullable();
            $table->string('member_citizen_service_number')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('family_members', function (Blueprint $table) {
            $table->dropColumn('BSN');
        });
    }
}
