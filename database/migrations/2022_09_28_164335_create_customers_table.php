<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
			$table->engine = 'MyISAM';
            $table->id();
			$table->integer('brand_id');
			$table->string('name');
			$table->string('family')->nullable();
			$table->tinyInteger('title');
			$table->integer('currency')->nullable();
			$table->integer('incoterm')->nullable();
			$table->string('place_of_delivery_destination')->nullable();
			$table->string('credit_term_days')->nullable();
			$table->integer('from')->nullable();
			$table->integer('incoterm_type')->nullable();
			$table->integer('contact_person')->nullable();
			$table->string('email')->nullable();
			$table->string('bank_name')->nullable();
			$table->string('bank_address')->nullable();
			$table->string('swift')->nullable();
			$table->string('account_number')->nullable();
			$table->string('beneficiary_name')->nullable();
			$table->string('beneficiary_address')->nullable();
			
			$table->string('head_office_address')->nullable();
			$table->string('head_office_building')->nullable();
			$table->string('head_office_sub_district')->nullable();
			$table->string('head_office_district')->nullable();
			$table->string('head_office_road')->nullable();
			$table->string('head_office_city')->nullable();
			$table->string('head_office_zipcode')->nullable();
			$table->integer('head_office_state_id')->nullable();
			$table->integer('head_office_country_id')->nullable();
			
			$table->tinyInteger('delivery_check')->default(0);
			$table->string('delivery_address')->nullable();
			$table->string('delivery_building')->nullable();
			$table->string('delivery_sub_district')->nullable();
			$table->string('delivery_district_id')->nullable();
			$table->string('delivery_road')->nullable();
			$table->string('delivery_city')->nullable();
			$table->string('delivery_zipcode')->nullable();
			$table->integer('delivery_state_id')->nullable();
			$table->integer('delivery_country_id')->nullable();
			
			$table->string('contact_name')->nullable();
			$table->string('contact_family_name')->nullable();
			$table->string('contact_position')->nullable();
			$table->string('contact_mobile')->nullable();
			$table->string('contact_email')->nullable();
			$table->string('contact_dob')->nullable();
			$table->string('contact_line')->nullable();
			$table->string('contact_remark')->nullable();
			
			$table->tinyInteger('type')->comment('1=Wholesale, 2=Retail, 3=Online Shopping');
			$table->tinyInteger('invoice')->comment('1=Sale, 2=Consignment');
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
        Schema::dropIfExists('customers');
    }
}
