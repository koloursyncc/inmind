<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()  
    {
        Schema::create('inventory_in', function (Blueprint $table) {  
            $table->id();            
            $table->integer('sr_no')->nullable();
            $table->string('inventory_in_ticket_no')->nullable();
            $table->tinyInteger('order_type')->nullable()->comment('1=internal moving 2=external moving');
            $table->tinyInteger('is_supplier_po')->default(1)->nullable();
            $table->string('supplier_po_no')->nullable();
            $table->string('wh_id')->nullable();
            $table->string('delivery_ticket_no')->nullable();
            $table->string('delivery_person')->nullable();
            $table->string('telephone')->nullable();
            $table->date('expected_delivery_date')->nullable();
            $table->string('remarks')->nullable();
            $table->string('inventory_out_ticket_no')->nullable();
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
        Schema::dropIfExists('inventory_in');
    }
}
