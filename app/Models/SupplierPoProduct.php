<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierPoProduct extends Model
{
    use HasFactory;
	
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
	
}
