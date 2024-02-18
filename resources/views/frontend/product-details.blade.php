@foreach ($products as $product)

@endforeach
@extends('layouts.home')
@section('title', $product->product_name)
@section('main')

<main class="main">
    <div class="page-header breadcrumb-wrap">
       <div class="container">
          <div class="breadcrumb">
             <a href="index.html" rel="nofollow">Home</a>
             <span></span> Fashion
             <span></span> Abstract Print Patchwork Dress
          </div>
       </div>
    </div>
    <section class="mt-50 mb-50">
       <div class="container">
          <div class="row flex-row-reverse">
             <div class="col-lg-12">
                <div class="product-detail accordion-detail">

                    {{-- Product Component --}}

                    @livewire('product-component', ['slug' => $product->slug], key($product->slug))

                   <!--Related Product-->
                   <div class="row mt-60">
                      <div class="col-12">
                         <h3 class="section-title mb-20"><span>Recent</span> Products</h3>
                      </div>
                      <div class="col-12">
                         <div class="carausel-6-columns-cover position-relative">
                     <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                     <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                         <div class="product-cart-wrap small hover-up">
                             <div class="product-img-action-wrap">
                                 <div class="product-img product-img-zoom">
                                     <a href="product-details.php">
                                         <img class="default-img" src="{{asset('')}}frontend/assets/imgs/shop/ne-product-1.jpg" alt="">
                                     </a>
                                 </div>
                                 <div class="product-action-1">
                                     <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                     <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                 </div>
                                 <div class="product-badges product-badges-position product-badges-mrg">
                                     <span class="hot">Hot</span>
                                 </div>
                             </div>
                             <div class="product-content-wrap">
                                 <h2><a href="product-details.php">Lorem ipsum dolor</a></h2>
                                 <div class="rating-result" title="90%">
                                     <span>
                                     </span>
                                 </div>
                                 <div class="product-price">
                                     <span>৳238.85 </span>
                                     <span class="old-price">৳245.8</span>
                                 </div>
                                 <div>
                                     <a href="#"><button type="button" class="bye-now-btn-2">Bye Now</button></a>
                                     <a href="#"><button type="button" class="adto-cart-btn-2">Add To Cart</button></a>
                                 </div>
                             </div>
                         </div>
                         <!--End product-cart-wrap-2-->
                         <div class="product-cart-wrap small hover-up">
                             <div class="product-img-action-wrap">
                                 <div class="product-img product-img-zoom">
                                     <a href="product-details.php">
                                         <img class="default-img" src="{{asset('')}}frontend/assets/imgs/shop/ne-product-2.jpg" alt="">
                                     </a>
                                 </div>
                                 <div class="product-action-1">
                                     <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                     <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                 </div>
                                 <div class="product-badges product-badges-position product-badges-mrg">
                                     <span class="new">New</span>
                                 </div>
                             </div>
                             <div class="product-content-wrap">
                                 <h2><a href="product-details.php">Aliquam posuere</a></h2>
                                 <div class="rating-result" title="90%">
                                     <span>
                                     </span>
                                 </div>
                                 <div class="product-price">
                                     <span>৳173.85 </span>
                                     <span class="old-price">৳185.8</span>
                                 </div>
                                 <div>
                                     <a href="#"><button type="button" class="bye-now-btn-2">Bye Now</button></a>
                                     <a href="#"><button type="button" class="adto-cart-btn-2">Add To Cart</button></a>
                                 </div>
                             </div>
                         </div>
                         <!--End product-cart-wrap-2-->
                         <div class="product-cart-wrap small hover-up">
                             <div class="product-img-action-wrap">
                                 <div class="product-img product-img-zoom">
                                     <a href="product-details.php">
                                         <img class="default-img" src="{{asset('')}}frontend/assets/imgs/shop/ne-product-3.jpg" alt="">
                                     </a>
                                 </div>
                                 <div class="product-action-1">
                                     <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                     <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                 </div>
                                 <div class="product-badges product-badges-position product-badges-mrg">
                                     <span class="sale">Sale</span>
                                 </div>
                             </div>
                             <div class="product-content-wrap">
                                 <h2><a href="product-details.php">Sed dapibus orci</a></h2>
                                 <div class="rating-result" title="90%">
                                     <span>
                                     </span>
                                 </div>
                                 <div class="product-price">
                                     <span>৳215.85 </span>
                                     <span class="old-price">৳235.8</span>
                                 </div>
                                 <div>
                                     <a href="#"><button type="button" class="bye-now-btn-2">Bye Now</button></a>
                                     <a href="#"><button type="button" class="adto-cart-btn-2">Add To Cart</button></a>
                                 </div>
                             </div>
                         </div>
                         <!--End product-cart-wrap-2-->
                         <div class="product-cart-wrap small hover-up">
                             <div class="product-img-action-wrap">
                                 <div class="product-img product-img-zoom">
                                     <a href="product-details.php">
                                         <img class="default-img" src="{{asset('')}}frontend/assets/imgs/shop/ne-product-4.jpg" alt="">
                                     </a>
                                 </div>
                                 <div class="product-action-1">
                                     <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                     <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                 </div>
                                 <div class="product-badges product-badges-position product-badges-mrg">
                                     <span class="hot">.33%</span>
                                 </div>
                             </div>
                             <div class="product-content-wrap">
                                 <h2><a href="product-details.php">Donec congue</a></h2>
                                 <div class="rating-result" title="90%">
                                     <span>
                                     </span>
                                 </div>
                                 <div class="product-price">
                                     <span>৳83.8 </span>
                                     <span class="old-price">৳125.2</span>
                                 </div>
                                 <div>
                                     <a href="#"><button type="button" class="bye-now-btn-2">Bye Now</button></a>
                                     <a href="#"><button type="button" class="adto-cart-btn-2">Add To Cart</button></a>
                                 </div>
                             </div>
                         </div>
                         <!--End product-cart-wrap-2-->
                         <div class="product-cart-wrap small hover-up">
                             <div class="product-img-action-wrap">
                                 <div class="product-img product-img-zoom">
                                     <a href="product-details.php">
                                         <img class="default-img" src="{{asset('')}}frontend/assets/imgs/shop/ne-product-5.jpg" alt="">
                                     </a>
                                 </div>
                                 <div class="product-action-1">
                                     <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                     <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                 </div>
                                 <div class="product-badges product-badges-position product-badges-mrg">
                                     <span class="hot">-25%</span>
                                 </div>
                             </div>
                             <div class="product-content-wrap">
                                 <h2><a href="product-details.php">Curabitur porta</a></h2>
                                 <div class="rating-result" title="90%">
                                     <span>
                                     </span>
                                 </div>
                                 <div class="product-price">
                                     <span>৳1238.85 </span>
                                     <span class="old-price">৳1245.8</span>
                                 </div>
                                 <div>
                                     <a href="#"><button type="button" class="bye-now-btn-2">Bye Now</button></a>
                                     <a href="#"><button type="button" class="adto-cart-btn-2">Add To Cart</button></a>
                                 </div>
                             </div>
                         </div>
                         <!--End product-cart-wrap-2-->
                         <div class="product-cart-wrap small hover-up">
                             <div class="product-img-action-wrap">
                                 <div class="product-img product-img-zoom">
                                     <a href="product-details.php">
                                         <img class="default-img" src="{{asset('')}}frontend/assets/imgs/shop/ne-product-6.jpg" alt="">
                                     </a>
                                 </div>
                                 <div class="product-action-1">
                                     <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                     <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                 </div>
                                 <div class="product-badges product-badges-position product-badges-mrg">
                                     <span class="new">New</span>
                                 </div>
                             </div>
                             <div class="product-content-wrap">
                                 <h2><a href="product-details.php">Praesent maximus</a></h2>
                                 <div class="rating-result" title="90%">
                                     <span>
                                     </span>
                                 </div>
                                 <div class="product-price">
                                     <span>৳123 </span>
                                     <span class="old-price">৳156</span>
                                 </div>
                                 <div>
                                     <a href="#"><button type="button" class="bye-now-btn-2">Bye Now</button></a>
                                     <a href="#"><button type="button" class="adto-cart-btn-2">Add To Cart</button></a>
                                 </div>
                             </div>
                         </div>
                         <!--End product-cart-wrap-2-->
                         <div class="product-cart-wrap small hover-up">
                             <div class="product-img-action-wrap">
                                 <div class="product-img product-img-zoom">
                                     <a href="product-details.php">
                                         <img class="default-img" src="{{asset('')}}frontend/assets/imgs/shop/ne-product-7.jpg" alt="">
                                     </a>
                                 </div>
                                 <div class="product-action-1">
                                     <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                     <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                 </div>
                             </div>
                             <div class="product-content-wrap">
                                 <h2><a href="product-details.php">Vestibulum ante</a></h2>
                                 <div class="rating-result" title="90%">
                                     <span>
                                     </span>
                                 </div>
                                 <div class="product-price">
                                     <span>৳238.85 </span>
                                     <span class="old-price">৳245.8</span>
                                 </div>
                                 <div>
                                     <a href="#"><button type="button" class="bye-now-btn-2">Bye Now</button></a>
                                     <a href="#"><button type="button" class="adto-cart-btn-2">Add To Cart</button></a>
                                 </div>
                             </div>
                         </div>
                         <!--End product-cart-wrap-2-->
                         <div class="product-cart-wrap small hover-up">
                             <div class="product-img-action-wrap">
                                 <div class="product-img product-img-zoom">
                                     <a href="product-details.php">
                                         <img class="default-img" src="{{asset('')}}frontend/assets/imgs/shop/ne-product-8.jpg" alt="">
                                     </a>
                                 </div>
                                 <div class="product-action-1">
                                     <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                     <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                 </div>
                             </div>
                             <div class="product-content-wrap">
                                 <h2><a href="product-details.php">Vestibulum ante</a></h2>
                                 <div class="rating-result" title="90%">
                                     <span>
                                     </span>
                                 </div>
                                 <div class="product-price">
                                     <span>৳238.85 </span>
                                     <span class="old-price">৳245.8</span>
                                 </div>
                                 <div>
                                     <a href="#"><button type="button" class="bye-now-btn-2">Bye Now</button></a>
                                     <a href="#"><button type="button" class="adto-cart-btn-2">Add To Cart</button></a>
                                 </div>
                             </div>
                         </div>
                         <!--End product-cart-wrap-2-->
                     </div>
                 </div>
                      </div>
                   </div>
                   <!--Related Product-->
                   <!--Advertise-->
                   <div class="banner-img banner-big wow fadeIn animated f-none mt-4">
                      <img src="{{asset('')}}frontend/assets/imgs/banner/banner-4.jpg" alt="">
                      <div class="banner-text d-md-block d-none">
                         <h4 class="mb-15 text-brand">Trending Now</h4>
                         <h1 class="fw-600 mb-20">Be The First to Know<br/>About Our New Collections</h1>
                         <a href="shop-grid-right.html" class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
                      </div>
                   </div>
                   <!--Advertise-->
                </div>
             </div>
          </div>
       </div>
    </section>
</main>
@endsection
