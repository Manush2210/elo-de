<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'category_id',
        'images',
        'is_active'
    ];

    protected $casts = [
        'images' => 'array',
        'price' => 'decimal:1',
    ];
}
