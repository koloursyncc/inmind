<?php

        namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
	
	protected $table = 'product';
	
	public $timestamps = false;

    protected $fillable = [
        'id', 'product_name', 'product_code','supplier','xz','cd','se','vf'
    ];
}
