

@extends('layouts.admin')
@section('title','Inventory')
@section('content')

<div>
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Inventory</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{'/dashborad'}}">Dashborad</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic Inventory</li>
                </ol>
            </nav>
        </div>
        <div class="content-header">
            <a href="javascript:history.back()"><i class="material-icons md-arrow_back"></i> Go back </a>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                <style>
                    .table tr td{
                        vertical-align: middle;
                    }
                </style>
                <div class="card-body">
                    <div>
                        <div class="table-responsive table-desi">
                            <table class="table table-striped" id="datatable">
                                <thead>
                                    <tr>
                                        <th width=5%>ID</th>
                                        <th>Product</th>
                                        <th>Supplier</th>
                                        <th>Last Update</th>
                                        <th>In </th>
                                        <th>Out</th>
                                        <th>Balance</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>
                                                <a class="itemside" href="#">
                                                    <div class="info">
                                                        <h6 class="mb-0">{{$product->product_name}}</h6>
                                                    </div>
                                                </a>
                                            </td>

                                            @if ($product->supplier)
                                            <td>{{$product->supplier->supplier_name }} </td>
                                            @else
                                            <td>No Supplier. </td>
                                            @endif

                                            <td>{{$product->updated_at}}</td>
                                            <td>{{$product->stock}}</td>
                                            <td>{{ $product->soldQuantity }}</td>
                                            @php
                                                $stock_balance = $product->stock - $product->soldQuantity;
                                            @endphp
                                            <td>
                                                @if ($stock_balance > 0 )
                                                {{$stock_balance}}
                                                @else
                                                <span class="text-danger"> Out of Stock</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#NewStockModal" data-product-id="{{ $product->id}}" class="btn btn-brand btn-sm add-stock">Add Stock</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@include('admin.inventory.new-stock')

<h6>It is not the man who has too little, but the man who craves more, that is poor. - Seneca</h6>
<h6>I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison</h6>


@endsection
@push('product')
<script>

    // Edit Category
    $(document).on('click', '.add-stock', function (e) {
        e.preventDefault();
        var product = $(this).data('product-id');
        // console.log(categoryId);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/dashboard/inventory/newstock',
            method: 'GET',
            data: {
                id: product,
            },
            success: function (response) {
                // console.log(response);
                // console.log(response.supplier.supplier_name);
                $('#product_id').val(response.id);
                $('#old_stock').val(response.stock);
                $('#product_name').val(response.product_name);
                $('#supplier').val(response.supplier.supplier_name);

            }
        });
    });

    //New stock update
    $("#newStock").submit(function (e) {
        e.preventDefault();
        const data = new FormData(this);
        console.log(data);
        $.ajax({
            url: '/dashboard/inventory/addstock',
            method: 'post',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            success: function (res) {
                if (res.status == 200) {
                    // console.log(res);
                    location.reload();
                    // $.Notification.autoHideNotify('success', 'top right', 'Excellent!!', res.message);
                }
                else{
                    $.Notification.autoHideNotify('danger', 'top right', 'Failed', res.message);

                }
            }
        })
    });
</script>

@endpush

