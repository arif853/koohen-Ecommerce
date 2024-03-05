<?php

namespace App\Livewire;

use App\Models\Size;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class SelectSizeComponent extends Component
{
    public $sizes;
    public $productId;

    public $product_size = null;

    public function selectSize($sizeId)
    {
        $size = Size::find($sizeId);
        $this->product_size = $size->id;
        Session::put('product_size', $this->product_size);
    }

    public function render()
    {
        return view('livewire.select-size-component');
    }
}
