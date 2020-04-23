<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

            return view('cart', compact('suggestedProducts', 'products', 'totalPrice', 'totalQty'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addToCart(Request $request, Product $product)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        $request->session('success')->flash('success', "Item added to cart");
        return redirect()->to($product->path());
    }

    public function remove($product)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->remove($product);

        if (count($cart->items)>0){
            Session::put('cart', $cart);
        } else {
            $cart->totalQty = 0;
            $cart->totalPrice = 0;
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    public function empty()
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        Session::forget('cart');
        return redirect()->route('shop')->with('success', 'Cart successfully emptied');
    }

    public function decrease($product)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->decrease($product);
        Session::put('cart', $cart);
        return redirect()->route('cart.index');
    }

    public function increase($product)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->increase($product);
        Session::put('cart', $cart);
        return redirect()->route('cart.index');
    }
}
