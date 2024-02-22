<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Customer;
use App\Models\shipping;
use App\Models\order_items;
use App\Models\Orderstatus;
use App\Models\transactions;
use Illuminate\Http\Request;
use App\Models\Register_customer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\AdminMail;
use App\Mail\customerMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CheckoutController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */

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

    public function store(Request $request)
    {
        $track_id = $this->generateCode();

        if (Auth::guard('customer')->check()) {

            $user = Auth::guard('customer')->user();
            $customer_id = $user->customer->id;

            // order details store to order
            $order = new Order;
            $order->customer_id = $customer_id;
            $order->order_track_id = $track_id;
            $order->subtotal = $request->subtotal;
            $order->discount = 0;
            $order->tax = $request->tax;
            $order->total = $request->total_amount;
            $order->delivery_charge = $request->shipping_cost;
            $order->is_shipping_different = $request->is_shipping ? 1 : 0;
            $order->comment = $request->comment;
            $order->save();

            $order_status = Orderstatus::create([
                'order_id' => $order->id,
            ]);

            $cartItems = Cart::instance('cart')->content();

            // Loop through the cart items and save them to the order item table
            foreach ($cartItems as $cartItem) {

                // Save $cartItem to your order item table
                //order item store in order item item table.
                order_items::create([
                    'product_id' => $cartItem->id,
                    'order_id' => $order->id,
                    'color_id' => $request->color_id,
                    'size_id' => $request->size_id,
                    'price' => $cartItem->price,
                    'quantity' => $cartItem->qty,
                ]);
            }

            $transaction = transactions::create([
                'customer_id' => $customer_id,
                'order_id' => $order->id,
                'mode' => $request->payment_mode,
            ]);
            $customer = Customer::find($customer_id);

            Session::flash('warning','Check your order in dashboard.');
            Mail::to($customer->email)->send( new customerMail($order));

        }
        else{
            $rules = [
                'fname' => 'required|string',
                'lname' => 'required|string',
                'phone' => 'required|string',
                'email' => 'required|email',
                'billing_address' => 'required|string',
                'division' => 'required',
                'district' => 'required',
                'area' => 'required',
                // 'password' => 'min:6',
            ];
            $customMessages = [
                'fname.required' => 'Please fill up first name field.',
                'lname.required' => 'Please fill up last name field.',
                'phone.required' => 'Please fill up phone field .',
                'email.required' => 'Please fill up email field.',
                'billing_address.required' => 'Please fill up billing address field.',
            ];

            $validator = Validator::make($request->all(), $rules, $customMessages);

            // Validate the request
            if ($validator->fails()) {

                // Session::flash('danger', $validator->messages()->toArray());
                return redirect()->back()->withErrors($validator)->withInput();
            }
            else{

                // save new customer.
                // Check if customer with the given email or phone already exists
                $existingCustomer = Customer::where('email', $request->email)
                ->orWhere('phone', $request->phone)
                ->first();

                if ($existingCustomer) {
                    // Customer with the same email or phone already exists
                    // You can show a session message or take any other action
                    return redirect()->back()->with('warning', 'The same email or phone already exists. Please login first.');
                } else {
                    // Customer does not exist, create a new one
                    $customer = new Customer;
                    $customer->firstName  = $request->fname;
                    $customer->lastName = $request->lname;
                    $customer->phone = $request->phone;
                    $customer->email = $request->email;
                    $customer->billing_address = $request->billing_address;
                    $customer->division = $request->division;
                    $customer->district = $request->district;
                    $customer->area = $request->area;
                    $customer->loyalty_point = 10;
                    $customer->save();
                }

                $customer_id = $customer->id;
                $customerPhone = $customer->phone;
                $customerEmail = $customer->email;

                // if new customer registration store.
                if($request->is_createaccount){
                    $customer_reg = new Register_customer;
                    $customer_reg->customer_id = $customer_id;
                    $customer_reg->phone = $customerPhone;
                    $customer_reg->email = $customerEmail;
                    $customer_reg->password = Hash::make($request->password);
                    $customer_reg->status = 'registerd';
                    $customer_reg->save();

                    $registration_status = $customer_reg->status;
                    $register_customer = Customer::find($customer_reg->customer_id);
                    $register_customer->update([
                    'status' => $registration_status,
                    ]);

                    Session::flash('warning','Your registration complete successfully, Please login to user dashboard.');
                }

                // $product = Cart::get();
                // order details store to order
                $order = new Order;
                $order->customer_id = $customer_id;
                $order->order_track_id = $track_id;
                $order->subtotal = $request->subtotal;
                $order->discount = 0;
                $order->tax = $request->tax;
                $order->total = $request->total_amount;
                $order->delivery_charge = $request->shipping_cost;
                $order->is_shipping_different = $request->is_shipping ? 1 : 0;
                $order->comment = $request->comment;
                $order->save();

                $order_status = Orderstatus::create([
                    'order_id' => $order->id,
                ]);

                $cartItems = Cart::instance('cart')->content();

                // Loop through the cart items and save them to the order item table
                foreach ($cartItems as $cartItem) {

                    // Save $cartItem to your order item table
                    //order item store in order item item table.
                    order_items::create([
                        'product_id' => $cartItem->id,
                        'order_id' => $order->id,
                        'color_id' => $request->color_id,
                        'size_id' => $request->size_id,
                        'price' => $cartItem->price,
                        'quantity' => $cartItem->qty,
                    ]);
                }

                if($request->is_shipping){
                    // shipping addres different from billing address. get shipping data.
                    // $existingCustomer_shipping = shipping::where('customer_id', $customer_id);

                    $shipping_info = new shipping;
                    $shipping_info->customer_id = $customer_id;
                    $shipping_info->order_id = $order->id;
                    $shipping_info->first_name = $request->shipper_fname;
                    $shipping_info->last_name = $request->shipper_lname;
                    $shipping_info->s_phone = $request->shipper_phone;
                    $shipping_info->s_email = $request->shipper_email;
                    $shipping_info->shipping_add = $request->shipper_address;
                    $shipping_info->division = $request->s_division;
                    $shipping_info->district = $request->s_district;
                    $shipping_info->area = $request->s_area;
                    $shipping_info->save();
                }
                else{
                    // shipping address and billing address same. billing address save to shipping table.

                        $shipping_info = new shipping;
                        $shipping_info->customer_id = $customer_id;
                        $shipping_info->order_id = $order->id;
                        $shipping_info->first_name = $request->fname;
                        $shipping_info->last_name = $request->lname;
                        $shipping_info->s_phone = $request->phone;
                        $shipping_info->s_email = $request->email;
                        $shipping_info->shipping_add = $request->billing_address;
                        $shipping_info->division = $request->division;
                        $shipping_info->district = $request->district;
                        $shipping_info->area = $request->area;
                        $shipping_info->save();
                }
                $transaction = transactions::create([
                    'customer_id' => $customer_id,
                    'order_id' => $order->id,
                    'mode' => $request->payment_mode,
                ]);
            }
            Mail::to( $customer->email)->send( new customerMail($order));

        }
        // Clear the cart after saving to the order item table
        Mail::to('qbittech.dev1@gmail.com')->send( new AdminMail($order));

        Cart::instance('cart')->destroy();
        return redirect()->route('shop')->with('success', 'Your order has been placed');
    }


    public function login(Request $request)
    {
        $request->validate([
            'login_identifier' => 'required',
            'password' => 'required',
        ]);

        $loginIdentifier = $request->input('login_identifier');

        // Check if the login identifier is an email or phone
        $fieldType = filter_var($loginIdentifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        // Attempt to authenticate the customer
        if (Auth::guard('customer')->attempt([$fieldType => $loginIdentifier, 'password' => $request->password])) {

            // Authentication successful
            return redirect()->route('checkout')->with('success','Successfully Login.');
        }

        // Authentication failed
        throw ValidationException::withMessages([
            'danger' => 'Login failed, Try again',
            'login_identifier' => [trans('auth.failed')],
        ]);
    }
}
