<?php

namespace App\Components;
use App\Models\Product;
use App\Models\ProductSet;
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
}
