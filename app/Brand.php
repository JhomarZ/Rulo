<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Brand extends Model
{
    //
    protected $table="product_brand";

    protected $appends =['total_products'];

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }

    public function getTotalProductsAttribute()
    {
        return $this->products()->count();
    }
}
