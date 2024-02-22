<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Size;
use App\Models\Color;
use App\Models\Order;
use App\Models\Customer;
use App\Models\District;
use App\Models\Postcode;
use App\Models\shipping;
use App\Models\order_items;
use App\Models\Orderstatus;
use App\Models\transactions;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Register_customer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use PDF;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('customer', 'order_item', 'shipping', 'transaction')->get();
        return view('admin.order.index', compact('orders'));
    }

    public function order_track(Request $request)
    {
        $orderid = $request->id;
        $order = Order::find($orderid);
        $district = District::find($order->customer->district);
        $postOffice = Postcode::find($order->customer->area);

        // $customer_id = $order->customer->id;
        // $customer = shipping::where('customer_id',$customer_id)->
        if ($order->shipping) {
            $s_district = District::find($order->shipping->district);
            $s_postOffice = Postcode::find($order->shipping->area);
        } else {
            $s_district = '';
            $s_postOffice = '';
        }

        $orderItems = $order->order_item;
        $orderProducts = collect();

        foreach ($orderItems as $orderItem) {
            $product = $orderItem->product; // Get the product details for the order item
            $product->load('product_images');

            // Add price and quantity properties to the product
            $product->price = $orderItem->price;
            $product->quantity = $orderItem->quantity;

            // Add the product to the orderProducts collection
            $orderProducts->push($product);

            // Optionally, you can also retrieve color and size information
            $color = Color::find($orderItem->color_id);
            $size = Size::find($orderItem->size_id);
            // Add color and size information to the product if needed
            $product->color = $color;
            $product->size = $size;
        }
        // $customer = $order->customer;
        return view('admin.order.order_track', compact('order', 'orderProducts', 'district', 'postOffice', 's_district', 's_postOffice'));
    }

    public function order_details(Request $request)
    {
        $orderid = $request->id;
        $order = Order::find($orderid);
        $district = District::find($order->customer->district);
        $postOffice = Postcode::find($order->customer->area);
        $orderItems = $order->order_item;
        $orderProducts = collect();

        foreach ($orderItems as $orderItem) {
            $product = $orderItem->product; // Get the product details for the order item
            $product->load('product_images');

            // Add price and quantity properties to the product
            $product->price = $orderItem->price;
            $product->quantity = $orderItem->quantity;

            // Add the product to the orderProducts collection

            // Optionally, you can also retrieve color and size information
            $color = Color::find($orderItem->color_id);
            $size = Size::find($orderItem->size_id);
            // Add color and size information to the product if needed
            $product->color = $color;
            $product->size = $size;

            $orderProducts->push($product);
        }
        // $customer = $order->customer;
        return view('admin.order.order_details', compact('order', 'orderProducts', 'district', 'postOffice'));
    }

    public function order_return()
    {
        return view('admin.order.order_return.index');
    }

    // OrderController.php
    public function updateOrderStatus(Request $request)
    {
        $selectedStatus = $request->input('status');
        $selectedOrders = $request->input('orders');

        // Retrieve the selected orders
        $orders = Order::whereIn('id', $selectedOrders)->get();

        // Update the status for each selected order
        foreach ($orders as $order) {
            // Save the current order status
            $previousStatus = $order->status;

            // Update the order status
            $order->status = $selectedStatus;
            $order->save();

            // Update the OrderStatus table
            $statusColumn = $selectedStatus . '_date_time';
            OrderStatus::updateOrCreate(
                ['order_id' => $order->id],
                [
                    'status' => $selectedStatus,
                    $statusColumn => Carbon::now(),
                ],
            );
        }

        return response()->json(['success' => true, 'message' => 'Order ' . $selectedStatus . ' updated successfully.']);
    }

    // OrderController.php
    public function updateOneOrderStatus(Request $request)
    {
        $orderId = $request->input('orderId');
        $newStatus = $request->input('newStatus');

        // Retrieve the order
        $order = Order::find($orderId);

        if (!$order) {
            return response()->json(['success' => false, 'message' => 'Order not found']);
        }

        // Save the current order status
        $previousStatus = $order->status;

        // Update the order status
        $order->status = $newStatus;
        $order->save();

        // Update the OrderStatus table
        $statusColumn = $newStatus . '_date_time';
        Orderstatus::updateOrCreate(['order_id' => $orderId], ['status' => $newStatus, $statusColumn => Carbon::now()]);

        return response()->json([
            'success' => true,
            'message' => 'Order status updated ' . $previousStatus . ' to ' . $newStatus . ' successfully',
            'previousStatus' => $previousStatus,
            'newStatus' => $newStatus,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function pending_order()
    {
        $pendingOrders = Order::with('customer', 'order_item', 'shipping', 'transaction')->where('status', 'pending')->get();
        return view('admin.order.pending_list', compact('pendingOrders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $rules = [
    //         'fname' => 'required|string',
    //         'lname' => 'required|string',
    //         'phone' => 'required|string',
    //         'email' => 'required|email',
    //         'billing_address' => 'required|string',

    //         'billing_division' => 'required',
    //         'billing_district' => 'required',
    //         'billing_area' => 'required',
    //         // 'password' => 'required|min:6',

    //         // Add any additional rules for other fields as needed

    //         // Example validation for the division, district, and area/postoffice relationship
    //         // 'billing_district' => [
    //         //     'required',
    //         //     'exists:districts,id',
    //         //     Rule::exists('districts', 'id')->where(function ($query) {
    //         //         $query->where('division_id', request('billing_division'));
    //         //     }),
    //         // ],
    //         // 'billing_area' => [
    //         //     'required',
    //         //     'exists:post_offices,id',
    //         //     Rule::exists('post_offices', 'id')->where(function ($query) {
    //         //         $query->where('district_id', request('billing_district'));
    //         //     }),
    //         // ],
    //     ];

    //     $validator = Validator::make($request->all(),$rules);

    //     // Validate the request
    //     if ($validator->fails()) {
    //         Session::flash('danger',' Validation Error.');
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }
    //     else{

    //         // save new customer.
    //          // Check if customer with the given email or phone already exists
    //         $existingCustomer = Customer::where('email', $request->email)
    //         ->orWhere('phone', $request->phone)
    //         ->first();

    //         if ($existingCustomer) {
    //             // Customer with the same email or phone already exists
    //             // You can show a session message or take any other action
    //             return redirect()->back()->with('warning', 'The same email or phone already exists. Please login first.');
    //         } else {
    //             // Customer does not exist, create a new one
    //             $customer = new Customer;
    //             $customer->firstName  = $request->fname;
    //             $customer->lastName = $request->lname;
    //             $customer->phone = $request->phone;
    //             $customer->email = $request->email;
    //             $customer->billing_address = $request->billing_address;
    //             $customer->division = $request->billing_division;
    //             $customer->district = $request->billing_district;
    //             $customer->area = $request->billing_area;
    //             // $customer->loyalty_point = $request->point;
    //             $customer->save();

    //         // You can show a success session message or take any other action
    //         // return redirect()->back()->with('success', 'Customer created successfully.');
    //         // Session::flash('warning',)
    //         }

    //         $customer_id = $customer->id;
    //         $customerEmail = $customer->email;
    //         $customerPhone = $customer->phone;

    //         // if new customer registration store.
    //         if($request->is_createaccount){
    //             $customer_reg = new Register_customer;
    //             $customer_reg->customer_id = $customer_id;
    //             $customer_reg->email = $customerEmail;
    //             $customer_reg->phone = $customerPhone;
    //             $customer_reg->password = Hash::make($request->password);
    //             $customer_reg->status = 'registerd';
    //             $customer_reg->save();

    //             $registration_status = $customer_reg->status;
    //             $register_customer = Customer::find($customer_reg->customer_id);
    //             $register_customer->update([
    //                'status' => $registration_status,
    //             ]);

    //             Session::flash('warning','Your registration successfully complete, Please login to user dashboard.');
    //         }

    //         // $product = Cart::get();

    //         // order details store to order
    //         $order = new Order;
    //         $order->customer_id = $customer_id;
    //         $order->subtotal = $request->subtotal;
    //         $order->discount = 0;
    //         $order->tax = $request->tax;
    //         $order->total = $request->total_amount;
    //         $order->total = $request->is_shipping ? 1 : 0;
    //         $order->save();

    //         $cartItems = Cart::content();

    //         // Loop through the cart items and save them to the order item table
    //         foreach ($cartItems as $cartItem) {

    //             // Save $cartItem to your order item table
    //             //order item store in order item item table.
    //             order_items::create([
    //                 'product_id' => $cartItem->id,
    //                 'order_id' => $order->id,
    //                 'color_id' => $request->color_id,
    //                 'size_id' => $request->size_id,
    //                 'price' => $cartItem->price,
    //                 'quantity' => $cartItem->qty,
    //                 'comment' => $request->comment,
    //             ]);
    //         }

    //         if($request->is_shipping){
    //             // shipping addres different from billing address. get shipping data.
    //             $existingCustomer_shipping = shipping::where('customer_id', $customer_id);

    //             if($existingCustomer_shipping->shipping_add != $request->shipper_address)
    //             {
    //                 $shipping_info = new shipping;
    //                 $shipping_info->customer_id = $customer_id;
    //                 $shipping_info->order_id = $order->id;
    //                 $shipping_info->first_name = $request->shipper_fname;
    //                 $shipping_info->last_name = $request->shipper_lname;
    //                 $shipping_info->s_phone = $request->shipper_phone;
    //                 $shipping_info->s_email = $request->shipper_email;
    //                 $shipping_info->shipping_add = $request->shipper_address;
    //                 $shipping_info->division = $request->shipping_division;
    //                 $shipping_info->district = $request->shipping_district;
    //                 $shipping_info->area = $request->shipping_area;
    //                 $shipping_info->save();
    //             }
    //             else{
    //                 Session::flash('warning','You have same shipping address with your profile.');
    //             }

    //          }
    //          else{
    //             // shipping address and billing address same. billing address save to shipping table.

    //             // $existingCustomer_shipping = shipping::where('customer_id', $customer_id);

    //             // if($existingCustomer_shipping->shipping_add != $request->billing_address)
    //             // {
    //                 $shipping_info = new shipping;
    //                 $shipping_info->customer_id = $customer_id;
    //                 $shipping_info->order_id = $order->id;
    //                 $shipping_info->first_name = $request->fname;
    //                 $shipping_info->last_name = $request->lname;
    //                 $shipping_info->s_phone = $request->phone;
    //                 $shipping_info->s_email = $request->email;
    //                 $shipping_info->shipping_add = $request->billing_address;
    //                 $shipping_info->division = $request->billing_division;
    //                 $shipping_info->district = $request->billing_district;
    //                 $shipping_info->area = $request->billing_area;
    //                 $shipping_info->save();
    //             // }
    //          }

    //          $transaction = transactions::create([
    //             'customer_id' => $customer_id,
    //             'order_id' => $order->id,
    //             'mode' => $request->payment_mode,
    //          ]);

    //         // Clear the cart after saving to the order item table
    //         Cart::destroy();
    //         // Session::flash('success', 'Your order has been placed');
    //         // return redirect()->route('shop')->with('success', 'Your order has been placed');

    //     }

    // }

    /**
     * Display the specified resource.
     */
    public function completed_order()
    {
        $completedOrders = Order::with('customer', 'order_item', 'shipping', 'transaction')->where('status', 'completed')->get();
        return view('admin.order.completed_order', compact('completedOrders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        //$filename = 'Invoice_Sheet';

        // $pdf= PDF::loadView('admin.order.invoice',['order'=>$order],[],
        //     [
        //         'mode'                 => '',
        //         'format'               => 'A5',
        //         'default_font_size'    => '12',
        //         'default_font'         => 'sans-serif',
        //         'margin_left'          => 5,
        //         'margin_right'         => 5,
        //         'margin_top'           => 10,
        //         'margin_bottom'        => 21,
        //         'margin_header'        => 0,
        //         'margin_footer'        => 0,
        //         'orientation'          => 'P',
        //         'title'                => 'Laravel mPDF',
        //         'author'               => '',
        //         'watermark'            => '',
        //         'show_watermark'       => false,
        //         'watermark_font'       => 'sans-serif',
        //         'display_mode'         => 'fullpage',
        //         'watermark_text_alpha' => 0.1,
        //         'custom_font_dir'      => '',
        //         'custom_font_data' 	   => [],
        //         'auto_language_detection'  => false,
        //         'temp_dir'               => rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR),
        //         'pdfa' 			=> false,
        //         'pdfaauto' 		=> false,
        //     ]
        // );
        // return $pdf->stream($filename.'.pdf');
    }
    public function orderInvoice($id)

    {
        // ini_set('max_execution_time', 3600);
        $order = Order::where('id', $id)->first();
        // echo '<pre>';
        // print_r($data);
        if (!$order) {
            return 'Order not found';
        }
        else{
            // $pdf = PDF::loadView('admin.order.invoice');

            // return $pdf->stream('invoice.pdf');
            $data = ['order'=>$order];
            $pdf = PDF::loadView('admin.order.invoice', $data);
	        return $pdf->stream('Koohen Invoice-'.$order->id.'.pdf');
        }

    }

    public function invoicePage($id)
    {
        $order = Order::with('customer', 'order_item', 'order_item.product', 'order_item.product_sizes')->where('id', $id)->first();
        return view('admin.order.print-invoice', compact('order'));
    }
}
