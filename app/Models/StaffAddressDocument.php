<?php

namespace App\Models;
use App\Components\RegionManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffAddressDocument extends Model
{
    use HasFactory;
	
	protected $table = 'staff_address_documents';
	
	public $timestamps = false;
	
	protected $fillable = [
        'staff_id',
        'address',
        'building',
		'sub_district',
        'district',
        'road',
		'city',
        'state_id',
		'zip',
        'country_id',
        'contact_address_as_home',
		'document'
    ];
	
	public function getStateByCountryId($country_id)
	{
		$regionManager = RegionManager::getInstance();
		return $regionManager->getStateByCountryId($country_id);
	}
}
