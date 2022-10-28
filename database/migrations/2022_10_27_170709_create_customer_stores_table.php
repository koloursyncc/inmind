<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_stores', function (Blueprint $table) {
			$table->engine = 'MyISAM';
            $table->id();
			$table->integer('customer_id');
			$table->string('store_checked')->default(0)->nullable();
			$table->string('store_name')->nullable();
			$table->string('store_building_village')->nullable();
			$table->string('store_sub_district')->nullable();
			$table->string('store_district')->nullable();
			$table->string('store_road')->nullable();
			$table->string('store_city')->nullable();
			$table->string('store_zip_code')->nullable();
			$table->string('store_country')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_stores');
    }
}
