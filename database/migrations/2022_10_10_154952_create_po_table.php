<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po', function (Blueprint $table) {
			$table->engine = 'MyISAM';
            $table->id();
			$table->integer('brand_id');
			$table->tinyInteger('type_of_customer')->nullable();
			$table->tinyInteger('title_option')->nullable();
			$table->string('customer_name')->nullable();
			$table->string('family_name')->nullable();
			
			$table->string('head_office_address')->nullable();
			$table->string('head_office_building')->nullable();
			$table->string('head_office_sub_district')->nullable();
			$table->string('head_office_district')->nullable();
			$table->string('head_office_road')->nullable();
			$table->integer('head_office_country')->nullable();
			$table->integer('head_office_state')->nullable();
			$table->string('head_office_city')->nullable();
			$table->string('head_office_zip_code')->nullable();
			$table->tinyInteger('delivery_address_checked')->nullable();
			$table->string('delivery_address')->nullable();
			$table->string('delivery_building')->nullable();
			$table->string('delivery_sub_district')->nullable();
			$table->string('delivery_district')->nullable();
			$table->string('delivery_road')->nullable();
			$table->integer('delivery_country')->nullable();
			$table->integer('delivery_state')->nullable();
			$table->string('delivery_city')->nullable();
			$table->string('delivery_zip_code')->nullable();
			
			$table->tinyInteger('title')->nullable();
			$table->string('last_deposit')->nullable();
			$table->string('document_no')->nullable();
			$table->date('date')->nullable();
			$table->date('issue_date')->nullable();
			$table->string('order_by_store')->nullable();
			$table->string('order_by_channel')->nullable();
			$table->integer('sale_person')->nullable();
			
			$table->tinyInteger('bank_title')->nullable();
			$table->string('bank_name')->nullable();
			$table->string('bank_branch')->nullable();
			$table->string('bank_transaction_date')->nullable();
			$table->string('bank_account_number')->nullable();
			$table->string('bank_beneficiary_name')->nullable();
			$table->string('bank_transaction_time')->nullable();
			
			$table->tinyInteger('status')->default(1)->comment('1:Active, 2InActive');
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
        Schema::dropIfExists('po');
    }
}
