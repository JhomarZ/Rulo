<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductAttribute;
use App\Brand;
use App\Seller;
use App\UserFavorite;
use App\ProductFile;

class Product extends Model
{
    //
    protected $table="product";

    protected $appends = [
        'category_name'
    ];

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

    public function getCategoryNameAttribute()
    {
        return $this->category->category;
    }

    public function subCategory()
    {
        return $this->belongsTo(ProductSubCategory::class, 'subcategory1_id');
    }

    public function userFavorite()
    {
            return $this->hasOne(UserFavorite::class, 'product_id')->where('user_id', (auth()->guest())?0:auth()->user()->id);
    }

    public function files()
    {
            return $this->hasMany(ProductFile::class, 'product_id');
    }
}
