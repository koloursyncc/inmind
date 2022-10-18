<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Components\PriceManager;
class Price extends Model
{
    use HasFactory;
	
	protected $table = 'price';
	
    protected $fillable = [
		'product_id',
		'total_cost',
		'currency_type'
	];
	
	/* public function getProductSupplierBySupplierId($product_id, $id)
	{
		//return $product_id.' '.$id;
		$supplierManagerObj = SupplierManager::getInstance();
		return $supplierManagerObj->getProductSupplierBySupplierId($product_id, $id);
	} */
}
