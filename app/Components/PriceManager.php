<?php

namespace App\Components;
use App\Models\Price;
use App\Components\RegionManager;
class PriceManager
{
	public static $_instance;

    public static function getInstance()
	{
        if ( !(self::$_instance instanceof self) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
	
	public function update($id, $params)
	{
		return Price::where('id', $id)->update($params);
	}
	
	public function save($params, $lastInsertId = false)
	{
		$obj = Price::create($params);
		
		if($lastInsertId === true)
		{
			return $obj->id;
		}
		return $obj;
	}
	
	/* public function saveProductSet($params)
	{
		return Price::create($params);
	} */
	
	public function getPriceById($id, $status = 1)
	{
		return Price::where('status', $status)->find($id);
	}
	
	public function getPriceDataById($id)
	{
		return Price::find($id);
	}
	
	public function priceHandleById($id = null, $type, $heading)
	{
		$regionManager = RegionManager::getInstance();
		$countries = $regionManager->countryList();
		
		$response = ['obj' => null, 'countries' => $countries];
		if($id == null)
		{
			return $response;
		}
		
		$productObj = $this->getPriceById($id, 1);
		
		if($productObj == null)
		{
			$response['type'] = 'save';
			$response['heading'] = 'Add New Price';
			return $response;
		}
		$response['obj'] = $productObj;
		$response['countries'] = $countries;
		
		return $response;
	}
}
