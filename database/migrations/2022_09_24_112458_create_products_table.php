<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		
		Schema::create('products', function (Blueprint $table) {
			$table->engine = 'MyISAM';
            $table->id();
			$table->string('name', 500);
			$table->string('code')->nullable();
			$table->integer('brand_id');
			$table->string('color')->nullable();
			$table->string('barcode')->nullable();
			$table->tinyInteger('type')->comment('1=sole piece, 2=set');
			$table->integer('product_in_set')->nullable();
			$table->string('dimension_width')->nullable();
			$table->string('dimension_depth')->nullable();
			$table->string('dimension_height')->nullable();
			$table->string('package_width')->nullable();
			$table->string('package_depth')->nullable();
			$table->string('package_height')->nullable();
			$table->string('gross_kg')->nullable();
			$table->string('cbm')->nullable();
			$table->string('net_height')->nullable();
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
        Schema::dropIfExists('products');
    }
}
