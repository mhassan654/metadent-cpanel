<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePreviewImgColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('xrayfiles', function (Blueprint $table) {
            $table->renameColumn('preview_img','name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('xrayfiles', function (Blueprint $table) {
            $table->renameColumn('name','preview_img');
        });
    }
}
