<?php

namespace App\Http\Controllers\Admin;

use App\Models\District;
use App\Models\Postcode;
use App\Models\Upazilla;
use App\Models\DeliveryZone;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $districts = District::all();
        $upazilas = Upazilla::all();

        $areas = Postcode::distinct('upazila')->get(['district_id','upazila','zone_charge']);

        $delivery_zone = DeliveryZone::all();

        return view('admin.zone.index',compact('districts','upazilas','areas','delivery_zone'));
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
    public function store(Request $request)
    {
        $rules = [
            'upazila' => 'required', Rule::unique('delivery_zones', 'upazila_id'),
            'delivery_charge' => 'required',
        ];

        $customMessages = [
            'upazila.required' => 'The upazila name field is required.',
            'upazila.unique' => 'This area is already added',
            'delivery_charge.required' => 'The delivery charge field is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Validate the request
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // If validation passes, proceed to insert data into the database.
        $zones = new DeliveryZone();
        $zones->district_id = $request->district;
        $zones->upazila = $request->upazila;
        $zones->charge = $request->delivery_charge;
        // $zones->status = $request->status ? 'Active' : 'Inactive';


        // Save only if size_name is unique
        $existingZone = DeliveryZone::where('upazila', $zones->upazila)->first();
        $upazila_charge = Postcode::where('upazila', $request->upazila);

        if (!$existingZone) {

            // $district_charge = District::find($request->district);
            // $district_charge->update([
            //     'zone_charge' => $request->delivery_charge,
            // ]);

            $upazila_charge->update([
                'zone_charge' => $request->delivery_charge,
            ]);

            $zones->save();
            // Set success message in session
            Session::flash('success', 'Zone added successfully.');
        } else {

            $existingZone->update(
                [
                    'charge' => $request->delivery_charge,
                ]
            );

            $upazila_charge->update([
                'zone_charge' => $request->delivery_charge,
            ]);

            // Set error message in session
            Session::flash('warning', 'Zone already exists.');
            Session::flash('success', 'Zone charge updated.');
        }

        return redirect()->back();
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
    public function status_update(Request $request)
    {
        $zoneId = $request->id;

        // Retrieve the zone
        $zone = DeliveryZone::find($zoneId);

        // Toggle the status
        $newStatus = $zone->status === 'Active' ? 'Inactive' : 'Active';

        // Update the zone status
        $zone->update([
            'status' => $newStatus
        ]);

        return redirect()->back()->with('success', 'Zone status updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $deliveryZone = DeliveryZone::findOrFail($request->id);

            $deliveryZone->delete();

            return redirect()->back()->with('danger', 'Zone deleted successfully.');
        } catch (\Exception $e) {
            // Log the exception or handle it in a way that makes sense for your application
            return redirect()->route('varient.index')->with('error', 'Error deleting Zone.');
        }
    }
}
