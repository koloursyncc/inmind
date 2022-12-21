<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierType extends Model
{
    use HasFactory;

    protected $table = 'supplier_type';
    
    //public $timestamps = false;

    protected $fillable = [
        'id','supplier_type'
        ];
}
