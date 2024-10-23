
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <link rel="shortcut icon" type="image/png" href="{{ asset('frontend') }}/images/favicon.png">
    <title>Themart - eCommerce HTML5 Template</title>
    <link href="{{ asset('frontend') }}/css/themify-icons.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/flaticon_ecommerce.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/owl.carousel.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/owl.theme.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/slick.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/slick-theme.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/swiper.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/owl.transitions.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/jquery.fancybox.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/odometer-theme-default.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/sass/style.css" rel="stylesheet">
</head>

<body>

    <!-- start page-wrapper -->
    <div class="page-wrapper">
        <!-- start header -->
        <header id="header">
            <!--  start header-middle -->
            <div class="header-middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="#"><img src="{{ asset('frontend') }}/images/logo.svg"
                                        alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <form action="#" class="middle-box">
                                <div class="category">
                                    <select name="service" class="form-control">
                                        <option disabled="disabled" selected="">All Category</option>
                                        @foreach (App\Models\Category::all() as $category)
                                             <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="search-box">
                                    <div class="input-group">
                                        <input type="search" class="form-control"
                                            placeholder="What are you looking for?">
                                        <button class="search-btn" type="submit"> <i class="fi flaticon-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="middle-right">
                                <ul>
                                    <li><a href="compare.html"><i class="fi flaticon-right-and-left"></i><span>Compare</span></a>
                                    </li>
                                    <li><a href="login.html"><i class="fi flaticon-user-profile"></i><span>Login</span></a></li>
                                    <li>
                                        <div class="header-wishlist-form-wrapper">
                                            <button class="wishlist-toggle-btn"> <i class="fi flaticon-heart"></i>
                                                <span class="cart-count">3</span></button>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="mini-cart">
                                            <button class="cart-toggle-btn"> <i class="fi flaticon-add-to-cart"></i>
                                                <span class="cart-count">2</span></button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  end header-middle -->
            <div class="wpo-site-header">
                <nav class="navigation navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 d-lg-none dl-block">
                                <div class="mobail-menu">
                                    <button type="button" class="navbar-toggler open-btn">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar first-angle"></span>
                                        <span class="icon-bar middle-angle"></span>
                                        <span class="icon-bar last-angle"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-6 col-sm-5 col-6 d-block d-lg-none">
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="index.html"><img src="{{ asset('frontend') }}/images/logo.svg"
                                            alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-3">
                                <div class="header-shop-item">
                                    <button class="header-shop-toggle-btn"><span>Shop By Category</span> </button>
                                    <div class="mini-shop-item">
                                        <ul id="metis-menu">
                                            @foreach (App\Models\Category::all() as $category)
                                                <li class="header-catagory-item">
                                                    <a class="menu-down-{{ App\Models\Subcategory::where('category_id', $category->id)->count() == 0 ? '' : 'arrow' }}"
                                                        href="#">{{ $category->category_name }}</a>
                                                    <ul class="header-catagory-single">
                                                        @foreach (App\Models\Subcategory::where('category_id', $category->id)->get() as $subcategory)
                                                            <li><a
                                                                    href="{{ route('subcategory.product',$subcategory->id) }}">{{ $subcategory->Subcategory_name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-1 col-1">
                                <div id="navbar" class="collapse navbar-collapse navigation-holder">
                                    <button class="menu-close"><i class="ti-close"></i></button>
                                    <ul class="nav navbar-nav mb-2 mb-lg-0">
                                        <li class="menu-item-has-children">
                                            <a href="#">Home</a>
                                        </li>
                                        <li><a href="about.html">About</a></li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Shop</a>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">FAQ</a>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>

                                </div><!-- end of nav-collapse -->
                            </div>

                        </div>
                    </div><!-- end of container -->
                </nav>
            </div>
        </header>
        <!-- end of header -->


        <!-- start of themart-featured-section -->
        <section class="themart-featured-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="wpo-section-title">
                            <h2>Featured Categories</h2>
                        </div>
                    </div>
                </div>
                <div class="featured-categorie-slider owl-carousel">
                    @foreach (App\Models\Category::all() as $category)
                    <div class="featured-item">
                        <div class="images">
                            <img src="{{ asset('uploads/category/') }}/{{ $category->category_img }}" alt="" style="width:80px!important; margin:auto">
                        </div>
                        <div class="text">
                            @if (Str::length($category->category_name)>12)
                                    <a title="{{ $category->category_name }}" href="{{ route('category.product',$category->id) }}">
                                        {{ Str::substr($category->category_name,0,12).'....' }}
                                    </a>
                                @else
                                <a title="{{ $category->category_name }}" href="{{ route('category.product',$category->id) }}">
                                    {{ $category->category_name }}
                                </a>
                                @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- end of themart-featured-section -->

        <!-- start of themart-interestproduct-section -->
        <section class="themart-interestproduct-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="wpo-section-title">
                            <h2>Products Of Your Interest</h2>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="product-item">
                                <div class="image">
                                    <img src="{{ asset('uploads/product/preview/') }}/{{ $product->preview_img }}" alt=""style="width: 60%; margin:auto;">
                                    <div class="tag new">New</div>
                                </div>
                                <div class="text">
                                    <h2> <a title="{{ $product->product_name }}" href="{{ route('product.detail',$product->slug) }}">
                                        @if (strlen($product->product_name)>25)
                                                {{ Str::substr($product->product_name,0,25).'....' }}
                                            </a>
                                        @else
                                            {{ $product->product_name }}
                                        </a>
                                        @endif
                                    </h2>
                                    <div class="rating-product">
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <span>130</span>
                                    </div>
                                    <div class="price">
                                        <span class="present-price">&#2547;{{ $product->after_discount }}</span>
                                        <del class="old-price">&#2547;{{ $product->price }}</del>
                                    </div>
                                    <div class="shop-btn">
                                        <a class="theme-btn-s2" href="{{ route('product.detail',$product->slug) }}">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="more-btn">
                            <a class="theme-btn-s2" href="#">View All</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of themart-interestproduct-section -->

        {{-- <!-- start of wpo-site-footer-section -->
        <footer class="wpo-site-footer">
            <div class="wpo-upper-footer">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="widget about-widget">
                                <div class="logo widget-title">
                                    <img src="{{ asset('frontend') }}/images/logo-2.svg" alt="blog">
                                </div>
                                <p>Elit commodo nec urna erat morbi at hac turpis aliquam.
                                    In tristique elit nibh turpis. Lacus volutpat ipsum convallis tellus pellentesque
                                    etiam.</p>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-instagram"></i>
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="widget link-widget">
                                <div class="widget-title">
                                    <h3>Contact Us</h3>
                                </div>
                                <div class="contact-ft">
                                    <ul>
                                        <li><i class="fi flaticon-mail"></i>themart@gmail.com</li>
                                        <li><i class="fi flaticon-phone"></i>(208) 555-0112 <br>(704) 555-0127</li>
                                        <li><i class="fi flaticon-pin"></i>4517 Washington Ave. Manchter,
                                            Kentucky 495</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col col-xl-3 col-lg-2 col-md-6 col-sm-12 col-12">
                            <div class="widget link-widget">
                                <div class="widget-title">
                                    <h3>Popular</h3>
                                </div>
                                <ul>
                                    <li><a href="product.html">Men</a></li>
                                    <li><a href="product.html">Women</a></li>
                                    <li><a href="product.html">Kids</a></li>
                                    <li><a href="product.html">Shoe</a></li>
                                    <li><a href="product.html">Jewelry</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="widget instagram">
                                <div class="widget-title">
                                    <h3>Instagram</h3>
                                </div>
                                <ul class="d-flex">
                                    <li><a href="project-single.html"><img src="{{ asset('frontend') }}/images/instragram/1.jpg"
                                                alt=""></a></li>
                                    <li><a href="project-single.html"><img src="{{ asset('frontend') }}/images/instragram/2.jpg"
                                                alt=""></a></li>
                                    <li><a href="project-single.html"><img src="{{ asset('frontend') }}/images/instragram/4.jpg"
                                                alt=""></a></li>
                                    <li><a href="project-single.html"><img src="{{ asset('frontend') }}/images/instragram/3.jpg"
                                                alt=""></a></li>
                                    <li><a href="project-single.html"><img src="{{ asset('frontend') }}/images/instragram/4.jpg"
                                                alt=""></a></li>
                                    <li><a href="project-single.html"><img src="{{ asset('frontend') }}/images/instragram/1.jpg"
                                                alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- end container -->
            </div>
            <div class="wpo-lower-footer">
                <div class="container">
                    <div class="row">
                        <div class="col col-xs-12">
                            <p class="copyright"> Copyright &copy; 2023 Themart by <a href="index.html">wpOceans</a>.
                                All
                                Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end of wpo-site-footer-section --> --}}



    </div>
    <!-- end of page-wrapper -->

    <!-- All JavaScript files
    ================================================== -->
    <script src="{{ asset('frontend') }}/js/jquery.min.js"></script>
    <script src="{{ asset('frontend') }}/js/bootstrap.bundle.min.js"></script>
    <!-- Plugins for this template -->
    <script src="{{ asset('frontend') }}/js/modernizr.custom.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery.dlmenu.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery-plugin-collection.js"></script>
    <!-- Custom script for this template -->
    <script src="{{ asset('frontend') }}/js/script.js"></script>
</body>
</html>
