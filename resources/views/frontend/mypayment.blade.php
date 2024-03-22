@extends('layouts.home')
@section('title', 'Payment')
@section('main')

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>
    <form method="POST" class="needs-validation">
        <h4>Total Amount to pay: {{$order->total}}</h4>
        <input type="hidden" value="{{$order->customer->firstName}}" id="customer_fname">
        <input type="hidden" value="{{$order->customer->phone}}" id="customer_phone">
        <input type="hidden" value="{{$order->customer->email}}" id="customer_email">
        <input type="hidden" value="{{$order->customer->billing_address}}" id="customer_address">
        <input type="hidden" value="{{$order->total}}" id="t_amount">
        <hr class="mb-4 mt-4">
        <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                token="if you have any token validation"
                postdata="your javascript arrays or objects which requires in backend"
                order="If you already have the transaction generated for current order"
                endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
        </button>
    </form>
</main>
@endsection
@push('checkout')
    <script>
    var obj = {};
    obj.cus_name = $('#customer_fname').val();
    obj.cus_phone = $('#customer_phone').val();
    obj.cus_email = $('#customer_email').val();
    obj.cus_addr1 = $('#customer_address').val();
    obj.amount = $('#t_amount').val();

    $('#sslczPayBtn').prop('postdata', obj);


    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);

    </script>
@endpush
