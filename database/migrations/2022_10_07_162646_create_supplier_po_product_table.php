<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierPoProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_po_product', function (Blueprint $table) {
			$table->engine = 'MyISAM';
            $table->id();
			$table->integer('supplier_po_id');
			$table->integer('product_id');
			$table->double('unit_price')->default(0);
			$table->integer('qty')->default(0);
			$table->double('price')->default(0);
			$table->double('total_price')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_po_product');
    }
}
