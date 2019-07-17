<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;
use App\Brand;
use App\ProductCategory;
use App\ProductGroup;
use App\ProductSubCategory;


class ModaController extends Controller
{
    //
    public function Index(){
        $brands=[]; $groups=[]; $categories=[]; $featured=[]; $favorites=[];
        $subCategories=[];

        $favorites= Product::orderBy('total_saw', 'desc')
        ->take(8)
        ->get();

        $featured= Product::orderBy('total_saw', 'desc')
        ->take(8)
        ->get();

        $groups= ProductGroup::all();


        $categories= ProductCategory::with("group")->get();
        $brands= Brand::all();

        return view('moda.index')
        ->with('brands',$brands)
        ->with('groups',$groups)
        ->with('categories',$categories)
        ->with('featured',$featured)
        ->with('favorites',$favorites);
    }

    public function Filters(Request $request,$group="",$category="",$subcategory=""){

        //Filtros
        $brandsFilter=[]; $priceFilter="";
        //return;
        $brands=[]; $groups=[]; $categories=[]; $products=[]; $filtros=[];
        /*
            $filtros=array();
            array_push($filtros,$group);
            array_push($filtros, array('filtro' => "venta",'url' => "/venta/url"));
            array_push($filtros, array('filtro' => "miraflores",'url' => "/miraflores/url"));
        */

        $brandsId=[];
        if($request->has('brand')){
            $brandsFilter=$request->brand;

            $brands=Brand::whereIn("brand",$request->brand)->get();

            foreach($brands as $bran)
            $brandsId[]=$bran->id;
            //$products=$products->whereIn("brand_id",$brandsId);
        }

        $minimo="";$maximo="";
        if($request->has('price')){
            $priceFilter=$request->price;
            $minimo=Str::before($priceFilter,"-");
            $maximo=Str::after($priceFilter,"-");
        }

        $products=Product::query()->when($brandsId!=[], function ($query) use ($brandsId) {
            return $query->whereIn('brand_id',$brandsId);
        })
        ->when($minimo!="", function ($query) use ($minimo) {
            return $query->where('price_sale',">",$minimo);
        })
        ->when($maximo!="", function ($query) use ($maximo) {
            return $query->where('price_sale',"<",$maximo);
        })
        ->with("seller")
        ->take(8)
        ->get();
/*
        $products=$products->with("seller")
            ->take(8)
            ->get();
*/
        $groups= ProductGroup::all();
        $categories= ProductCategory::all();
        $brands= Brand::all();

        $filtros["brands"]=$brandsFilter;
       // dd($filtros);
       // return;
        return view('moda.filters')
        ->with('brands',$brands)
        ->with('groups',$groups)
        ->with('categories',$categories)
        ->with('group',$group)
        ->with('category',$category)
        ->with('subcategory',$subcategory)
        ->with('filtros',$filtros)
        ->with('filtroBrands',$brandsFilter)
        ->with('priceFilter',$priceFilter)
        ->with('products',$products);
    }

}
