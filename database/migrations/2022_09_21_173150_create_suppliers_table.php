<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
			$table->string('supplier_name');
			$table->integer('supplier_type');
			$table->text('address')->nullable();
			$table->string('building')->nullable();
			$table->string('sub_district')->nullable();
			$table->string('district')->nullable();
			$table->string('road')->nullable();
			$table->integer('city_id');
			$table->integer('state_id');
			$table->integer('country_id');
			$table->string('name')->nullable();
			$table->string('family_name')->nullable();
			$table->string('position')->nullable();
			$table->string('mobile')->nullable();
			$table->string('email')->nullable();
			$table->string('remark')->nullable();
			$table->string('bank_name')->nullable();
			$table->string('bank_address')->nullable();
			$table->string('swift')->nullable();
			$table->string('ac_no')->nullable();
			$table->string('beneficiary_name')->nullable();
			$table->string('beneficiary_address')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}
