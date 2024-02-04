<?php

namespace App\Livewire;

use Livewire\Component;

class PriceRangeSlider extends Component
{
    public $priceRange = [0, 500000]; // Initial price range

    public function render()
    {
        return view('livewire.price-range-slider');
    }

    public function updatedPriceRange()
    {
        $this->dispatch('priceRangeUpdated', $this->priceRange);
    }
}
