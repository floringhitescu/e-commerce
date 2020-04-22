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
        $products = Product::inRandomOrder()->take(12)->get();
        return view('shop', compact('categories', 'products'));
    }

    public function category(Request $request, $categoryName)
    {
        $category = Category::where('name', $categoryName)->first();
        $products = Product::where('category_id', $category->id)->paginate(12);
        $categories = Category::all();
        return view('shop', compact('categories', 'products', 'categoryName'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->FirstOrFail();
        $suggestedProducts = Product::where('category_id', $product->category_id)->inRandomOrder()->take(3)->get();
        return view('product', compact('product', 'suggestedProducts'));
    }
}
