<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSupplierAddcolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suppliers', function (Blueprint $table) {
			$table->string('zipcode', 15)->after('country_id')->nullable();
			$table->string('currency', 5)->after('beneficiary_address')->nullable();
			$table->integer('incoterm')->after('currency')->nullable();
			$table->string('delivery_destination')->after('incoterm');
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
