<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>

</head>
<body style="background-color: #f3f4f6; padding: 20px;">
    <div style=" width:580px; margin:50px auto; border-radius: 8px; background-color:#fff; box-shadow: 0px 10px 15px 0px rgba(0,0,0,0.1); ">

        <div class="card-header" style=" color:#fff; border-radius: 8px 8px 0px 0; height: 60px;  background-color:#046584; padding:15px 30px; text-align:center;">
            <h2>New Order #{{$order->id}}</h2>
        </div>
        <div class="card-body" style="padding:15px 25px;">
            <h3 class="card-title">You’ve received the following order from <strong>{{$order->customer->firstName}} {{$order->customer->lastName}}</strong> </h3>
            <p class="card-text">
                <h4><a href="#">[Tracking No #{{$order->order_track_id}}]</a>  ({{$order->created_at->setTimezone('Asia/Dhaka')->format('M j, Y')}})</h4>

            </p>
            <table cellspacing="0" cellpadding="8" border="1" bgcolor="#000000" style="width: 100%; text-align:center">
                <tr bgcolor="#ffffff" >
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                </tr>
<<<<<<< HEAD
                @foreach ($order->order_item as $item)
                <tr bgcolor="#ffffff">
                    <td>{{$item->product->product_name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->price * $item->quantity}}</td>
                </tr>
                @endforeach

                <tr bgcolor="#ffffff" >
                    <td style="text-align: end" colspan="2" >Subtotal:</td>
                    <td>{{$order->subtotal}}</td>
                </tr>
                <tr bgcolor="#ffffff">
                    <td style="text-align: end" colspan="2" >Shipping Cost:</td>
                    <td>{{$order->delivery_charge}}</td>
                </tr>
                <tr bgcolor="#ffffff">
                    <td style="text-align: end"  colspan="2">Payment Method:</td>
                    <td>{{$order->transaction->mode}}</td>
                </tr>
                <tr bgcolor="#ffffff">
                    <td style="text-align: end" colspan="2">Total:</td>
                    <td>{{$order->total}}</td>
                </tr>
=======
                    <tr bgcolor="#ffffff">
                        <td>Product Name</td>
                        <td>
                            1
                        </td>
                        <td>1000/=</td>
                    </tr>
                    <tr bgcolor="#ffffff">
                        <td>Product Name</td>
                        <td>
                            1
                        </td>
                        <td>1000/=</td>
                    </tr>
                    <tr bgcolor="#ffffff">
                        <td>Product Name</td>
                        <td>
                            1
                        </td>
                        <td>1000/=</td>
                    </tr>
                    <tr bgcolor="#ffffff">
                        <td style="text-align: end" colspan="2"><p class="tfooter-text">Subtotal:</p></td>
                        <td>1000/=</td>
                    </tr>
                    <tr bgcolor="#ffffff">
                        <td style="text-align: end" colspan="2" ><p class="tfooter-text">Shipping:</p></td>
                        <td>1000/=</td>
                    </tr>
                    <tr bgcolor="#ffffff">
                        <td style="text-align: end" class="text-end" colspan="2"><p class="tfooter-text">Payment Method:</p></td>
                        <td>1000/=</td>
                    </tr>
                    <tr bgcolor="#ffffff">
                        <td style="text-align: end" class="text-end" colspan="2"><p class="tfooter-text">Total:</p></td>
                        <td>1000/=</td>
                    </tr>
>>>>>>> 8be8615 (email template)
            </table>

            <div class="card-body" style="display:inline-block; border:1px solid #c0c0c0; width:40%; margin:50px 15px; border-radius: 8px; background-color:#f8f8f8; box-shadow: 15px 10px 30px -5px rgba(0,0,0,0.1); padding: 15px;">
                <h5 class="card-title">Billing Address</h5>
<<<<<<< HEAD
                <p class="card-text">Address: {{$order->customer->billing_address}}</p>
                <p>Phone: <a href="tel:{{$order->customer->phone}}">{{$order->customer->phone}}</a></p>
                <p>Email: <a href="mailto:{{$order->customer->email}}">{{$order->customer->email}}</a></p>
=======
                <p class="card-text">
                    <p>Address:</p>
                    <p>District:</p>
                    <p>Thana:</p>
                    <p>Phone: <a href=""></a></p>
                    <p>Email: <a href=""></a></p>
                </p>
>>>>>>> 8be8615 (email template)
            </div>
            <div class="card-body" style="display:inline-block; border:1px solid #c0c0c0; width:40%; margin:50px 0; border-radius: 8px; background-color:#f8f8f8; box-shadow: 15px 10px 30px -5px rgba(0,0,0,0.1); padding: 15px;">
                <h5 class="card-title">Shipping Address</h5>
                <p class="card-text">
<<<<<<< HEAD
                    @foreach($order->customer->shipping as $key => $shipping)

                    @endforeach
                    <p>Address: {{$shipping->shipping_add}}</p>
                    <p>Phone: <a href="#">{{$shipping->s_phone}}</a></p>
                    <p>Email: <a href="#">{{$shipping->s_email}}</a></p>
=======
                    <p>Address:</p>
                    <p>District:</p>
                    <p>Thana:</p>
                    <p>Phone: <a href=""></a></p>
                    <p>Email: <a href=""></a></p>
>>>>>>> 8be8615 (email template)
                </p>
            </div>
            <p>Proccess your order go to <a href="https://koohen.com/dashboard" class="">Dashboard</a></p>
        </div>
    </div>
</body>
</html>
