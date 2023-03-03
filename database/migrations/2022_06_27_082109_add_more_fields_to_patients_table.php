<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFieldsToPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->integer('dentist')->nullable();
            $table->integer('mouth_hygienist')->nullable();
            $table->integer('preventive_assistant')->nullable();
            $table->integer('orthodontist')->nullable();
            $table->integer('recall_dentist_duration')->nullable();
            $table->integer('recall_mouth_hygienist_duration')->nullable();
            $table->integer('recall_preventive_assistant_duration')->nullable();
            $table->integer('recall_orthodontist_duration')->nullable();
            $table->string('general_practitioner')->nullable();
            $table->string('next_dentist_visit')->nullable();
            $table->string('next_mouth_hygienist_visit')->nullable();
            $table->string('next_orthodontist_visit')->nullable();
            $table->string('next_preventive_assistant_visit')->nullable();
            $table->string('BSN')->nullable();
            $table->string('WLZ')->nullable();
            $table->string('title')->nullable();
            $table->string('language')->nullable();
            $table->string('secondary_email')->nullable();
            $table->string('insurance_from_date')->nullable();
            $table->boolean('receive_sms')->nullable()->default(false);
            $table->boolean('receive_system_emails')->nullable()->default(false);
            $table->boolean('receive_newsletters')->nullable()->default(false);
            $table->boolean('do_not_receive_emails')->nullable()->default(false);
            $table->boolean('do_not_receive_email_declarations')->nullable()->default(false);
            $table->boolean('do_not_send_declaration_to_insurance_company')->nullable()->default(false);
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
            $table->dropColumn('dentist');
            $table->dropColumn('mouth_hygienist');
            $table->dropColumn('preventive_assistant');
            $table->dropColumn('orthodontist');
            $table->dropColumn('general_practitioner');
            $table->dropColumn('BSN');
            $table->dropColumn('WLZ');
            $table->dropColumn('title');
            $table->dropColumn('language');
            $table->dropColumn('secondary_email');
            $table->dropColumn('receive_sms');
            $table->dropColumn('insurance_from_date');
            $table->dropColumn('receive_system_emails');
            $table->dropColumn('receive_newsletters');
            $table->dropColumn('do_not_receive_emails');
            $table->dropColumn('do_not_receive_email_declarations');
            $table->dropColumn('do_not_send_declaration_to_insurance_company');
        });
    }
}
