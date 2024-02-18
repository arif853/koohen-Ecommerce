<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <style>
        *,
*::after,
*::before{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

:root{
    --blue-color: #0c2f54;
    --dark-color: #535b61;
    --white-color: #fff;
}

ul{
    list-style-type: none;
}
ul li{
    margin: 2px 0;
}


.text-end{
    text-align: right;
}
.text-center{
    text-align: center;
}
.text-start{
    text-align: left;
}
.text-bold{
    font-weight: 700;
}

/* border-bottom */
.border-bottom{
    border-bottom: 1px solid ;
}

body{
    font-family: "Open Sans", sans-serif;

    font-size: 14px;
    font-weight:400;
}
.invoice-wrapper{
    min-height: 100vh;
    background-color: rgba(0, 0, 0, 0.1);
    padding-top: 20px;
    padding-bottom: 20px;
}
.invoice{
    max-width: 850px;
    margin-right: auto;
    margin-left: auto;
    background-color: var(--white-color);
    padding: 70px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 5px;
    min-height: 920px;
}
.invoice-head-top-left img{
    width: 150px;
}
.invoice-head-top-right h3{
    font-weight: 600;
    font-size:26px;
    color: var(--blue-color);
    
}


.invoice-head-middle, .invoice-head-bottom{
    padding: 16px 0;
}
.invoice-body{
    border-radius: 4px;
    overflow: hidden;
}
.invoice-body table{
    border-radius: 4px;
    width: 100%;
}


.invoice-body table thead{
    background-color: #f1f1f1;
}
.invoice-body-bottom{
    width: 100%;
}
.invoice-body-info-item {
    display: flex;
   float: right; /* Align children to the start and end of the container */
   width:100%;
}

.info-item-td {
    padding:8px;
  /* Align text to the right within the flex item */
}
.text_soft{
    font-weight: 500 !important;
    color: #0d0d0d !important;
}

/* Adjusting width to fit content */
.info-item-td{
    flex: 1; /* Grow to fill available space */
}

.invoice-body-info-item.border-bottom {
    border-bottom: 1px solid ; /* Add border-bottom to only items with this class */
    border-bottom: 2px solid #faf8f8;
}

.invoice-foot{
    padding: 30px 0;
}
.invoice-foot p{
    font-size: 12px;
}
.invoice-btns{
    margin-top: 20px;
    display: flex;
    justify-content: center;
}
.invoice-btn{
    padding: 3px 9px;
    color: var(--dark-color);
    font-family: inherit;
    border: 1px solid rgba(0, 0, 0, 0.1);
    cursor: pointer;
}
.invoice-body .text-center table, td, th {  
    border: 1px solid #0d0d0d;
    padding: 10px;
  }
  
  table {
    border-collapse: collapse;
    width: 100%;
  }
  
 
#invoice-title h3{
  
    color: #426f22e3; 
    padding: 6px;
    border-radius: 5px;
    display: inline-block; 
   }
.invoice-head-top, .invoice-head-middle, .invoice-head-bottom{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    padding-bottom: 10px;
}

.invoice-body table {
    text-align: center;
}

.noborder table, .noborder tbody, .noborder td, .noborder th, .noborder tr
{
    border: none;
    width:39%;
    text-align: right;
    font-size: 12px;
}
.noborder td{
    font-weight: bold !important;
}
@media screen and (max-width: 992px){
    .invoice{
        padding: 40px;
    }
}

@media screen and (max-width: 576px){
    .invoice-head-top, .invoice-head-middle, .invoice-head-bottom{
        grid-template-columns: repeat(1, 1fr);
    }
    .invoice-head-bottom-right{
        margin-top: 12px;
        margin-bottom: 12px;
    }
    .invoice *{
        text-align: left;
    }
    .invoice{
        padding: 28px;
    }
}


.invoice-body{
    min-width: 600px;
}

@media print{
    .print-area{
        visibility: visible;
        width: 100%;
        position: absolute;
        left: 0;
        top: 0;
        overflow: hidden;
    }

    .overflow-view{
        overflow-x: hidden;
    }

    .invoice-btns{
        display: none;
    }
}
        .invoice-head-top-right {
            padding: 10px;
            border-radius: 5px;
        }
        .invoice-head-top-right .text-bold{
            font-style: italic;
        }
        .invoice-head-top-right h3 {
            text-transform: uppercase;
            font-weight: 700;
        }
        .invoice-head-bottom-left li.text-bold {
            font-style: italic;
        }
        
    </style>
</head>

