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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('/') }}admin/assets/css/print.css">

    <style>
        /* Additional CSS */
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
                            <h3 id="invoice-title" class="PageText">Invoice</h3>
                            <p><span class="text-bold">Date</span> : 05/12/2020</p>
                            <p>
                                <span class="text-bold">Invoice No : </span>
                            </p>
                        </div>
                    </div>


                    <div class="invoice-head-bottom">
                        <div class="invoice-head-bottom-left">
                            <ul class="text_soft">
                                <li class="text-bold">SHIP To:</li>
                                <li>Name : Smith Rhodes</li>
                                <li>Phone: {{ $settings->primary_mobile_no }}</li>
                                <li>Address: {{ $settings->company_address }}</li>

                            </ul>
                        </div>
                        <div class="invoice-head-bottom-right">

                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="invoice-body">
                      
                        <table class="text-center">
                            <tr>
                                <th class="text-bold">SL</th>
                                <th class="text-bold">Description</th>
                                <th class="text-bold">Item Code</th>
                                <th class="text-bold">QTY</th>
                                <th class="text-bold">Unit Price</th>
                                <th class="text-bold">Total</th>
                            </tr>
                            <tr >
                                <td>Design</td>
                                <td>Creating a website design</td>
                                <td>$50.00</td>
                                <td>10</td>
                                <td class="">500.00 &#2547;</td>
                                <td class="">500.00 &#2547;</td>
                            </tr>
                        
                        </table>
                        <div class="invoice-body-bottom text-end">
                            <div class="invoice-body-info-item border-bottom" style="display: flex; justify-content: flex-end;">
                                <div class="info-item-td text-bold ">Sub Total:</div>
                                <div class="info-item-td">2150.00 &#2547;</div>
                            </div>
                            <div class="invoice-body-info-item border-bottom"style="display: flex; justify-content: flex-end">
                                <div class="info-item-td text-bold">Shipping Charge:</div>
                                <div class="info-item-td">215.00 &#2547;</div>
                            </div>
                            <div class="invoice-body-info-item border-bottom"style="display: flex; justify-content: flex-end">
                                <div class="info-item-td text-bold">Total:</div>
                                <div class="info-item-td">21365.00 &#2547;</div>
                            </div>
                            <div class="invoice-body-info-item border-bottom"style="display: flex; justify-content: flex-end">
                                <div class="info-item-td text-bold">Discount:</div>
                                <div class="info-item-td">21365.00 &#2547;</div>
                            </div>
                            <div class="invoice-body-info-item border-bottom"style="display: flex; justify-content: flex-end">
                                <div class="info-item-td text-bold">Advanced Payment:</div>
                                <div class="info-item-td">21365.00 &#2547;</div>
                            </div>
                            <div class="invoice-body-info-item "style="display: flex; justify-content: flex-end">
                                <div class="info-item-td text-bold">Payable Amount:</div>
                                <div class="info-item-td">21365.00 &#2547;</div>
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
                    <div class="invoice-btns" style="text-align:center;">
                        <button type="button" class="invoice-btn" onclick="printInvoice()">
                            <span>
                                <i class="fa-solid fa-print"></i>
                            </span>
                            <span>Print</span>
                        </button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>
