<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterApproveColumnsToLeaveApplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leave_applications', function (Blueprint $table) {
            $table->string('start_time')->after('leave_type_id')->nullable();
            $table->string('end_time')->after('leave_type_id')->nullable();
            $table->decimal('requested_hours', 21, 2)->after('leave_type_id')->nullable();
            $table->string('cancel_reason')->after('reason')->nullable();
            $table->string('application_start_date')->nullable()->change();
            $table->string('application_end_date')->nullable()->change();
            $table->dropColumn('approve_end_date');
            $table->dropColumn('approve_start_date');
            $table->dropColumn('apply_day');
            $table->dropColumn('approve_day');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leave_applications', function (Blueprint $table) {
            $table->dropColumn('start_time');
            $table->dropColumn('end_time');
            $table->dropColumn('cancel_reason');
            $table->dropColumn('requested_hours');
        });
    }
}