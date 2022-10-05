<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffaddresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffaddres', function (Blueprint $table) {
			$table->engine = 'MyISAM';
            $table->id();
            $table->integer('staff_id');
			
			$table->string('home_address')->nullable();
			$table->string('home_building')->nullable();
			$table->string('home_sub_district')->nullable();
			$table->string('home_district')->nullable();
			$table->string('home_road')->nullable();
			$table->string('home_city')->nullable();
			$table->string('home_state_id')->nullable();
			$table->string('home_zip')->nullable();
            $table->integer('home_country_id')->nullable();
			$table->text('home_document')->nullable();
			
			$table->string('conact_address_check')->nullable();
			$table->string('conact_address')->nullable();
			$table->string('conact_building')->nullable();
			$table->string('conact_sub_district')->nullable();
			$table->string('conact_district')->nullable();
			$table->string('conact_road')->nullable();
			$table->string('conact_city')->nullable();
			$table->string('conact_state_id')->nullable();
			$table->string('conact_zip')->nullable();
            $table->integer('conact_country_id')->nullable();
			$table->text('conact_document')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staffaddres');
    }
}
