<div class="tab-pane fade profile-header" id="pills-orders" role="tabpanel" aria-labelledby="pills-orders-tab">
    <h2>My Order</h2>
    {{-- livewire component --}}
      @livewire('order-track-component')

      {{-- @foreach ($selectedOrder->order_item ?? [] as $orderItem)
      {{ $orderItem->product->product_name }}
      @endforeach --}}
        <div class="row">
            @if ($trackedOrder)
            <div class="col-lg-12">
                <div class="card  mb-3" >
                    <div class="card-body text-primary">

                        <h3 class="card-title">Order Details</h3>
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-start" width=10% >Ordered Date</th>
                                    <th scope="col" class="text-center">Product</th>
                                    {{-- <th scope="col" class="text-center">Varient</th> --}}
                                    <th scope="col" class="text-center">Qty</th>
                                    <th scope="col" class="text-center">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trackedProduct as $key => $item)
                                {{$trackedOrder->status}}
                                <tr>
                                    <th scope="row" class="text-start">{{$trackedOrder->created_at->setTimezone('Asia/Dhaka')->format('M j, Y, g:iA')}}</th>
                                    <td scope="row" class="text-center">
                                        <a href="#">
                                            <img height="80px" width="80px" src="{{asset('storage/product_images/'.$item->product_images->first()->product_image)}}" class="image-fluid" alt="ProductImage">
                                        <p>{{$item->product_name}}</p>
                                        </a>

                                    </td>

                                    <td class="text-center">{{$item->quantity}}</td>
                                    <td class="text-center">{{$item->price}}</td>
                                </tr>
                                @endforeach


                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" style="border: none"></td>
                                    <td class="text-end">Subtotal :</td>
                                    <td class="text-center">{{$trackedOrder->subtotal}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="border: none"></td>
                                    <td class="text-end">Delivery Type :</td>
                                    <td class="text-center">{{$trackedOrder->transaction->mood}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="border: none"></td>
                                    <td class="text-end">Delivery Charge :</td>
                                    <td class="text-center">500.00</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="border: none"></td>
                                    <td class="text-end" style="font-size: 18px; font-weight:600 ">Grand Total :</td>
                                    <td class="text-center" style="font-size: 18px; font-weight:600 ">500.00</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            @endif
        </div>
  </div>
