<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Session;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $suggestedProducts = Product::inRandomOrder()->take(3)->get();

        if (!Session::has('cart'))
        {
            $request->session('warning')->flash('warning', 'Your cart is empty, but you can add something at any time!');
            return redirect()->route('shop');
        } else {

            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $products = $cart->items;
            $totalPrice = $cart->totalPrice;
            $totalQty = $cart->totalQty;

            return view('checkout', compact('suggestedProducts', 'products', 'totalPrice', 'totalQty'));
        }
    }
}
