<?php

namespace App\Http\Controllers\Admin;

use App\Models\Campaign;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Product_image;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class POSController extends Controller
{
    public function index()
    {
        $products = Products::with([
                            'sizes',
                            'colors',
                            'category',
                            'product_price',
                            'product_thumbnail'
                        ])->paginate(10);

        return view('admin.pos.index',compact('products'));
    }

    public function searchProducts(Request $request)
    {
        $searchTerm = $request->input('term');

        $products = Products::where('product_name', 'like', "%{$searchTerm}%")
                          ->orWhere('sku', 'like', "%{$searchTerm}%")
                          ->with([
                            'sizes',
                            'colors',
                            'category',
                            'product_price',
                            'product_thumbnail'
                        ])->get();

        return response()->json($products);
    }


    public function searchcustomer(Request $request)
    {
        $searchTerm = $request->input('customer');

        $customers = Customer::where('email', 'like', "%{$searchTerm}%")
                          ->orWhere('phone', 'like', "%{$searchTerm}%")
                          ->get();

        return response()->json($customers);
    }

    public function pos_cart(Request $request, $id)
    {
        $product = Products::find($id);
        $item_name = $product->product_name;
        $offer_price = $product->product_price->offer_price;


        $item_price = $product->regular_price;
        $color = $request->input('color');
        $size = $request->input('size');

            // $item_price = $product->regular_price;
        $item_slug = $product->slug;
        $data = Cart::instance('pos_cart')->add($id,$item_name,1,$item_price, ['color' => $color,'size' => $size,'slug' => $item_slug]);

        Session::flash('success','Product added To cart.');
        return response()->json(['status' => 200,'message' => 'Product added to cart', 'data' => $data]);

    }

    public function cart_remove($id){
        Cart::instance('pos_cart')->remove($id);
        $cartItems = Cart::instance('pos_cart')->content();

        Session::flash('danger','Product removed from cart.');
        return response()->json(['status' => 200,'message' => 'Product remove from cart','cartItems' => $cartItems]);
    }
}
