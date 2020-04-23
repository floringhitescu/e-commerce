<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use Session;
use Stripe\Stripe;

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
            $totalPriceWithShipping = $totalPrice +5;
            return view('checkout', compact('suggestedProducts', 'products', 'totalPrice', 'totalQty', 'totalPriceWithShipping'));
        }
    }

    public function checkout(Request $request)
    {
        if (!Session::has('cart')){
            return redirect()->route('shop')->with('error', 'You have nothing in your cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_QMqNSJoQxDnuofbuaPkIPyX600ZhumW9Td');


        try {
            $customer = \Stripe\Customer::create([
                'email' => 'beautyproecom@gmail.com',
                'source'  => $request->input('stripeToken'),
            ]);


            $charge = \Stripe\Charge::create(array(
                'amount'        => $cart->totalPrice * 100,
                'customer'      => $customer->id,
                'currency'      => 'gbp',
                'description'   => "Charge for customer ". auth()->user()->email,

            ));
        } catch (Exception $e){
            return redirect()->back()->with('error', 'Something went wrong!' . $e->getMessage());
        }

        auth()->user()->orders()->create([
            'amount' => $cart->totalPrice,
            'payment_id' => $charge->id,
            'items' => serialize($cart),
        ]);

        Session::forget('cart');
        return redirect()->route('confirm')->with('success', 'Payment successfully taken, tank you!');
    }


    public function confirm()
    {
        if(!Session::has('success')){
            return redirect()->route('home');
        }
        return view('confirmation');
    }
}
