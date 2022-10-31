<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterStaffColsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		 DB::statement("ALTER TABLE `staff` ADD `expired_date` VARCHAR(255) NULL DEFAULT NULL AFTER `issue_by`, ADD `coustry_id` INT(11) NULL DEFAULT NULL AFTER `expired_date`;");
		 
		 DB::statement("ALTER TABLE `staff` ADD `title_other_text` VARCHAR(255) NULL DEFAULT NULL AFTER `title`, ADD `phone_code` INT(11) NULL DEFAULT NULL AFTER `title_other_text`;");
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
