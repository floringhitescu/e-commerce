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
                    <div class="row py-5 p-4 bg-white rounded shadow-lg">
                        <div class="col-lg-6">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                            <div class="p-4">
                                <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
                                <ul class="list-unstyled mb-4">
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>{{ '£'.$totalPrice }}</strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling</strong><strong>£5.00</strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax</strong><strong>£0.00</strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                        <h5 class="font-weight-bold">{{ '£'.$totalPriceWithShipping }}</h5>
                                    </li>
                                </ul>
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
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Shipping and Card Details</div>
                            <div class="p-4">

                                <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                                    @csrf
                                    {{-- Name--}}
                                    <div class="input-group mb-4 border rounded-pill p-2">
                                        <input type="text" name="name" id="name" placeholder="Shipping Name" aria-describedby="button-addon3" class="form-control border-0" required minlength="3">
                                    </div>
                                    {{-- Address--}}
                                    <div class="input-group mb-4 border rounded-pill p-2">
                                        <input type="text" id="address" placeholder="Shipping address" aria-describedby="button-addon3" class="form-control border-0" required minlength="10">
                                    </div>
                                    {{-- card name--}}
                                    <div class="input-group mb-4 border rounded-pill p-2">
                                        <input type="text" id="card-name" placeholder="Card Holder Name" aria-describedby="button-addon3" class="form-control border-0" required minlength="3">
                                    </div>
                                    {{-- card number--}}
                                    <div class="input-group mb-4 border rounded-pill p-2">
                                        <input type="text" id="card-number" placeholder="Card Number" aria-describedby="button-addon3" class="form-control border-0" required minlength="16" maxlength="16">
                                    </div>
                                    {{-- card year and month--}}
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="input-group mb-4 border rounded-pill p-2">
                                                <input type="text" id="card-expiry-month" placeholder="Month" aria-describedby="button-addon3" class="form-control border-0" required maxlength="2" minlength="2">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group mb-4 border rounded-pill p-2">
                                                <input type="text" id="card-expire-year" placeholder="Year" aria-describedby="button-addon3" class="form-control border-0" required maxlength="4" minlength="4">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group mb-4 border rounded-pill p-2">
                                                <input  type="text" id="card-cvc" placeholder="CVC" aria-describedby="button-addon3" class="form-control border-0" required maxlength="3" minlength="3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mr-n2 mt-3 d-flex justify-content-between">
                                        <a href="{{ route('shop') }}" class="button">Cancel</a>
                                        <button type="submit" class="button bg-secondary text-white">Checkout</button>
                                    </div>
                                </form>

                                <div id="charge-error" class="text-danger {{ !Session::has('error') ? 'hidden' : '' }}">
                                    {{Session::get('error')}}
                                </div>
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
@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ asset('js/checkout.js') }}"></script>
@endsection


