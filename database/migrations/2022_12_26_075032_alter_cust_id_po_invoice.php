<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCustIdPoInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('po_invoice', function (Blueprint $table) {
            $table->integer('cust_id')->nullable();
        });

        Schema::table('po_invoice', function (Blueprint $table) {
            $table->tinyInteger('status')->default(0)->comment('1:Overdue 0:Normal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('po_invoice', function (Blueprint $table) {
            //
        });
    }
}
