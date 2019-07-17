<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;
use App\Product;

class SellerController extends Controller
{
    //

    public function index(Request $request,$id){

        $filtro="";
        $productoDesc="";

        if($request->has('q')){
            $productoDesc=$request->q;
        }

        $seller=Seller::find($id);
        $products=Product::query()->when($productoDesc!="", function ($query) use ($productoDesc) {
            return $query->where('short_name',"like",'%'.$productoDesc.'%');
        })
        ->where("seller_id","=",$id)
        ->orderBy('id',request("sorted","DESC"))
        ->paginate(8);

        //dd($products->nextPageUrl());
        //return;
        /// dd($products->append(request()->query())->links('pagination.custom')); return;

        return view("seller.index")
        ->with("products",$products)
        ->with("filtro",$productoDesc)
        ->with("seller",$request);
    }
}
