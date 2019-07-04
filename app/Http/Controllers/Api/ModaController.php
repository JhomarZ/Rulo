<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use App\Brand;
use App\ProductCategory;
use App\ProductGroup;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ModaController extends Controller
{
    //
    public function HomePage(){
        $homePage = array('destacados_venta' => [],'destacados' => [],'groups'=> [],'categories'=> [],'brands'=> []);
        $productosDestacados= Product::orderBy('total_saw', 'desc')
        //->take(10)
        ->get();

        $productosMasVendidos= Product::orderBy('total_sales', 'desc')
        //->take(10)
        ->get();

        $groups= ProductGroup::all();
        $categories= ProductCategory::all();
        $brands= Brand::all();

        $homePage["destacados_venta"]=$productosMasVendidos;
        $homePage["destacados"]=$productosDestacados;
        $homePage["groups"]=$groups;
        $homePage["categories"]=$categories;
        $homePage["brands"]=$brands;

        return response($homePage, 200)
        ->header('Content-Type', 'application/json')
        ->header('Access-Control-Allow-Origin', '*');
    }

    public function SearchPage(){

        $searchPage = array('products' => [],
        'groups' => [],
        'categories'=> [],
        'brands'=> []);

        $productos= Product::all();
        $groups= ProductGroup::all();
        $categories= ProductCategory::with('subCategories')->get();
        $brands= Brand::all();

        $searchPage["products"]=$productos;
        $searchPage["groups"]=$groups;
        $searchPage["categories"]=$categories;
        $searchPage["brands"]=$brands;

        return response($searchPage, 200)
        ->header('Content-Type', 'application/json')
        ->header('Access-Control-Allow-Origin', '*');
    }

}
