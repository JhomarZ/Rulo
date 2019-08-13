<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//Home
//Route::get('/', 'HomeController@Index')->name('home');
Route::get('/', 'ModaController@Index')->name('home');

Route::get('/home', 'ModaController@Index')->name('home'); // API


//Rulo - Auth - Login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Auth Social
Route::get('auth/redirect/{provider}', 'SocialController@redirect');
  Route::get('callback/{provider}', 'SocialController@callback');
//Route::get('auth/{provider}', 'SocialController@redirect');
//Route::get('auth/{provider}/callback', 'SocialController@callback');


//Rulo - Profile
Route::get('perfil/{id}', 'ProfileController@userPage')->name('perfil-usuario');
Route::post('perfil/{id}', 'ProfileController@updateUser');
Route::get('/perfil/favoritos/{id}', 'ProfileController@favoritesPage');
//Route::get('/perfil/usuario', 'ProfileController@userPage')->name('perfil-usuario');



//Rulo - Auth - Register
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('welcome', 'Auth\RegisterController@showWelcomePage')->name('welcome');//->middleware('auth');
Route::post('register', 'Auth\RegisterController@register');


//RULO - MODA
Route::get('/moda', 'ModaController@Index')->name('moda'); // API
Route::get('/moda-search', 'ModaController@Filters')->name('modafilters');
Route::get('/moda-search/{group?}/{category?}/{subcategory?}', 'ModaController@Filters')->name('modafilters');

//RULO - PRODUCT
Route::get('p/{name?}', 'ProductController@Detail')->name('productDetail');
Route::post('p/favorite-save', 'ProductController@favoriteSave')->name('product.fav.save');
Route::post('p/favorite-delete/{id}', 'ProductController@favoriteDelete')->name('product.fav.delete');


//Rulo - SELLER
Route::get('/seller/{id}', 'SellerController@index')->name('seller');

//Route::get('/perfil/usuario', 'ProfileController@userPage')->name('perfil-usuario');



/*
Route::get('/', 'HomeController@Home')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/
