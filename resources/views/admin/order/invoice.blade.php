
<htmlpageheader name="page-header">
    @php
$settings = DB::table('settings')->first();
@endphp
    <div class="row" style="display:inline-block">
        <div class="col-md-6" style="width:60%; float:left;font-size:12px;">
            <img src="{{ URL::to('frontend/assets/imgs/Kohen_Logo_Main.png') }}" alt="code logo" style="width:90px; margin-top:12px;">
            <div class="title_wrap"style="font-size:11px;">
                <p class="sub_title">{{ $settings->company_address }}</p>
                <p class="sub_title">{{ $settings->primary_mobile_no }}
                    &nbsp;&nbsp;&nbsp;&nbsp;{{ $settings->email }}</p>
            </div>
        </div>
        <div class="col-md-6" style="float: right; width: 38%; text-align: right; font-size: 11px; margin-top:10px;"><br>
            <h2>Invoice </h2>
            <span style="float:right;"> Date:    <span>{{ date('j F y', strtotime($order->created_at)) }}</span></span> <br>
            <span class="bold tera">Invoice No :</span>&nbsp;&nbsp;
            <span>{{ $order->order_track_id ?? ' ' }}</span>
        </div>
    </div>
</htmlpageheader>
