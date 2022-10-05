<?php

namespace App\Models;
use App\Components\RegionManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Components\StaffManager;
class StaffLabourContracts extends Model
{
    use HasFactory;
	
	protected $table = 'staff_labour_contracts';
	
	public $timestamps = false;
	
	protected $fillable = [
		'staff_id',
        'working_pay',
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
		
		'contract_home_address',
		'contract_home_building',
		'contract_home_sub_distric',
		'contract_home_district',
		'contract_home_road',
		'contract_home_city',
		'contract_home_state',
		'contract_home_zip',
		'contract_home_country',
		'contract_home_address_check',
		'contract_address',
		'contract_building',
		'contract_sub_district',
		'contract_district',
		'contract_road',
		'contract_city',
		'contract_state',
		'contract_zip_code',
		'contract_country',
		
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
		'guarantor_document'
    ];
	
	public function getStateByCountryId($country_id)
	{
		$regionManager = RegionManager::getInstance();
		return $regionManager->getStateByCountryId($country_id);
	}
	
	public function getStaffLabourContactImage($staff_labour_contract_id)
	{
		
		$StaffManager = StaffManager::getInstance();
		return $StaffManager->getStaffLabourContactImage($staff_labour_contract_id);
	}
}
