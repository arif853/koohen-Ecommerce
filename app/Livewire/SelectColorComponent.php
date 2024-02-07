<?php

namespace App\Livewire;

use App\Models\Color;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class SelectColorComponent extends Component
{
    public $colors;

    public $product_color = null;

    public function selectColor($colorId)
    {
        $color = Color::find($colorId);
        $this->product_color = $color->id;
        Session::put('product_color', $this->product_color);
        // $this->dispatch('colorRefresh')->to('update-quantity-component');
    }
    public function render()
    {
        return view('livewire.select-color-component');
    }
}
