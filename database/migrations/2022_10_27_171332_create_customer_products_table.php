<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_products', function (Blueprint $table) {
			$table->engine = 'MyISAM';
            $table->id();
			$table->integer('customer_id');
			$table->integer('product_id');
			$table->double('price_thb_ex_vat')->default(0);
			$table->double('price_thb_inc_vat')->default(0);
			$table->double('mkt_price_thb_ex_vat')->default(0);
			$table->double('mkt_price_thb_inc_vat')->default(0);
			$table->string('mkt_valid_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_products');
    }
}
