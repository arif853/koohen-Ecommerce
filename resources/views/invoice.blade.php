<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Admin | contact list</title>
    <style>
        @page {
            header: page-header;
            footer: page-footer;
        }

        .table-header .tr th {
            background: #D0E4F5;
            padding: 15px 3px;
            font-size: 11px;
            font-weight: bold;
            text-align: left;
        }

        body {
            font-family: 'nikosh', "Roboto Thin", sans-serif;
            width: 100%;
        }

        /* body {
            font-family: 'SutonnyMJRegular';
            width: 100%;
        } */

        td,
        tr,
        th {
            border: .5px solid #e6e6e6;
            max-width: 100%;
        }

        table.blueTable {
            border: .5px solid #e6e6e6 !important;
            background-color: white;
            width: 100%;
            text-align: left;
            border-collapse: collapse;
        }

        table #thm-bg2 th {
            background: #fff !important;
        }

        table.blueTable td,
        table.blueTable th {
            border-left: .5px solid #aaa;
            padding: 8px 14px;
            text-align: right;
        }

        table.blueTable tbody td {
            font-size: 11px;
        }

        table.blueTable tr:nth-child(odd) {
            background: #f9f9f9;
        }

        table.blueTable .th th {
            color: white !important;
            background: #e6e6e6;
            text-align: center;
        }

        table.blueTable th {
            font-size: 13px;
            color: #333;
            border-left: 0px solid #D0E4F5;
        }

        table.blueTable thead th:first-child {
            border-left: none;
        }


        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }
    </style>
</head>

<body>
    @php
    $settings = DB::table('settings')->first();
@endphp
    <htmlpageheader name="page-header">
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
                <span style="float:right;"> Date:    <span>{{ date('j F y', strtotime($data->created_at)) }}</span></span> <br>
                <span class="bold tera">Invoice No :</span>&nbsp;&nbsp;
                <span>{{ $data->order_track_id ?? ' ' }}</span>
            </div>
        </div>
    </htmlpageheader>
   
  
</body>

</html>