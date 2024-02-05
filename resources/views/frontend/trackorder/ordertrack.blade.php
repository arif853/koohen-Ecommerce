
@extends('layouts.home')
@section('title','Track Order')

@section('main')

<main class="main">
    <div class="page-header breadcrumb-wrap">
       <div class="container">
          <div class="breadcrumb">
             <a href="{{route('home')}}" rel="nofollow">Home</a>
             <span></span> Track order
          </div>
       </div>
    </div>
    <style>
        .search-container .track-btn{
            margin-top: 25px;
            border-radius: 50px;
        }
        button.submit, button[type="submit"] {
            font-size: 15px;
            font-weight: 500;
            padding: 10px 40px;
            color: #ffffff;
            border: none;
            background-color: #FF8B13;
            border: 1px solid #FF8B13;
            border-radius: 5px;
        }
        button.submit, button[type="submit"]:hover {
            background-color: #FF8B13 !important;
            border: 1px solid #FF8B13;
        }
        .card{
            display: none;
        }
    </style>
    <section>
        <div class="container">
            <div class="search-container my-4">
                <form  id="ordertrackform">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="search-menu">
                                <label for="form-label"> Track your order:  </label>
                                <input type="text" class="form-control" name="" id="order_number" placeholder="Track id: K24-0000">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <button class="btn btn-success track-btn" type="submit">Track</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="card">
                        <header class="card-header">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6 mb-lg-0 mb-15">
                                    <span>
                                        <i class="material-icons md-calendar_today"></i> <b>Wed, Aug 13, 2022, 4:34PM</b>
                                    </span> <br>
                                    <small class="text-muted">Order ID: 3453012</small> <br>
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
                                    <div class="step completed">
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

                                    <tr>
                                        <th scope="row" class="text-start"></th>
                                        <td scope="row" class="text-center">
                                            <a href="#">
                                                <img height="80px" width="80px" src="" class="image-fluid" alt="ProductImage">
                                            <p></p>
                                            </a>

                                        </td>

                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                    </tr>


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" style="border: none"></td>
                                        <td class="text-end">Subtotal :</td>
                                        <td class="text-center">    </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="border: none"></td>
                                        <td class="text-end">Delivery Type :</td>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="border: none"></td>
                                        <td class="text-end">Delivery Charge :</td>
                                        <td class="text-center">500.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="border: none"></td>
                                        <td class="text-end" style="font-size: 18px; font-weight:600 ">Grand Total :</td>
                                        <td class="text-center" style="font-size: 18px; font-weight:600 ">500.00</td>
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
<script>
   $(document).ready(function () {
    // Attach a submit event listener to the form
        $('#ordertrackform').submit(function (event) {
            // Prevent the default form submission
            event.preventDefault();

            // Get the track ID from the input field
            var trackId = $('#order_number').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Make an AJAX request to fetch product details
            $.ajax({
                url: '/trackorder/order_details',
                method: 'post',
                dataType: 'json',
                data: { trackid: trackId },
                success: function (response) {
                    if (response && response.length > 0) {
                        console.log(response);
                        $('.card').css('display', 'block');

                        // Clear existing table content
                        $('#orderDetailsTable tbody').empty();

                        // Loop through the response data and append rows to the table
                        $.each(response, function (index, item) {
                            var row = '<tr>'+
                                        '<th scope="row" class="text-start">'+item.created_at+'</th>'+
                                        '<td scope="row" class="text-center">'+
                                            '<a href="#">'+
                                                '<img height="80px" width="80px" src="" class="image-fluid" alt="ProductImage">'+
                                            '<p></p>'+
                                            '</a>'+
                                            item.product_name
                                        '</td>'+

                                        '<td class="text-center">' + item.quantity + '</td>'+
                                       ' <td class="text-center">' + item.price + '</td>'+
                                   ' </tr>';
                            // Append the row to the table body
                            $('#orderDetailsTable tbody').append(row);
                        });
                    } else {
                        // Handle the case where no data is returned
                        console.log('No data found for the order');
                    }
                },
                error: function (error) {
                    console.error('Error fetching order data:', error);
                }
            });
        });
    });


  </script>
@endpush
