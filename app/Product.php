<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductAttribute;
use App\Brand;
use App\Seller;
class Product extends Model
{
    //
    protected $table="product";

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class, 'product_id', 'id');

    }
    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    public function group()
    {
        return $this->belongsTo(ProductGroup::class, 'group_id');
    }
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
    public function subCategory()
    {
        return $this->belongsTo(ProductSubCategory::class, 'subcategory1_id');
    }
}
