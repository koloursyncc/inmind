<?php

namespace App\Models;
use App\Components\RegionManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddressDocument extends Model
{
    use HasFactory;
	
	

    protected $fillable = [
        'customer_id',
		'address',
		'building',
		'country_id',
		'state_id',
		'district_id',
		'sub_district',
		'zipcode'
	];
	
	public function getStateByCountryId($country_id)
	{
		$regionManager = RegionManager::getInstance();
		return $regionManager->getStateByCountryId($country_id);
	}
}
