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
		'1_20_contain',
		'1_20_contain_net_weight',
		'1_20_contain_net_gross_weight',
		'1_40_contain',
		'1_40_contain_net_weight',
		'1_40_contain_net_gross_weight',
		'1_40_hq_contain',
		'1_40_hq_net_weight',
		'1_40_hq_net_weight',
		'gross_kg',
		'cbm',
		'net_height'
	];
}
