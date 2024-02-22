@extends('layouts.admin')
@section('title','Orders-'.$order->id)
@section('content')

    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Order detail</h2>
            <p>Details for Order ID: {{$order->id}}</p>
        </div>
        <div class="content-header">
            <a href="javascript:history.back()"><i class="material-icons md-arrow_back"></i> Go back </a>
        </div>
    </div>
    <div class="card">
        <header class="card-header">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 mb-lg-0 mb-15">
                    <span>
                        <i class="material-icons md-calendar_today"></i> <b>{{$order->created_at->setTimezone('Asia/Dhaka')->format('D, M j, Y, g:iA')}}</b>
                    </span> <br>
                    <small class="text-muted">Order ID: {{$order->id}}</small>
                </div>
                <div class="col-lg-6 col-md-6 ms-auto text-md-end">
                    <select class="form-select d-inline-block mb-lg-0 mb-15 mw-200">
                        <option>Change status</option>
                        <option>Awaiting payment</option>
                        <option>Confirmed</option>
                        <option>Shipped</option>
                        <option>Delivered</option>
                    </select>
                    <a class="btn btn-primary" href="#">Save</a>
                    <a class="btn btn-secondary print ms-2"   href="{{ route('order.invoice', $order->id) }}"><i class="icon material-icons md-print"></i></a>
                </div>
            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="row mb-50 mt-20 order-info-wrap">
                <div class="col-md-4">
                    <article class="icontext align-items-start">
                        <span class="icon icon-sm rounded-circle bg-primary-light">
                            <i class="text-primary material-icons md-person"></i>
                        </span>
                        <div class="text">
                            <h6 class="mb-1">Customer</h6>
                            <p class="mb-1">
                                {{$order->customer->firstName}} {{$order->customer->lastName}} <br> {{$order->customer->email}} <br> {{$order->customer->phone}}
                            </p>
                            <a href="{{route('customer.profile', ['id' => $order->customer->id])}}">View profile</a>
                        </div>
                    </article>
                </div> <!-- col// -->
                <div class="col-md-4">
                    <article class="icontext align-items-start">
                        <span class="icon icon-sm rounded-circle bg-primary-light">
                            <i class="text-primary material-icons md-local_shipping"></i>
                        </span>
                        <div class="text">
                            <h6 class="mb-1">Order info</h6>
                            <style>
                                .icontext span {
                                    font-size: 12px;
                                    font-weight: 400;
                                    display: inline-block;
                                }
                            </style>
                            <p class="mb-1">
                                Shipping: Global Shipping <br> Pay method: {{$order->transaction->mode}} <br>
                                Status:
                                @if($order->status == 'pending')
                                <span class="badge rounded-pill alert-primary">{{$order->status}}</span>

                                @elseif($order->status == 'confirmed')
                                <span class="badge rounded-pill alert-info ">{{$order->status}}</span>

                                @elseif($order->status == 'shipped')
                                <span class="badge rounded-pill alert-warning">{{$order->status}}</span>

                                @elseif($order->status == 'delivered')
                                <span class="badge rounded-pill alert-success">{{$order->status}}</span>

                                @elseif($order->status == 'completed')
                                <span class="badge rounded-pill alert-success">{{$order->status}}</span>

                                @elseif($order->status == 'returned')
                                <span class="badge rounded-pill alert-danger">{{$order->status}}</span>

                                @elseif($order->status == 'cancelled')
                                <span class="badge rounded-pill alert-danger">{{$order->status}}</span>
                                @endif
                            </p>
                            {{-- <a href="#">Download info</a> --}}
                        </div>
                    </article>
                </div> <!-- col// -->
                <div class="col-md-4">
                    <article class="icontext align-items-start">
                        <span class="icon icon-sm rounded-circle bg-primary-light">
                            <i class="text-primary material-icons md-place"></i>
                        </span>
                        <div class="text">
                            <h6 class="mb-1">Deliver to</h6>
                            <p class="mb-1">
                                City: {{$district->name}},<br> Area: {{$postOffice->postOffice}} <br>
                                {{$order->customer->billing_address}}
                            </p>
                            <a href="#">View profile</a>
                        </div>
                    </article>
                </div> <!-- col// -->
            </div> <!-- row // -->
            <div class="row">
                <div class="col-lg-7">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="40%">Product</th>
                                    <th width="20%">Unit Price</th>
                                    <th width="20%">Quantity</th>
                                    <th width="20%" class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderProducts as $product)
                                <tr>
                                    <td>
                                        <a class="itemside" href="#">
                                            <div class="left">
                                                <img src="{{asset('storage/product_images/'. $product->product_images->first()->product_image)}}" width="40" height="40" class="img-xs" alt="Item">
                                            </div>
                                            <div class="info"> {{$product->product_name}},
                                                <br>
                                                @if ($product->color)
                                                {{$product->color->color_name}},
                                                @endif
                                            <br>
                                                @if($product->size)
                                                {{$product->size->size_name}}
                                                @endif
                                            </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td>৳{{$product->price}} </td>
                                    <td> {{$product->quantity}} </td>
                                    <td class="text-end"> ৳{{$product->price * $product->quantity}} </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">
                                        <article class="float-end">
                                            <dl class="dlist">
                                                <dt>Subtotal:</dt>
                                                <dd>৳{{$order->subtotal}}</dd>
                                            </dl>
                                            <dl class="dlist">
                                                <dt>Shipping cost:</dt>
                                                <dd>৳{{$order->delivery_charge}}</dd>
                                            </dl>
                                            <dl class="dlist">
                                                <dt>Discount :</dt>
                                                <dd>৳0</dd>
                                            </dl>
                                            <dl class="dlist">
                                                <dt>Grand total:</dt>
                                                <dd> <b class="h5">৳{{$order->total}}</b> </dd>
                                            </dl>
                                            <dl class="dlist">
                                                <dt class="text-muted">Status:</dt>
                                                <dd>
                                                    <span class="badge rounded-pill alert-success text-success">{{$order->transaction->status}}</span>
                                                </dd>
                                            </dl>
                                        </article>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div> <!-- table-responsive// -->
                    <a class="btn btn-primary" href="{{route('order.track', ['id' => $order->id])}}">View Order Tracking</a>
                </div> <!-- col// -->
                <div class="col-lg-1"></div>
                <div class="col-lg-4">
                    <div class="box shadow-sm bg-light">
                        <h6 class="mb-15">Payment info</h6>
                        <p>
                            @if($order->transaction->mode == 'cod')
                            Cash On delivery <br>
                            Charge: {{$order->delivery_charge}}
                            <br>
                            @else
                                Master Card **** **** 4768 <br>
                                Business name: Grand Market LLC <br>
                                Phone: +1 (800) 555-154-52
                            @endif
                        </p>
                    </div>
                    <div class="h-25 pt-4">
                        <div class="mb-3">
                            <label>Notes</label>
                            <textarea class="form-control" name="notes" id="notes" placeholder="Type some note"></textarea>
                        </div>
                        <button class="btn btn-primary">Save note</button>
                    </div>
                </div> <!-- col// -->
            </div>
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->

@endsection
