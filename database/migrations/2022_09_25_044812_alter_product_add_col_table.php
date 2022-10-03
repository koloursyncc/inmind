<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductAddColTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
			$table->string('contain_1_20', 100)->after('package_height')->nullable();
			$table->string('contain_1_20_net_weight', 100)->after('contain_1_20')->nullable();
			$table->string('contain_1_20_net_gross_weight', 100)->after('contain_1_20_net_weight')->nullable();
			
			$table->string('contain_1_40', 100)->after('contain_1_20_net_gross_weight')->nullable();
			$table->string('contain_1_40_net_weight', 100)->after('contain_1_40')->nullable();
			$table->string('contain_1_40_net_gross_weight', 100)->after('contain_1_40_net_weight')->nullable();
			
			$table->string('hq_1_40_contain', 100)->after('contain_1_40_net_gross_weight')->nullable();
			$table->string('hq_1_40_net_weight', 100)->after('hq_1_40_contain')->nullable();
			$table->string('hq_1_40_net_gross_weight', 100)->after('hq_1_40_net_weight')->nullable();
			
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
