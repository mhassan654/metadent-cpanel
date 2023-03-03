<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPatientClientColumnsToPatients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->string('first_letter_of')->nullable();
            $table->string('deactivation_date')->nullable();
            $table->string('work_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->decimal('ppspp_total_score',21,2)->default('0.00')->nullable();
            $table->decimal('ppspp_score_four_quadrants',21,2)->default('0.00')->nullable();
            $table->string('ppspp_date')->nullable();
            $table->string('last_recall_date')->nullable();
            $table->string('country_code')->nullable();
            $table->string('gp_code')->nullable();
            $table->decimal('total_outstanding_invoice')->default('0.00')->nullable();
            $table->decimal('total_outstanding_personal_amt')->default('0.00')->nullable();
            $table->boolean('send_direct_invoice_to_patient')->default(false)->nullable();
            $table->string('work_mail')->nullable();
            $table->string('private_mail')->nullable();
            $table->string('invoice_mail')->nullable();
            $table->string('document_directory')->nullable();
            $table->string('date_of_death')->nullable();
            $table->string('date_of_first_treatment')->nullable();
            $table->string('date_of_last_treatment')->nullable();
            $table->string('profession')->nullable();
            $table->string('automatic_payment_type')->nullable();
            $table->boolean('automated_payment')->default(false)->nullable();
            $table->string('reason_for_archiving')->nullable();
            $table->string('asa_qns_date')->nullable();
            $table->string('additional_insurance')->nullable();
            $table->string('additional_insurance_type')->nullable();
            $table->string('additional_insurance_policy_no')->nullable();
            $table->string('email_salutation')->nullable();
            $table->boolean('confirm_dentist_visit')->default(false)->nullable();
            $table->boolean('confirm_mouth_hygienist_visit')->default(false)->nullable();
            $table->boolean('confirm_preventive_assistant_visit')->default(false)->nullable();
            $table->boolean('confirm_orthodontist_visit')->default(false)->nullable();
            $table->boolean('is_serving')->default(false)->nullable();
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
