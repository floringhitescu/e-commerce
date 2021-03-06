
@extends('layouts.app')
@section('title', 'Beauty Pro Shop')
@section('content')
    <header class="mt-n5">
        <div class="hero container mt-5 pt-2">
            <div class="hero-copy pt-5">

                <p class="display-4"><span class="miniLogo">Beauty Pro</span> has all you need to make your life beautiful.</p>

                <div class="hero-buttons">
                    <a href="{{ route('category.shop', strtolower($suggestion->name)) }}" class="button button-white">Order a new {{ $suggestion->name }}</a>
                </div>
            </div> <!-- end hero-copy -->

            <div class="hero-image">
                <img src="img/banner3.png" alt="hero image">
            </div>
        </div> <!-- end hero -->
    </header>
    <div class="featured-section">
        <div class="container">
            <h1 class="text-center">Beauty Pro offers a variety of products...</h1>
            <p class="featured-description">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore eius et sit vero. Ab alias, aliquid consequatur ea fugiat harum ipsam iusto maxime perferendis placeat provident quo ullam ut, voluptatum.
            </p>
            <div class="text-center button-container">
                <a href="#" class="button">Featured</a>
                <a href="#" class="button">On Sale</a>
            </div>
            <div class="products text-center">
                @foreach($products as $product)
                    <div class="product">
                        <a href="{{ $product->path() }}"><img src="{{ $product->img() }}" alt="perfume"></a>
                        <a href="{{ $product->path() }}"><div class="product-name">{{ $product->name }}</div></a>
                        <div class="product-price">{{ '£'.$product->price }}</div>
                    </div>
                @endforeach
            </div><!-- end products-->
            <div class="text-center button-container">
                <a href="{{ route('shop') }}" class="button">View more products</a>
            </div>
        </div><!-- end container -->
    </div><!-- end feature section -->
    <div class="blog-section" id="about">
        <div class="container">
            <h1 class="text-center">Beauty articles</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aut commodi dolorum eius expedita illo impedit ipsa maiores nam nisi nobis porro quae quis tempora, vero. Aperiam atque eius quis!</p>

            <div class="blog-posts">
                @forelse($posts as $post)
                    <div class="blog-post ">
                        <a href="{{ route('post.show', $post) }}"><img class="img-fluid t" src="{{ $post->image() }}" alt=""></a>
                        <p class="mt-3" >
                            <a href="{{ route('post.show', $post) }}" style="color: #1f6fb2"><h2 class="blog-title ">{{ Str::limit($post->title, 100) }}</h2></a>
                        </p>
                        <p>posted on: {{ $post->created_at->format('d M, yy') }} by {{ $post->user->name }} </p>

                    </div>
                    @empty
                    <div class="blog-post">
                        <a href="{{ route('post.show', 1) }}"><img src="img/blog1.png" alt=""></a>
                        <a href="#">
                            <h2 class="blog-title">Blog Post Title coming soon</h2>
                        </a>
                        <div class="blog-description">
                            The place holder of a blog post description coming soon
                        </div>
                    </div>
                    <div class="blog-post">
                        <a href="#"><img src="img/blog2.png" alt=""></a>
                        <a href="#">
                            <h2 class="blog-title">Blog Post Title coming soon</h2>
                        </a>
                        <div class="blog-description">
                            The place holder of a blog post description coming soon
                        </div>
                    </div>
                    <div class="blog-post">
                        <a href="#"><img src="img/blog3.png" alt=""></a>
                        <a href="#">
                            <h2 class="blog-title">Blog Post Title coming soon</h2>
                        </a>
                        <div class="blog-description">
                            The place holder of a blog post description coming soon
                        </div>
                    </div>
                @endforelse

            </div> <!-- end blog posts -->
        </div><!-- end container -->
    </div> <!-- end blog-section -->

@endsection