<body>
    @php
    $settings = DB::table('settings')->first();
    @endphp
    <div class="invoice-wrapper" id="print-area">
        <div class="invoice">
            <div class="invoice-container">
                <div class="invoice-head">
                    <div class="invoice-head-top">
                        <div class="invoice-head-top-left text-start">
                            <img src="{{ asset('/') }}frontend/assets/imgs/Kohen_Logo_Main.png">
                            <p><span class="text_soft">{{ $settings->company_address }}</span></p>
                            <p><span class="text_soft">{{ $settings->primary_mobile_no }}</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="text_soft">{{ $settings->email }}</span></p>
                        </div>
                        <div class="invoice-head-top-right text-end">
                            <div id="invoice-title" style="padding:6px;">
                                <h3 style="background-color:#e6e6e6;">Invoice</h3>
                            </div>
                           
                            <p><span class="text-bold">Date</span> : {{ date('j F y',strtotime($order->created_at)) }}</p>
                            <p >
                                <span class="text-bold">Invoice No : {{ $order->order_track_id ?? 'K25-5200' }}</span>
                            </p>
                        </div>
                    </div>


                    <div class="invoice-head-bottom">
                        <div class="invoice-head-bottom-left">
                            <ul class="text_soft">
                                <li class="text-bold" >SHIP To:</li>
                                <li>Name : {{ $order->customer->firstName.' '.$order->customer->lastName }}</li>
                                <li>Phone: {{ $order->customer->phone }}</li>
                                <li>Address: {{ $order->customer->billing_address }}</li>

                            </ul>
                        </div>
                        <div class="invoice-head-bottom-right">

                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="invoice-body">
                      
                        <table class="text-center">
                            <tr style="background-color:#a8cef0;font-style:italic">
                                <th class="text-bold">SL</th>
                                <th class="text-bold">Product</th>
                                <th class="text-bold">Item Code</th>
                                <th class="text-bold">QTY</th>
                                <th class="text-bold">Unit Price</th>
                                <th class="text-bold">Total</th>
                            </tr>
                          
                            @foreach ($order->order_item as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                             
                                <td>{{ $item->product->product_name }}</td>
                                <td>
                                    {{ $item->product->sku }}<br>
                                   
                                    @foreach ($item->product->sizes as $size)
                                     <strong> Size :</strong> {{$size->size }} 
                                     <br>
                                    @endforeach
                                   
                                </td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }}</td>
                                <td class="">{{$item->quantity * $item->price}} &#2547;</td>
                            </tr>
                            @endforeach
                            
                        
                        </table>
                        <div class="invoice-body-bottom text-end">
                            
                            <div class="invoice-body-info-item noborder" style="display: flex; justify-content: flex-end;">
                                <table class="table">
                                    <tr style="background-color:#a8cef0">
                                      <th>Sub Total:</th>
                                      <td>{{ $order->subtotal }} &#2547;</td>
                                    </tr>
                                    <tr style="background-color:#eeeee8">
                                      <th>Shipping Charge:</th>
                                      <td>{{ $order->delivery_charge }} &#2547;</td>
                                    </tr>
                                    <tr style="background-color:#a8cef0">
                                      <th>Total:</th>
                                      <td>{{ $order->total }} &#2547;</td>
                                    </tr>
                                    <tr style="background-color:#99ffdd">
                                        <th>Discount:</th>
                                        <td>{{ $order->discount}} &#2547;</td>
                                      </tr>
                                      <tr style="background-color:#ffe6b3">
                                        <th>Payable Amount:</th>
                                        <td>{{ $order->total }} &#2547;</td>
                                      </tr>
                                </table>
                              
                            </div>
                          
                        </div>
                    </div>
                </div>
                <div class="invoice-foot" style="margin-top:8%;">
                    <h5><span class="text-bold" style=""></span>নিন্মোক্ত শর্ত সাপেক্ষে কোন ধরনের ডেলিভারি চার্জ ব্যতীত পণ্য ফেরত দেয়া যাবে</h5>
                    <ul class="text_soft">
                   
                        <li class="text_soft"><p style="margin-right:2px;margin-bottom:3%;font-size:12px;width:82%;">১. &nbsp;পণ্যটি অবশ্যই ডেলিভারি ম্যান এর সামনে চেক করে দেখে নিতে হবে অন্যথায় ডেলিভারি ম্যান চলে গেলে আপনার অভিযোগ গ্রহণ যোগ্য হবে না </p></li>
                        <li class="text_soft"><p style="margin-right:2px;margin-bottom:3%;font-size:12px;width:82%;"> ২.&nbsp;ডেলিভারি কৃত পণ্য কালার বা সাইজ যদি অর্ডারকৃত পণ্য থেকে ব্যতিক্রম হয় </p></li>
                        <li class="text_soft"><p style="margin-right:2px;margin-bottom:3%;font-size:12px;width:82%;">৩.&nbsp;কাস্টমারের  কাছে যদি পণ্য ক্ষতিগ্রস্ত অবস্থায় পৌঁছায় </p></li>

                    </ul>
                  
                </div>
            </div>
        </div>
    </div>
   
</body>

</html>
