<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::latest()->get();
        return view('admin.coupons.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'coupons_title' => 'required',
            'coupons_code' => 'required|string',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
            'quantity' => 'required|integer',
            'discounts_type' => 'required',
            'status' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        // Validate the request
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            Coupon::create([
                'coupons_title' => $request->coupons_title,
                'coupons_code' => $request->coupons_code,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'quantity' => $request->quantity,
                'discounts_type' => $request->discounts_type,
                'percent_value' => $request->percent_value,
                // 'free_shipping' => $request->free_shipping,
                'fixed' => $request->fixed,
                'status' => $request->status ? 1 : 0,
            ]);
            Session::flash('success', 'Coupons Created successfully.');
            return redirect()->route('coupon.index');
        }
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
    public function edit($id)
    {
        $coupons  = Coupon::find($id);
        return view('admin.coupons.create',compact('coupons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $coupons  = Coupon::find($id);
        $rules = [
            'coupons_title' => 'string',
            'coupons_code' => 'string',
            'start_date' => 'string',
            'end_date' => 'string',
            'quantity' => 'integer',
            'free_shipping' => 'integer',

        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $coupons->update([
                'coupons_title' => $request->coupons_title,
                'coupons_code' => $request->coupons_code,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'quantity' => $request->quantity,
                'discounts_type' => $request->discounts_type,
                'percent_value' => $request->percent_value ?? $request->precent_value,
                'fixed' => $request->fixed,
                // 'free_shipping' => $request->free_shipping,
                'status' => $request->status ? 1 : 0,
            ]);
            Session::flash('success', 'Coupons Updated successfully.');
        }

        return redirect()->route('coupon.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
         try{
            $coupons = Coupon::find($request->id);
            $coupons->delete();

            return redirect()->back()->with('danger', 'Coupons deleted successfully.');
        } catch (\Exception $e) {
            // Log the exception or handle it in a way that makes sense for your application
            return redirect()->back()->with('danger', 'This Coupons can not be deleted .');
        }
    }
}
