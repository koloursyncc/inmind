<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategoryDetails extends Model
{
    
    use HasFactory;

    protected $table = 'expense_category_details';
    
    public $timestamps = false;

    protected $fillable = [
        'id', 'expense_category','expense_description'
        ];
}
