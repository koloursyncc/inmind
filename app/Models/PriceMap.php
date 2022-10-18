<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Components\PriceManager;
class PriceMap extends Model
{
    use HasFactory;
	
	protected $table = 'price_map';
	
    protected $fillable = [
		'price_id',
		'type',
		'supplier_product_id',
		'unit_price'
	];
	
}
