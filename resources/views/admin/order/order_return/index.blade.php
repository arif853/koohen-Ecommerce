@extends('layouts.admin')
@section('content')

    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Order Return</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{'/dashborad'}}">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="{{'/dashborad/orders'}}">Orders</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Orders Return</li>
                </ol>
            </nav>
        </div>
        {{-- <div>
            <button type="button" class="btn btn-primary btn-sm rounded" data-bs-toggle="modal" data-bs-target="#returnModal">
                 Return Order
            </button>
        </div> --}}
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                {{-- <header class="card-header">
                    <h5 class="mb-3">Filter by</h5>
                    <form>
                        <div class="row">
                        <div class="col-md-3 mb-4">
                            <label for="order_id" class="form-label">Order ID</label>
                            <input type="text" placeholder="Type here" class="form-control" id="order_id">
                        </div>

                        <div class="col-md-3 mb-4">
                            <label for="order_created_date" class="form-label">Return Date</label>
                            <input type="text" placeholder="Type here" class="form-control" id="order_created_date">
                        </div>
                    </div>
                </form>

                </header> --}}

                <!-- card-header end// -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer name</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Return Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            </thead>
                            <tbody>
                                @if ($order_return->isNotEmpty())
                                    @foreach ($order_return as $key => $value)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><b>{{ $value->customer->firstName.' '.$value->customer->lastName }}</b></td>
                                        <td> {{ $value->total }} &#2547;</td>
                                        <td><span class="badge rounded-pill alert-success">{{ $value->status }}</span></td>
                                        <td>{{ $value->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            @if($value->return_confirm == 0)
                                            <a href="{{url('dashboard/order',$value->id)}}" class="btn btn-warning btn-sm">Confirm Return</a>

                                            @else
                                            <a href="#" class="text-danger">Order has been returned.</a>

                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div> <!-- table-responsive //end -->
                </div> <!-- card-body end// -->
            </div> <!-- card end// -->
        </div>

    </div>
    {{-- <div class="pagination-area mt-15 mb-50">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-start">
                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                <li class="page-item"><a class="page-link" href="#">02</a></li>
                <li class="page-item"><a class="page-link" href="#">03</a></li>
                <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">16</a></li>
                <li class="page-item"><a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a></li>
            </ul>
        </nav>
    </div> --}}


    {{-- return modal --}}

    @include('admin.order.order_return.return')
@endsection
