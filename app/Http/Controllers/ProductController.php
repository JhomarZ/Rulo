<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\UserFavorite;

class ProductController extends Controller
{
    //
    public function Detail(Request $request,$nombre){
        $nombre= Str::replaceLast("--","/",$nombre);

        $product= Product::where("short_name","=",$nombre)
        ->with("attributes.attribute")
        ->with("brand")
        ->with("group")
        ->with("files")
        ->with("category")
        ->with("subCategory")
        ->with("seller")
        ->first();

        //dd($products->attributes[0]->attribute->attribute);
        //return;
        $this->addView($product);

        return view('product.detail')
        ->with('product',$product);
    }
    private function addView(Product $product){
        DB::table('product')
            ->where('id', $product->id)
            ->update(['total_saw' => $product->total_saw + 1]);
    }

    public function favoriteSave(Request $request){
       $favorite = new UserFavorite;
        $favorite->user_id = auth()->user()->id;
        $favorite->product_id = request("product_id");
        $favorite->save();
        return back();
    }

    public function favoriteDelete(Request $request,$id){
      //  dd($id); return;
        $favorite = UserFavorite::find($id);
        $favorite->delete();
        //$favorite->save();
         return back();
     }
}
