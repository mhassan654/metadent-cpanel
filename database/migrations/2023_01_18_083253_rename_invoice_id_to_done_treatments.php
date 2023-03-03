<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameInvoiceIdToDoneTreatments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('done_treatments', function (Blueprint $table) {
            $table->renameColumn('invoice_id', 'invoice_ids');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('done_treatments', function (Blueprint $table) {
            $table->renameColumn('invoice_ids', 'invoice_id');
        });
    }
}