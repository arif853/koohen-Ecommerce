@extends('layouts.admin')
@section('title','Prodcuts')
@section('content')

<div class="content-header">
    <div>
        <h2 class="content-title card-title">Products List</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{'/dashborad'}}">Dashborad</a></li>
              <li class="breadcrumb-item active" aria-current="page">Product</li>
            </ol>
        </nav>
    </div>
    <div>

        <a href="{{route('products.create')}}" class="btn btn-primary btn-sm rounded">Create new</a>
    </div>
</div>
<div class="card mb-4">
    <header class="card-header">
        <h5 class="mb-3">Filter by</h5>
        <form>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <label for="order_id" class="form-label">Product ID</label>
                    <input type="text" placeholder="Type here" class="form-control" id="order_id">
                </div>
                <div class="col-md-3 mb-4">
                    <label for="order_customer" class="form-label">Product Name</label>
                    <input type="text" placeholder="Type here" class="form-control" id="order_customer">
                </div>
                <div class="col-md-3 mb-4">
                    <label for="order_created_date" class="form-label">Brand</label>
                    <input type="text" placeholder="Type here" class="form-control" id="order_created_date">
                </div>
                <div class="col-md-3 mb-4">
                    <label class="form-label">Status</label>
                    <select class="form-select">
                        <option>Published</option>
                        <option>Draft</option>
                    </select>
                </div>

            </div>
        </form>

    </header>
    <style>
        .table tr td{
            vertical-align: middle;
        }
    </style>
    <div class="card-body">
        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>#SN</th>
                    <th>Products</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>overviews</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key=> $product)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>
                        <a class="itemside" href="#">
                            <div class="left">
                                <img src="{{asset('storage/product_images/'.$product->product_images->first()->product_image)}}" class="img-sm img-thumbnail" alt="{{$product->slug}}">
                            </div>
                            <div class="info">
                                <h6 class="mb-0">{{$product->product_name}}</h6>
                            </div>


                        </a>
                    </td>
                    <td>{{$product->brand->brand_name}}</td>
                    <td>
                        {{$product->category->category_name}}
                    </td>
                    <td>{{$product->stock}}</td>
                    <td>
                        @foreach ($product->overviews as $overview)
                        <span>{{$overview->overview_name}} {{$overview->overview_value}}</span><br>
                        @endforeach
                    </td>
                    <td>
                        @if ($product->status == "active")

                        <span class="badge rounded-pill alert-success">Active</span>
                        @else
                        <span class="badge rounded-pill alert-danger">Inactive</span>

                        @endif
                    </td>
                    <td class="text-end">
                        <a href="{{route('products.show',$product->slug)}}" class="btn btn-md rounded font-sm">Detail</a>
                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                            <div class="dropdown-menu">
                                {{-- <a class="dropdown-item text-primary" href="{{route('order.details')}}">Return</a> --}}
                                <a class="dropdown-item" href="{{route('products.edit',$product->id)}}">Edit info</a>

                                <a class="dropdown-item text-danger" href="{{route('products.destroy',$product->id)}}" onclick="confirmDelete(event)">Delete</a>
                            </div>
                        </div> <!-- dropdown //end -->
                    </td>

                </tr>
                @endforeach

            </tbody>

        </table>
    </div> <!-- card-body end// -->
</div> <!-- card end// -->
{{-- <div class="pagination-area mt-30 mb-50">
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
