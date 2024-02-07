@extends('layouts.home')
@section('title', 'Home')
@section('main')

<main class="main">
    <!--Main Slider-->

	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url({{asset('frontend/assets/imgs/slide-01.jpg')}});">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Women Collection 2018
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									NEW SEASON
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url({{asset('frontend/assets/imgs/slide-02.jpg')}});">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men New-Season
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									Jackets & Coats
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url({{asset('frontend/assets/imgs/slide-03.jpg')}});">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men Collection 2018
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									New arrivals
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <!--Main Slider-->

    <!--Popular Catagory-->
    <section class="popular-categories section-padding mt-15 mb-25">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
                <div class="carausel-6-columns" id="carausel-6-columns">

                    @foreach ($categories as $category)
                    <div class="card-1">
                        <figure class=" img-hover-scale overflow-hidden">
                            <a href="#"><img src="{{asset('storage/category_image/'.$category->category_image)}}" alt="{{$category->slug}}"></a>
                        </figure>
                        <h5><a href="#">{{$category->category_name}}</a></h5>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>
    <!--Popular Catagory-->

    <!--New Arrival (OK)-->
    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="container">
            <div class="text-center">
                <h3 class="section-title section-title-1 mb-20"><span>New</span> Arrivals</h3>
            </div>
                <div class="new-arrival">
                   @livewire('new-products-component')
                    <!--End product-grid-4-->
                </div>
            <!--End tab-content-->
            <div class="row mt-30">
                <div class="col-12 text-center">
                    <p class="wow fadeIn animated">
                        <a class="btn btn-brand text-white btn-shadow-brand hover-up btn-lg" href="{{route('shop')}}">Load More</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--New Arrival (OK)-->

    <!--Advertise-->
    <section class="banner-2">
        <div class="container">
            <div class="banner-img banner-big wow fadeIn animated f-none">
                <img src="{{asset('frontend/assets/imgs/banner/banner-4.jpg')}}" alt="">
                <div class="banner-text d-md-block d-none">
                    <h4 class="mb-15 text-brand">Trending Now</h4>
                    <h1 class="fw-600 mb-20">Be The First to Know<br/>About Our New Collections</h1>
                    <a href="shop-grid-right.html" class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!--Advertise-->

    <!--Category products (OK)-->
    @if($cat_feature)

    <section class="section-padding">
        <div class="container pt-25 pb-25">
            <div class="heading-tab d-flex">
                <div class="heading-tab-left wow fadeIn animated">
                    <?php
                    // Split the title into parts based on a delimiter (for example, a space)
                    $titleParts = explode(' ', $cat_feature->title);
                    ?>

                    <h3 class="section-title">
                        <span>{{ $titleParts[0] }}</span> {{ isset($titleParts[1]) ? $titleParts[1] : '' }}
                    </h3>

                </div>
                <a href="#" class="view-more d-none d-md-flex">View More<i class="fi-rs-angle-double-small-right"></i></a>
            </div>
            <div class="row">
                <div class="col-lg-3 d-none d-lg-flex">
                    <div class="banner-img style-2 wow fadeIn animated">
                        <img src="{{asset('storage/'.$cat_feature->image)}}" alt="{{$cat_feature->title}}">

                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="category-view">
                        @livewire('feature-category-component')

                    </div>
                </div>
                <!--End Col-lg-9-->
            </div>
        </div>
    </section>
    <!--Best Sale (OK)-->

    @endif

    <!--Campaign (OK)-->
    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="container">
            <div class="text-center">
                <h3 class="section-title section-title-1 mb-20"><span>Campaign</span> </h3>
            </div>
                <div class="new-arrival">
                    <div class="row product-grid-4">
                        <div class="col-lg-6 col-md-4 col-12 col-sm-6">
                            <div class="banner-img banner-1 wow fadeIn animated">
                                <img src="{{asset('frontend/assets/imgs/banner/Campaign.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-25">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.php">
                                            <img class="default-img" src="{{asset('frontend/assets/imgs/shop/panjabi-2.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap text-center">
                                    <h2><a href="product-details.php">Colorful Pattern Shirts</a></h2>

                                    <div class="product-price">
                                        <span>৳238.85 </span>
                                        <span class="old-price">৳245.8</span>
                                    </div>
                                    <div>
                                        <div class="text-center">
                                            <a href="#"><button type="button" class="adto-cart-btn">Add To Cart</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-25">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.php">
                                            <img class="default-img" src="{{asset('frontend/assets/imgs/shop/panjabi-2.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap text-center">
                                    <h2><a href="product-details.php">Colorful Pattern Shirts</a></h2>

                                    <div class="product-price">
                                        <span>৳238.85 </span>
                                        <span class="old-price">৳245.8</span>
                                    </div>
                                    <div>
                                        <div class="text-center">
                                            <a href="#"><button type="button" class="adto-cart-btn">Add To Cart</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-25">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.php">
                                            <img class="default-img" src="{{asset('frontend/assets/imgs/shop/panjabi-2.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap text-center">
                                    <h2><a href="product-details.php">Colorful Pattern Shirts</a></h2>

                                    <div class="product-price">
                                        <span>৳238.85 </span>
                                        <span class="old-price">৳245.8</span>
                                    </div>
                                    <div>
                                        <div class="text-center">
                                            <a href="#"><button type="button" class="adto-cart-btn">Add To Cart</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-25">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.php">
                                            <img class="default-img" src="{{asset('frontend/assets/imgs/shop/panjabi-2.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap text-center">
                                    <h2><a href="product-details.php">Colorful Pattern Shirts</a></h2>

                                    <div class="product-price">
                                        <span>৳238.85 </span>
                                        <span class="old-price">৳245.8</span>
                                    </div>
                                    <div>
                                        <div class="text-center">
                                            <a href="#"><button type="button" class="adto-cart-btn">Add To Cart</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-25">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.php">
                                            <img class="default-img" src="{{asset('frontend/assets/imgs/shop/panjabi-2.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap text-center">
                                    <h2><a href="product-details.php">Colorful Pattern Shirts</a></h2>

                                    <div class="product-price">
                                        <span>৳238.85 </span>
                                        <span class="old-price">৳245.8</span>
                                    </div>
                                    <div>
                                        <div class="text-center">
                                            <a href="#"><button type="button" class="adto-cart-btn">Add To Cart</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-25">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="product-details.php">
                                            <img class="default-img" src="{{asset('frontend/assets/imgs/shop/panjabi-2.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap text-center">
                                    <h2><a href="product-details.php">Colorful Pattern Shirts</a></h2>

                                    <div class="product-price">
                                        <span>৳238.85 </span>
                                        <span class="old-price">৳245.8</span>
                                    </div>
                                    <div>
                                        <div class="text-center">
                                            <a href="#"><button type="button" class="adto-cart-btn">Add To Cart</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End product-grid-4-->
                </div>
            <!--End tab-content-->
            <div class="row mt-30">
                <div class="col-12 text-center">
                    <p class="wow fadeIn animated">
                        <a class="btn btn-brand text-white btn-shadow-brand hover-up btn-lg">Load More</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--Campaign (OK)-->

    <!--Advertise-->
    <section class="banner-2">
        <div class="container">
            <div class="banner-img banner-big wow fadeIn animated f-none">
                <img src="{{asset('frontend/assets/imgs/banner/banner-4.jpg')}}" alt="">
                <div class="banner-text d-md-block d-none">
                    <h4 class="mb-15 text-brand">Trending Now</h4>
                    <h1 class="fw-600 mb-20">Be The First to Know<br/>About Our New Collections</h1>
                    <a href="shop-grid-right.html" class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!--Advertise-->

    <!--All Products (OK)-->
    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="container">
            @livewire('home-component')

            {{-- <button wire:click="loadMore">Clickme</button> --}}
        </div>
    </section>
    <!--All Products (OK)-->
