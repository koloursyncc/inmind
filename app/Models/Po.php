<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Components\PriceManager;
class Po extends Model
{
    use HasFactory;
	
	protected $table = 'po';
	
    protected $fillable = [
		'brand_id',
		'type_of_customer',
		'title_option',
		'customer_name',
		'family_name',
		'head_office_address',
		'head_office_building',
		'head_office_sub_district',
		'head_office_district',
		'head_office_road',
		'head_office_country',
		'head_office_state',
		'head_office_city',
		'head_office_zip_code',
		'delivery_address_checked',
		'delivery_address',
		'delivery_building',
		'delivery_sub_district',
		'delivery_district',
		'delivery_road',
		'delivery_country',
		'delivery_state',
		'delivery_city',
		'delivery_zip_code',
		'title',
		'last_deposit',
		'document_no',
		'date',
		'issue_date',
		'order_by_store',
		'order_by_channel',
		'sale_person',
		
		'bank_title',
		'bank_name',
		'bank_branch',
		'bank_transaction_date',
		'bank_account_number',
		'bank_beneficiary_name',
		'bank_transaction_time',
		
		'status'
	];
	
	public function getProductSupplierBySupplierId($product_id, $id)
	{
		//return $product_id.' '.$id;
		$supplierManagerObj = SupplierManager::getInstance();
		return $supplierManagerObj->getProductSupplierBySupplierId($product_id, $id);
	}
}
