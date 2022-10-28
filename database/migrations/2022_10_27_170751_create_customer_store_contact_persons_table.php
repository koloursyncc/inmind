<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerStoreContactPersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_store_contact_persons', function (Blueprint $table) {
			$table->engine = 'MyISAM';
            $table->id();
			$table->integer('customer_id');
			$table->integer('store_id');
			$table->string('store_contact_address')->nullable();
			$table->string('store_contact_building')->nullable();
			$table->string('store_contact_sub_district')->nullable();
			$table->string('store_contact_district_id')->nullable();
			$table->string('store_contact_road')->nullable();
			$table->string('store_contact_country_id')->nullable();
			$table->string('store_contact_state_id')->nullable();
			$table->string('store_contact_city')->nullable();
			$table->string('store_contact_zipcode')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_store_contact_persons');
    }
}
