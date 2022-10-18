<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Components\SupplierManager;
class Product extends Model
{
    use HasFactory;
	
    protected $fillable = [
		'name',
		'code',
		'brand_id',
		'parent_product_id',
		'main_image_id',
		'color',
		'barcode',
		'type',
		'product_in_set',
		'dimension_width',
		'dimension_depth',
		'dimension_height',
		'package_width',
		'package_depth',
		'package_height',
		'contain_1_20',
		'contain_1_20_net_weight',
		'contain_1_20_net_gross_weight',
		'contain_1_40',
		'contain_1_40_net_weight',
		'contain_1_40_net_gross_weight',
		'hq_1_40_contain',
		'hq_1_40_net_weight',
		'hq_1_40_net_gross_weight',
		'gross_kg',
		'cbm',
		'net_height',
		'status',
	];
	
	public function getProductSupplierBySupplierId($product_id, $id)
	{
		//return $product_id.' '.$id;
		$supplierManagerObj = SupplierManager::getInstance();
		return $supplierManagerObj->getProductSupplierBySupplierId($product_id, $id);
	}
}
