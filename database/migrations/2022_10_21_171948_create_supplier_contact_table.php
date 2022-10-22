<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_contact', function (Blueprint $table) {
			$table->engine = 'MyISAM';
            $table->id();
			$table->integer('supplier_id');
            $table->string('name',255);
			$table->string('family_name',255)->nullable();
			$table->string('position',255)->nullable();
			$table->string('mobile',255)->nullable();
			$table->string('email',255)->nullable();
			$table->string('remark',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_contact');
    }
}
