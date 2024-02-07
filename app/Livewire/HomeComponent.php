<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Products;
use Livewire\WithPagination;
use App\Models\Product_image;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

use function Laravel\Prompts\alert;

class HomeComponent extends Component
{

    use WithPagination;
    // public $products;
    public function store($id)
    {
        $product = Products::find($id);
        $item_name = $product->product_name;
        $offer_price = $product->product_price->offer_price;
        if($offer_price > 0)
        {
            $item_price = $offer_price;
        }
        else{
            $item_price = $product->regular_price;
        }
        $item_slug = $product->slug;
        $item_image = Product_image::where('product_id',$id)->select('product_image')->first();
        $data = Cart::add($id,$item_name,1,$item_price, ['image' => $item_image,'slug' => $item_slug]);
        Session::flash('success','Product added To cart.');
        // return redirect()->route('shop.cart');
        $this->dispatch('cartRefresh')->to('cart-icon-component');

    }
    
    public function render()
    {
        // $products = Products::all();
        $products = Products::with([
            'overviews',
            'product_infos',
            'product_images',
            'product_extras',
            'tags',
            'sizes',
            'colors',
            'brand',
            'category',
            'subcategory',
            'product_price'
        ])->paginate(8);
        // print_r($products);
        return view('livewire.home-component',['products'=> $products]);
    }
    public function loadMore()
    {
        // $this->products = $this->products->concat(Products::with([
        //     'overviews',
        //     'product_infos',
        //     'product_images',
        //     'product_extras',
        //     'tags',
        //     'sizes',
        //     'colors',
        //     'brand',
        //     'category',
        //     'subcategory',
        //     'product_price'
        // ])->paginate(3));
    }
}
