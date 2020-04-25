<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $suggestion = Category::inRandomOrder()->take(1)->get()[0];
        $products = Product::inRandomOrder()->take(8)->get();
        $posts = Post::inRandomOrder()->take(3)->get();
        return view('welcome', compact('products', 'suggestion', 'posts'));
    }
}
