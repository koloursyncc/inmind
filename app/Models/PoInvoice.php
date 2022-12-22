<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Components\PriceManager;
class PoInvoice extends Model
{
    use HasFactory;
	
	protected $table = 'po_invoice';
	
    protected $fillable = [
		'po_id',
		'cust_id',
		'total_amount',
		'discount',
		'vat',
		'pay_this_time',
		'status'
	];
	
}




