<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Seller extends Model
{
    //
    protected $table="seller";

    public function products()
    {
        return $this->hasMany(Product::class, 'seller_id');
    }

}
