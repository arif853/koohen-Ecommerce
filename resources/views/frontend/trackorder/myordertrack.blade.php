
@extends('layouts.home')
@section('title','Track Order')

@section('main')

<main class="main">
    <div class="page-header breadcrumb-wrap mb-10">
       <div class="container">
          <div class="breadcrumb">
             <a href="{{route('home')}}" rel="nofollow">Home</a>
             <span></span> Track order
          </div>
       </div>
    </div>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card tab">
                        <header class="card-header">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6 mb-lg-0 mb-15">
                                    <span>
                                        <i class="material-icons md-calendar_today"></i> <b id="order_time">{{$responseData['order']->created_at->setTimezone('Asia/Dhaka')->format('D, M j, Y, g:iA')}}</b>
                                    </span> <br>
                                    <small class="text-muted" id="track_number">Order ID: {{$responseData['order']->id}}</small> <br>
                                </div>
                            </div>
                        </header> <!-- card-header end// -->
                        <div class="card-body">
                            <div class="order-tracking mb-50">
                                <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between">
                                    <div class="step completed">
                                        <div class="step-icon-wrap">
                                            <div class="step-icon">
                                                <i class="far fa-shopping-basket"></i>
                                            </div>
                                        </div>
                                        <h4 class="step-title">Order Placed</h4>
                                        <small class="text-muted text-sm">15 March 2022</small>
                                    </div>
                                    <div class="step completed">
                                        <div class="step-icon-wrap">
                                            <div class="step-icon"><i class="fas fa-shopping-bag"></i></div>
                                        </div>
                                        <h4 class="step-title">Confirmed Order</h4>
                                        <small class="text-muted text-sm">16 March 2022</small>
                                    </div>
                                    <div class="step ">
                                        <div class="step-icon-wrap">
                                            <div class="step-icon"><i class="fad fa-truck-couch"></i></div>
                                        </div>
                                        <h4 class="step-title">Shipped</h4>
                                        <small class="text-muted text-sm">17 March 2022</small>
                                    </div>
                                    <div class="step">
                                        <div class="step-icon-wrap">
                                            <div class="step-icon"><i class="fal fa-shipping-fast"></i></div>
                                        </div>
                                        <h4 class="step-title">Product Delivered</h4>
                                        <small class="text-muted text-sm">18 March 2022</small>
                                    </div>
                                    <div class="step">
                                        <div class="step-icon-wrap">
                                            <div class="step-icon"><i class="fas fa-badge-check"></i></div>
                                        </div>
                                        <h4 class="step-title">Order Completed</h4>
                                        <small class="text-muted text-sm">20 March 2022</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div >
                            <h3 id="orderStatus"></h3>
                        </div>

                        <div class="card-body text-primary">

                            <h3 class="card-title">Order Details</h3>
                            <table class="table " id="orderDetailsTable">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-start" width=10% >Ordered Date</th>
                                        <th scope="col" class="text-center">Product</th>
                                        {{-- <th scope="col" class="text-center">Varient</th> --}}
                                        <th scope="col" class="text-center">Qty</th>
                                        <th scope="col" class="text-center">Price</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($responseData['orderProducts'] as $product)
                                    <tr>
                                        <td scope="row" class="text-start">{{$responseData['order']->created_at->setTimezone('Asia/Dhaka')->format('D, M j, Y, g:iA')}}</td>
                                        <td scope="row" class="text-center">
                                            <a href="#">
                                                <img height="80px" width="80px" src="{{asset('storage/product_images/'.$product->product_images[0]->product_image)}}" class="image-fluid" alt="{{$product->slug}}">
                                            <p>{{$product->product_name}}</p>
                                            </a>

                                        </td>

                                        <td class="text-center">{{$product->quantity}}</td>
                                        <td class="text-center">{{$product->price}}</td>
                                    </tr>

                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" style="border: none"></td>
                                        <td class="text-end">Subtotal :</td>
                                        <td class="text-center"><span id="subtotal">{{$responseData['order']->subtotal}}</span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="border: none"></td>
                                        <td class="text-end">Delivery Type :</td>
                                        <td class="text-center"><span id="d_type">{{$responseData['order']->delivery_charge}}</span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="border: none"></td>
                                        <td class="text-end">Discount :</td>
                                        <td class="text-center"><span id="d_charge">{{$responseData['order']->discount}}</span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="border: none"></td>
                                        <td class="text-end" style="font-size: 18px; font-weight:600 ">Grand Total :</td>
                                        <td class="text-center" style="font-size: 18px; font-weight:600 "><span id="g_total">{{$responseData['order']->total}}</span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div> <!-- card end// -->

                </div>
            </div>
        </div>
    </section>
</main>

@endsection
@push('dashboard')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.33/moment-timezone.min.js"></script>

<script>
   $(document).ready(function () {

      // Ensure orderStatus is an object with the expected properties
      var orderStatus = {!! json_encode($responseData['order']->orderstatus) !!};

      console.log(orderStatus);
      var steps = $('.steps');
      steps.empty();

      var statusIcons = {
          pending: 'far fa-shopping-basket',
          confirmed: 'fas fa-shopping-bag',
          shipped: 'fad fa-truck-couch',
          delivered: 'fal fa-shipping-fast',
          completed: 'fas fa-badge-check',
          returned: 'fas fa-undo-alt',
          cancelled: 'fas fa-times-circle'
      };

      var currentStatusIndex = ['pending', 'confirmed', 'shipped', 'delivered', 'completed'].indexOf(orderStatus.status);

      // Iterate over all possible statuses and update the steps
      $.each(['pending', 'confirmed', 'shipped', 'delivered', 'completed'], function(index, stepStatus) {
          var iconClass = statusIcons[stepStatus];
          var date = orderStatus[stepStatus + '_date_time'];
          var formattedDate = date ? moment.utc(date).tz('Asia/Dhaka').format('D MMM YYYY') : '';
          var isCompleted = index <= currentStatusIndex;

          steps.append(
              '<div class="step ' + (isCompleted ? 'completed' : '') + '">' +
                  '<div class="step-icon-wrap">' +
                      '<div class="step-icon"><i class="' + iconClass + '"></i></div>' +
                  '</div>' +
                  '<h4 class="step-title">' + stepStatus.replace(/^\w/, c => c.toUpperCase()) + '</h4>' +
                  '<small class="text-muted text-sm">' + formattedDate + '</small>' +
              '</div>'
          );
      });
    });


</script>
@endpush
