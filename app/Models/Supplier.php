<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
	
	protected $table = 'product';
	
	public $timestamps = false;

    protected $fillable = [
        'id', 'product_name', 'product_code','color','bar_code','dimension_width','dimension_depth','dimension_height','package_width','package_depth','package_height'];
}
