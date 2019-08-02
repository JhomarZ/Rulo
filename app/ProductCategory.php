<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductSubCategory;
use App\ProductGroup;
class ProductCategory extends Model
{
    //
    protected $table="product_category";

    protected $appends =['total_products'];

    public function subCategories()
    {
        return $this->hasMany(ProductSubCategory::class, 'category_id', 'id');
    }

    /*
    public function group()
    {
        return $this->belongsTo(ProductGroup::class, 'group_id');
    } */


    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function getTotalProductsAttribute()
    {
        return $this->products()->count();
    }

}
