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
        {{-- <header class="card-header">
            <div class="row gx-3 customer_live_search">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="Customer name..." class="form-control" name="customer_name"
                        id="customer_name">
                </div>
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="Customer mobile number..." class="form-control" name="customer_phone"
                        id="customer_phone">
                </div>
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="email" placeholder="Customer email..." class="form-control" name="customer_email"
                        id="customer_email">
                </div>

            </div>
        </header> <!-- card-header end// --> --}}
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
                    <tbody id="CustomerTable">
                        @foreach ($data as $key => $list)
                            <tr>
                                <td> Order ID: {{ $list->order->id }}</td>
                                <td>
                                    <a href="{{ route('customer.profile', ['id' => $list->customer->id]) }}" class="itemside">
                                        <div class="info pl-3">
                                            <h6 class="mb-0 title">{{ $list->customer->firstName }} {{ $list->customer->lastName }}</h6>
                                            <small class="text-muted">Customer ID: #{{ $list->customer->id }}</small>
                                        </div>
                                    </a>
                                </td>
                                <td>{{ date('j F y',strtotime($list->order->created_at)) }}</td>
                                <td>{{ $list->order->total }}</td>
                                <td>
                                    @if ($list->mode =='online')
                                        <span class="badge rounded-pill alert-success">Online</span>
                                    @elseif($list->mode =='card')
                                        <span class="badge rounded-pill alert-info">Bank Card</span>
                                    @elseif($list->mode =='cod')
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
