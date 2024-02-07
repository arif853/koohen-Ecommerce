@extends('layouts.admin')
@section('title','Orders list')
@section('content')

    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Order List </h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{'/dashborad'}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Order</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <header class="card-header">
                    <h5 class="mb-3">Filter by</h5>
                    <form>
                        <div class="row">
                        <div class="col-md-3 mb-4">
                            <label for="order_id" class="form-label">Order ID</label>
                            <input type="text" placeholder="Type here" class="form-control" id="order_id">
                        </div>
                        <div class="col-md-3 mb-4">
                            <label for="order_customer" class="form-label">Customer</label>
                            <input type="text" placeholder="Type here" class="form-control" id="order_customer">
                        </div>
                        <div class="col-md-3 mb-4">
                            <label class="form-label">Order Status</label>
                            <select class="form-select" name="orderStatus" id="orderStatus">
                                <option>Published</option>
                                <option>Draft</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-4">
                            <label for="order_created_date" class="form-label">Date Added</label>
                            <input type="text" placeholder="Type here" class="form-control" id="order_created_date" >
                        </div>
                    </div>
                </form>

                </header>
                    <div class="row gx-3 mt-4">
                        <div class="col-lg-4 col-md-6 me-auto">
                            {{-- <input type="text" placeholder="Search..." class="form-control"> --}}
                        </div>
                        <div class="col-lg-2 col-md-3 col-6">
                            <select class="form-select  mb-lg-0 mb-15 mw-200 all_order_status" id="all_order_status" name="all_order_status" style="display: none;">
                                <option value="0" >Change Status</option>
                                <option value="pending" style="color: orange;" >Pending</option>
                                <option value="confirmed" style="color: blue;" >Confirmed</option>
                                <option value="shipped" style="color: green;" >Shipped</option>
                                <option value="delivered" style="color: #00cc00;" >Delivered</option>
                                <option value="completed" style="color: purple;">Completed</option>
                                <option value="returned" style="color: gray;" >Returned</option>
                                <option value="cancelled" style="color: red;" >Cancelled</option>
                            </select>
                        </div>

                    </div>
                <!-- card-header end// -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="datatable">
                            <thead>
                                <tr>
                                    {{-- <td><input type="checkbox" id="select-all-checkbox"></td> --}}
                                    <th>ID</th>
                                    <th>Customer name</th>
                                    <th>Customer Phone</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
                                    <th class="text-end"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($completedOrders as $key => $order)
                                <tr>
                                    {{-- <td><input type="checkbox" class="form-group order-checkbox" value="{{$order->id}}" id="order_checkbox"></td> --}}
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <a href="{{route('customer.profile', ['id' => $order->customer->id])}}" class="itemside">
                                        <div class="info pl-3">
                                            <h6 class="mb-0 title">{{$order->customer->firstName}} {{$order->customer->lastName}}</h6>
                                            <small class="text-muted">Order ID: #{{$order->id}}</small>
                                        </div>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="tel:{{$order->customer->phone}}">{{$order->customer->phone}}</a>
                                    </td>
                                    <td>৳{{$order->total}}</td>
                                    <td>
                                        <div class="status-container">
                                            <select disabled class="form-select d-inline-block mb-lg-0 mb-15 mw-200 order_status" id="order_status" data-order-id="{{ $order->id }}" name="order_status">
                                                <option value="pending" style="color: orange;" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="confirmed" style="color: blue;" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                                <option value="shipped" style="color: green;" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                                <option value="delivered" style="color: #00cc00;" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                                <option value="completed" style="color: purple;" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                                <option value="returned" style="color: gray;" {{ $order->status == 'returned' ? 'selected' : '' }}>Returned</option>
                                                <option value="cancelled" style="color: red;" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                    <td class="text-end">
                                        <a href="{{route('order.details', ['id' => $order->id])}}" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item text-primary" href="{{route('order.details')}}">Return</a>
                                                {{-- <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a> --}}
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div> <!-- table-responsive //end -->
                </div> <!-- card-body end// -->
            </div> <!-- card end// -->
        </div>

    </div>

