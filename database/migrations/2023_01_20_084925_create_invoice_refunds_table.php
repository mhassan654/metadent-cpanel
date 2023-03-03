<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceRefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_refunds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('invoice_id')->unsigned();
            $table->bigInteger('patient_id')->unsigned()->nullable();
            $table->double('refund_amount',12,2);
            $table->text('refund_reason')->nullable();
            $table->integer('officer')->nullable();
            $table->timestamps();

            // ============================================SET FROEIGN KEY CONSTRAINTS===================================

            $table->foreign('invoice_id')->references('id')->on('invoices')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('patient_id')->references('id')->on('patients')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_refunds');
    }
}
