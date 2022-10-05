<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffLabourContractImage extends Model
{
    use HasFactory;
	
	protected $table = 'staff_labour_contract_images';
	
	public $timestamps = false;
	
	protected $fillable = [
		'staff_labour_contract_id',
        'image'
    ];
	
	
}
