<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Setting;
use App\Models\District;
use App\Models\Postcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::first();
        return view('admin.settings',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
   

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
   
    public function update(Request $request)
    {
        $request->validate([
            'primary_mobile_no' =>'required|string',
            'secondary_mobile_no' =>'required|string',
            'whatsapp_url' =>'required|string',
            'facebook_url' =>'required|string',
            'twiter_url' =>'required|string',
            'instagram_url' =>'required|string',
            'youtube_url' =>'required|string',
            'email' =>'required|email|string',
            'company_address' =>'required',
            'company_short_details' =>'required'
        ]);
        $settings = Setting::first();
        
        if (!$settings) {
            $settings = new Setting(); // Create a new instance if no settings found
        }

        $settings->primary_mobile_no = $request->input('primary_mobile_no');
        $settings->secondary_mobile_no = $request->input('secondary_mobile_no');
        $settings->whatsapp_url = $request->input('whatsapp_url');
        $settings->facebook_url = $request->input('facebook_url');
        $settings->twiter_url = $request->input('twiter_url');
        $settings->instagram_url = $request->input('instagram_url');
        $settings->youtube_url = $request->input('youtube_url');
        $settings->email = $request->input('email');
        $settings->company_address = $request->input('company_address');
        $settings->company_short_details = $request->input('company_short_details');
        $settings->save();

        Session::flash('success', 'Web Settings have been updated successfully.');

        return redirect()->route('dashboard');
    }


    /**
     * Remove the specified resource from storage.
     */
   
}