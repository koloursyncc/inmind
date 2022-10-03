<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffAddressDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_address_documents', function (Blueprint $table) {
            $table->engine = 'MyISAM';
			$table->id();
			$table->integer('staff_id');
			$table->string('address')->nullable();
			$table->string('building')->nullable();
			$table->string('sub_district')->nullable();
			$table->string('district')->nullable();
			$table->string('road')->nullable();
			$table->string('city')->nullable();
			$table->string('state_id')->nullable();
			$table->string('zip')->nullable();
            $table->integer('country_id')->nullable();
			$table->text('document')->nullable();
			$table->tinyInteger('contact_address_as_home')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_address_documents');
    }
}
