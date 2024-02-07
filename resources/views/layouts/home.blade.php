<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Koohen - @yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets/imgs/favicon_128x128.ico')}}">
    <!--Font-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">

    <link href="{{asset('frontend/assets/notifications/notification.css')}}" rel="stylesheet" />

	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/vendors/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/vendor/slick/slick.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('')}}frontend/assets/css/main.css?v=3.4">
    <!--Font-->
    @livewireStyles
</head>

<body>

    <header class="header-area header-style-4 header-height-2">
        <!--Top Header-->
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                            <ul>
                                <li><i class="far fa-phone-alt"></i> <a href="tel:+880 9639 174 502">+880 9639 174 502</a></li>
                                <li><i class="fal fa-envelope"></i><a  href="mailto:info@koohen.com">info@koohen.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--Top Offer Notice-->
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block">
                                <ul>
                                    <li>Get great devices up to 50% off <a href="shop-grid-right.html">View details</a></li>
                                    <li>Supper Value Deals - Save more with coupons</li>
                                    <li>Trendy 25silver jewelry, save up 35% off today <a href="shop-grid-right.html">Shop now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <style>
                        .dropdown:hover>.dropdown-menu {
                            display: block;
                        }

                        .dropdown>.dropdown-toggle:active {
                        /*Without this, clicking will make it sticky*/
                            pointer-events: none;
                        }
                    </style>
                    <!--Top Offer Notice-->
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                            <ul>
                                <li>
                                    <a class="language-dropdown-active" href="{{route('trackorder')}}"> <i class="fi-rs-world"></i> Track My Order</a>
                                </li>
                                <li>
                                    <i class="fi-rs-user"></i>
                                    @auth('customer')
                                        @php
                                        $user = Auth::guard('customer')->user();
                                        $fullName = $user->customer->firstName . ' ' . $user->customer->lastName;
                                        @endphp

                                        <div class="dropdown">
                                            <a class="customer_info dropdown-toggle" href="#"  id="dropdownMenuButton"
                                            data-mdb-toggle="dropdown"
                                            aria-expanded="false">{{ $fullName }}</a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item" href="{{route('customer.dashboard')}}">Profile</a></li>
                                                <li>
                                                    <a class="dropdown-item" href="#" onclick="document.getElementById('logout_form').submit();">Logout</a>
                                                    <form method="post" id="logout_form" action="{{ route('customer.logout') }}">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                          </div>

                                        {{-- <form method="post" action="{{ route('customer.logout') }}">
                                            @csrf
                                            <button type="submit">Logout</button>
                                        </form> --}}
                                    @else
                                        {{-- Show login/register links --}}
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#login">Log In / </a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#signup"> Sign Up</a>
                                    @endauth
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Top Header-->
        {{-- <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="index.html"><img src="{{asset('')}}frontend/assets/imgs/Kohen_Logo_Main.png" alt="logo"></a>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="header-bottom header-bottom-bg-color sticky-bar" style="padding-top: 10px; padding-bottom: 4px;">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="index.html"><img src="{{asset('')}}frontend/assets/imgs/Kohen_Logo_Main.png" alt="logo"></a>
                    </div>
                    <div class="logo logo-width-1 d-block d-sm-none">
                        <a href="index.html"><img src="{{asset('')}}frontend/assets/imgs/Kohen_Logo_Main.png" alt="logo"></a>
                    </div>

                    <div class="header-nav d-none d-lg-flex" id="header-nav">
                        <!--Catagory-->
                        {{-- @include('frontend.include.catagory') --}}
                        <!--Catagory-->
                        <!--Main Menu Bar-->
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li>
                                        <a class="{{ request()->is('/') ? 'active' : '' }}" href="{{('/')}}">Home</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('shop') ? 'active' : '' }}" href="{{route('shop')}}">Shop</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('aboutus') ? 'active' : '' }}" href="{{route('aboutus')}}">About Us</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('contactus') ? 'active' : '' }}" href="{{route('contactus')}}">Contact Us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!--Main Menu Bar-->
                    </div>
                    <style>
                        // Search Toggle
                        .header {
                        border-bottom: 1px solid #ccc;
                        padding: 10px 0;
                        position: relative;
                        }
                        .header .search-toggle {
                            appearance: none;
                            background: transparent;
                            border: none;
                            color: #333;
                            cursor: pointer;
                            display: inline-block;
                            font-size: 22px;
                            font-weight: bold;
                            line-height: 50px;
                            width: 50px;
                            height: 50px;
                            /* border: 1px solid #fff; */
                            /* border-radius: 50%; */
                            text-align: center;
                            vertical-align: middle;
                        }
                        .header #form-open {
                            opacity: 1;
                            position: absolute;
                            top: 10px;
                            right: 70px;
                            transition: all 0.4s ease;
                        }
                        .header #form-open.hidden {
                        opacity: 0;
                        }
                        .header .search-holder {
                            display: none;
                            overflow: hidden;
                            height: 60px;
                            width: 700px;
                            position: absolute;
                            top: 3px;
                            right: 95px;
                            z-index: 99999;
                        }
                        .header .search-form {
                        opacity: 0;
                        width: 180px;
                        position: absolute;
                        top: 10px;
                        right: -216px;
                        transition-property: opacity, transform;
                        transition-duration: 0.4s;
                        transition-timing-function: ease;
                        }
                        .header .search-form.active {
                        opacity: 1;
                        }
                        .header .search-form .search-input {
                            appearance: none;
                            background: #f1f1f1;
                            border: none;
                            font-size: 13px;
                            padding: 20px 20px 20px 20px;
                            width: 100%;
                        }
                        .header .search-form > .search-toggle {
                        position: absolute;
                        top: 0;
                        right: 0;
                        }
                        .header .search-form > .search-close {
                            appearance: none;
                            background: none;
                            border: none;
                            color: #333;
                            cursor: pointer;
                            display: inline-block;
                            font-size: 16px;
                            font-weight: bold;
                            line-height: 1;
                            padding: 5px;
                            text-align: center;
                            vertical-align: middle;
                            position: absolute;
                            top: 10px;
                            right: 12px;
                        }
                    </style>
                    <div class="hotline d-none d-lg-block">
                        <div class="header-action-2 header">
                            <span id="form-open" class="search-toggle">
                                <i class="fal fa-search"></i>
                              </span>
                              <div class="search-holder">
                                <form id="search-form" class="search-form">
                                  <input type="text" name="qwrd" placeholder="Type your keyword(s)" class="search-input">
                                  {{-- <button type="submit" id="form-submit" class="search-toggle">
                                    <i class="fa fa-search"></i>
                                  </button> --}}
                                  <button type="reset" id="form-close" class="search-close">
                                    <i class="fa fa-times"></i>
                                  </button>
                                </form>
                              </div>
                            <div class="header-action-icon-2">
                                <a href="wishlist.php">
                                    <i class="fal fa-heart"></i>
                                    {{-- <img class="svgInject" alt="Evara" src="{{asset('')}}frontend/assets/imgs/theme/icons/icon-heart.svg"> --}}
                                    <span class="pro-count blue">4</span>
                                </a>
                            </div>
                            @livewire('cart-icon-component')

                                {{-- <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="#">
                                        <img alt="Evara" src="{{asset('')}}frontend/assets/imgs/theme/icons/icon-cart.svg">
                                        <span class="pro-count blue">{{Cart::count()}}</span>
                                    </a> --}}

                                    {{-- @if(Cart::count() > 0)
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul>
                                            @foreach (Cart::content() as $item)
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="{{route('shop.cart')}}"><img alt="{{$item->options->slug}}" src="{{asset('storage/product_images/').$item->options->image->product_image}}"></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="{{route('shop.cart')}}">{{substr($item->name,0,20)}}</a></h4>
                                                    <h3><span>{{$item->qty}} × </span>${{$item->price}}</h3>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="{{route('remove.cart',$item->rowId)}}"><i class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total <span>${{Cart::subtotal()}}</span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="{{route('shop.cart')}}" class="outline">View cart</a>
                                                <a href="checkout.php">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif --}}
                                {{-- </div> --}}
                                {{-- @livewire('cart-icon-component') --}}

                        </div>
                    </div>
                    <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="wishlist.php">
                                    <img alt="Evara" src="{{asset('')}}frontend/assets/imgs/theme/icons/icon-heart.svg">
                                    <span class="pro-count white">4</span>
                                </a>
                            </div>
                            @livewire('cart-icon-component')
                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="index.html"><img src="{{asset('')}}frontend/assets/imgs/theme/logo.svg" alt="logo"></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="Search for items…">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <div class="main-categori-wrap mobile-header-border">
                        <a class="categori-button-active-2" href="#">
                            <span class="fi-rs-apps"></span> Browse Categories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-small">
                            <ul>
                                <li><a href="shop-grid-right.html"><i class="evara-font-dress"></i>Women's Clothing</a></li>
                                <li><a href="shop-grid-right.html"><i class="evara-font-tshirt"></i>Men's Clothing</a></li>
                                <li> <a href="shop-grid-right.html"><i class="evara-font-smartphone"></i> Cellphones</a></li>
                                <li><a href="shop-grid-right.html"><i class="evara-font-desktop"></i>Computer & Office</a></li>
                                <li><a href="shop-grid-right.html"><i class="evara-font-cpu"></i>Consumer Electronics</a></li>
                                <li><a href="shop-grid-right.html"><i class="evara-font-home"></i>Home & Garden</a></li>
                                <li><a href="shop-grid-right.html"><i class="evara-font-high-heels"></i>Shoes</a></li>
                                <li><a href="shop-grid-right.html"><i class="evara-font-teddy-bear"></i>Mother & Kids</a></li>
                                <li><a href="shop-grid-right.html"><i class="evara-font-kite"></i>Outdoor fun</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{route('home')}}">Home</a>

                            </li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{route('shop')}}">shop</a>

                            </li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Mega menu</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Women's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.html">Dresses</a></li>
                                            <li><a href="shop-product-right.html">Blouses & Shirts</a></li>
                                            <li><a href="shop-product-right.html">Hoodies & Sweatshirts</a></li>
                                            <li><a href="shop-product-right.html">Women's Sets</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Men's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.html">Jackets</a></li>
                                            <li><a href="shop-product-right.html">Casual Faux Leather</a></li>
                                            <li><a href="shop-product-right.html">Genuine Leather</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Technology</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.html">Gaming Laptops</a></li>
                                            <li><a href="shop-product-right.html">Ultraslim Laptops</a></li>
                                            <li><a href="shop-product-right.html">Tablets</a></li>
                                            <li><a href="shop-product-right.html">Laptop Accessories</a></li>
                                            <li><a href="shop-product-right.html">Tablet Accessories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="blog-category-fullwidth.html">Blog</a>
                                <ul class="dropdown">
                                    <li><a href="blog-category-grid.html">Blog Category Grid</a></li>
                                    <li><a href="blog-category-list.html">Blog Category List</a></li>
                                    <li><a href="blog-category-big.html">Blog Category Big</a></li>
                                    <li><a href="blog-category-fullwidth.html">Blog Category Wide</a></li>
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Single Product Layout</a>
                                        <ul class="dropdown">
                                            <li><a href="blog-post-left.html">Left Sidebar</a></li>
                                            <li><a href="blog-post-right.html">Right Sidebar</a></li>
                                            <li><a href="blog-post-fullwidth.html">No Sidebar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="page-about.html">About Us</a></li>
                                    <li><a href="page-contact.html">Contact</a></li>
                                    <li><a href="page-account.html">My Account</a></li>
                                    <li><a href="page-login-register.html">login/register</a></li>
                                    <li><a href="page-purchase-guide.html">Purchase Guide</a></li>
                                    <li><a href="page-privacy-policy.html">Privacy Policy</a></li>
                                    <li><a href="page-terms.html">Terms of Service</a></li>
                                    <li><a href="page-404.html">404 Page</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Language</a>
                                <ul class="dropdown">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                    <div class="single-mobile-header-info mt-30">
                        <a  href="page-contact.html"> Our location </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="page-login-register.html">Log In / Sign Up </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#">(+01) - 2345 - 6789 </a>
                    </div>
                </div>
                <div class="mobile-social-icon">
                    <h5 class="mb-15 text-grey-4">Follow Us</h5>
                    <a href="#"><img src="{{asset('')}}frontend/assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                    <a href="#"><img src="{{asset('')}}frontend/assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                    <a href="#"><img src="{{asset('')}}frontend/assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                    <a href="#"><img src="{{asset('')}}frontend/assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                    <a href="#"><img src="{{asset('')}}frontend/assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    {{-- @yield('main') --}}

            {{-- @if($errors->any())
                <div style="color: red;">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            @if(View::hasSection('main'))
                @yield('main')
            @else
                {{ $slot }}
            @endif

    <footer class="main">
        <section class="newsletter p-30 text-white wow fadeIn animated">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 mb-md-3 mb-lg-0">
                        <div class="row align-items-center">
                            <div class="col flex-horizontal-center">
                                <h5 class="subscribe-text">Get Offers, Discounts and More.</h5>
                            </div>
                            <div class="col my-4 my-md-0 des">
                                <h4 class="newsletter-text mb-0 ml-3">SIGN UP FOR OUR NEWSLETTER</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Subscribe Form -->
                        <form class="form-subcriber d-flex wow fadeIn animated">
                            <input type="email" class="form-control bg-white font-small" placeholder="Enter your email">
                            <button class="btn text-white" type="submit">Subscribe</button>
                        </form>
                        <!-- End Subscribe Form -->
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                            <div class="logo logo-width-1 wow fadeIn animated">
                                <a href="index.html"><img src="{{asset('frontend/assets/imgs/Kohen_Logo_Main.png')}}" alt="logo"></a>
                            </div>
                            <p class="footer-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>

                        </div>
                    </div>
                    <style>
                        .footer-list li a span{
                            font-size: 17px;
                            margin-right: 8px
                        }
                    </style>
                    <div class="col-lg-3 col-md-3">
                        <h5 class="widget-title wow fadeIn animated">Contact</h5>
                        <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                            <li>
                                <a href="https://wa.link/3qi05h"><span><i class="fab fa-whatsapp"></i></span> +880 1751218778</a>

                            </li>
                            <li><a href="tel:+880 9639 174 502"><span><i class="fal fa-phone-alt"></i></span> +880 9639 174 502</a></li>
                            <li><a href="mailto:support@koohen.com"><span><i class="fal fa-envelope"></i></span> support@koohen.com</a></li>
                            <li><a href="#"><span><i class="fal fa-map-marker-alt"></i></span> 522/B, North Shahjahanpur, Dhaka-1217</a></li>

                        </ul>
                        <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Follow Us</h5>
                            <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                                <a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-facebook.svg')}}" alt=""></a>
                                <a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-twitter.svg')}}" alt=""></a>
                                <a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-instagram.svg')}}" alt=""></a>
                                <a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-pinterest.svg')}}" alt=""></a>
                                <a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-youtube.svg')}}" alt=""></a>
                            </div>
                    </div>
                    <div class="col-lg-3  col-md-3">
                        <h5 class="widget-title wow fadeIn animated">Usefull Links</h5>
                        <ul class="footer-list wow fadeIn animated">
                            <li><a href="#">Delivery Information</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Cancellation & Return</a></li>
                            <li><a href="#">FAQS</a></li>
                            <li><a href="#">Track My Order</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h5 class="widget-title wow fadeIn animated">Install App</h5>
                        <div class="row">
                            <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                                <p class="mb-20 wow fadeIn animated">Secured Payment Gateways</p>
                                <img class="wow fadeIn animated" src="..{{asset('frontend/assets/imgs/theme/payment-method.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-lg-6">
                    <p class="float-md-left font-sm text-muted mb-0 d-flex">&copy;
                    <script>document.write(new Date().getFullYear())</script> ,
                    <strong class="text-brand mr-10 ml-10">
                        <img width="40" src="{{asset('frontend/assets/imgs/Kohen_Logo_Main.png')}}" alt="logo">
                    </strong><span style="text-transform:uppercase"> - Your ultimate Lifestyle.</span> </p>
                </div>
                <div class="col-lg-6">
                    <p class="text-lg-end text-start font-sm text-muted mb-0">
                        Developed by <a href="https://qbit-tech.com/" target="_blank">QBitTech </a>. All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Preloader Start -->
    <!--<div id="preloader-active">-->
    <!--    <div class="preloader d-flex align-items-center justify-content-center">-->
    <!--        <div class="preloader-inner position-relative">-->
    <!--            <div class="text-center">-->
    <!--                <h5 class="mb-10">Now Loading</h5>-->
    <!--                <div class="loader">-->
    <!--                    <div class="bar bar1"></div>-->
    <!--                    <div class="bar bar2"></div>-->
    <!--                    <div class="bar bar3"></div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->


    @include('auth.registermodal')

    @include('auth.loginmodal')

    <!-- Vendor JS-->
    <script src="{{asset('')}}frontend/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="{{asset('')}}frontend/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{asset('')}}frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="{{asset('')}}frontend/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{asset('')}}frontend/assets/js/plugins/slick.js"></script>
    <script src="{{asset('')}}frontend/assets/js/plugins/jquery.syotimer.min.js"></script>
    <script src="{{asset('')}}frontend/assets/js/plugins/wow.js"></script>
    <script src="{{asset('')}}frontend/assets/js/plugins/jquery-ui.js"></script>
    <script src="{{asset('')}}frontend/assets/js/plugins/perfect-scrollbar.js"></script>
    <script src="{{asset('')}}frontend/assets/js/plugins/magnific-popup.js"></script>
    <script src="{{asset('')}}frontend/assets/js/plugins/select2.min.js"></script>
    <script src="{{asset('')}}frontend/assets/js/plugins/waypoints.js"></script>
    <script src="{{asset('')}}frontend/assets/js/plugins/counterup.js"></script>
    <script src="{{asset('')}}frontend/assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="{{asset('')}}frontend/assets/js/plugins/images-loaded.js"></script>
    <script src="{{asset('')}}frontend/assets/js/plugins/isotope.js"></script>
    <script src="{{asset('')}}frontend/assets/js/plugins/scrollup.js"></script>
    <script src="{{asset('')}}frontend/assets/js/plugins/jquery.vticker-min.js"></script>
    <script src="{{asset('')}}frontend/assets/js/plugins/jquery.theia.sticky.js"></script>
    <script src="{{asset('')}}frontend/assets/js/plugins/jquery.elevatezoom.js"></script>
    <script src="{{asset('frontend/assets/notifications/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('frontend/assets/notifications/notifications.js')}}"></script>
	{{-- <script src="{{asset('frontend/assets/vendor/slick/slick.min.js')}}"></script> --}}
    <script src="{{asset('frontend/assets/js/vendor/slick-custom.js')}}"></script>

    <!-- Template  JS -->
    <script src="{{asset('')}}frontend/assets/js/main.js?v=3.4"></script>
    <script src="{{asset('')}}frontend/assets/js/shop.js?v=3.4"></script>
    @livewireScripts
    @stack('dashboard')
    @stack('checkout')

    @stack('shop')
<script>
   var headerContainer = $('.header-wrap');
    var topPanel = headerContainer.find('#header-nav');
    var searchHolder = headerContainer.find('.search-holder');
    var searchForm = headerContainer.find('#search-form');
    var openToggle = headerContainer.find('#form-open');
    var closeToggle = searchForm.find('#form-close');

    function calculateAnimationProps () {
    var vpWidth = $(window).outerWidth(true);
    var width = 0;

    if (vpWidth < 1000) {
        width = headerContainer.outerWidth(true) - 40; // Minus container side padding
    } else {
        width = topPanel.outerWidth(true);
    }

    var right = width - openToggle.outerWidth(true);

    return {
        formWidth: width,
        formRight: right,
        toggleRight: right / 2
    };
    }

    $(document).ready(function() {
    // Show search form
    openToggle.on('click', function() {
        var animProps = calculateAnimationProps();

        searchHolder.show().css({
        width: animProps.formWidth,
        height: headerContainer.outerHeight(true)
        });

        searchForm.css({
        width: animProps.formWidth,
        right: -(animProps.formRight),
        transform: 'translatex(-' + animProps.formRight + 'px)'
        }).addClass('active');

        $(this).css({
        right: animProps.toggleRight,
        transform: 'translatex(-' + animProps.toggleRight + 'px)'
        }).addClass('hidden');
    });

    // Hide search form
    closeToggle.on('click', function() {
        searchForm.css('transform', '')
        .removeClass('active');

        // Let the animation finished first then hide the holder
        setTimeout(function () {
        searchHolder.hide();
        }, 500);

        openToggle.removeAttr('style')
        .removeClass('hidden');
    });

        // Disable search form
        searchForm.on('submit', function (e) {
            e.preventDefault();

            $(this).find('[name="qwrd"]')
            .val('This form has been disabled');
        });
    });
</script>
    @if(Session::has('success'))
    <script>
        $.Notification.autoHideNotify('success', 'top right', 'Success', '{{ Session::get('success') }}');
    </script>
    @endif
    @if(Session::has('danger'))
        <script>
            $.Notification.autoHideNotify('danger', 'top right', 'Danger', '{{ Session::get('danger') }}');
        </script>
    @endif
    @if(Session::has('warning'))
    <script>
        $.Notification.autoHideNotify('warning', 'top right', 'Warning', '{{ Session::get('warning') }}');
    </script>
    @endif


</body>

</html>
