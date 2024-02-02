<?php

namespace App\Livewire;

use App\Models\Postcode;
use Livewire\Component;
use App\Models\District;

class PostOfficeSelector extends Component
{
    public $districts;
    public $selectedDistrict;
    public $postoffices;
    public $selectedPostOffice;

    public function mount()
    {
        $this->districts = District::all();
        $this->selectedDistrict = null;
        $this->postoffices = collect([]);
    }

    public function updatedSelectedDistrict()
    {
        if ($this->selectedDistrict) {
            $this->postoffices = Postcode::where('district_id', $this->selectedDistrict)->get();
        } else {
            $this->postoffices = collect([]);
        }
    }
    public function triggerUpdatedSelectedDistrict()
    {
        $this->updatedSelectedDistrict();
    }
    public function render()
    {
        return view('livewire.post-office-selector');
    }
}
