<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCustomerPaymentBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('customers', function (Blueprint $table) {
			$table->string('payment_bank_name')->after('delivery_country_id')->nullable();
			$table->string('payment_account_number')->after('payment_bank_name')->nullable();
			$table->string('payment_branch')->after('payment_account_number')->nullable();
			$table->string('payment_beneficiary')->after('payment_branch')->nullable();
		});
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
