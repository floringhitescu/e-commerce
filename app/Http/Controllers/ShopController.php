<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::inRandomOrder()->take(8)->get();
        return view('shop', compact('categories', 'products'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->FirstOrFail();
        $suggestedProducts = Product::where('category_id', $product->category_id)->inRandomOrder()->take(3)->get();
        return view('product', compact('product', 'suggestedProducts'));
    }
}
