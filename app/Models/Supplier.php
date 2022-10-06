<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'supplier_name', 'supplier_type', 'supplier_type','building','sub_district','district','road','city_id','state_id','country_id','package_height', 'zipcode', 'name','family_name','position','mobile','email','remark','bank_name','bank_address', 
		'swift', 'ac_no', 'beneficiary_name', 'beneficiary_address', 'currency', 'incoterm', 'delivery_destination', 'currency', 'delivery_destination',
		'status',
		];
}
