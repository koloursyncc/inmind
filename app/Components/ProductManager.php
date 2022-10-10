<?php

namespace App\Components;
use App\Models\Product;
use App\Models\ProductSet;
use App\Components\ImageManager;
class ProductManager
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
		return Product::where('id', $id)->update($params);
	}
	
	public function save($params, $lastInsertId = false)
	{
		$obj = Product::create($params);
		
		if($lastInsertId === true)
		{
			return $obj->id;
		}
		return $obj;
	}
	
	public function saveProductSet($params)
	{
		return ProductSet::create($params);
	}
	
	public function getProductById($id, $status = 1)
	{
		return Product::where('status', $status)->find($id);
	}
	
	public function getProductDataById($id)
	{
		return Product::find($id);
	}
	
	public function getProductSetByProductId($product_id)
	{
		return ProductSet::where('product_id', $product_id)->get();
	}
	
	public function deleteProductSetByProductId($product_id)
	{
		return ProductSet::where('product_id', $product_id)->delete();
	}
	
	public function productHandleById($id = null, $type, $heading)
	{
		$response = ['product' => null, 'images' => [], 'product_set' => [], 'type' => $type, 'heading' => $heading];
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
		
		return $response;
	}
}
