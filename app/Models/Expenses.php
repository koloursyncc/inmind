<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    protected $table = 'expenses';
    
    //public $timestamps = false;

    protected $fillable = [
        'id','bank_payer','to_payee','pay_brand','supplier_type','expense_category','expense_description','name','family_name','mobile','amount','currency'
        ];
}
