@extends('layouts.app')

@section('title', 'Beauty Shopping Cart')

@section('content')
    <div class="linking mt-n5 ">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <div class="container d-flex py-2">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('shop') }}">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Shopping Cart</li>
                    </div>
                </ol>
            </nav>
        </div>
    </div>

    <div class="my-5 pt-3">

        @if(!Session::has('cart'))

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-lg mb-5">
                        <h1>Your shopping cart is empty</h1>
                    </div>
                </div>
            </div>

        <div class="text-center mt-5 py-3 ">
            <h1>Our suggestions...</h1>
            @include('partials.suggestions')
        </div>
        @else
            <div class="pb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 p-5 bg-white rounded shadow-lg mb-5">
                            <div class="">
                                <h1>Your shopping cart has {{ $cart->totalQty }} item(s)</h1>
                            </div>
                            <!-- Shopping cart table -->
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="border-0 bg-light text-left">
                                            <div class="p-2 px-3 text-uppercase">Product</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Price</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Quantity</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Remove</div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="">
                                        @forelse( $cart->items  as $product)
                                            <tr>
                                                <th scope="row" class="border-0 text-left">
                                                    <div class="p-2">
                                                        <img src="../../img/pngwave.png" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                        <div class="ml-3 d-inline-block align-middle">
                                                            <h5 class="mb-0"> <a href="{{ $product['item']->path() }}" class="text-dark d-inline-block align-middle"> {{ Str::limit($product['item']['name'], 40) }} </a></h5><span class="text-muted font-weight-normal font-italic d-block">Category:
                                                                <a href="{{ $product['item']->category->path() }}">{{ $product['item']->category->name }}</a></span>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td class="border-0 align-middle"><strong>{{ '£'.$product['price'] }}</strong></td>
                                                <td class="border-0 align-middle"><strong>{{ $product['qty'] }}</strong></td>
                                                <td class="border-0 align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                        @empty
                                            <h1>Your cart seems to be empty</h1>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- End -->
                        </div>
                    </div>

                    <div class="row py-5 p-4 bg-white rounded shadow-lg">
                        <div class="col-lg-6">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                            <div class="p-4">
                                <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
                                <ul class="list-unstyled mb-4">
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>$390.00</strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling</strong><strong>$10.00</strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax</strong><strong>$0.00</strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                        <h5 class="font-weight-bold">$400.00</h5>
                                    </li>
                                </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
                            <div class="p-4">
                                <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
                                <div class="input-group mb-4 border rounded-pill p-2">
                                    <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0">
                                    <div class="input-group-append border-0">
                                        <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply coupon</button>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
                            <div class="p-4">
                                <p class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</p>
                                <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="text-center mt-5 py-3 ">
                <h1>Our suggestions...</h1>
                @include('partials.suggestions')
            </div>
        @endif
    </div>
@endsection
