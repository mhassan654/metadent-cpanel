<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer("patient_id");
            $table->integer("doctor_id");
            $table->integer("facility_id");
            $table->string('invoice_id');
            $table->integer("service_type");
            $table->longText("services");
            $table->longText("prices");
            $table->integer("status");
            $table->integer("invoice_type")->nullable();
            $table->decimal('paidamount',22,2)->default(0.00);
            $table->decimal('balance_due',22,2)->default(0.00);
            $table->string('due_date')->nullable();
            $table->longText('internal_notes')->nullable();
            $table->integer('vat')->nullable();
            $table->integer('total_with_vat')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
