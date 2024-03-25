@extends('layouts.admin')
@section('title', 'Transaction')
@section('content')

    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Transaction List</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ '/dashborad' }}">Dashborad</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Transaction</li>
                </ol>
            </nav>
        </div>
        {{-- <div>
            <a href="#" class="btn btn-primary"><i class="material-icons md-plus"></i> Create new</a>
        </div> --}}
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3 " id="transaction_live_search">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="number" placeholder="Order no..." class="form-control" id="order_no">
                </div>
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="Customer name..." class="form-control" id="customer_name">
                </div>
                <div class="col-lg-4 col-md-6 me-auto">
                    {{-- <input type="email" placeholder="Customer email..." class="form-control" name="customer_email"
                        id="customer_email"> --}}
                </div>
            </div>
        </header>

        <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th>Order No</th>
                            <th>Customer Name</th>
                            <th>Order Date</th>
                            <th>Total</th>
                            <th>Payment Method</th>
                            <th>Payment Status</th>
                            <th>Transaction Date</th>

                        </tr>
                    </thead>
                    <tbody id="transactionTableBody">
                        @foreach ($data as $key => $list)
                            <tr>
                                <td> Order ID: {{ $list->order->id }}</td>
                                <td>
                                    <a href="{{ route('customer.profile', ['id' => $list->customer->id]) }}"
                                        class="itemside">
                                        <div class="info pl-3">
                                            <h6 class="mb-0 title">{{ $list->customer->firstName }}
                                                {{ $list->customer->lastName }}</h6>
                                            <small class="text-muted">Customer ID: #{{ $list->customer->id }}</small>
                                        </div>
                                    </a>
                                </td>
                                <td>{{ date('j F y', strtotime($list->order->created_at)) }}</td>
                                <td>{{ $list->order->total }}</td>
                                <td>
                                    @if ($list->mode == 'online')
                                        <span class="badge rounded-pill alert-success">Online</span>
                                    @elseif($list->mode == 'card')
                                        <span class="badge rounded-pill alert-info">Bank Card</span>
                                    @elseif($list->mode == 'cod')
                                        <span class="badge rounded-pill alert-warning">Cash On Delivery</span>
                                    @else
                                        <span class="badge rounded-pill alert-danger">Not Found</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($list->status == 'approved')
                                        <span class="badge rounded-pill alert-success">Approved</span>
                                    @elseif($list->status == 'declined')
                                        <span class="badge rounded-pill alert-info">Declined</span>
                                    @elseif($list->status == 'refunded')
                                        <span class="badge rounded-pill alert-danger">Refunded</span>
                                    @elseif($list->status == 'pending')
                                        <span class="badge rounded-pill alert-warning">Pending</span>
                                    @else
                                        <span class="badge rounded-pill alert-danger">Not Found
                                        </span>
                                    @endif
                                </td>
                                <td>{{ $list->created_at->format('d-m-Y') }}</td>

                            </tr>
                        @endforeach


                    </tbody>
                </table> <!-- table-responsive.// -->
            </div>
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->

@endsection
@push('transaction_filter')
    <script type="text/javascript">
        $('#transaction_live_search input').on('keyup', function() {
            let orderNo = $('#order_no').val();
            let customerName = $('#customer_name').val();

            $.ajax({
                url: "{{ route('transaction.filter') }}",
                method: "GET",
                data: {
                    orderNo: orderNo,
                    customerName: customerName
                },
                success: function(response) {
                    let transactionTableBody = $('#transactionTableBody');
                    transactionTableBody.empty();
                   
                        response.forEach(function(transaction) {
                        let row = $('<tr>');

                        row.append($('<td>').text('Order ID: ' + transaction.order.id));

                        let customerLink = $('<a>').addClass('itemside').append(
                            $('<div>').addClass('info pl-3').append(
                                $('<h6>').addClass('mb-0 title').text(transaction.customer
                                    .firstName + ' ' + transaction.customer.lastName),
                                $('<small>').addClass('text-muted').text('Customer ID: #' +
                                    transaction.customer.id)
                            )
                        );
                        row.append($('<td>').append(customerLink));
                        let createdAtOrderDate = new Date(transaction.order.created_at);
                        let OrderFormattedDate = ("0" + createdAtOrderDate.getDate()).slice(-
                            2) + '-' + (
                                "0" + (createdAtOrderDate.getMonth() + 1)).slice(-2) + '-' +
                            createdAtOrderDate.getFullYear();

                        // Create the created_at cell with formatted date
                        row.append($('<td>').text(OrderFormattedDate));

                        row.append($('<td>').text(transaction.order
                        .total)); // Assuming you want to display the total amount of the order
                        // Display payment mode with Bootstrap badge
                        let modeBadge = $('<span>').addClass('badge rounded-pill');
                        if (transaction.mode == 'online') {
                            modeBadge.addClass('alert-success').text('Online');
                        } else if (transaction.mode == 'card') {
                            modeBadge.addClass('alert-info').text('Bank Card');
                        } else if (transaction.mode == 'cod') {
                            modeBadge.addClass('alert-warning').text('Cash On Delivery');
                        } else {
                            modeBadge.addClass('alert-danger').text('Not Found');
                        }
                        row.append($('<td>').append(modeBadge));

                        // Display transaction status with Bootstrap badge
                        let statusBadge = $('<span>').addClass('badge rounded-pill');
                        if (transaction.status == 'approved') {
                            statusBadge.addClass('alert-success').text('Approved');
                        } else if (transaction.status == 'declined') {
                            statusBadge.addClass('alert-info').text('Declined');
                        } else if (transaction.status == 'refunded') {
                            statusBadge.addClass('alert-danger').text('Refunded');
                        } else if (transaction.status == 'pending') {
                            statusBadge.addClass('alert-warning').text('Pending');
                        } else {
                            statusBadge.addClass('alert-danger').text('Not Found');
                        }
                        row.append($('<td>').append(statusBadge));
                        let createdAtDate = new Date(transaction.created_at);
                        let formattedDate = ("0" + createdAtDate.getDate()).slice(-2) + '-' + (
                                "0" + (createdAtDate.getMonth() + 1)).slice(-2) + '-' +
                            createdAtDate.getFullYear();

                        // Create the created_at cell with formatted date
                        row.append($('<td>').text(formattedDate));
                        // Assuming you want to display the creation date of the transaction

                        transactionTableBody.append(row);
                    });
                    
                 
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
    </script>
@endpush
