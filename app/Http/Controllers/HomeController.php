<?php

namespace App\Http\Controllers;

use App\ServiceCategory;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $featuredProducts = Product::where('is_featured', true)->take(3)->get();
        $service_categories = ServiceCategory::take(3)->get();

        return view('welcome', compact('featuredProducts' ,'service_categories'));
    }
}
