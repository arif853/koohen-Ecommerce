<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\District;
use App\Models\Division;
use App\Models\Postcode;
use Illuminate\Support\Facades\Session;

class BillingAreaComponent extends Component
{

    public $selectedDivisions;
    public $selectedDistricts;
    public $selectedPostOffices;


    public $divisionss;
    public $districtss;
    public $postOfficess;

    public function render()
    {
        $this->divisionss = Division::all();
        $this->districtss = $this->selectedDivisions
            ? District::where('division_id', $this->selectedDivisions)->get()
            : collect();

        $this->postOfficess = $this->selectedDistricts
            ? Postcode::where('district_id', $this->selectedDistricts)->get()
            : collect();

        return view('livewire.billing-area-component');
    }

    public function triggerUpdatedSelectedDivisions()
    {
        $this->selectedDistricts = null;
        $this->selectedPostOffices = null;
    }

    public function triggerUpdatedSelectedDistricts()
    {
        $this->selectedPostOffices = null;
    }
    public function updateDeliveryCharge()
    {
        // Session::flash('warning','checked');
        $this->dispatch('postOfficeChanged', $this->selectedPostOffices)->to('checkout-component');
    }

}
