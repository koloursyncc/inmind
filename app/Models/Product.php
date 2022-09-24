<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
	
    protected $fillable = [
		'name',
		'code',
		'brand_id',
		'main_image_id',
		'color',
		'barcode',
		'type',
		'dimension_width',
		'dimension_depth',
		'dimension_height',
		'package_width',
		'package_depth',
		'package_height',
		'gross_kg',
		'cbm',
		'net_height'
	];
}