@endsection
@push('order_status')
<script>
    // $(document).ready(function() {
    //     // Get references to the global and individual checkboxes
    //     const selectAllCheckbox = document.getElementById('select-all-checkbox');
    //     const individualCheckboxes = document.querySelectorAll('.order-checkbox');
    //     const statusSelect = $('#all_order_status');

    //     // Add an event listener to the global checkbox
    //     selectAllCheckbox.addEventListener('change', function () {
    //         // Update the state of all individual checkboxes based on the state of the global checkbox
    //         individualCheckboxes.forEach(checkbox => {
    //             checkbox.checked = selectAllCheckbox.checked;
    //         });

    //         // Show/hide the statusSelect based on the state of the global checkbox
    //         statusSelect.toggle(selectAllCheckbox.checked);
    //     });

    //     // Add an event listener to each individual checkbox
    //     individualCheckboxes.forEach(checkbox => {
    //         checkbox.addEventListener('change', function () {
    //             // Update the state of the global checkbox based on the state of individual checkboxes
    //             selectAllCheckbox.checked = [...individualCheckboxes].every(checkbox => checkbox.checked);

    //             // Show/hide the statusSelect based on the state of the individual checkboxes
    //             statusSelect.toggle([...individualCheckboxes].some(checkbox => checkbox.checked));
    //         });
    //     });

    //     $('.order-checkbox').change(function() {
    //         var orderId = $(this).val();
    //         var statusSelect = $('#all_order_status');

    //         if ($(this).prop('checked')) {
    //             statusSelect.show();
    //         } else {
    //             statusSelect.hide();
    //         }
    //     });

    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });

    //     $('.all_order_status').change(function() {
    //         var selectedStatus = $(this).val();
    //         var selectedOrders = $('.order-checkbox:checked').map(function() {
    //             return $(this).val();
    //         }).get();
    //         // console.log(selectedOrders);
    //         // Perform an AJAX request to update the status of selected orders
    //         $.ajax({
    //             type: 'POST',
    //             url: '/update-order-status',
    //             data: {
    //                 status: selectedStatus,
    //                 orders: selectedOrders
    //             },
    //             success: function(response) {
    //                 // Handle success, if needed
    //                 location.reload();
    //                 if (response.success) {
    //                     $.Notification.autoHideNotify('success', 'top right', 'Success', response.message);
    //                 }
    //                 console.log(response);
    //             },
    //             error: function(error) {
    //                 // Handle error, if needed
    //                 location.reload();
    //                 console.error(error);
    //             }
    //         });
    //     });

    //     $('.order_status').change(function() {
    //         var orderId = $(this).data('order-id');
    //         var newStatus = $(this).val();

    //         console.log(newStatus);
    //         console.log(orderId);
    //         // Perform an AJAX request to update the status of selected orders
    //         $.ajax({
    //             type: 'POST',
    //             url: '/update-one-order-status', // Update with your route
    //             data: {
    //                 orderId: orderId,
    //                 newStatus: newStatus,
    //                 _token: '{{ csrf_token() }}'
    //             },
    //             success: function (response) {
    //                 // Handle success, if needed
    //                 location.reload();
    //                 if (response.success) {
    //                     $.Notification.autoHideNotify('success', 'top right', 'Success', response.message);
    //                 }
    //                 console.log(response);
    //             },
    //             error: function (error) {
    //                 // Handle error, if needed
    //                 console.error(error);
    //             }
    //         });
    //     });

    //     // // $('.order_status').change(function () {
    //     //     var selectedColor = $('option:selected', '.order_status').css('color');
    //     //     $('.order_status').css('background-color', selectedColor);
    //     // // });
    // });
</script>
@endpush
