<?php

namespace App\Http\Controllers\Admin;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class InventoryController extends Controller
{

    public function index()
    {
        $products = Products::with(['order_item' => function ($query) {
            $query->whereHas('order', function ($query) {
                $query->where('status', 'completed');
            });
        }])->get();

        foreach ($products as $product) {
            $soldQuantity = $product->order_item->sum('quantity');
            $product->soldQuantity = ($soldQuantity > 0) ? $soldQuantity : 0;
        }
        // dd($products);
        return view('admin.inventory.index',compact('products'));
    }


    public function newstock(Request $request)
    {
        $id = $request->id;

        $product = Products::with(['supplier:id,supplier_name'])->find($id);

        // dd($product->toSql());
        return response()->json($product);
    }

    public function addstock(Request $request)
    {
        $id = $request->product_id;
        $product = Products::find($id);
        $old_stock = $request->old_stock;

        $newstock = $old_stock + $request->new_stock;

        $product->stock = $newstock;
        $product->save();

        Session::flash('success', 'New Stock added to the inventory.');
        return response()->json(['status'=> 200, 'message' => 'New Stock added to the inventory!']);
    }
}
