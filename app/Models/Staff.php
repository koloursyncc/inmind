<?php

namespace App\Models;
use App\Components\RegionManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
	
	protected $fillable = [
		'staff_rand_id',
        'active_staff',
        'title',
        'name_thai',
		'name_eng',
        'famly_name_thai',
        'famly_name_eng',
		'nick',
        'current_job',
		'mobile_no',
        'current_salary',
        'dob',
		'card_type',
        'card_no',
        'issue_date',
		'issue_by',
        'passport_no',
		'exp_date',
        'country_id',
        'higest_education',
		'school_univercity_name',
        'education_year',
        'school_faculty',
		'department',
        'social_fund',
		'social_fund_included_in_salary',
        'social_fund_id',
        'hospital_in_charges',
		'pay_social_fund_by',
        'will_apply_in',
		
		'home_address',
		'home_building',
		'home_sub_district',
		'home_district',
		'home_road',
		'home_city',
		'home_state_id',
		'home_zip',
		'home_country_id',
		'home_document',
		'conact_address_check',
		'conact_address',
		'conact_building',
		'conact_sub_district',
		'conact_district',
		'conact_road',
		'conact_city',
		'conact_state_id',
		'conact_zip',
		'conact_country_id',
		'conact_document',
		'status',
		
		/* 'working_pay',
		'type_of_labour',
		'effective_period_start_date',
		'effective_period_end_date',
		'position',
		'labour_department',
		'salary_wages_in_contract',
		'Increase_salary_be_considered_when',
		'salary_promised',
		'hotel_thb_day_chk',
		'hotel_thb_day',
		'allowance_thb_day_chk',
		'allowance_thb_day',
		'travel_expense_thb_day_chk',
		'travel_expense_thb_day',
		'ot_thb_chk',
		'ot_thb_day',
		'food_thb_day_chk',
		'food_thb_day',
		'sick_leave_chk',
		'sick_leave',
		'vocation_leave_chk',
		'vocation_leave',
		'maternity_leave_chk',
		'maternity_leave',
		'gaurantor_type',
		'gaurantor_title',
		'gaurantor_name_thi',
		'gaurantor_name_eng',
		'gaurantor_family_name_thai',
		'gaurantor_family_name_end',
		'guarantor_office_name',
		'guarantor_address',
		'guarantor_building',
		'guarantor_sub_district',
		'guarantor_district',
		'guarantor_road',
		'guarantor_city',
		'guarantor_zip',
		'guarantor_salary',
		'guarantor_amount',
		'guarantor_state_id',
		'guarantor_country_id',
		'guarantor_document' */
		
		
    ];
	
	public function getStateByCountryId($country_id)
	{
		$regionManager = RegionManager::getInstance();
		return $regionManager->getStateByCountryId($country_id);
	}
}
