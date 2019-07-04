<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//AUTH
Route::post('/register','Api\AuthController@register');
Route::post('/login','Api\AuthController@login');

//RULO - MODA
Route::get('/moda-home','Api\ModaController@HomePage');
Route::get('/moda-search','Api\ModaController@SearchPage');

//Route::get('/home-moda','Api\HomeController@PageHomeModa');


//RULO - PROFILE
Route::get('/profile-user/{id}','Api\ProfileController@userPage');
Route::get('/profile-anuncios/{id}','Api\ProfileController@anunciosPage');
Route::get('/profile-favorites/{id}','Api\ProfileController@favoritesPage');


//RULO - PRODUCTO
Route::get('/product/{id}','Api\ProductController@Detail');


//RULO - CLOTHES
Route::get('/clothes-home', 'Api\ClothesController@ModaPage');
