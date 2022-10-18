<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierProduct extends Model
{
    use HasFactory;
	
	protected $table = 'supplier_products';
	
	//public $timestamps = false;

    protected $fillable = [
        'product_id', 'supplier_id', 'unit_price', 'currency_id', 'supplier_type'
		];
}
