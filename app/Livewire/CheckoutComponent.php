<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\District;
use App\Models\Division;
use App\Models\Postcode;
use App\Models\Upazilla;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;


class CheckoutComponent extends Component
{

    public $deliveryCharge = 0;

    public $delivery_charge = 0;

    public function mount($delivery_charge)
    {
        $this->delivery_charge = $delivery_charge;
    }

    #[On('postOfficeChanged')]

    public function postOfficeChanged($selectedPostOffice)
    {
        // Fetch the delivery charge based on the selected post office's zone or any other criteria
        $postOffice = Postcode::find($selectedPostOffice);// Get the post office details based on $selectedPostOffice
        $this->deliveryCharge = $postOffice->zone_charge; // Adjust this based on your actual data structure
    }

    public function increaseQuantity($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        $qty = $item->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->dispatch('cartRefresh')->to('cart-icon-component');
        $this->dispatch('refresh')->to('checkout-component');
    }

    public function decreaseQuantity($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        $qty = $item->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->dispatch('cartRefresh')->to('cart-icon-component');
        // $this->dispatch('refresh')->to('checkout-component');
    }

    public function removecart($id){
        Cart::instance('cart')->remove($id);
        Session::flash('success','Product removed from cart.');
        $this->dispatch('cartRefresh')->to('cart-icon-component');
        // $this->dispatch('refresh')->to('checkout-component');
    }

    // #[On('refresh')]

    public function render()
    {
        return view('livewire.checkout-component');
    }

}
