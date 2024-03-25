<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Order;
use App\Models\transactions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = transactions::latest('id')->with('order','customer')->get();
        return view('admin.transactions.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function paymentInfo(Request $request)
    {
        $transaction = transactions::with('order','customer')->find($request->id);
        return response()->json($transaction);
    }

    /**
     * Display the specified resource.
     */
    public function paymentUpdate(Request $request)
    {
        $order = Order::find($request->orderNo);
        $transaction = transactions::find($request->trans_id);

        // Calculate new total_paid and total_due values
        $newTotalPaid = $order->total_paid + $request->payment;
        $newTotalDue = $order->total_due - $request->payment;

        // Update order
        $order->update([
            'total_paid' => $newTotalPaid,
            'total_due' => $newTotalDue,
        ]);

        // Update transaction status
        if ($newTotalDue == 0) {
            $transaction->update([
                'status' => 'paid'
            ]);
        } else {
            $transaction->update([
                'status' => 'unpaid'
            ]);
        }

        Session::flash('success','Payment Successful');

        return response()->json(['status'=> 200]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
