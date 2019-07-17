<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //
    public function Detail(Request $request,$nombre){

        $products= Product::where("short_name","=",$nombre)
        ->with("attributes.attribute")
        ->with("brand")
        ->with("group")
        ->with("category")
        ->with("subCategory")
        ->with("seller")
        ->first();

        //dd($products->attributes[0]->attribute->attribute);
        //return;

        return view('product.detail')
        ->with('product',$products);
    }

}
