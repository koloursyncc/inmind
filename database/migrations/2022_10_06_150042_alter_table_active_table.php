<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableActiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `suppliers` ADD `status` TINYINT(1) NOT NULL DEFAULT '1' COMMENT '1:Active, 2:Inactive' AFTER `delivery_destination`");
		
		DB::statement("ALTER TABLE `staff` ADD `status` TINYINT(1) NOT NULL DEFAULT '1' COMMENT '1:Active, 2:Inactive' AFTER `conact_document`");
		
		DB::statement("ALTER TABLE `products` ADD `status` TINYINT(1) NOT NULL DEFAULT '1' COMMENT '1:Active, 2:Inactive' AFTER `net_height`");
		
		DB::statement("ALTER TABLE `customers` ADD `status` TINYINT(1) NOT NULL DEFAULT '1' COMMENT '1:Active, 2:Inactive' AFTER `invoice`");
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
