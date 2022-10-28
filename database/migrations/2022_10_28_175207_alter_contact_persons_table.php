<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterContactPersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `customer_store_contact_persons` ADD `store_contact_name` VARCHAR(255) NULL DEFAULT NULL AFTER `store_id`, ADD `store_contact_family_name` VARCHAR(255) NULL DEFAULT NULL AFTER `store_contact_name`, ADD `store_contact_email` VARCHAR(255) NULL DEFAULT NULL AFTER `store_contact_family_name`, ADD `store_contact_position` VARCHAR(255) NULL DEFAULT NULL AFTER `store_contact_email`, ADD `store_contact_mobile` VARCHAR(255) NULL DEFAULT NULL AFTER `store_contact_position`, ADD `store_contact_line` VARCHAR(255) NULL DEFAULT NULL AFTER `store_contact_mobile`, ADD `store_contact_birth_date` VARCHAR(255) NULL DEFAULT NULL AFTER `store_contact_line`;
");

DB::statement("ALTER TABLE `customer_store_contact_persons`
  DROP `store_contact_address`,
  DROP `store_contact_building`,
  DROP `store_contact_sub_district`,
  DROP `store_contact_district_id`,
  DROP `store_contact_road`,
  DROP `store_contact_country_id`,
  DROP `store_contact_state_id`,
  DROP `store_contact_city`,
  DROP `store_contact_zipcode`;
");
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
