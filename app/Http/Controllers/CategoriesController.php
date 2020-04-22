<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{


    public function index($categoryName)
    {
        $category = Category::where('name', $categoryName)->first();
        $products = Product::where('category_id', $category->id)->paginate(12);
        $categories = Category::all();
        return view('shop', compact('categories', 'products', 'categoryName'));
    }
}
