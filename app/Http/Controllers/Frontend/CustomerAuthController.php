<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Register_customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class CustomerAuthController extends Controller
{
    // protected $redirectTo = view('frontend.dashboard');
    public function registration(Request $request)
    {

        $rules = [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255','unique:'.Register_customer::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Register_customer::class],
            'password' => ['required', Password::defaults()],
            'captcha' => 'required|captcha'
        ];
        $customMessages = [
            'firstname.required' => 'Please fill up first name field.',
            'lastname.required' => 'Please fill up last name field.',
            'phone.required' => 'Please fill up phone field .',
            'email.required' => 'Please fill up email field.',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Validate the request
        if ($validator->fails()) {

            Session::flash('warning', 'Registration is not completed. Please Check registration form for errors. ');
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else{
            $customer = Customer::create([
                'firstName' => $request->firstname,
                'lastName' => $request->lastname,
                'phone' => $request->phone,
                'email' => $request->email,
                'status' =>'registerd',
            ]);

            $register_customer = Register_customer::create([
                'customer_id' => $customer->id,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('home')->with('success','Registration Complete, Please login.');
        }
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
            Session::flash('success','Welcome to user dashboard.');
            return redirect()->route('customer.dashboard');
        }
        else{
            Session::flash('danger','Login failed, Try again.');
        }

        // Authentication failed
        throw ValidationException::withMessages([
            'danger' => 'Login failed, Try again',
            'login_identifier' => [trans('auth.failed')],
        ]);
    }

    public function logout()
    {
        Auth::guard('customer')->logout();

        return redirect('/');
    }
}
