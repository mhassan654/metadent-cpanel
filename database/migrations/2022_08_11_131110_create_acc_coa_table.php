<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccCoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acc_coa', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('pheadcode');
            $table->string('HeadCode', 50)->unique('HeadCode');
            $table->string('HeadName', 100);
            $table->string('PHeadName', 50)->index('PHeadName');
            $table->integer('HeadLevel')->index('HeadLevel');
            $table->boolean('IsActive');
            $table->boolean('IsTransaction')->index('IsTransaction');
            $table->boolean('IsGL')->index('IsGL');
            $table->integer('isCashNature')->default(0)->index('isCashNature');
            $table->integer('isBankNature')->default(0)->index('isBankNature');
            $table->char('HeadType', 1);
            $table->boolean('IsBudget')->index('IsBudget');
            $table->boolean('IsDepreciation')->index('IsDepreciation');
            $table->integer('DepreciationRate')->default(0);
            $table->integer('isSubType')->default(0);
            $table->integer('subType')->default(1);
            $table->integer('isStock')->default(0);
            $table->integer('isFixedAssetSch')->default(0);
            $table->string('noteNo', 20)->nullable();
            $table->string('assetCode', 20)->nullable();
            $table->string('depCode', 20)->nullable();
            $table->integer('CreateBy');
            $table->dateTime('CreateDate');
            $table->integer('UpdateBy');
            $table->dateTime('UpdateDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acc_coa');
    }
}
