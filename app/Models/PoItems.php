<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Components\PriceManager;
class PoItems extends Model
{
    use HasFactory;
	
	protected $table = 'po_items';
	
	public $timestamps = false;
	
    protected $fillable = [
		'po_id',
		'po_invoice_id',
		'product_id',
		'unit_price',
		'checked',
		'qty',
		'price'
	];
	
}
