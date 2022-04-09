<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsCategories extends Model
{
    use HasFactory;
    protected $table = 'productscategories';

    protected $fillable = [
        'products_id',
        'categories_id'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
