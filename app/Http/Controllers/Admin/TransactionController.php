<?php

namespace App\Http\Controllers\Admin;

use App\Models\transactions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function transactionFilter(Request $request)
    {
        if($request->ajax()) {
            $orderNo = $request->orderNo;
            $customerName = $request->customerName;
            
            $query = transactions::with('order', 'customer')->orderBy('created_at', 'desc');
            
            if($orderNo){
                $query->whereHas('order', function ($query) use ($orderNo) {
                    $query->where('id', $orderNo);
                });
            }
            
            if ($customerName) {
                $query->whereHas('customer', function ($query) use ($customerName) {
                    $query->where('firstName', 'LIKE', '%' . $customerName . '%')
                          ->orWhere('lastName', 'LIKE', '%' . $customerName . '%');
                });
            }
            
            $transactions = $query->get();
         
            return response()->json($transactions);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
