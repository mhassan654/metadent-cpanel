<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acc_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('v_id');
            $table->integer('f_year');
            $table->integer('v_no')->nullable();
            $table->string('v_type')->nullable();
            $table->date('v_date')->nullable();
            $table->string('reference_no')->nullable();
            $table->string('COAID');
            $table->string('cheque_no')->nullable();
            $table->date('cheque_date')->nullable();
            $table->integer('is_honour')->default(0);
            $table->string('ledger_comment')->nullable();
            $table->decimal('debit',18,2)->nullable();
            $table->decimal('credit',18,2)->nullable();
            $table->integer('store_id')->default(0);
            $table->string('is_posted')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('narration')->nullable();
            $table->string('is_approve')->nullable();
            $table->bigInteger('rev_code')->unsigned();
            $table->integer('sub_type')->default(1);
            $table->integer('sub_code')->default(0);
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
        Schema::dropIfExists('acc_transactions');
    }
}
