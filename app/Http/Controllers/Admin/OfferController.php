<?php

namespace App\Http\Controllers\Admin;

use App\Models\OfferType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.offers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
       
        $rules = [
            'offer_type_name' => 'required|string|max:255',
        ];

        $customMessages = [
            'offer_type_name.required' => 'Need a Offer Type Name.',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Validate the request
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            OfferType::create([
                'offer_type_name' => $request->offer_type_name,
            ]);
            Session::flash('success', 'Offer Type Created successfully.');
            return redirect()->route('offers.index');
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
