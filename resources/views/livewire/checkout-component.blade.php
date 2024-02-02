<div>
    @if(Cart::count() > 0  )
    <div class="table-responsive order_table text-center">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="2">Product</th>
                    {{-- <th colspan="1">Qty</th> --}}
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                $total = 0
                @endphp
                {{-- cart item --}}
                @foreach (Cart::content() as $item)

                <tr>
                    <td class="image product-thumbnail">
                        {{-- {{asset('storage/product_images/',$item->options->image->product_image)}} --}}
                        <img src="{{asset('storage/product_images/'.$item->options->image->product_image)}}" alt="{{$item->options->image->product_image}}">
                        <input type="hidden" name="size_id" id="size_id" value="{{$item->options->size}}">
                        <input type="hidden" name="color_id" id="color_id" value="{{$item->options->color}}">
                    </td>
                    <td>
                        <h5><a href="{{route('product.detail',['slug'=>$item->options->slug])}}">{{$item->name}}</a></h5>
                        <span class="product-qty mt-4">
                            <a href="#"
                            wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"
                            class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                            <span class="qty-val">{{$item->qty}}</span>
                            <a href="#"
                            wire:click.prevent="increaseQuantity('{{$item->rowId}}')"
                            class="qty-up"><i class="fi-rs-angle-small-up"></i>
                        </a>
                        </span>
                    </td>
                    <td>৳{{$item->subtotal}}</td>
                </tr>
                {{-- <tr>
                    <td>
                        <h5><a href="{{route('product.detail',['slug'=>$item->options->slug])}}">{{$item->name}}</a></h5>
                    </td>
                    <td class="text-center" data-title="Stock">
                        <div class="detail-qty  radius  m-auto">
                            <a href="#"
                                wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"
                                class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                            <span class="qty-val">{{$item->qty}}</span>
                            <a href="#"
                                wire:click.prevent="increaseQuantity('{{$item->rowId}}')"
                                class="qty-up"><i class="fi-rs-angle-small-up"></i>
                            </a>
                        </div>
                    </td>
                    <td>৳{{$item->subtotal}}</td>
                </tr> --}}
                    @php
                    $subtotal = $item->subtotal;
                    $total += $subtotal;
                    $tax = $item->tax;
                    @endphp
                @endforeach
                {{-- cart loop end --}}
                {{-- @if($itemData)
                    <tr>
                        <td>
                            <h5><a href="{{route('product.detail',$itemData['item_slug'])}}">{{ $itemData['item_name'] }}</a>
                            </h5>
                        </td>
                        <td class="text-center" data-title="Stock">
                            <div class="detail-qty  radius  m-auto">
                                {{-- <a href="#"
                                    wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"
                                    class="qty-down"><i class="fi-rs-angle-small-down"></i></a> --}}
                                {{-- <span class="qty-val">{{ $itemData['item_qty'] }}</span> --}}
                                {{-- <a href="#"
                                    wire:click.prevent="increaseQuantity('{{$item->rowId}}')"
                                    class="qty-up"><i class="fi-rs-angle-small-up"></i></a> --}}
                            {{-- </div>
                        </td>
                        <td>৳{{ $itemData['item_price'] }}</td>
                    </tr>
                @endif --}}
                <tr>
                    <th class="text-end">SubTotal</th>
                    <td class="product-subtotal">{{Cart::count()}}</td>
                    <td class="product-subtotal" colspan="1">৳{{$total}}</td>
                    <input type="hidden" name="subtotal" value="{{$total}}">
                </tr>
                <tr>
                    <th class="text-end">Delivery Charge</th>
                    @if( $deliveryCharge)
                        <td colspan="3"><em>৳{{ $deliveryCharge }}</em></td>
                        <input type="hidden" name="shipping_cost" id="shipping_cost" value="{{ $deliveryCharge }}">
                    @else
                    <td colspan="3"><em>৳{{$delivery_charge}}</em></td>
                    <input type="hidden" name="shipping_cost" id="shipping_cost" value="{{$delivery_charge}}">
                    @endif

                </tr>
                <tr>
                    <th class="text-end">Tax</th>
                    <td colspan="3"><em>৳{{$tax}}</em></td>
                    <input type="hidden" name="tax" id="tax" value="{{$tax}}">
                </tr>
                <tr>
                    <th class="text-end">Total</th>
                    <td colspan="3" class="product-subtotal"><span
                        @php
                            $total = $tax + $total;
                        @endphp
                            class="font-xl text-brand fw-900">৳{{$total}}</span>
                            <input type="hidden" name="total_amount" id="t_amount" value="{{$total}}">
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    @else
    <h5>No item found. </h5>

    @endif
</div>
@push('checkout')
<script>
    // $(document).ready(function () {
    //     $('.select2').select2();
    // });

</script>

@endpush
