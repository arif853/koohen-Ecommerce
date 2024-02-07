@extends('layouts.admin')
@section('title',$customer->firstName)
@section('content')

<div class="content-header">
    <a href="javascript:history.back()"><i class="material-icons md-arrow_back"></i> Go back </a>
</div>
<div class="card mb-4">
    <div class="card-header bg-primary" style="height:150px">
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl col-lg flex-grow-0" style="flex-basis:230px">
                <div class="img-thumbnail shadow w-100 bg-white position-relative text-center" style="height:190px; width:200px; margin-top:-120px">
                    <img src="{{asset('admin/assets/imgs/customer_avatar.png')}}" class="center-xy " width="100%" height="100%" alt="{{$customer->firstName}}">
                </div>
            </div> <!--  col.// -->
            <div class="col-xl col-lg">
                <h3>{{$customer->firstName}} {{$customer->lastName}}</h3>
                <p>{{$customer->billing_address}}</p>
            </div> <!--  col.// -->
            {{-- <div class="col-xl-4 text-md-end">
                <a href="#" class="billing_modify"><i class="fa-solid fa-pen-to-square"></i></a>
            </div> --}}
             <!--  col.// -->
        </div> <!-- card-body.// -->
        <hr class="my-4">
        <div class="row g-4">
            <div class="col-md-12 col-lg-4 col-xl-2">
                <article class="box">
                    <p class="mb-0 text-muted">Total orders:</p>
                    <h5 class="text-success">{{$totalOrders}}</h5>
                    <p class="mb-0 text-muted">Total amount:</p>
                    <h5 class="text-success mb-0">{{$totalOrderAmount}}</h5>
                </article>
            </div> <!--  col.// -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <h6>Contacts</h6>
                <p>
                    {{-- Manager: Jerome Bell <br> --}}
                    <a href="mailto:{{$customer->email}}">{{$customer->email}}</a><br>
                    <a href="tel:{{$customer->phone}}">(+880) {{$customer->phone}}</a>

                </p>
            </div> <!--  col.// -->
            <style>
                .action_btn_icon .billing_modify{
                    font-size: 16px;
                    padding: 6px;
                    /* background: #000; */
                    line-height: 16px
                }
            </style>
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="action_btn_icon d-flex justify-content-between">
                    <h6>Billing Address</h6>
                    {{-- <a href="#" class="billing_modify"><i class="fa-solid fa-pen-to-square"></i></a> --}}
                </div>
                <p>
                    @if ($customer->billing_address != null)
                    <span><strong>Address:</strong>{{$customer->billing_address}}</span><br>
                    @else
                    <strong>Address:</strong><span class="text-danger"> Need to update from customer end.</span><br>
                    @endif

                    @if ($customer->division != null)
                        <span> <strong>Division:</strong> {{$division->name}},</span>
                        <span> <strong>District:</strong>  {{$district->name}}</span> <br>
                        <span> <strong>Area:</strong> {{$area->upazila}},</span>
                        <span> <strong>PostOffice:</strong>  {{$area->postOffice}}</span> <br>
                        <span> <strong>Postal code:</strong>{{ $area->postCode}}</span>
                    @else
                    <strong>Division:</strong><span class="text-danger"> Need to update from customer end.</span><br>
                    <strong>District:</strong><span class="text-danger"> Need to update from customer end.</span><br>
                    <strong>Area:</strong><span class="text-danger"> Need to update from customer end.</span><br>
                    <strong>PostOffice:</strong><span class="text-danger"> Need to update from customer end.</span><br>
                    <strong>Postal code:</strong><span class="text-danger"> Need to update from customer end.</span><br>

                    @endif

                </p>

            </div> <!--  col.// -->
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <h6 class="mb-2">Shipping Address</h6>

                <div class="accordion" id="accordionExample">
                    @if($shipping)
                    @foreach ($shipping as $key => $shipping_info)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne_{{$key+1}}">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{$key+1}}" aria-expanded="false" aria-controls="collapse_{{$key+1}}">
                              Shipping #{{$key+1}}
                            </button>
                        </h2>
                        <div id="collapse_{{$key+1}}" class="accordion-collapse collapse " aria-labelledby="headingOne_{{$key+1}}" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                              <p>
                                  <strong>Name: </strong><span>{{$shipping_info->first_name}} {{$shipping_info->last_name}},</span><br>
                                  <strong>Address: </strong> <span> {{$shipping_info->shipping_add}}</span><br>
                                  <strong>Phone: </strong> <span>{{$shipping_info->s_phone}}</span> <br>
                                  <strong>Email: </strong><span>{{$shipping_info->s_email}}</span>
                              </p>
                              {{-- <div class="action_btn_icon d-flex justify-content-end">
                                  <a href="#" class=""><i class="fa-solid fa-pen-to-square"></i></a>
                              </div> --}}
                            {{-- <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow. --}}
                          </div>
                        </div>
                    </div>
                    @endforeach

                    @else
                        <p>No Shipping address.</p>
                    @endif
                    {{-- <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
                            Accordion Item #1
                          </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                <strong>Address:</strong> <span> {{$shipping}}</span><br>
                                <strong>Area:</strong><span>{{$area->upazila}},</span>
                                <strong>District:</strong> <span>{{$district->name}}</span> <br>
                                <strong>Postal code:</strong><span>{{ $area->postCode}}</span>
                            </p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Accordion Item #2
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Accordion Item #3
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                      </div>
                    </div> --}}
                  </div>

            </div> <!--  col.// -->

        </div> <!--  row.// -->
    </div> <!--  card-body.// -->
</div> <!--  card.// -->
<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title">Total <span class="text-success">{{$totalProductCount}} </span> Products Order by Customer</h5>
        @if($customerProducts)
        <div class="row">
            @foreach ($customerProducts as $product)
            <div class="col-xl-2 col-lg-3 col-md-6">
                <div class="card card-product-grid">
                    <a href="#" class="img-wrap">
                        @if($product->product_images->isNotEmpty())
                            <img  src="{{ asset('storage/product_images/' . $product->product_images->first()->product_image) }}" alt="{{$product->slug}}">
                        @endif
                    </a>
                    {{-- <a href="#" class="img-wrap"> <img src="{{asset('storage/product_image/',$product->product_images->product_image)}}" alt="Product"> </a> --}}
                    <div class="info-wrap">
                        <a href="#" class="title">{{$product->product_name}}</a>
                        <div class="price mt-1">৳{{$product->regular_price}}</div> <!-- price-wrap.// -->
                    </div>
                </div> <!-- card-product  end// -->
            </div> <!-- col.// -->
            @endforeach


        </div> <!-- row.// -->
        @else
        <p>No products found.</p>
        @endif

    </div> <!--  card-body.// -->
</div> <!--  card.// -->

@endsection
