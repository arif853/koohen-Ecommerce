@extends('layouts.admin')
@section('title','customer')
@section('content')

    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Customer List</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{'/dashborad'}}">Dashborad</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Customers</li>
                </ol>
            </nav>
        </div>
        {{-- <div>
            <a href="#" class="btn btn-primary"><i class="material-icons md-plus"></i> Create new</a>
        </div> --}}
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="Search..." class="form-control">
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <select class="form-select">
                        <option>Status</option>
                        <option>Active</option>
                        <option>Disabled</option>
                        <option>Show all</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <select class="form-select">
                        <option>Show 20</option>
                        <option>Show 30</option>
                        <option>Show 40</option>
                    </select>
                </div>
            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Registered</th>
                            <th class="text-end"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $key => $customer)

                        <tr>
                            <td>
                                <a href="{{route('customer.profile', ['id' => $customer->id])}}" class="itemside">
                                    <div class="info pl-3">
                                        <h6 class="mb-0 title">{{$customer->firstName}} {{$customer->lastName}}</h6>
                                        <small class="text-muted">Customer ID: #{{$customer->id}}</small>
                                    </div>
                                </a>
                            </td>
                            <td>{{$customer->phone}}</td>
                            <td>{{$customer->email}}</td>
                            <td>
                                @if($customer->status == 'registerd')
                                <span class="badge rounded-pill alert-success">Registerd</span>

                                @else
                                <span class="badge rounded-pill alert-danger">Not Registerd</span>

                                @endif
                            </td>
                            <td>{{$customer->created_at->format('d-m-Y')}}</td>
                            <td class="text-end">
                                <a href="{{route('customer.profile', ['id' => $customer->id])}}" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                            </td>
                        </tr>

                        @endforeach


                    </tbody>
                </table> <!-- table-responsive.// -->
            </div>
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->
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

@endsection

