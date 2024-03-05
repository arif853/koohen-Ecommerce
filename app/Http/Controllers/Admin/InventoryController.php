<?php

namespace App\Http\Controllers\Admin;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Product_stock;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class InventoryController extends Controller
{

    public function index()
    {
        $products = Products::get();

        foreach ($products as $product) {
            $stock = $product->product_stocks;

            $inStock = $stock->sum('inStock');
            $soldQuantity = $stock->sum('outStock');

            $product->inStock = $inStock;
            $product->balance =  $inStock - $soldQuantity;

            $product->soldQuantity = ($soldQuantity > 0) ? $soldQuantity : 0;

        }
        // dd($products);
        return view('admin.inventory.index',compact('products'));
    }


    public function newstock(Request $request)
    {
        $id = $request->id;
        $product = Products::with(['supplier:id,supplier_name','sizes'])->find($id);
        $stock = $product->product_stocks;
        // dd($product);
        return response()->json(['product' => $product, 'stock' =>$stock]);
    }

    public function addstock(Request $request)
    {
        $productId = $request->product_id;
        $newStock = $request->new_stock;

        // Assuming you have an array of size IDs and quantities
        $sizes = $request->input('size');
        $quantities = $request->input('quantity');


        if (count($sizes) != count($quantities)) {
            // Handle the case where the number of sizes and quantities don't match
            return response()->json(['status' => 400, 'message' => 'Invalid input data.']);
        }

        // Loop through each size and quantity
        foreach ($sizes as $index => $sizeId) {
            $quantity = $quantities[$index];

            // $old_stock =
            // Find or create a product_stock record based on product_id and size_id
            $stock = Product_stock::updateOrCreate(
                [
                    'product_id' => $productId,
                    'size_id' => $sizeId,
                ],
                [
                    'inStock' => \DB::raw("inStock + $quantity"), // Increment the inStock column
                    'outStock' => 0, // Assuming outStock starts at 0
                    'price' => null, // Set the price value as needed
                    'purchase_date' => $request->purchase_date,
                ]
            );
        }

        // dd($sizes);
        // dd($quantities);

        Session::flash('success', 'New Stock added to the inventory.');
        return response()->json(['status' => 200, 'message' => 'New Stock added to the inventory!']);
    }
}
