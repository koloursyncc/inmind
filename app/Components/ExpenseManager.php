<?php

namespace App\Components;
use App\Models\Expenses;
use DB;

class ExpenseManager
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
		return Expenses::where('id', $id)->update($params);
	}
	
	public function save($params, $lastInsertId = false)
	{
		$obj = Expenses::create($params);
		
		if($lastInsertId === true)
		{
			return $obj->id;
		}
		return $obj;
	}
	
	
	public function getProductById($id, $status = 1)
	{
		return Expenses::find($id); //where('status', $status)->
	}
	
	public function getProducts($status = 1)
	{
		return Expenses::where('status', $status)->get();
	}
	
	public function getProductDataById($id)
	{
		return Expenses::find($id);
	}
	/*
	public function deleteProductSetByProductId($product_id)
	{
		return ProductSet::where('product_id', $product_id)->delete();
	}
	*/
	/*public function productHandleById($id = null, $type, $heading)
	{
		$response = ['product' => null, 'images' => [], 'product_set' => [], 'type' => $type, 'heading' => $heading, 'colors' => \App\Models\Color::get(), 'brands' => \App\Models\Brand::get(), 'products' => \App\Models\Product::select('id', 'name')->get()];
		if($id == null)
		{
			return $response;
		}
		
		$productObj = $this->getProductById($id, 1);
		
		if($productObj == null)
		{
			$response['type'] = 'save';
			$response['heading'] = 'Add New Product';
			return $response;
		}
		
		$imageManager = ImageManager::getInstance();
		$images = $imageManager->getImageByProductId($id);
		$response['product'] = $productObj;
		$response['images'] = $images;
		$response['product_set'] = $this->getProductSetByProductId($id);
		//$response['colors'] = \App\Models\Color::get();
		//$response['brands'] =  \App\Models\Brand::get();
		
		return $response;
	}*/
	
	/*public function getProductByCode($code, $status = 1)
	{
		return Product::where('code', $code)->where('status', $status)->first();
	}*/
	
	/*public function getproductdetail($id, $type)
	{
		$productObj = false;
		$productObj = $this->getProductById($id, 1);
		
		if(!$productObj)
		{
			return ['status' => 'false'];
		}
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
			->select('supplier_products.id', 'supplier_products.unit_price', 'supplier_products.supplier_type', 'suppliers.supplier_name', 'supplier_products.currency_id')
			->join('suppliers', function($join) {
				$join->on('supplier_products.supplier_id', '=', 'suppliers.id');
			})
			
			->where('supplier_products.product_id', $productObj->id)
			->where('suppliers.status', 1)
			->where('suppliers.supplier_type', $suppliek)
			->get();
			$supplieProducts[$suppliek] = $data;
		}
		
		return [
			'status' => 'success',
			'code' => $productObj->code,
			'supp' => $supplieProducts,
			'product_image' => DB::table('images')->where('product_id', $productObj->id)->get(),
			'product' => $productObj,
			'type' => $type
		];
	}*/
}
