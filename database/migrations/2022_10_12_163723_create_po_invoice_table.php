<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_invoice', function (Blueprint $table) {
			$table->engine = 'MyISAM';
            $table->id();
			$table->integer('po_id');
			$table->double('total_amount')->nullable();
			$table->double('discount')->nullable();
			$table->double('vat')->nullable();
			$table->double('pay_this_time')->nullable();
            $table->integer('cust_id');
            $table->integer('status')->default(0)->comment('1=Overdue, 0=Normal');
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
        Schema::dropIfExists('po_invoice');
    }
}
