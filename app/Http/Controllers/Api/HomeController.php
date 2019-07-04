<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    //
    public function PageData(){
        $homePage = array('destacados_venta' => [],'destacados' => [],'destacados_moda' => []);
        $productos= Product::all();
        $homePage["destacados_venta"]=$productos;
        $homePage["destacados"]=$productos;
        $homePage["destacados_moda"]=$productos;

        return response($homePage, 200)
        ->header('Content-Type', 'application/json')
        ->header('Access-Control-Allow-Origin', '*');
    }


}
