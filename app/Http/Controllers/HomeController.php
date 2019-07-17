<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bestsellers= Product::where('business_unit_id', '=',1)->orderBy('total_saw', 'desc')
        ->take(8)
        ->get();

        $mostSeen= Product::where('business_unit_id', '=',1)->orderBy('total_saw', 'desc')
        ->take(8)
        ->get();


        return view('home.index')
        ->with('bestsellers',$bestsellers)
        ->with('mostSeen',$mostSeen);
    }
}
