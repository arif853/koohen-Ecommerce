
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
                         <h3 class="section-title mb-20"><span>Related</span> Products</h3>
                      </div>
                      <div class="col-12">
                         <div class="carausel-6-columns-cover position-relative">
                     <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                     <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                        @foreach ($realatedProducts  as $r_product)
                        <div class="product-cart-wrap mb-25 small hover-up">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{route('product.detail',['slug'=>$r_product->slug])}}">
                                        @foreach ($r_product->product_images as $index => $image)
                                            @if($index == 0)
                                            <img class="default-img"
                                            src="{{asset('storage/product_images/thumbnail/'.$r_product->product_thumbnail[0]->product_thumbnail)}}" alt="{{$r_product->slug}}">
                                            @endif

                                            @if($index == 1)
                                            <img class="hover-img"
                                            src="{{asset('storage/product_images/thumbnail/'.$r_product->product_thumbnail[1]->product_thumbnail)}}" alt="{{$r_product->slug}}">
                                            @endif
                                            @endforeach

                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Quick view" class="action-btn hover-up quickview" data-bs-toggle="modal" data-bs-target="#quickViewModal" data-product-slug="{{$product->slug}}">
                                        <i class="fi-rs-eye"></i></a>
                                    <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="AddToWishlist({{$r_product->id}})" onclick="wishNotify()"><i class="fi-rs-heart"></i></a>
                                </div>
                                @php
                                $flag = 0;
                                $thisProduct = $r_product->id;
                                if ($campaign) {
                                    $camp_products = $campaign->camp_product;

                                    foreach ($camp_products as $key => $camp_product) {
                                        if ($thisProduct == $camp_product->product_id) {

                                            $camp_price = $camp_product->camp_price;
                                            $flag = 1;
                                        }
                                    }
                                }

                                @endphp
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    @if($flag == 1)
                                    <span class="sale">On Sale</span>

                                    @else
                                    {{-- <span class="hot">Hot</span> --}}

                                    @endif
                                </div>
                            </div>
                            <div class="product-content-wrap text-center">
                                <h2><a href="{{route('product.detail',['slug'=>$r_product->slug])}}">{{$r_product->product_name}}</a></h2>

                                <div class="product-price">
                                    @if($flag == 1)
                                    <span>৳{{$camp_price}} </span>
                                    <span class="old-price">৳{{$r_product->regular_price}}</span>

                                    @elseif ($r_product->product_price->offer_price > 0 && $flag == 0)
                                        <span>৳{{$r_product->product_price->offer_price}} </span>
                                        <span class="old-price">৳{{$r_product->regular_price}}</span>
                                    @else
                                    <span >৳{{$r_product->regular_price}}</span>
                                    @endif
                                </div>
                                {{-- <div>
                                    <div class="text-center">

                                        <a href="#" wire:click.prevent="store({{$r_product->id}})" onclick="cartNotify()"><button type="button" class="adto-cart-btn">Add To Cart</button></a>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        @endforeach


                     </div>
                 </div>
                      </div>
                   </div>
                   <!--Related Product-->
                   <!--Advertise-->
                   {{-- @if ($adsbanner)
                   @foreach ($adsbanner as $ads)

                   @endforeach
                   @if ($ads)
                   @if($ads->is_featured == 1 )
                   <div class="banner-img banner-big wow fadeIn animated f-none">
                       <img src="{{asset('storage/'.$ads->image)}}" alt="$ads->title">
                       <div class="banner-text d-md-block d-none">
                           <h4 class="mb-15 text-brand">{{$ads->header}}</h4>
                           <h1 class="fw-600 mb-20" style="width: 450px; color:#fff">{{$ads->title}}</h1>

                           @if($ads->shop_url != null)
                           <a href="{{$ads->shop_url}}" class="btn">Shop Now <i class="fi-rs-arrow-right"></i></a>
                           @endif
                       </div>
                   </div>

                   @endif
                   @endif

                   @endif --}}

                   <!--Advertise-->
                </div>
             </div>
          </div>
       </div>
    </section>
</main>
@endsection
