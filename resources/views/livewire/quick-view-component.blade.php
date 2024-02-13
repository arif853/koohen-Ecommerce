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
                            <div class="product-image-slider"  id="slider_image">
                                <figure class="border-radius-10">
                                    <img src="{{asset('')}}frontend/assets/imgs/shop/product-d-1.jpg" alt="product image">
                                </figure>
                                

                            </div>

                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails pl-15 pr-15" id="thumbnail_image">

                                {{-- <div><img src="{{asset('')}}frontend/assets/imgs/shop/product-d-1.jpg" alt="product image"></div>
                                <div><img src="{{asset('')}}frontend/assets/imgs/shop/product-d-1.jpg" alt="product image"></div>
                                <div><img src="{{asset('')}}frontend/assets/imgs/shop/product-d-1.jpg" alt="product image"></div>
                                <div><img src="{{asset('')}}frontend/assets/imgs/shop/product-d-1.jpg" alt="product image"></div> --}}

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
                            <h3 class="title-detail mt-30" id="p_name">Product</h3>
                            <div class="product-detail-rating">
                                <div class="pro-details-brand">
                                    <span> Brands: <a href="#" id="brand_name">Bootstrap</a></span>
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
                                <div class="product-price primary-color float-left" id="product_price">
                                    <ins><span class="text-brand">$120.00</span></ins>
                                    <ins><span class="old-price font-md ml-15">$200.00</span></ins>
                                    <span class="save-price  font-md color3 ml-15">25% Off</span>
                                </div>
                            </div>
                            <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                            <div class="short-desc ">
                                <h4 class="mb-10">Quick Overview</h4>
                                <ul class="product-more-infor mt-10" id="overview">

                                    {{-- @foreach ($product->overviews as $overview)
                                    <li><span>{{$overview->overview_name}}</span>
                                        {{$overview->overview_value}}</li>
                                    @endforeach --}}

                                </ul>
                            </div>

                            <div class="attr-detail attr-color mb-15">
                                <strong class="mr-10">Color</strong>
                                <ul class="list-filter color-filter" id="color">
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
                                <ul class="list-filter size-filter font-small" id="size">
                                    <li><a href="#">S</a></li>
                                    <li class="active"><a href="#">M</a></li>
                                    <li><a href="#">L</a></li>
                                    <li><a href="#">XL</a></li>
                                    <li><a href="#">XXL</a></li>
                                </ul>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                            <div class="detail-extralink">
                                {{-- Quantity field --}}


                                {{-- <div class="product-extra-link2">
                                    <button wire:click.prevent="buyNow"
                                        class="button buy-button">Buy Now</button>
                                    <button  wire:click.prevent="store({{$product->id}})"
                                        class="button add-cart-button">Add to cart</button>
                                </div> --}}
                            </div>
                            <ul class="product-meta font-xs color-grey mt-50">
                                <li class="mb-5">SKU: <a href="#" id="product_sku">FWM15VKT</a></li>
                                <li class="mb-5" id="tags">Tags: <a href="#" rel="tag">Cloth</a></li>
                                <li>Availability:<span class="in-stock text-success ml-5" id="stock">8 Items In Stock</span></li>
                            </ul>
                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('livewire:load', () => {
        Livewire.on('buyNow', (productId)=> {
            @this.buyNow(productId);
            console.log(buyNow);
        });
    });
</script>
