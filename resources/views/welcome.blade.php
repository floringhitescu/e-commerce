
@extends('layouts.app')
@section('content')
    <header class="mt-n5">
        <div class="hero container mt-5">
            <div class="hero-copy">
                <h1>CSS Grid Example</h1>
                <p>A practical example of using CSS Grid for a typical website layout.</p>
                <div class="hero-buttons">
                    <a href="#" class="button button-white">Button 1</a>
                    <a href="#" class="button button-white">Button 2</a>
                </div>
            </div> <!-- end hero-copy -->

            <div class="hero-image">
                <img src="img/macbook-pro-laravel.png" alt="hero image">
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
                        <a href="#"><img src="img/pngwave.png" alt="perfume"></a>
                        <a href="#"><div class="product-name">{{ $product->name }}</div></a>
                        <div class="product-price">{{ '£'.$product->price }}</div>
                    </div>
                @endforeach
            </div><!-- end products-->
            <div class="text-center button-container">
                <a href="#" class="button">View more products</a>
            </div>
        </div><!-- end container -->
    </div><!-- end feature section -->
    <div class="blog-section">
        <div class="container">
            <h1 class="text-center">Forum Blog</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aut commodi dolorum eius expedita illo impedit ipsa maiores nam nisi nobis porro quae quis tempora, vero. Aperiam atque eius quis!</p>

            <div class="blog-posts">
                <div class="blog-post">
                    <a href="#"><img src="img/blog1.png" alt=""></a>
                    <a href="#">
                        <h2 class="blog-title">Blog Post Title</h2>
                    </a>
                    <div class="blog-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, in.dipisicing elit. Autem,
                    </div>
                </div>
                <div class="blog-post">
                    <a href="#"><img src="img/blog2.png" alt=""></a>
                    <a href="#">
                        <h2 class="blog-title">Blog Post Title</h2>
                    </a>
                    <div class="blog-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, in.dipisicing elit. Autem,
                    </div>
                </div>
                <div class="blog-post">
                    <a href="#"><img src="img/blog3.png" alt=""></a>
                    <a href="#">
                        <h2 class="blog-title">Blog Post Title</h2>
                    </a>
                    <div class="blog-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, in.dipisicing elit. Autem,
                    </div>
                </div>
            </div> <!-- end blog posts -->
        </div><!-- end container -->
    </div> <!-- end blog-section -->

@endsection

