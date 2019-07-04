<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Product;

class ProductController extends Controller
{
    //
    public function Detail(Request $request,$id){
        //$product = array('product' => []);

        $product = Product::with("attributes")->find($id);//::where('id', '=', $id)->with("attributes")->first();;
        $this->UpdateViews($id);
        return response($product, 200)
        ->header('Content-Type', 'application/json')
        ->header('Access-Control-Allow-Origin', '*');
    }

    private function UpdateViews($id){
        //$product = array('product' => []);

        $product=Product::where('id', '=', $id)->first();

       // Si existe
        if($product!=NULL){
            // sumamos una nueva visita
            $views=0;
            $views=$product->total_saw+1;

            $product->total_saw = $views;
            // Guardamos en base de datos
            $product->save();
        }
    }
}
