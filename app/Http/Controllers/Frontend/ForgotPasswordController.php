<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Carbon;
use App\Mail\PasswordResetMail;
use App\Models\Register_customer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{


    public function showForgetPasswordForm(){
        return view('auth.forgot-password');
    }
    public function submitForgetPasswordForm(Request $request){
        $this->validate($request, [
            'email' =>'required|email',
        ]);
        $token = Str::random(40);
        $email = $request->email;
        $registered_email = Register_customer::where('email', $email)->first();
        if($registered_email==true){
           PasswordReset::create([
            'email' => $email,
            'token' => $token,
            'created_at' => now(),
           ]);

           Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });
           Session::flash('success','We have e-mailed your password reset link!');
           return redirect()->route('home');
        }else{
            Session::flash('error','This email is not registered');
        }

    }
    /**
     * Show the form for creating a new resource.
     */
    public function resetPasswordSubmit($token)
    {
        return view('auth.forgetPasswordLink',['token'=>$token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email'=> 'required|email|string',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        $updatePassword = PasswordReset::where(['email' => $request->email,'token' => $request->token])->first();
        if(!$updatePassword){
            Session::flash('danger','Reset link has been expired!!');
            return redirect()->back();
        }
        else{
            Register_customer::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
            PasswordReset::where(['email'=> $request->email])->delete();
            Session::flash('success','Your password has been changed!!');
            return redirect()->route('home');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    }
}
