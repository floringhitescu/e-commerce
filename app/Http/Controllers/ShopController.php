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

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->FirstOrFail();
        $suggestedProducts = Product::where('category_id', $product->category_id)->inRandomOrder()->take(3)->get();
        return view('product', compact('product', 'suggestedProducts'));
    }

    public function search(Request $request)
    {
        $query = $request->search;

        $products = Product::where('name', 'like', "%$query%")
            ->orWhere('details', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->paginate(10);


        $categories = Category::where('name', 'like', "%$query%")->get();

        $totalResults = $products->count()+$categories->count();

        return view('search', compact('products', 'categories', 'totalResults'));
    }
}
