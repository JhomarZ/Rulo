<?php

namespace App\Http\Controllers;

use App\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Brand;
use App\ProductCategory;
use App\ProductGroup;
use App\ProductSubCategory;
use App\ProductFile;
use App\UserFavorite;
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


        //dd($request->all());
        //dd(Attribute::all());

        //Filtros
        $brandsFilter=[]; $attributes=[]; $priceFilter=""; $productName="";
        $groupId=null;$categoryId=null;$subcategoryId=null;

        $brands=[]; $groups=[]; $categories=[]; $products=[]; $filtrosAttributes=[];

        $productName= $request->has('p')?$request->p:"";

        $group=$group==""?"Hombre":$group;

        if($group!=""){
            $rec=ProductGroup::select('id')->where('group' ,'=' ,$group)->get();
            $groupId= $rec->count()>0 ? $rec[0]->id:null;
        }
        if($category!=""){
            $rec=ProductCategory::select('id')->where('category' ,'=' ,$category)->get();
            $categoryId= $rec->count()>0 ? $rec[0]->id:null;
        }
        if($subcategory!=""){
            $rec=ProductSubCategory::select('id')->where('subcategory' ,'=' ,$subcategory)->get();
            $subcategoryId= $rec->count()>0 ? $rec[0]->id:null;
        }
        if($request->has('sorted')){
            $sort=$request->sorted;
        }

        $brandsId=[];
        if($request->has('brand')){
            $brandsFilter=$request->brand;
            $brands=Brand::whereIn("brand",$request->brand)->get();
            foreach($brands as $bran)
            $brandsId[]=$bran->id;
        }

        $minimo="";$maximo="";
        if($request->has('price')){
            $priceFilter=$request->price;
            $minimo=Str::before($priceFilter,"-");
            $maximo=Str::after($priceFilter,"-");
        }

            //OBTENEMOS LAS CATEGORIAS SEGUN EL RESULTADO
                $categories=$this->getCategories( $request,$groupId);

                foreach ($categories as $cat){
                        $cat->subcategories=null;
                        if($categoryId == $cat->id){
                            $cat->subcategories=$this->getSubCategories($request,$groupId,$categoryId);//$this->getSubCategories($request,$groupId,$categoryId);
                        }
                }
            // FIN OBTENEMOS LAS CATEGORIAS SEGUN EL RESULTADO

            //OBTENEMOS LOS BRANDS SEGUN EL RESULTADO
                $brands=$this->getBrands($request,$groupId,$categoryId,$subcategoryId);
             //FIN OBTENEMOS LOS BRANDS SEGUN EL RESULTADO



            //OBTENEMOS LOS ATTRIBUTOS DE LOS PRODUCTOS
                $attributes=$this->getAttibutes($request,$groupId,$categoryId,$subcategoryId);
            //FIN DE  LAS SUBCATEGORIAS


                $products=  DB::table('product')
                ->select('product.id','product.short_name','product.info_brief','product.category_id','product_category.category','product.price_list',
                'product.price_sale','product.total_saw','product.total_sales','product.discount','seller.id as sellerId','seller.commercial_name')
                ->join('seller', 'seller.id', '=', 'product.seller_id')
                ->join('product_category', 'product_category.id', '=','product.category_id')
                ->leftJoin('product_subcategory', 'product_subcategory.id', '=','product.subcategory1_id')
                ->leftJoin('product_attribute', 'product_attribute.product_id', '=', 'product.id')
                ->distinct("product.id")
                ->when($categoryId!=null, function ($query) use ($categoryId) {
                    return $query->where('product.category_id','=',$categoryId);
                })
                ->when($subcategoryId!=null, function ($query) use ($subcategoryId) {
                    return $query->where('product.subcategory1_id','=',$subcategoryId);
                })
                ->when($productName, function ($query) use ($productName) {
                    return $query->where('product.short_name','like','%'.$productName.'%');
                  })
                ->when($brandsId!=[], function ($query) use ($brandsId) {
                    return $query->whereIn('product.brand_id',$brandsId);
                })
                ->when($minimo!="", function ($query) use ($minimo) {
                    return $query->where('product.price_sale',">=",$minimo);
                })
                ->when($maximo!="", function ($query) use ($maximo) {
                    return $query->where('product.price_sale',"<=",$maximo);
                });

                //FILTRANDO LOS ATTRIBUTOS
                foreach ($attributes as $attr){
                    if($request->has($attr->attribute)){
                      //  $filtrosAttributes->item="";
                      //  $filtrosAttributes->value="";
                        $products=$products->where("product_attribute.attribute_id","=",$attr->id);
                        $products=$products->where("product_attribute.value","=",Input::get($attr->attribute,''));
                    }
                }
                //FIN FILTRANDO LOS ATTRIBUTOS
                //->where("attribute.","","")

                $products=$products->when($sort!="", function ($query) use ($sort) {
                        if($sort=="DESC" || $sort=="ASC"){
                            return $query->orderBy('product.price_sale',$sort);
                        }
                        return $query->orderBy('product.'.$sort,"DESC");
                });

                $products=$products->paginate(8);


        $groups= ProductGroup::all();



        //AGREGAR LOS FILES AL PRODUCTO
        foreach ($products as $pro){
            $pro->userFavorite=null;
            $files=ProductFile::where("product_id","=",$pro->id)->get();
            $pro->files=$files;
            if(!auth()->guest()){  //AGREGAR SI EL PRODUCTO ES FAVORITO
                $fav=UserFavorite::where("user_id","=",auth()->user()->id)
                ->where("product_id","=",$pro->id)->first();
                $pro->userFavorite=$fav;
            }
        }

        return view('moda.filters')
        ->with('brands',$brands)
        ->with('groups',$groups)
        ->with('categories',$categories)
        ->with('group',$group)
        ->with('category',$category)
        ->with('subcategory',$subcategory)
        ->with('filtrosAttributes',$filtrosAttributes)
        ->with('filtroBrands',$brandsFilter)
        ->with('priceFilter',$priceFilter)
        ->with('attributes',$attributes)
        ->with('p',$productName)
        ->with('products',$products);
    }


    private function getCategories(Request $request,$groupId=null){

        $categories=  DB::table('product')
        ->select('product_category.id','product_category.category', DB::raw('count(*) as total'))
        ->join('product_category', 'product_category.id', '=', 'product.category_id')
        ->when($groupId!=null, function ($query) use ($groupId) {
            return $query->where('product.group_id','=',$groupId);
        })
        ->groupBy('product_category.id','product_category.category')->get();
        return $categories;
    }

    private function getSubCategories(Request $request,$groupId=null,$categoryId=null){

        $subCategories=  DB::table('product')
        ->select('product_subcategory.id','product_subcategory.subcategory', DB::raw('count(*) as total'))
        ->join('product_subcategory', 'product_subcategory.id', '=', 'product.subcategory1_id')
        ->when($groupId!=null, function ($query) use ($groupId) {
            return $query->where('product.group_id','=',$groupId);
        })
        ->when($categoryId!=null, function ($query) use ($categoryId) {
            return $query->where('product.category_id','=',$categoryId);
        })
        ->groupBy('product_subcategory.id','product_subcategory.subcategory')->get();
        return $subCategories;
    }


    private function getBrands(Request $request,$groupId=null,$categoryId=null,$subCategoryId=null){

        $brands=  DB::table('product')
        ->select('product_brand.id','product_brand.brand', DB::raw('count(*) as total'))
        ->join('product_brand', 'product_brand.id', '=', 'product.brand_id')
        ->when($groupId!=null, function ($query) use ($groupId) {
            return $query->where('product.group_id','=',$groupId);
        })
        ->when($categoryId!=null, function ($query) use ($categoryId) {
            return $query->where('product.category_id','=',$categoryId);
        })
        ->when($subCategoryId!=null, function ($query) use ($subCategoryId) {
            return $query->where('product.subcategory1_id','=',$subCategoryId);
        })
        ->groupBy('product_brand.id','product_brand.brand')->get();
        return $brands;
    }

    private function getAttibutes(Request $request,$groupId=null,$categoryId=null,$subCategoryId=null){

        $attributes=  DB::table('product')
        ->select('attribute.id','attribute.attribute', DB::raw('count(*) as total'))
        ->join('product_attribute', 'product_attribute.product_id', '=', 'product.id')
        ->join('attribute', 'attribute.id', '=', 'product_attribute.attribute_id')
        ->where('attribute.show_filter',"=","1")
        ->when($groupId!=null, function ($query) use ($groupId) {
            return $query->where('product.group_id','=',$groupId);
        })
        ->when($categoryId!=null, function ($query) use ($categoryId) {
            return $query->where('product.category_id','=',$categoryId);
        })
        ->when($subCategoryId!=null, function ($query) use ($subCategoryId) {
            return $query->where('product.subcategory1_id','=',$subCategoryId);
        })
        ->groupBy('attribute.id','attribute.attribute')->get();

        foreach ($attributes as $attr){

            $attrValues=  DB::table('product')
            ->select('product_attribute.value', DB::raw('count(*) as total'))
            ->join('product_attribute', 'product_attribute.product_id', '=', 'product.id')
            ->join('attribute', 'attribute.id', '=', 'product_attribute.attribute_id')
            ->where('attribute.show_filter',"=","1")
            ->where('product_attribute.attribute_id',"=",$attr->id)
            ->when($groupId!=null, function ($query) use ($groupId) {
                return $query->where('product.group_id','=',$groupId);
            })
            ->when($categoryId!=null, function ($query) use ($categoryId) {
                return $query->where('product.category_id','=',$categoryId);
            })
            ->when($subCategoryId!=null, function ($query) use ($subCategoryId) {
                return $query->where('product.subcategory1_id','=',$subCategoryId);
            })
            ->groupBy('product_attribute.value')->get();

            $attr->items=$attrValues;
        }

        return $attributes;
    }

}
