<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		DB::statement("DROP TABLE `prices`");
		
        Schema::create('price', function (Blueprint $table) {
            $table->id();
			$table->integer('product_id');
			$table->double('total_cost')->default(0);
			$table->integer('currency_type')->default(1)->comment('1=THB Original Currency, 2=Original Currency');
            $table->timestamps();
        });
		
		Schema::create('price_map', function (Blueprint $table) {
            $table->id();
			$table->integer('price_id');
			$table->integer('supplier_product_id');
			$table->double('unit_price')->default(0);
			$table->tinyInteger('type')->comment('1=Manufacturer, 2=Agent, 3=Shipping, 4=Transport, 5=W/H Lessor, 6=Packaging & Advertise, 7=Labour');
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
        Schema::dropIfExists('price');
    }
}
