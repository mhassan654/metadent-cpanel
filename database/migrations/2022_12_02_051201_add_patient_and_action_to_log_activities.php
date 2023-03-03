<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPatientAndActionToLogActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('log_activities', function (Blueprint $table) {
            $table->integer('facility_id')->after('id')->nullable();
            $table->integer('patient_id')->after('user_id')->nullable();
            $table->string('action')->after('user_id')->nullable();
            $table->string('section')->after('user_id')->nullable();
            $table->integer('employee_id')->after('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        if (Schema::hasColumns('log_activities', ['action', 'section', 'employee_id', 'facility_id'])) {
            Schema::table('log_activities', function (Blueprint $table) {
                $table->dropColumn('patient_id');
                $table->dropColumn('action');
                $table->dropColumn('section');
                $table->dropColumn('employee_id');
                $table->dropColumn('facility_id');
            });
        }
    }
}
