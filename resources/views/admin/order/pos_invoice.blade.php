<!DOCTYPE html>
<html>
<head>

<style>
    body{
        font-size:10px;
        font-weight:400;
        /* letter-spacing: 1px; */
    }
table, td, th {
  border: 1px solid #22212141;

}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 5px;
}
.customer_table{
    border: 1px solid #fff;
}
.invoice_table{
    text-align: center;
    width: 100%;
}
.invoice_table th{
    background-color:#a8cef0;
}

.tera{
    /* font-style: italic; */
}
.customer{
   float: left;

}

/* .text_margin{
    margin-top:2px;
} */
.noBorder {
    display: flex;
    justify-content: space-between;
    padding: 5px 0 5px;
    align-items: flex-end;
}
p{
    margin: 0;
}
.badge-soft-success {
  color: #34c38f;
  background-color: rgba(52, 195, 143, 0.18);
}

.badge-soft-danger {
    color: #fff;
    background-color: #f46a6a;
    padding: 10px !important;
    border-radius: 28px !important;
    margin-left: 20px;
}

/* .badge-soft-danger[href]:focus,
.badge-soft-danger[href]:hover {
  color: #fff;
  text-decoration: none;
  background-color: #f46a6a;

} */
</style>
</head>
<body>
@php
$settings = DB::table('settings')->first();
@endphp
<div class="row" style="width: 100%; margin-bottom:25px;">
    <div class="content-address" style="width:60%; float:left;">
        <img src="{{ base_path('public/frontend/assets/imgs/Kohen_Logo_Main.png')}}" alt="Logo" style="width:120px;"><br>
        <address style="margin-top:4px;">{{ $settings->company_address }}</address>
        <p >{{ $settings->secondary_mobile_no }},  {{ $settings->email }}</p>
    </div>
    <div class="invoice-content"style=" float:right;">
        <h2 style="margin-left:20px; width:70%; background: #68CDF2;text-align:center;text-transform:uppercase;color:#fff; padding:8px;">Invoice</h2>
        <p style="margin-left:20px; text-align:left; "><b class="tera">Date:</b> {{ date('j F y', strtotime($order->created_at)) }}</p>
        <p style="margin-left:20px; text-align:left;"><b class="tera">Invoice No:#</b> {{ $order->id ?? ' '  }}</p>
            @if ($order->transaction->mode == 'paid')
                <span class="badge-soft-success">Paid</span>
            @else
            <span class="badge-soft-danger" style="margin-left:20px; text-align:left;">Unpaid</span>

            @endif
        <span></span>
    </div>
</div>

<h3 class="tera" style="margin-bottom:0%;text-transform:uppercase;">Ship To:-</h3>
<div class="customer" style="display: flex; justify-content: space-between; align-items: center;">
    <p style="margin-top:4px;"> <strong>Customer Name :</strong>
         {{ $order->customer->firstName.' '.$order->customer->lastName }}
    </p>

    <p style="margin-top:4px;"> <strong>Phone :</strong>

    </p>
    <p style="margin-top:4px;"> <strong>Address :</strong>

    </p>

</div>

<table class="invoice_table" style="margin-top: 14px;">
  <tr>
    <th class="tera" >SL</th>
    <th class="tera" >Product Name</th>
    <th class="tera" >Item Code</th>
    <th class="tera" >Qty</th>
    <th class="tera" >Unit Price</th>
    <th class="tera" >Total</th>
  </tr>
  @foreach ($order->order_item as $key => $item)
  <tr>
    <td>{{ $key + 1 }}</td>
    <td>{{  $item->product->product_name }}</td>
    <td style="font-size:10px;"> {{ $item->product->sku }} <br>
        @if ($item->product_sizes)
        <span>Size :</span>
        <span> {{ $item->product_sizes->size }} </span>  <br>
        @endif

        @if ($item->product_colors)
        <span>Color :</span>
        <span> {{ $item->product_colors->color_name }} </span>
        @endif

    </td>
    <td> {{ $item->quantity }}</td>
    <td> {{ $item->price }}</td>
    <td>{{ number_format($item->quantity * $item->price, 2)}}</td>
  </tr>
  @endforeach

</table>

<div class="row payment_table" style="width:100%; margin-top: -5px; font-size:10px;">
    <div class="noBorder" style="width:30%; float:right;">
        <div style="background: #99ddff; padding: 5px 8px; display: flex; justify-content: space-between; align-items: center;">
            <div style="flex-basis: 50%"><strong>Sub total:</strong></div>
            <div style="flex-basis: 50%; text-align: right; padding-top: -13px;">{{ $order->subtotal }}</div>
        </div>
        <div style="background: #e6e6e6;  padding: 5px 8px; display: flex; justify-content: space-between; align-items: center;">
            <div style="flex-basis: 50%"><strong>Shipping Charge:</strong></div>
            <div style="flex-basis: 50%; text-align: right; padding-top: -13px;">{{  $order->delivery_charge }}</div>
        </div>

        <div style="background: #e6e6e6; padding: 5px 8px; display: flex; justify-content: space-between; align-items: center;">
            <div style="flex-basis: 50%"><strong>Discount:</strong></div>
            <div style="flex-basis: 50%; text-align: right; padding-top: -13px;">{{  $order->discount }}</div>
        </div>
        <div style="background: #99ddff; padding: 5px 8px; display: flex; justify-content: space-between; align-items: center;">
            <div style="flex-basis: 50%"><strong>Total:</strong></div>
            <div style="flex-basis: 50%; text-align: right; padding-top: -13px;">{{  $order->total }}</div>
        </div>
    </div>
</div>

<div class="row" style="width:100%; margin-top: 15px;">

    <h2 style="font-family: 'nikosh';">নিন্মোক্ত শর্ত সাপেক্ষে কোন ধরনের ডেলিভারি চার্জ ব্যতীত পণ্য ফেরত দেয়া যাবে।</h2>
    <p style="font-size:14px; margin-bottom:5px;font-family: 'nikosh';">১. &nbsp;পণ্যটি অবশ্যই ডেলিভারি ম্যান এর সামনে চেক করে দেখে নিতে হবে
            অন্যথায় ডেলিভারি ম্যান চলে গেলে আপনার অভিযোগ গ্রহণ যোগ্য হবে না। </p>
    <p style="font-size:14px; margin-bottom:5px;font-family: 'nikosh';">২.&nbsp;ডেলিভারি কৃত পণ্য কালার বা সাইজ যদি অর্ডারকৃত পণ্য থেকে ব্যতিক্রম হয়। </p>
    <p style="font-size:14px; margin-bottom:5px;font-family: 'nikosh';">৩.&nbsp;কাস্টমারের কাছে যদি পণ্য ক্ষতিগ্রস্ত অবস্থায়
            পৌঁছায় । </p>
</div>

</body>
</html>
