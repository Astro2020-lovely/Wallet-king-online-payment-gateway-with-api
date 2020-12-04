<?php

namespace App\Http\Controllers\Auth;


use App\Classes\GetUserAgents;
use App\Country;
use App\Http\Controllers\Controller;
use App\Profile;
use App\Settings;
use App\UserAccount;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ProfileRegistrationController extends Controller
{

    protected $redirectTo = '/account';


    public function __construct()
    {
        $this->middleware('guest:profile');
    }


    public function showRegistrationForm()
    {
        $type = Input::get('type');
        $accounts = array('basic','business');
        if (in_array($type, $accounts)){
            session(['acctype' => $type]);
            $countries = Country::all();
            return view('registeruser',compact('countries','type'));
        }else{
            return redirect('account/type/registration');
        }
    }

    public function showTypeForm()
    {
        $countries = Country::all();
        return view('registertype',compact('countries'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect(route('user.account'));
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('profile');
    }

    protected function registered(Request $request, $user)
    {
        //
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:user_profiles',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $settings = Settings::findOrFail(1);
        $api_key = "";
        $random = new GetUserAgents();
        if ($data['acctype'] == "business"){
            $api_key = str_random(6).$random->goRandomString(9).str_random(6);
        }

        $verify_token = md5($data['email'].str_random(3));

        $to = $data['email'];
        $subject = "Email Verification";
        $txt = "Hello ".$data['name'].",\nYour account successfully created. Please go to following link to verify your account email.\n".url('/account/verify?token='.$verify_token);
        $headers = "From: ".$settings->title."<".$settings->email.">";
        mail($to,$subject,$txt,$headers);

        return UserAccount::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'country' => $data['country'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'acctype' => session('acctype'),
            'api_key' => $api_key,
            'verification_token' => $verify_token,
        ]);

    }
}
