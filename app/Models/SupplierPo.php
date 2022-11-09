<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierPo extends Model
{
    use HasFactory;
	
	protected $table = 'supplier_po';
	
	//public $timestamps = false;
	
	protected $fillable = [
		'brand_id',
        'supplier_id',
		'date',
		'status',
		'code'
    ];
	
}
