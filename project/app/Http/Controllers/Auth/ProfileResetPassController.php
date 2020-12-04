<?php

namespace App\Http\Controllers\Auth;

use App\UserAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileResetPassController extends Controller
{
    //Show Forgot Password Form
    public function showForgotForm(){
        return view('forgotform');
    }

    //Reset Users Profile Password
    public function resetPass(Request $request){

        if (UserAccount::where('email', '=', $request->email)->count() > 0) {
            // user found
            $user = UserAccount::where('email', '=', $request->email)->firstOrFail();
            $autopass = str_random(8);
            $input['password'] = Hash::make($autopass);

            $user->update($input);
            $subject = "Reset Password Request";
            $msg = "Your New Password is : ".$autopass;

            mail($request->email,$subject,$msg);
            Session::flash('success', 'Your Password Reseted Successfully. Please Check your email for new Password.');
            return redirect(route('user.forgotpass'));

        }else{
            // user not found
            Session::flash('error', 'No Account Found With This Email.');
            return redirect(route('user.forgotpass'));
        }
    }




}
