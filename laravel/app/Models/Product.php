<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Allow mass assignment
    protected $fillable = [
        'name',
        'price',
        'active',
        'category_id',
        'discounted'
    ];
}
