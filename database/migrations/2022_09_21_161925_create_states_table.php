<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
			$table->engine = 'MyISAM';
            $table->id();
			$table->string('name');
			$table->integer('country_id');
			$table->string('country_code', 2)->nullable();
			$table->string('country_name')->nullable();
			$table->string('state_code')->nullable();
			$table->string('type')->nullable();
			$table->string('latitude')->nullable();
			$table->string('longitude')->nullable();
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
        Schema::dropIfExists('states');
    }
}
