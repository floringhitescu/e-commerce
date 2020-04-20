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
                <div class="logo">Beauty Pro
                    <ul>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Cart</a></li>
                    </ul>
                </div>
            </div>
            <div class="hero container">
                <div class="hero copy">
                    <h1>Beauty Pro</h1>
                    <p>Set the standards for others, treat yourself with Beauty Pro!</p>
                    <div class="hero-buttons">
                        <a href="#" class="button button-white">button 1</a>
                        <a href="#" class="button button-white">button 2</a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="img/banner2.png" alt="banner">
                </div> <!-- End hero-->
            </div>
        </header>
        <div class="featured-section">
            <div class="container">
                <h1 class="text-center">Beauty Pro offers a variety of products...</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore eius et sit vero. Ab alias, aliquid consequatur ea fugiat harum ipsam iusto maxime perferendis placeat provident quo ullam ut, voluptatum.
                </p>
                <div class="text-center button-container">
                    <a href="#">Featured</a>
                    <a href="#">On Sale</a>
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
                <div class="made-with">
                    Coded with <i class="fa fa-heart"> </i> by Florin
                </div>
                <ul>
                    <li>Contact us</li>
                    <li><a href="#" class="fa fa-globe"></a></li>
                    <li><a href="#" class="fa fa-youtube"></a></li>
                    <li><a href="#" class="fa fa-facebook"></a></li>
                </ul>
            </div><!-- end footer-section -->
        </footer>
    </body>
</html>
