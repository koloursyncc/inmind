<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWharehousewiseInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wharehousewise_inventory', function (Blueprint $table) {
            $table->id();
            $table->string('wh_id')->nullable();
            $table->string('product_code')->nullable();
            $table
                ->integer('total_qty')
                ->nullable()
                ->default(0);
            $table
                ->integer('ready_to_sale')
                ->nullable()
                ->default(0);
            $table
                ->integer('repair')
                ->nullable()
                ->default(0);
            $table
                ->integer('wrecked')
                ->nullable()
                ->default(0);
            $table
                ->integer('lost')
                ->nullable()
                ->default(0);
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
        Schema::dropIfExists('wharehousewise_inventory');
    }
}
