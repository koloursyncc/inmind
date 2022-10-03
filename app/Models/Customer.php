<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id', 'name', 'family', 'title','currency','incoterm','place_of_delivery_destination','credit_term_days','from','incoterm_type','contact_person','email', 'bank_name', 'bank_address','swift','account_number','beneficiary_name','beneficiary_address','type','invoice',
		
		'head_office_address',
		'head_office_building',
		'head_office_sub_district',
		'head_office_district',
		'head_office_road',
		'head_office_city',
		'head_office_zipcode',
		'head_office_state_id',
		'head_office_country_id',
		'delivery_check',
		'delivery_address',
		'delivery_building',
		'delivery_sub_district',
		'delivery_district_id',
		'delivery_road',
		'delivery_city',
		'delivery_zipcode',
		'delivery_state_id',
		'delivery_country_id'
		
		];
}
