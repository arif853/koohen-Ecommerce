<?php

namespace App\Http\Controllers\Admin;

<<<<<<< HEAD
use App\Models\Setting;
use Illuminate\Http\Request;
=======
use App\Models\Order;
use App\Models\Setting;
use App\Models\District;
use App\Models\Postcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
>>>>>>> 71d6d2e3987b20dd12848d8991cc00ea1bbbd091
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
<<<<<<< HEAD
    public function create()
    {
        //
    }
=======
   
>>>>>>> 71d6d2e3987b20dd12848d8991cc00ea1bbbd091

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
<<<<<<< HEAD
    // public function update(Request $request)
    // {
        
    //     // $request->validate([
    //     //     'primary_mobile_no' => 'string',
    //     //     'secondary_mobile_no' => 'string',
    //     //     'whatsapp_url' => 'string',
    //     //     'email' => 'email|string',
    //     //     'company_address' => 'text',
    //     //     'company_short_details' => 'text',
    //     // ]);
   
    //         $settings = Setting::first();

    //         $settings->primary_mobile_no = $request->primary_mobile_no;
    //         $settings->secondary_mobile_no = $request->secondary_mobile_no;
    //         $settings->whatsapp_url = $request->whatsapp_url;
    //         $settings->email = $request->email;
    //         $settings->company_address = $request->company_address;
    //         $settings->company_short_details = $request->company_short_details;
    //         $settings->save();

    //         Session::flash('success', 'Web Settings has been updated successfully.');

    //         return redirect()->back();
        
    // }
    public function update(Request $request)
{
    $settings = Setting::first();
    
    if (!$settings) {
        $settings = new Setting(); // Create a new instance if no settings found
    }

    $settings->primary_mobile_no = $request->input('primary_mobile_no');
    $settings->secondary_mobile_no = $request->input('secondary_mobile_no');
    $settings->whatsapp_url = $request->input('whatsapp_url');
    $settings->email = $request->input('email');
    $settings->company_address = $request->input('company_address');
    $settings->company_short_details = $request->input('company_short_details');
    $settings->save();

    Session::flash('success', 'Web Settings have been updated successfully.');

    return redirect()->back();
}

=======
   
    public function update(Request $request)
    {
        
        $settings = Setting::first();
        
        if (!$settings) {
            $settings = new Setting(); // Create a new instance if no settings found
        }

        $settings->primary_mobile_no = $request->input('primary_mobile_no');
        $settings->secondary_mobile_no = $request->input('secondary_mobile_no');
        $settings->whatsapp_url = $request->input('whatsapp_url');
        $settings->email = $request->input('email');
        $settings->company_address = $request->input('company_address');
        $settings->company_short_details = $request->input('company_short_details');
        $settings->save();

        Session::flash('success', 'Web Settings have been updated successfully.');

        return redirect()->back();
    }

>>>>>>> 71d6d2e3987b20dd12848d8991cc00ea1bbbd091

    /**
     * Remove the specified resource from storage.
     */
<<<<<<< HEAD
    public function destroy(string $id)
    {
        //
    }
}
=======
   
}
>>>>>>> 71d6d2e3987b20dd12848d8991cc00ea1bbbd091
