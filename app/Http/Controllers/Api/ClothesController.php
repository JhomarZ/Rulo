<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use App\Brand;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClothesController extends Controller
{
    //

    public function ModaPage(){

        $homePage = array('brands' => [],'categories' => [],'types' => [],'favorites'=>[],'featured'=>[]);
        $products= Product::all();
        $brands=Brand::all();
        $categories=ProductCategory::all();
        $homePage["favorites"]=$products;
        $homePage["featured"]=$products;
        $homePage["brands"]=$brands;
        $homePage["categories"]=$categories;
        $homePage["types"]=$categories;

        return response($homePage, 200)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Content-Type', 'application/json');
      }

}
