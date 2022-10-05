<?php

namespace App\Models;
use App\Components\RegionManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffAddress extends Model
{
    use HasFactory;
	
	protected $table = 'staffaddres';
	
	public $timestamps = false;
	
	protected $fillable = [
        'staff_id',
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
		'conact_document'
    ];
	
	public function getStateByCountryId($country_id)
	{
		$regionManager = RegionManager::getInstance();
		return $regionManager->getStateByCountryId($country_id);
	}
}
