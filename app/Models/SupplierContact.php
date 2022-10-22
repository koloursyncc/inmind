<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierContact extends Model
{
    use HasFactory;

	protected $table = 'supplier_contact';
	
	public $timestamps = false;

    protected $fillable = [
        'supplier_id', 'name','family_name','position','mobile','email','remark'
		];
}
