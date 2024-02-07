<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class UpdateQuantityComponent extends Component
{

    public $quantity = 1;
    public function increaseQuantites()
    {
        $qty = $this->quantity++;
        Session::put('quantity', $qty );
        $this->dispatch('qtyRefresh')->to('update-quantity-component');
    }

    public function decreaseQuantities()
    {
        $qty = $this->quantity-- ;
        Session::put('quantity', $qty );
        $this->dispatch('qtyRefresh')->to('update-quantity-component');
    }
    public function render()
    {
        return view('livewire.update-quantity-component');
    }


}
