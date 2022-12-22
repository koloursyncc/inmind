<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CustIdToPoInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `po_invoice` ADD `cust_id` int(11) NULL DEFAULT NULL AFTER `po_id`;");
         DB::statement("ALTER TABLE `po_invoice` ADD `status` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '1:Overdue, 0:Normal' AFTER `pay_this_time`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
