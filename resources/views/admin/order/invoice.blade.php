<!DOCTYPE html>
<html>
<head>
<style>
      body, h1, h2, h3, h4, h5, h6, p, div, ul, ol, li, table, tr, th, td {
            margin: 0;
            padding: 0;
        }

    body{
        font-size:12px;
        font-weight:400;
        color:#25252515 !important;

    }
table, td, th {
  border: 1px solid #22212141;

}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 10px;
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
    font-style: italic;
}
.customer{
   float: left;

}

.noBorder {
            display: flex;
            justify-content: space-between;
            padding: 5px 6px;
            align-items: flex-end;
        }

        /* Avoid page breaks inside divs */
        .avoid-page-break {
            page-break-inside: avoid;
            font-size: 14px !important;
        }
</style>
</head>
<body>
@php
$settings = DB::table('settings')->first();
@endphp
<div class="row" style="width: 100%;margin-top:2%;">
    <div class="content-address" style="width:60%; float:left;">
        <img src="{{ URL::to('frontend/assets/imgs/Kohen_Logo_Main.png') }}" alt="code logo" style="width:120px;"><br>
        <address style="margin-top:2mm;">{{ $settings->company_address }}</address>
        <p>{{ $settings->primary_mobile_no }}
            &nbsp;&nbsp;&nbsp;&nbsp;{{ $settings->email }}</p>
    </div>
    <div class="invoice-content"style="width:40%; float:right;">
        <h2 style="background: #e0e7ec;text-align:right;text-transform:uppercase;color:#528d52 ;padding:8px;">Invoice</h2>
        <p style="text-align:right;margin-top:2mm;"><b class="tera">Date</b> {{ date('j F y', strtotime($order->created_at)) }}</p>
        <p style="text-align:right;margin-top:2mm;"><b class="tera">Invoice No</b> {{ $order->order_track_id ?? ' '  }}</p>
    </div>
</div>
<div class="row" style="widtg:100%;margin-top:2mm;">
    <h3 class="tera" style="margin-bottom:0%;text-transform:uppercase;">Ship To</h3>
    <div class="customer" style="display: flex; justify-content: space-between; align-items: center;">
        <p style="word-spacing:4px;margin:2px;"> <span>Customer Name :</span>  {{ $order->customer->shipping[0]->first_name.' '.$order->customer->shipping[0]->last_name }}</p>
        <p style="word-spacing:4px;margin:2px;"> <span>Phone :</span>  {{ $order->customer->shipping[0]->s_phone }}</p>
        <p style="word-spacing:4px;margin:2px;"> <span>Address :</span>  {{ $order->customer->shipping[0]->shipping_add}}</p>
    </div>
</div>

<div class="row">
    <table class="invoice_table" style="margin-top:2mm;margin-bottom:0mm;">
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
              <span>Size :</span>
              <span> {{ $item->product_sizes->size }} </span>  <br>
              <span>Color :</span>
              <span> {{ $item->product_colors->color_name }} </span>
          </td>
          <td> {{ $item->quantity }}</td>
          <td> {{ $item->price }}</td>
          <td>{{ $order->total }}</td>
        </tr>
        @endforeach
      </table>
</div>

<div class="row payment_table" style="width:100%; margin-top:0mm;">
    <div class="noBorder" style="width:40%; float:right;">
        <div style="background: #99ddff; padding: 12px; display: flex; justify-content: space-between; align-items: center;">
            <div style="flex-basis: 50%"><strong>Sub total</strong></div>
            <div style="flex-basis: 50%; text-align: right; padding-top: -17px;">{{ $order->subtotal }}</div>
        </div>
        <div style="background: #e6e6e6;  padding: 12px; display: flex; justify-content: space-between; align-items: center;">
            <div style="flex-basis: 50%"><strong>Shipping Charge</strong></div>
            <div style="flex-basis: 50%; text-align: right; padding-top: -17px;">{{  $order->delivery_charge }}</div>
        </div>
        <div style="background: #99ddff; padding: 12px; display: flex; justify-content: space-between; align-items: center;">
            <div style="flex-basis: 50%"><strong>Total</strong></div>
            <div style="flex-basis: 50%; text-align: right; padding-top: -17px;">{{  $order->total }}</div>
        </div>
        <div style="background: #c9efa3; padding: 12px; display: flex; justify-content: space-between; align-items: center;">
            <div style="flex-basis: 50%"><strong>Discount</strong></div>
            <div style="flex-basis: 50%; text-align: right; padding-top: -17px;">{{  $order->discount }}</div>
        </div>
        <div style="background: #ff80b3; padding: 12px; display: flex; justify-content: space-between; align-items: center;">
            <div style="flex-basis: 50%"><strong>Payable Amount</strong></div>
            <div style="flex-basis: 50%; text-align: right; padding-top: -17px;">{{  $order->total }}</div>
        </div>
    </div>
</div>
<div class="row">
    <h2 style="width:100%;margin-top:10px;color:#0f0f0f41; font-size:16px;">নিন্মোক্ত শর্ত সাপেক্ষে কোন ধরনের ডেলিভারি চার্জ ব্যতীত পণ্য ফেরত দেয়া যাবে।</h2>
    <div class="avoid-page-break">
        <p>১. &nbsp;পণ্যটি অবশ্যই ডেলিভারি ম্যান এর সামনে চেক করে দেখে নিতে হবে অন্যথায় ডেলিভারি ম্যান চলে গেলে আপনার অভিযোগ গ্রহণ যোগ্য হবে না। </p>
        <p>২.&nbsp;ডেলিভারি কৃত পণ্য কালার বা সাইজ যদি অর্ডারকৃত পণ্য থেকে ব্যতিক্রম হয়। </p>
        <p>৩.&nbsp;কাস্টমারের কাছে যদি পণ্য ক্ষতিগ্রস্ত অবস্থায় পৌঁছায় । </p>
    </div>
</div>

</body>
</html>

