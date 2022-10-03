<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;
	
	protected $table = 'installments';
	
	public $timestamps = false;

    protected $fillable = [
        'type_id', 'installment_1', 'installment_2'
	];
}
