<div class="tab-pane fade profile-header" id="pills-orders-history" role="tabpanel" aria-labelledby="pills-orders-history-tab">

    <h2>Order History</h2>
    <div class="row">
        <div class="col-lg-12">
            <div class=" mb-3" >

                {{-- <div class="card-header d-flex justify-content-between">
                <h5 class="card-title">Order Details</h5>
                <a href="#" data-bs-toggle="modal" data-bs-target="#profile_modal" class="card-icon"><i class="fad fa-edit"></i></a>
                </div> --}}
                <div class="card-body text-primary">

                    {{-- <h3 class="card-title">All Orders</h3> --}}

                    <table class="table ">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">Order date</th>
                            <th scope="col" class="text-center" width=30%>Product</th>
                            <th scope="col" class="text-center">Varient</th>
                            <th scope="col" class="text-center">Qty</th>
                            <th scope="col" class="text-center">Price</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center" width=20%> Action</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach ($orders as $order)
                            @if ($order != null)

                                <tr>
                                    <th scope="row" class="text-center">
                                        {{$order->created_at->setTimezone('Asia/Dhaka')->format('D, M j, Y, g:iA')}}
                                    </th>
                                    <td >
                                        <ul>
                                            @foreach ($order->order_item as $key => $orderItem)
                                            <li>
                                                <style>
                                                    .itemside .left{
                                                    display: flex;
                                                    align-items: center;
                                                        margin-top: 4px
                                                    }
                                                </style>
                                                <a class="itemside" href="{{route('product.detail',['slug'=>$orderItem->product->slug])}}">
                                                    <div class="left">
                                                        {{-- <span>{{$key + 1}}. </span> --}}
                                                        <img src="{{asset('storage/product_images/'.$orderItem->product->product_images->first()->product_image)}}" width="40" height="40" class="img-sm img-thumbnail m-2" alt="{{$orderItem->product->slug}}">
                                                        <h6 class="mb-0 ml-2">{{ $orderItem->product->product_name }}</h6>
                                                    </div>

                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-center">
                                        @foreach ($order->order_item as $key => $orderItem)
                                            @if($orderItem->product->color != null || $orderItem->product->size != null)
                                            <ul class="list-filter color-filter">
                                                <li class="active">
                                                    <a href="#" >
                                                        <span class="product-color-red" style="background: {{$orderItem->product->color->color_code}};"></span>
                                                    </a>
                                                 </li>
                                            </ul>
                                            <ul class="list-filter size-filter font-small">
                                                <li class="active">
                                                    <a  href="#" >{{$orderItem->product->size->size}}</a>
                                                </li>
                                            </ul>
                                            {{-- <span> Color : {{ $orderItem->product->color->color_code }}</span> --}}
                                            {{-- <span> Size : {{ $orderItem->product->size->size }}</span> --}}

                                            @endif
                                        @endforeach

                                    </td>
                                    <td class="text-start">
                                        <ul >
                                            @foreach ($order->order_item as $key => $orderItem)
                                            <li class="itemside">
                                                <p class="left">{{ $orderItem->quantity }} x {{ $orderItem->price * $orderItem->quantity}}  </p>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-start">
                                       <span> = {{$order->subtotal}}</span>
                                    </td>
                                    <td class="text-center">
                                        @if($order->status == 'pending')
                                        <span class="badge bg-info">{{$order->status}}</span>

                                        @elseif($order->status == 'confirmed')
                                        <span class="badge bg-primary">{{$order->status}}</span>

                                        @elseif($order->status == 'shipped')
                                        <span class="badge bg-warning">{{$order->status}}</span>

                                        @elseif($order->status == 'delivered')
                                        <span class="badge bg-warning">{{$order->status}}</span>

                                        @elseif($order->status == 'completed')
                                        <span class="badge bg-success">{{$order->status}}</span>

                                        @elseif($order->status == 'cancelled')
                                        <span class="badge bg-danger">{{$order->status}}</span>

                                        @elseif($order->status == 'returned')
                                        <span class="badge bg-secondary">{{$order->status}}</span>

                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="action-btn" wire:click="trackOrder({{ $order->id }})">Track me</a>
                                        <a href="#" class="action-btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Return"><i class="fad fa-reply"></i></a>
                                        <a href="#" class="action-btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Cancel"> <i class="fal fa-window-close"></i></a>

                                    </td>
                                </tr>
                            @else
                            <p>you do not have any order right now.</p>
                            @endif

                            @endforeach

                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
    {{-- @livewire('my-order-component') --}}

</div>
