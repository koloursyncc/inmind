<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Components\SupplierManager;
use App\Components\ProductManager;
class SupplierPoProduct extends Model
{
	protected $table = 'supplier_po_product';
	
	public $timestamps = false;
	
	protected $fillable = [
		'supplier_po_id',
        'product_id',
		'unit_price',
		'qty',
		'price',
		'total_price'
    ];
	
	public function getProductDataById($product_id)
	{
		//return $product_id;
		$productManagerObj = ProductManager::getInstance();
		return $productManagerObj->getProductDataById($product_id);
	}
}
