<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerSalaryWageHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_salary_wage_history', function (Blueprint $table) {
			$table->engine = 'MyISAM';
            $table->id();
			$table->integer('customer_id');
			$table->string('date');
			$table->string('ammount');
        });
		
		DB::statement("ALTER TABLE `staff` ADD `checked_registration` TINYINT(1) NOT NULL DEFAULT '2' AFTER `conact_country_id`, ADD `effective_date` VARCHAR(100) NOT NULL AFTER `checked_registration`, ADD `registration_document_file` VARCHAR(300) NOT NULL AFTER `effective_date`, ADD `compensated_amount` VARCHAR(100) NOT NULL AFTER `registration_document_file`, ADD `reason` VARCHAR(100) NOT NULL AFTER `compensated_amount`;");
		
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_salary_wage_history');
    }
}
