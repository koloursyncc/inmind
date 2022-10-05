<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffLabourContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_labour_contracts', function (Blueprint $table) {
			$table->engine = 'MyISAM';
            $table->id();
			$table->integer('staff_id');
			
			$table->tinyInteger('working_pay')->nullable();
			$table->tinyInteger('type_of_labour')->nullable();
			$table->string('effective_period_start_date')->nullable();
			$table->string('effective_period_end_date')->nullable();
			$table->tinyInteger('position')->nullable();
			$table->tinyInteger('labour_department')->nullable();
			$table->string('salary_wages_in_contract')->nullable();
			$table->tinyInteger('increase_salary_be_considered_when')->nullable();
			$table->string('salary_promised')->nullable();
			$table->tinyInteger('hotel_thb_day_chk')->default(0)->nullable();
			$table->string('hotel_thb_day')->nullable();
			$table->tinyInteger('allowance_thb_day_chk')->default(0)->nullable();
			$table->string('allowance_thb_day')->nullable();
			$table->tinyInteger('travel_expense_thb_day_chk')->default(0)->nullable();
			$table->string('travel_expense_thb_day')->nullable();
			$table->tinyInteger('ot_thb_chk')->default(0)->nullable();
			$table->string('ot_thb_day')->nullable();
			$table->tinyInteger('food_thb_day_chk')->default(0)->nullable();
			$table->string('food_thb_day')->nullable();
			$table->tinyInteger('sick_leave_chk')->default(0)->nullable();
			$table->string('sick_leave')->nullable();
			$table->tinyInteger('vocation_leave_chk')->default(0)->nullable();
			$table->string('vocation_leave')->nullable();
			$table->tinyInteger('maternity_leave_chk')->default(0)->nullable();
			$table->string('maternity_leave')->nullable();
			
			$table->string('contract_home_address')->nullable();
			$table->string('contract_home_building')->nullable();
			$table->string('contract_home_sub_distric')->nullable();
			$table->string('contract_home_district')->nullable();
			$table->string('contract_home_road')->nullable();
			$table->string('contract_home_city')->nullable();
			$table->integer('contract_home_state')->nullable();
			$table->string('contract_home_zip')->nullable();
			$table->integer('contract_home_country')->nullable();
			
			$table->string('contract_home_address_check')->nullable();
			$table->string('contract_address')->nullable();
			$table->string('contract_building')->nullable();
			$table->string('contract_sub_district')->nullable();
			$table->string('contract_district')->nullable();
			$table->string('contract_road')->nullable();
			$table->string('contract_city')->nullable();
			$table->integer('contract_state')->nullable();
			$table->string('contract_zip_code')->nullable();
			$table->integer('contract_country')->nullable();
			
			$table->tinyInteger('gaurantor_type')->nullable();
			$table->tinyInteger('gaurantor_title')->nullable();
			$table->string('gaurantor_name_thi')->nullable();
			$table->string('gaurantor_name_eng')->nullable();
			$table->string('gaurantor_family_name_thai')->nullable();
			$table->string('gaurantor_family_name_end')->nullable();
			$table->string('guarantor_office_name')->nullable();
			$table->string('guarantor_address')->nullable();
			$table->string('guarantor_building')->nullable();
			$table->string('guarantor_sub_district')->nullable();
			$table->string('guarantor_district')->nullable();
			$table->string('guarantor_road')->nullable();
			$table->string('guarantor_city')->nullable();
			$table->string('guarantor_zip')->nullable();
			$table->string('guarantor_salary')->nullable();
			$table->string('guarantor_amount')->nullable();
			$table->integer('guarantor_state_id')->nullable();
			$table->integer('guarantor_country_id')->nullable();
			$table->text('guarantor_document')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_labour_contracts');
    }
}
