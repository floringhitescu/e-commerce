<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Beauty Pro') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    </head>
    <body>
        <header>
        <div class="top-nav container">
            <div class="logo">CSS Grid Example</div>
            <ul>
                <li><a href="#">Shop</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Cart</a></li>
            </ul>
        </div> <!-- end top-nav -->

        <div class="hero container">
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
                    <div class="product">
                        <a href="#"><img src="img/pngwave.png" alt="perfume"></a>
                        <a href="#"><div class="product-name">Perfume</div></a>
                        <div class="product-price">£441.4</div>
                    </div>
                    <div class="product">
                        <a href="#"><img src="img/pngwave.png" alt="perfume"></a>
                        <a href="#"><div class="product-name">Perfume</div></a>
                        <div class="product-price">£441.4</div>
                    </div>
                    <div class="product">
                        <a href="#"><img src="img/pngwave.png" alt="perfume"></a>
                        <a href="#"><div class="product-name">Perfume</div></a>
                        <div class="product-price">£441.4</div>
                    </div>
                    <div class="product">
                        <a href="#"><img src="img/pngwave.png" alt="perfume"></a>
                        <a href="#"><div class="product-name">Perfume</div></a>
                        <div class="product-price">£441.4</div>
                    </div>
                    <div class="product">
                        <a href="#"><img src="img/pngwave.png" alt="perfume"></a>
                        <a href="#"><div class="product-name">Perfume</div></a>
                        <div class="product-price">£441.4</div>
                    </div>
                    <div class="product">
                        <a href="#"><img src="img/pngwave.png" alt="perfume"></a>
                        <a href="#"><div class="product-name">Perfume</div></a>
                        <div class="product-price">£441.4</div>
                    </div>
                    <div class="product">
                        <a href="#"><img src="img/pngwave.png" alt="perfume"></a>
                        <a href="#"><div class="product-name">Perfume</div></a>
                        <div class="product-price">£441.4</div>
                    </div>
                    <div class="product">
                        <a href="#"><img src="img/pngwave.png" alt="perfume"></a>
                        <a href="#"><div class="product-name">Perfume</div></a>
                        <div class="product-price">£441.4</div>
                    </div>
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

        <footer>
            <div class="footer-content container">
                <div class="made-with">Made with <i class="fa fa-heart"></i> by Andre Madarang</div>
                <ul>
                    <li>Follow Me:</li>
                    <li><a href="#"><i class="fa fa-globe"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div> <!-- end footer-content -->
        </footer>
    </body>
</html>
