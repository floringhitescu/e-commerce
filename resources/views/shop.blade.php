@extends('layouts.app')

@section('content')

    <div class="mt-n5">
        <div>
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <div class="container d-flex py-2">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </div>
                    </ol>
                </nav>
                @include('partials.alert')
            </div>

            <div class="container mt-5 pt-4">
                <div class="row">
                    <div class="col-md-4 mt-3">
                        <h2 class="font-weight-bold mb-3">By Category</h2>
                        <div class="categories-list">
                            <ul>
                                @if(isset($categoryName))
                                    @foreach($categories as $category)
                                        <li class="mb-3  {{ ( strtoupper($categoryName) == strtoupper($category->name)) ? 'border-bottom logo text-right pr-5' : '' }}"><a href="{{ route('category.shop', $category->name) }}">{{ ucfirst($category->name) }}</a></li>
                                    @endforeach
                                @else
                                    @foreach($categories as $category)
                                        <li class="mb-3"><a href="{{ route('category.shop', $category->name) }}">{{ ucfirst($category->name) }}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h1 class="border-bottom border-dark ">Laptops</h1>
                        <div class="featured-section">
                            <div class="container">

                                <div class="products text-center">
                                    @foreach($products as $product)
                                        <div class="product">
                                            <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ $product->img() }}" alt="perfume"></a>
                                            <a href="{{ route('shop.show', $product->slug) }}"><div class="product-name">{{ $product->name }}</div></a>
                                            <div class="product-price">{{ '£'.$product->price }}</div>
                                        </div>
                                    @endforeach
                                </div><!-- end products-->

                            </div><!-- end container -->
                           @if(isset($categoryName))
                                <div class="d-flex justify-content-center my-5">
                                    {{ $products->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
