<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Components\PriceManager;
use DB;
class Price extends Model
{
    use HasFactory;
	
	protected $table = 'price';
	
    protected $fillable = [
		'product_id',
		'total_cost',
		'currency_type'
	];
	
	public function getProductById($id)
	{
		//return $product_id.' '.$id;
		return DB::table('products')->where('id', $id)->first();
	}
}
