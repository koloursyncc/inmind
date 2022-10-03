<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id', 'name', 'family', 'title','currency','incoterm','place_of_delivery_destination','credit_term_days','from','incoterm_type','contact_person','email', 'bank_name', 'bank_address','swift','account_number','beneficiary_name','beneficiary_address','type','invoice'
		];
}
