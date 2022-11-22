<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryInProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_in_products', function (Blueprint $table) {
            $table->id();
            $table->string('inventory_in_ticket_no')->nullable();
            $table->string('product_code')->nullable();
            $table->integer('total_qty')->nullable();
            $table->integer('ready_to_sale')->nullable();
            $table->integer('repair')->nullable();
            $table->integer('wrecked')->nullable();
            $table->integer('lost')->nullable();
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
        Schema::dropIfExists('inventory_in_products');
    }
}
