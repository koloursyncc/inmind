<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSet extends Model
{
    use HasFactory;
	
	public $timestamps = false;
	
	protected $table = 'product_set';
	
    protected $fillable = [
        'product_id',
		'kind_of_product',
		'qty'
	];
}
