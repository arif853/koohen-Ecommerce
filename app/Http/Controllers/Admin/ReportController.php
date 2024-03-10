<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function saleReport()
    {
        $orders = Order::where('status','completed')->get();
        return view('admin.reports.sale',compact('orders'));
    }


    public function searchSale(Request $request)
    {
        $customer = $request->input('customer');
        $invoice_no = $request->input('invoice_no');
        $startDate = $request->input('start');
        $endDate = $request->input('end');

        $query = Order::where('status', 'completed')->orderBy('created_at')->with(['customer']);

        if (!empty($customer)) {
            $query->whereHas('customer', function ($innerQuery) use ($customer) {
                $innerQuery->where(function ($subQuery) use ($customer) {
                    $subQuery->where('firstName', 'like', "%{$customer}%")
                              ->orWhere('lastName', 'like', "%{$customer}%");
                });
            });
        }

        if (!empty($invoice_no)) {
            $query->where('invoice_no', 'like', "%{$invoice_no}%");
        }

        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $orders = $query->get();

        return response()->json($orders);
    }
}
