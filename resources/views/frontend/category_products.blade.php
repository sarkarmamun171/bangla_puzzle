
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
                                <a class="navbar-brand" href="index.html"><img src="{{ asset('frontend') }}/images/logo.svg"
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

            <!-- end page-title -->
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
                                                                    href="#">{{ $subcategory->Subcategory_name }}</a>
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
        <section class="wpo-page-title">
            <h2 class="d-none">Hide</h2>
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="index.html">Home</a></li>
                                <li>Recently Viewed</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <section class="themart-interestproduct-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="wpo-section-title">
                            <h2>{{ $categories->category_name }}</h2>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="row">
                        @foreach ($category_products as $category_product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="product-item">
                                <div class="image">
                                    <img src="{{ asset('uploads/product/preview/') }}/{{ $category_product->preview_img }}" alt="" width="70">
                                    <div class="tag new">New</div>
                                </div>
                                <div class="text">
                                    <h2><a href="product-single.html">{{ $category_product->product_name }}</a></h2>
                                    <div class="rating-product">
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <span>130</span>
                                    </div>
                                    <div class="price">
                                        <span class="present-price">{{ $category_product->after_discount }}</span>
                                        <del class="old-price">{{ $category_product->price }}</del>
                                    </div>
                                    <div class="shop-btn">
                                        <a class="theme-btn-s2" href="product.html">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="more-btn">
                            <a class="theme-btn-s2" href="product.html">Load More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of themart-interestproduct-section -->
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
