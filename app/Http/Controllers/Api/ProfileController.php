<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use App\UserFavorites;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfileController extends Controller
{
    //

    public function userPage(Request $request,$id){
        $usuario=User::find($id);
        return response($usuario, 200)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Content-Type', 'application/json');
    }

    public function anunciosPage(Request $request,$id){
        $products= Product::all();
        return response($products, 200)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Content-Type', 'application/json');
    }

    public function favoritesPage(Request $request,$id){
        $products= UserFavorites::where('user_id', $id)
        ->with('product')
        ->orderBy('id')->get();
        return response($products, 200)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Content-Type', 'application/json');
    }
}
