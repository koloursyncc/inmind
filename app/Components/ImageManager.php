<?php

namespace App\Components;
use App\Models\Image;
class ImageManager
{
	public static $_instance;

    public static function getInstance()
	{
        if ( !(self::$_instance instanceof self) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
	
	public function save($params)
	{
		return Image::create($params);
	}
	
	public function getImageByProductId($product_id)
	{
		return Image::where('product_id', $product_id)->get();
	}
}
