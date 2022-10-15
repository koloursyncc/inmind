<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_items', function (Blueprint $table) {
			$table->engine = 'MyISAM';
            $table->id();
			$table->integer('po_id');
			$table->integer('po_invoice_id');
			$table->integer('product_id');
			$table->tinyInteger('checked')->nullable();
			$table->double('unit_price');
			$table->integer('qty');
			$table->double('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('po_items');
    }
}
