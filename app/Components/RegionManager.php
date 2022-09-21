<?php

namespace App\Components;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
class RegionManager
{
	public static $_instance;

    public static function getInstance() {
        if ( !(self::$_instance instanceof self) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
	
	public function countryList(){
		return Country::get();
	}
	
	public function getStateByCountryId($country_id)
	{
		return State::where('country_id', $country_id)->get();
	}
}
