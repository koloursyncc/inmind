<?php

namespace App\Components;
use App\Models\Price;
use App\Models\PriceMap;
use App\Models\Product;
use App\Components\RegionManager;
use App\Components\ProductManager;
use DB;
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
		//where('status', $status)->
		return Price::find($id);
	}
	
	public function getPriceDataById($id)
	{
		return Price::find($id);
	}
	
	public function priceHandleById($id = null, $type, $heading)
	{
		$regionManager = RegionManager::getInstance();
		$productManager = ProductManager::getInstance();
		$countries = $regionManager->countryList();
		$products = $productManager->getProducts();
		
		$response = ['obj' => null, 'countries' => $countries, 'products' => $products, 'type' => $type, 'details' => array()];
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
		
		$supplieProducts = [];
		$suppliertype = array(
			1 => 'Manufacturer',
			2 => 'Agent',
			3 => 'Shipping',
			4 => 'Transport',
			5 => 'W/H and Lessor',
			6 => 'Packaging',
		);
		
		foreach($suppliertype as $suppliek => $suppliev)
		{
			$data = DB::table('supplier_products')
			->select('supplier_products.id', 'supplier_products.unit_price', 'supplier_products.supplier_type', 'suppliers.supplier_name')
			->join('suppliers', function($join) {
				$join->on('supplier_products.supplier_id', '=', 'suppliers.id');
			})
			
			->where('supplier_products.product_id', $productObj->product_id)
			->where('suppliers.status', 1)
			->where('suppliers.supplier_type', $suppliek)
			->get();
			$supplieProducts[$suppliek] = $data;
		}
		
		$response['details'] = $supplieProducts;
		
		return $response;
	}
}