</main>
  <!-- Quick view -->
  <div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                            <figure class="border-radius-10">
                                <img src="{{asset('')}}frontend/assets/imgs/shop/product-d-1.jpg" alt="product image">
                            </figure>

                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails pl-15 pr-15">
                                    <div><img src="{{asset('')}}frontend/assets/imgs/shop/thumbnail-1.jpg" alt="product image"></div>

                                </div>
                            </div>
                            <!-- End Gallery -->
                            <div class="social-icons single-share">
                                <ul class="text-grey-5 d-inline-block">
                                    <li><strong class="mr-10">Share this:</strong></li>
                                    <li class="social-facebook"><a href="#"><img src="{{asset('')}}frontend/assets/imgs/theme/icons/icon-facebook.svg" alt=""></a></li>
                                    <li class="social-twitter"> <a href="#"><img src="{{asset('')}}frontend/assets/imgs/theme/icons/icon-twitter.svg" alt=""></a></li>
                                    <li class="social-instagram"><a href="#"><img src="{{asset('')}}frontend/assets/imgs/theme/icons/icon-instagram.svg" alt=""></a></li>
                                    <li class="social-linkedin"><a href="#"><img src="{{asset('')}}frontend/assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info">
                                <h3 class="title-detail mt-30">Colorful Pattern Shirts HD450</h3>
                                <div class="product-detail-rating">
                                    <div class="pro-details-brand">
                                        <span> Brands: <a href="shop-grid-right.html">Bootstrap</a></span>
                                    </div>
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:90%">
                                            </div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <ins><span class="text-brand">$120.00</span></ins>
                                        <ins><span class="old-price font-md ml-15">$200.00</span></ins>
                                        <span class="save-price  font-md color3 ml-15">25% Off</span>
                                    </div>
                                </div>
                                <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                <div class="short-desc mb-30">
                                    <p class="font-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam rem officia, corrupti reiciendis minima nisi modi,!</p>
                                </div>

                                <div class="attr-detail attr-color mb-15">
                                    <strong class="mr-10">Color</strong>
                                    <ul class="list-filter color-filter">
                                        <li><a href="#" data-color="Red"><span class="product-color-red"></span></a></li>
                                        <li><a href="#" data-color="Yellow"><span class="product-color-yellow"></span></a></li>
                                        <li class="active"><a href="#" data-color="White"><span class="product-color-white"></span></a></li>
                                        <li><a href="#" data-color="Orange"><span class="product-color-orange"></span></a></li>
                                        <li><a href="#" data-color="Cyan"><span class="product-color-cyan"></span></a></li>
                                        <li><a href="#" data-color="Green"><span class="product-color-green"></span></a></li>
                                        <li><a href="#" data-color="Purple"><span class="product-color-purple"></span></a></li>
                                    </ul>
                                </div>
                                <div class="attr-detail attr-size">
                                    <strong class="mr-10">Size</strong>
                                    <ul class="list-filter size-filter font-small">
                                        <li><a href="#">S</a></li>
                                        <li class="active"><a href="#">M</a></li>
                                        <li><a href="#">L</a></li>
                                        <li><a href="#">XL</a></li>
                                        <li><a href="#">XXL</a></li>
                                    </ul>
                                </div>
                                <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                <div class="detail-extralink">
                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <span class="qty-val">1</span>
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                    <div class="product-extra-link2">
                                <button type="submit" class="button button-add-to-cart">Buy Now</button>
                                <button type="submit" class="button button-add-to-cart">Add to cart</button>
                            </div>
                                </div>
                                <ul class="product-meta font-xs color-grey mt-50">
                                    <li class="mb-5">SKU: <a href="#">FWM15VKT</a></li>
                                    <li class="mb-5">Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">Women</a>, <a href="#" rel="tag">Dress</a> </li>
                                    <li>Availability:<span class="in-stock text-success ml-5">8 Items In Stock</span></li>
                                </ul>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
