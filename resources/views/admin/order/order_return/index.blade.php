@extends('layouts.admin')
@section('content')

    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Order Return List </h2>
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
                <header class="card-header">
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

                </header>

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
                                    <th class="text-end"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>452</td>
                                    <td><b>Devon Lane</b></td>
                                    <td>$948.55</td>
                                    <td><span class="badge rounded-pill alert-success">Returned</span></td>
                                    <td>07.05.2022</td>
                                    <td class="text-end">
                                        <a href="{{route('order.details')}}" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('order.details')}}">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>789</td>
                                    <td><b>Guy Hawkins</b></td>
                                    <td>$0.00</td>
                                    <td><span class="badge rounded-pill alert-success">Returned</span></td>
                                    <td>25.05.2022</td>
                                    <td class="text-end">
                                        <a href="{{route('order.details')}}" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('order.details')}}">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>478</td>
                                    <td><b>Leslie Alexander</b></td>
                                    <td>$293.01</td>
                                    <td><span class="badge rounded-pill alert-success">Returned</span></td>
                                    <td>18.05.2022</td>
                                    <td class="text-end">
                                        <a href="{{route('order.details')}}" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('order.details')}}">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>589</td>
                                    <td><b>Albert Flores</b></td>
                                    <td>$105.55</td>
                                    <td><span class="badge rounded-pill alert-success">Returned</span></td>
                                    <td>07.02.2022</td>
                                    <td class="text-end">
                                        <a href="{{route('order.details')}}" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('order.details')}}">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>345</td>
                                    <td><b>Eleanor Pena</b></td>
                                    <td>$779.58</td>
                                    <td><span class="badge rounded-pill alert-success">Returned</span></td>
                                    <td>18.03.2022</td>
                                    <td class="text-end">
                                        <a href="{{route('order.details')}}" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('order.details')}}">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>456</td>
                                    <td><b>Dianne Russell</b></td>
                                    <td>$576.28</td>
                                    <td><span class="badge rounded-pill alert-success">Returned</span></td>
                                    <td>23.04.2022</td>
                                    <td class="text-end">
                                        <a href="{{route('order.details')}}" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('order.details')}}">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>768</td>
                                    <td><b>Savannah Nguyen</b></td>
                                    <td>$589.99</td>
                                    <td><span class="badge rounded-pill alert-success">Returned</span></td>
                                    <td>18.05.2022</td>
                                    <td class="text-end">
                                        <a href="{{route('order.details')}}" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('order.details')}}">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>977</td>
                                    <td><b>Kathryn Murphy</b></td>
                                    <td>$169.43</td>
                                    <td><span class="badge rounded-pill alert-success">Returned</span></td>
                                    <td>23.03.2022</td>
                                    <td class="text-end">
                                        <a href="{{route('order.details')}}" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('order.details')}}">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>687</td>
                                    <td><b>Jacob Jones</b></td>
                                    <td>$219.78</td>
                                    <td><span class="badge rounded-pill alert-success">Returned</span></td>
                                    <td>07.05.2022</td>
                                    <td class="text-end">
                                        <a href="{{route('order.details')}}" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('order.details')}}">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                <tr>
                                    <td>688</td>
                                    <td><b>Jacob Jones</b></td>
                                    <td>$219.78</td>
                                    <td><span class="badge rounded-pill alert-success">Returned</span></td>
                                    <td>07.05.2022</td>
                                    <td class="text-end">
                                        <a href="{{route('order.details')}}" class="btn btn-md rounded font-sm">Detail</a>
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('order.details')}}">View detail</a>
                                                <a class="dropdown-item" href="#">Edit info</a>
                                                <a class="dropdown-item text-danger" href="#">Delete</a>
                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
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
