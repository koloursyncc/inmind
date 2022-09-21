<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'name',
        'iso3',
        'iso2',
		'numeric_code',
        'phone_code',
        'capital',
		'currency',
        'currency_name',
        'currency_symbol',
		'tld',
        'native',
        'region',
		'subregion',
        'timezones',
        'latitude',
		'longitude'
    ];
}
