<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSupplierProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `supplier_products` ADD `currency_id` INT(11) NULL DEFAULT NULL AFTER `supplier_id`;");
		DB::statement("ALTER TABLE `supplier_products` ADD `supplier_type` INT(11) NULL DEFAULT NULL AFTER `currency_id`;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
