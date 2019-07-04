<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductAttribute;

class Product extends Model
{
    //
    protected $table="product";

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class, 'product_id', 'id');
    }
}
