<?php

namespace App\Http\Controllers\Auth;

use App\Analytic;
use App\UserLogins;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Classes\GetUserAgents;

class ProfileLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:profile');
    }

    public function showLoginFrom(){
        return view('userlogin');
    }

    public function login(Request $request){

        if (Auth::guard('profile')->attempt(['email' => $request->email,'password' => $request->password], false)){

            $getInfo = new GetUserAgents();
            $ip = $getInfo->getIp();
            $browser = $getInfo->showInfo('browser')." ".$getInfo->showInfo('version');
            $os = $getInfo->showInfo('os');
            $location = "No Country";
            if ($ip != "::1"){
                $location = $getInfo->getLocation($ip);
            }
            $userlog = new UserLogins();
            $userlog->userid = Auth::guard('profile')->user()->id;
            $userlog->ip =$ip ;
            $userlog->location = $location;
            $userlog->agent = $browser;
            $userlog->os = $os;
            $userlog->login_time = date('Y-m-d H:i:s');
            $userlog->save();

            if (Analytic::where('type','browser')->where('info',$browser)->count() > 0){
                $browserup = Analytic::where('type','browser')->where('info',$browser)->first();
                $browsers['total'] = $browserup->total + 1;
                $browserup->update($browsers);
            }else{
                $browsers = new Analytic();
                $browsers->type = 'browser';
                $browsers->info = $browser;
                $browsers->total = 1;
                $browsers->save();
            }

            if (Analytic::where('type','os')->where('info',$os)->count() > 0){
                $oss = Analytic::where('type','os')->where('info',$os)->first();
                $browserss['total'] = $oss->total + 1;
                $oss->update($browserss);
            }else{
                $browsers = new Analytic();
                $browsers->type = 'os';
                $browsers->info = $os;
                $browsers->total = 1;
                $browsers->save();
            }


            if (Auth::guard('profile')->user()->status == 0) {
                Auth::guard('profile')->logout();
                return redirect()->back()
                    ->with('error','Your Account is Suspended.');
            }
            return redirect()->intended(route('user.account'));

        }

        //return redirect()->back()->withInput($request->only('email'));
        return $this->sendFailedLoginResponse($request);
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required', 'password' => 'required',
        ]);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username()))
            ->withErrors($errors);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }




}
