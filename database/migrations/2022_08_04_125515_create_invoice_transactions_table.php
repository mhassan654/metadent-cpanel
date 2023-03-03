<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id');
            $table->bigInteger('invoice_id')->unsigned();
            $table->bigInteger('patient_id')->unsigned();
            $table->string('invoice_number');
            $table->string('resource');
            $table->integer('amount');
            $table->string('currency');
            $table->string('method');
            $table->string('status');
            $table->string('paid_at')->nullable();
            $table->string('profile_id');
            $table->string('locale');
            $table->string('sequence_type');
            $table->string('payment_date');
            $table->string('expires_at')->nullable();
            $table->string('canceled_at')->nullable();
            $table->string('failed_at')->nullable();
            $table->string('due_date')->nullable();
            $table->string('mode');
            $table->string('tr_cardNumber');
            $table->string('tr_cardHolder');
            $table->string('tr_cardAudience');
            $table->string('tr_cardLabel');
            $table->string('tr_cardCountryCode');
            $table->string('tr_cardSecurity');
            $table->string('tr_feeRegion');
            $table->longText('description');
            $table->timestamps();


             //FOREIGN KEY CONSTRAINTS
             $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade')->onUpdate('cascade');
             $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade')->onUpdate('cascade');
            //SETTING THE PRIMARY KEYS
            // $table->primary('transaction_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_transactions');
    }
}
