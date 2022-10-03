<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
			$table->engine = 'MyISAM';
            $table->id();
			$table->integer('type_id');
			$table->tinyInteger('type')->comment('1=Supplier, 2=Customer');
			$table->string('installment_1');
			$table->integer('installment_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_installments');
    }
}
