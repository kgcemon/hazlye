<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'title',
        'sku',
        'thumbnail',
        'slug',
        'regular_price',
        'sale_price',
        'buy_price',
        'short_description',
        'long_description',
        'category_id',
        'images',
        'stock',
        'discount',
        'active',
    ];
}
