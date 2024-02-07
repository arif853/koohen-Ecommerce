<div class="row product-grid-4">
    
    @foreach ($Newproducts as $newproduct)
    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
        <div class="product-cart-wrap mb-25">
            <div class="product-img-action-wrap">
                <div class="product-img product-img-zoom">
                    <a href="{{route('product.detail',['slug'=>$newproduct->slug])}}">
                        @foreach ($newproduct->product_images as $index => $image)
                            @if($index == 0)
                            <img class="default-img"
                            src="{{asset('storage/product_images/'.$newproduct->product_images[0]->product_image)}}" alt="{{$newproduct->slug}}">
                            @endif

                            @if($index == 1)
                            <img class="hover-img"
                            src="{{asset('storage/product_images/'.$newproduct->product_images[1]->product_image)}}" alt="{{$newproduct->slug}}">
                            @endif
                            @endforeach

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
                <h2><a href="product-details.php">{{$newproduct->product_name}}</a></h2>

                <div class="product-price">
                    @if ($newproduct->product_price->offer_price > 0)
                    <span>৳{{$newproduct->product_price->offer_price}} </span>
                    <span class="old-price">৳{{$newproduct->regular_price}}</span>
                    @else
                    <span>৳{{$newproduct->regular_price}} </span>

                    @endif
                </div>
                <div>
                    <div class="text-center">
                        <a href="#" wire:click.prevent="store({{$newproduct->id}})"><button type="button" class="adto-cart-btn">Add To Cart</button></a>

                        {{-- <a href="#"><button type="button" class="adto-cart-btn">Add To Cart</button></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach


</div>
