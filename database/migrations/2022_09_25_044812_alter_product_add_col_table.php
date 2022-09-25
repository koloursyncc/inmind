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
			$table->string('1_20_contain', 100)->after('package_height')->nullable();
			$table->string('1_20_contain_net_weight', 100)->after('1_20_contain')->nullable();
			$table->string('1_20_contain_net_gross_weight', 100)->after('1_20_contain_net_weight')->nullable();
			
			$table->string('1_40_contain', 100)->after('1_20_contain_net_gross_weight')->nullable();
			$table->string('1_40_contain_net_weight', 100)->after('1_40_contain')->nullable();
			$table->string('1_40_contain_net_gross_weight', 100)->after('1_40_contain_net_weight')->nullable();
			
			$table->string('1_40_hq_contain', 100)->after('1_40_contain_net_gross_weight')->nullable();
			$table->string('1_40_hq_net_weight', 100)->after('1_40_hq_contain')->nullable();
			$table->string('1_40_hq_net_gross_weight', 100)->after('1_40_hq_net_weight')->nullable();
			
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
