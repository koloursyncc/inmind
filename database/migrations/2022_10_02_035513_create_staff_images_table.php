<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_images', function (Blueprint $table) {
			$table->engine = 'MyISAM';
            $table->id();
			$table->integer('staff_id')->nullable();
			$table->string('document')->nullable();
			$table->tinyInteger('type')->nullable()->comment('1:Upload Staff Photo, 2:Upload Social fund ID Card');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_images');
    }
}
