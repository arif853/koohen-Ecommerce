<div style=" width: 650px; margin:0 auto; background-color:aqua;">
    <h2>You get a new order .</h2>
    <h3>From: {{$order->customer->firstName}} {{$order->customer->lastName}}</h3>
    <h4>Order ID: # {{$order->id}}</h4>
    <h4>Tracking ID: # {{$order->order_track_id}}</h4>
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        @foreach ($order->order_item as $item)
            <tr>
                <td>{{$item->product->product_name}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->quantity * $item->price}}</td>
            </tr>
        @endforeach
            <tr>
                <td colspan="2">Total</td>
                <td >{{$order->total}}</td>
            </tr>
    </table>
    <span>Check your </span><a href="https://koohen.com/dashboard">Dashboard</a> <span> for pending orders.</span>
 </div>



