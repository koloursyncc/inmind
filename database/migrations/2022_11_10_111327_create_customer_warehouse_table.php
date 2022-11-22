<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerWarehouseTable extends Migration
{
    /**
     * Run the migrations.  
     *
     * @return void
     */
    public function up()  
    {
        Schema::create('customer_warehouse', function (Blueprint $table) {
            $table->id();
            $table->string('wh_name');
            $table->tinyInteger('wh_type')->comment("1=Own Warehouse 2=Own Showroom 3=Wholeseller Store/ Warehouse 4=Retailer Residen");
            $table->string('customer_id')->nullable();
            $table->string('customer_store_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('address')->nullable();
            $table->string('building')->nullable();
            $table->string('sub_district')->nullable();
            $table->string('district')->nullable();
            $table->string('road')->nullable();            
            $table->string('country_id')->nullable();
            $table->string('state_id')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('tel_number')->nullable();
            $table->tinyInteger('status')->default(1)->nullable();        
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
        Schema::dropIfExists('customer_warehouse');
    }
}
