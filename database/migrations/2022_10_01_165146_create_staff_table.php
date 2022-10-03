<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
			$table->engine = 'MyISAM';
            $table->id(); 
			$table->tinyInteger('active_staff')->nullable();
			$table->tinyInteger('title')->nullable();
			$table->string('name_thai');
			$table->string('name_eng');
			$table->string('famly_name_thai');
			$table->string('famly_name_eng');
			$table->string('nick')->nullable();
			$table->string('current_job')->nullable();
			$table->string('mobile_no')->nullable();
			$table->string('current_salary')->nullable();
			$table->string('dob')->nullable();
			$table->tinyInteger('card_type')->nullable();
			$table->string('card_no')->nullable();
			$table->string('issue_date')->nullable();
			$table->string('issue_by')->nullable();
			$table->string('passport_no')->nullable();
			$table->string('exp_date')->nullable();
			$table->integer('country_id')->nullable();
			$table->tinyInteger('higest_education')->nullable();
			$table->string('school_univercity_name')->nullable();
			$table->string('education_year')->nullable();
			$table->string('school_faculty')->nullable();
			$table->string('department')->nullable();
			$table->tinyInteger('social_fund')->nullable();
			$table->tinyInteger('social_fund_included_in_salary')->nullable();
			$table->string('social_fund_id')->nullable();
			$table->string('hospital_in_charges')->nullable();
			$table->tinyInteger('pay_social_fund_by')->nullable();
			$table->string('will_apply_in')->nullable();
			
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
			$table->string('guarantor_document')->nullable();
			
			
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
        Schema::dropIfExists('staff');
    }
}
