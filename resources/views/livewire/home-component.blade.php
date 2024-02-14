
<div>
    <div class="text-center">
        <h3 class="section-title section-title-1 mb-20"><span>All Products</span> </h3>
    </div>
    <div class="new-arrival">
        <div class="row product-grid-4">
            @foreach ($products as $product)
            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                <div class="product-cart-wrap mb-25">
                    <div class="product-img-action-wrap">
                        <div class="product-img product-img-zoom">
                            <a href="{{route('product.detail',['slug'=>$product->slug])}}">
                                @foreach ($product->product_thumbnail as $index => $image)
                                @if($index == 0)
                                <img class="default-img"
                                src="{{asset('storage/product_images/thumbnail/'.$product->product_thumbnail[0]->product_thumbnail)}}" alt="{{$product->slug}}">
                                @endif

                                @if($index == 1)
                                <img class="hover-img"
                                src="{{asset('storage/product_images/thumbnail/'.$product->product_thumbnail[1]->product_thumbnail)}}" alt="{{$product->slug}}">
                                @endif
                                @endforeach
                            </a>
                        </div>
                        <div class="product-action-1">
                            <a aria-label="Quick view" class="action-btn hover-up quickview" data-bs-toggle="modal" data-bs-target="#quickViewModal" data-product-slug="{{$product->slug}}">
                                <i class="fi-rs-eye"></i></a>
                            <a aria-label="Add To Wishlist" wire:click.prevent="AddToWishlist({{$product->id}})" onclick="wishNotify()" class="action-btn hover-up" href="#"><i class="fi-rs-heart"></i></a>
                        </div>
                        <div class="product-badges product-badges-position product-badges-mrg">
                            <span class="hot">Hot</span>
                        </div>
                    </div>

                    <div class="product-content-wrap text-center">
                        {{-- <h2><a href="product-details.php">Colorful Pattern Shirts</a></h2> --}}
                        <h2><a href="{{route('product.detail',['slug'=>$product->slug])}}">{{$product->product_name}}</a></h2>
                        <div class="product-price">
                             @if ($product->product_price->offer_price > 0)
                                <span>৳{{$product->product_price->offer_price}} </span>
                                <span class="old-price">৳{{$product->regular_price}}</span>
                            @else
                                <span >৳{{$product->regular_price}} </span>

                            @endif
                        </div>
                        <div>
                            <div class="text-center">
                                {{-- <a href="#"><button type="button" class="adto-cart-btn">Add To Cart</button></a> --}}
                                <a href="#" wire:click.prevent="store({{$product->id}})" onclick="cartNotify()"><button type="button" class="adto-cart-btn">Add To Cart</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!--End product-grid-4-->
    </div>
    <!--End tab-content-->




<script>

       function cartNotify(){
           $.Notification.autoHideNotify('success', 'top right', 'Success', 'Product added to cart successfully');
       }

       function wishNotify(){
           $.Notification.autoHideNotify('success', 'bottom right', 'Success', 'Product added to wishlist successfully');
       }

</script>

</div>

