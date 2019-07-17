<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class UserFavorites extends Model
{
    //
    protected $table="user_favorite";

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
        //return $this->hasOne(Brand::class, 'id', 'brand_id');
    }
}
