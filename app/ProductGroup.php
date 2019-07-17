<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class ProductGroup extends Model
{
    //
    protected $table="product_group";

    protected $appends =['total_products'];

    public function products()
    {
        return $this->hasMany(Product::class, 'group_id', 'id');
    }

    public function getTotalProductsAttribute()
    {
        return $this->products()->count();
    }

}
