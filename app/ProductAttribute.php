<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Attribute;

class ProductAttribute extends Model
{
    //
    protected $table="product_attribute";



    public function attribute()
    {
        return $this->hasOne(Attribute::class, 'id', 'attribute_id');
    }



}
