<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffImage extends Model
{
    use HasFactory;
	
	protected $table = 'staff_images';
	
	public $timestamps = false;
	
	protected $fillable = [
        'staff_id',
        'document',
        'type'
    ];
}
