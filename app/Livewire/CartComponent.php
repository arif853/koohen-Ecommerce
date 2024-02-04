<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Products;
use App\Models\Product_image;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartComponent extends Component
{
    public function increaseQuantity($id)
    {
        $item = Cart::get($id);
        $qty = $item->qty + 1;
        Cart::update($id, $qty);
        $this->dispatch('cartRefresh')->to('cart-icon-component');
    }

    public function decreaseQuantity($id)
    {
        $item = Cart::get($id);
        $qty = $item->qty - 1;
        Cart::update($id,$qty);
        $this->dispatch('cartRefresh')->to('cart-icon-component');

    }
    public function removecart($id){
        Cart::remove($id);
        Session::flash('success','Product removed from cart.');
        $this->dispatch('cartRefresh')->to('cart-icon-component');
    }
    
    public function render()
    {
        return view('livewire.cart-component');
    }
}
