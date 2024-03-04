<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Models\Order;
use App\Models\Campaign;
use App\Models\Customer;
use App\Models\Products;
use App\Models\order_items;
use App\Models\transactions;
use Illuminate\Http\Request;
use App\Models\Product_image;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
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

    public function posCart(Request $request, $id)
    {
        $product = Products::find($id);
        if($product){
            $item_name = $product->product_name;
            $offer_price = $product->product_price->offer_price;


            $item_price = $request->input('price');
            $color = $request->input('color');
            $size = $request->input('size');

                // $item_price = $product->regular_price;
            $item_slug = $product->slug;
            $data = Cart::instance('pos_cart')->add($id,$item_name,1,$item_price, ['color' => $color,'size' => $size,'slug' => $item_slug]);

            Session::flash('success','Product added To cart.');
            return response()->json(['status' => 200,'message' => 'Product added to cart', 'data' => $data]);
        }
        else{
            Session::flash('success','Product not found.');
        }


    }

    public function cart_remove($id){
        Cart::instance('pos_cart')->remove($id);
        $cartItems = Cart::instance('pos_cart')->content();

        Session::flash('danger','Product removed from cart.');
        return response()->json(['status' => 200,'message' => 'Product remove from cart','cartItems' => $cartItems]);
    }


    public function posOrderCancel()
    {
        Cart::instance('pos_cart')->destroy();
        Session::flash('danger','Order canceled,Products remove from cart.');
        return response()->json(['status' => 200,'message' => 'Product remove from cart']);
    }


    public function generateCode()
    {
    do {
        // Generate a 4-digit random number
        $randomNumber = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);

        // Get the current year
        $currentYear = date('y');
        // Concatenate the components to create the final code
        $generatedCode = 'K'.$currentYear.'-'.$randomNumber;
        // Check if the generated code already exists in the database
        $codeExists = DB::table('orders')->where('order_track_id', $generatedCode)->exists();

    } while ($codeExists);

        // Concatenate the components to create the final code

        return $generatedCode;
    }


    public function generateInvoiceNo()
    {

    do {
        // Generate a 2-digit random number
        $randomNumber = str_pad(mt_rand(1, 99), 2, '0', STR_PAD_LEFT);

        // Get the current year
        $currentYear = date('y');
        $currentMonth = date('m');

        // Concatenate the components to create the final code
        $invoiceNo= $currentMonth.$currentYear.$randomNumber;
        // Check if the generated code already exists in the database
        $codeExists = DB::table('orders')->where('invoice_no', $invoiceNo)->exists();

    } while ($codeExists);

        // Concatenate the components to create the final code

        return $invoiceNo;
    }


    public function posOrder(Request $request)
    {
        // $track_id = $this->generateCode();
        $invoiceNo = $this->generateInvoiceNo();

        $order = new Order();
        $order->customer_id = $request->input('customer');
        $order->invoice_no = $invoiceNo;
        $order->subtotal = $request->input('subtotal');
        $order->delivery_charge = $request->input('delivery_charge');
        $order->discount = $request->input('discount');
        $order->total = $request->input('total');
        $order->is_shipping_different =  0;
        $order->comment = "Pos order";
        $order->status = 'completed';
        $order->save();

        $cartItems = Cart::instance('pos_cart')->content();

        // Loop through the cart items and save them to the order item table
        foreach ($cartItems as $cartItem) {

            order_items::create([
                'product_id' => $cartItem->id,
                'order_id' => $order->id,
                'color_id' => $cartItem->options->color,
                'size_id' => $cartItem->options->size,
                'price' => $cartItem->price,
                'quantity' => $cartItem->qty,
            ]);
        }

        $transaction = transactions::create([
            'customer_id' => $request->input('customer'),
            'order_id' => $order->id,
            'mode' => 'cash',
            'status' => 'paid',
        ]);

        Cart::instance('pos_cart')->destroy();
        Session::flash('success','Order has been created.');
        // Generate and stream the invoice
        $order = Order::where('id', $order->id)->first();

        if (!$order) {
            return 'Order not found';
        }
        else{
            $pdf= PDF::loadView('admin.order.pos_invoice', ['order'=>$order]);

            // return $pdf->stream('Koohen Invoice-'.$order->id.'.pdf');
            $mpdf = $pdf->output('Koohen Invoice-'.$order->id.'.pdf','I');
            return $mpdf;
        }
    }

    // public function Invoice($id)
    // {




    // }
}
