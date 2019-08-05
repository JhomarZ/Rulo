<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Brand;
use App\ProductCategory;
use App\ProductGroup;
use App\ProductSubCategory;
use Illuminate\Support\Facades\DB;



class ModaController extends Controller
{
    //
    public function Index(){
        $brands=[]; $groups=[]; $categories=[]; $featured=[]; $favorites=[];
        $subCategories=[];

        $favorites= Product::orderBy('total_sales', 'desc')
        ->with("files")
        ->take(8)
        ->get();

        $featured= Product::orderBy('total_saw', 'desc')
        ->with("files")
        ->take(8)
        ->get();

        $groups= ProductGroup::all();


        $categories= ProductCategory::get();
        $brands= Brand::all();

        //dd($categories[0]->group);
        //return;

        return view('moda.index')
        ->with('brands',$brands)
        ->with('groups',$groups)
        ->with('categories',$categories)
        ->with('featured',$featured)
        ->with('favorites',$favorites);
    }

    public function Filters(Request $request,$group="",$category="",$subcategory=""){
        $sort="total_saw";
        //Filtros
        $brandsFilter=[]; $priceFilter=""; $productName="";
        //return;
        $brands=[]; $groups=[]; $categories=[]; $products=[]; $filtros=[];

        $productName= $request->has('p')?$request->p:"";


        if($request->has('sorted')){
            $sort=$request->sorted;
        }
        $group=$group==""?"Hombre":$group;

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

            //OBTENEMOS LAS CATEGORIAS SEGUN EL RESULTADO
            $categories=Product::query()->when($group!="", function ($query) use ($group) {
                $pg=ProductGroup::where('group','=',$group)->first();
                if($pg!=null)
                return $query->where('group_id','=',$pg->id);
            })
            ->select("category_id", DB::raw("count(*) as total"))->groupBy("category_id")
            ->get();

            foreach ($categories as $cat){
                $pc=ProductCategory::find($cat->category_id);
                $cat["category"]=$pc->category;
            }
            // FIN OBTENEMOS LAS CATEGORIAS SEGUN EL RESULTADO

            //OBTENEMOS LOS BRANDS SEGUN EL RESULTADO
            $brands=Product::query()->when($group!="", function ($query) use ($group) {
                $pg=ProductGroup::where('group','=',$group)->first();
                if($pg!=null)
                return $query->where('group_id','=',$pg->id);
            })
            ->when($category!="", function ($query) use ($category) {
                $cat=ProductCategory::where('category','=',$category)->first();
                if($cat!=null)
                return $query->where('category_id','=',$cat->id);
            })
            ->select("brand_id", DB::raw("count(*) as total"))->groupBy("brand_id")
            ->get();
            foreach ($brands as $brand){
                $br=Brand::find($brand->brand_id);
                $brand["brand"]=$br->brand;
            }
             //FIN OBTENEMOS LOS BRANDS SEGUN EL RESULTADO

                $products=Product::query()->when($group!="", function ($query) use ($group) {
                    $pg=ProductGroup::where('group','=',$group)->first();
                    if($pg!=null)
                    return $query->where('group_id','=',$pg->id);
                })
                ->when($category!="", function ($query) use ($category) {
                    $cat=ProductCategory::where('category','=',$category)->first();
                    if($cat!=null)
                    return $query->where('category_id','=',$cat->id);
                })
                ->when($productName, function ($query) use ($productName) {
                    return $query->where('short_name','like','%'.$productName.'%');
                  })
                ->when($brandsId!=[], function ($query) use ($brandsId) {
                    return $query->whereIn('brand_id',$brandsId);
                })
                ->when($minimo!="", function ($query) use ($minimo) {
                    return $query->where('price_sale',">",$minimo);
                })
                ->when($maximo!="", function ($query) use ($maximo) {
                    return $query->where('price_sale',"<",$maximo);
                })
                ->with("seller","category","files");
                //->orderBy('id',request("sorted","DESC"))

                if(!auth()->guest()){
                    $products->with("userFavorite");
                }


        $products=$products->when($sort!="", function ($query) use ($sort) {
            if($sort=="DESC" || $sort=="ASC"){
                return $query->orderBy('price_sale',$sort);
            }
            return $query->orderBy($sort,"DESC");
        });

        $products=$products->paginate(8);

        //dd($products[0]->files); return;

        $groups= ProductGroup::all();



        $filtros["brands"]=$brandsFilter;

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
        ->with('p',$productName)
        ->with('products',$products);
    }


}
