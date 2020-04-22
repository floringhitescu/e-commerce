@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="linking mt-n5 ">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <div class="container d-flex py-2">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('shop') }}">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> {{ $product->name }}</li>
                    </div>
                </ol>
                @include('partials.alert')
            </nav>
        </div>
    </div>

    <div class="my-5 pt-3">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <img id="product-image" class="img-fluid rounded mx-auto d-block" src="{{ '../'.$product->img() }}" alt="">
                </div>
            </div>
            <div class="col-md-5 mt-4">
                <div class="container pr-5 ">
                    <h1>{{ $product->name }}</h1>
                    <h2>{{ $product->details }}</h2>
                    <h1>{{ $product->price() }}</h1>
                    <div class="text-justify">
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="">
                        <a href="{{ route('add.product', $product) }}" class="addToCart button">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5 py-3 ">
            <h1>Our suggestions...</h1>
            @include('partials.suggestions')
        </div>
    </div>
@endsection
