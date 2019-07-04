<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductSubCategory;

class ProductCategory extends Model
{
    //
    protected $table="product_category";

    public function subCategories()
    {
        return $this->hasMany(ProductSubCategory::class, 'category_id', 'id');
    }

}
