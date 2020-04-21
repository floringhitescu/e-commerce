<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $categories = ['laptop', 'perfume'];
        $products = Product::inRandomOrder()->take(8)->get();
        return view('shop', compact('categories', 'products'));
    }
}
