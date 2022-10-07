<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierPoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_po', function (Blueprint $table) {
			$table->engine = 'MyISAM';
            $table->id();
			
			$table->integer('brand_id');
			$table->integer('supplier_id');
			$table->date('date');
			$table->tinyInteger('status')->default(1)->comment('1:Active 2:InActive');
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
        Schema::dropIfExists('supplier_po');
    }
}
