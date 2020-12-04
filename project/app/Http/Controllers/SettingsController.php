<?php

namespace App\Http\Controllers;

use App\PageSettings;
use App\Settings;
use App\SiteLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role != "administrator"){
                return redirect('admin/dashboard')->with('error','Sorry, You are not an Administrator');
            }
            else{

                return $next($request);
            }
        });
    }


    public function index()
    {
        // //
         $setting = DB::select('select * from settings where id=?',[1]);
         return view('admin.settings', compact('setting'));
    }

    public function logoform()
    {
        // //
         $setting = DB::select('select * from settings where id=?',[1]);
         return view('admin.setlogo', compact('setting'));
    }

    public function faviconform()
    {
        // //
         $setting = DB::select('select * from settings where id=?',[1]);
         return view('admin.setfavicon', compact('setting'));
    }

    public function aboutform()
    {
        // //
         $setting = DB::select('select * from settings where id=?',[1]);
         return view('admin.setabout', compact('setting'));
    }

    public function paymentform()
    {
         $setting = Settings::findOrFail(1);
         return view('admin.setpaymentinfo', compact('setting'));
    }

    public function footerform()
    {
        // //
         $setting = DB::select('select * from settings where id=?',[1]);
         return view('admin.setfooter', compact('setting'));
    }

    public function contentsform()
    {
        // //
         $setting = DB::select('select * from settings where id=?',[1]);
         $pagedata = PageSettings::findOrFail(1);
         return view('admin.setcontents', compact('setting','pagedata'));
    }

    public function backgroundform()
    {
        // //
         $setting = DB::select('select * from settings where id=?',[1]);
         return view('admin.setbackground', compact('setting'));
    }

    public function addressform()
    {
        // //
         $setting = DB::select('select * from settings where id=?',[1]);
         return view('admin.setaddress', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        DB::table('settings')
            ->where('id', 1)
            ->update(['title' => $request->title]);
        Session::flash('message', 'Title Updated Successfully.');
        return redirect('admin/settings');
    }

    //Theme Color
    public function themecolors()
    {
        $setting = DB::select('select * from settings where id=?',[1]);
        return view('admin.setcolor', compact('setting'));
    }

    //Theme Color Update
    public function themecolor(Request $request)
    {
        $color = Settings::findOrFail(1)->theme_color;

        $actual_path = str_replace('project','',base_path());
        $style2 = public_path().'/assets/css/style.css';

        $file2_contents = file_get_contents($style2);
        $file2_contents = str_replace($color,$request->color,$file2_contents);
        file_put_contents($style2,$file2_contents);

        DB::table('settings')
            ->where('id', 1)
            ->update(['theme_color' => $request->color]);

        Session::flash('message', 'Theme Color Updated Successfully.');
        return redirect('admin/theme-color');
    }

    public function title(Request $request)
    {
        $homesections = PageSettings::findOrFail(1);

        $input['slider_status'] = 1;
        $input['service_status'] = 1;
        $input['counter_status'] = 1;
        $input['portfolio_status'] = 1;
        $input['blog_status'] = 1;
        $input['testimonial_status'] = 1;

        if ($request->slider_status != 1){
            $input['slider_status'] = 0;
        }
        if ($request->service_status != 1){
            $input['service_status'] = 0;
        }
        if ($request->counter_status != 1){
            $input['counter_status'] = 0;
        }
        if ($request->portfolio_status != 1){
            $input['portfolio_status'] = 0;
        }
        if ($request->testimonial_status != 1){
            $input['testimonial_status'] = 0;
        }
        if ($request->blog_status != 1){
            $input['blog_status'] = 0;
        }

        DB::table('settings')
            ->where('id', 1)
            ->update([
                'title' => $request->title,
                'currency_sign' => $request->currency_sign,
                'currency_code' => $request->currency_code
            ]);

        $homesections->update($input);

        Session::flash('message', 'Website Content Updated Successfully.');
        return redirect('admin/settings/contents');
    }

    public function payment(Request $request)
    {
        $input['paypal_deposit'] = 1;
        $input['stripe_deposit'] = 1;
        $input['pm_deposit'] = 1;
        $input['blocktrail_deposit'] = 1;
        $input['mobile_deposit'] = 1;
        $input['bank_deposit'] = 1;
        $input['paypal_withdraw'] = 1;
        $input['skrill_withdraw'] = 1;
        $input['payoneer_withdraw'] = 1;
        $input['bank_withdraw'] = 1;
        $input['use_address'] = 1;

        if ($request->paypal_deposit != 1){
            $input['paypal_deposit'] = 0;
        }
        if ($request->stripe_deposit != 1){
            $input['stripe_deposit'] = 0;
        }
        if ($request->pm_deposit != 1){
            $input['pm_deposit'] = 0;
        }
        if ($request->blocktrail_deposit != 1){
            $input['blocktrail_deposit'] = 0;
        }
        if ($request->mobile_deposit != 1){
            $input['mobile_deposit'] = 0;
        }
        if ($request->bank_deposit != 1){
            $input['bank_deposit'] = 0;
        }
        if ($request->paypal_withdraw != 1){
            $input['paypal_withdraw'] = 0;
        }
        if ($request->skrill_withdraw != 1){
            $input['skrill_withdraw'] = 0;
        }
        if ($request->payoneer_withdraw != 1){
            $input['payoneer_withdraw'] = 0;
        }
        if ($request->bank_withdraw != 1){
            $input['bank_withdraw'] = 0;
        }
        if ($request->use_address != 1){
            $input['use_address'] = 0;
        }

        $input['paypal_business'] = $request->paypal;
        $input['pm_account'] = $request->pm_account;
        $input['stripe_key'] = $request->stripe_key;
        $input['stripe_secret'] = $request->stripe_secret;
//        $input['blocktrail_api'] = $request->blocktrail_api;
//        $input['blocktrail_secret'] = $request->blocktrail_secret;
//        $input['wallet_id'] = $request->wallet_id;
//        $input['wallet_pass'] = $request->wallet_pass;
//        $input['wallet_address'] = $request->wallet_address;

        $input['blockchain_api'] = $request->blockchain_api;
        $input['blockchain_xpub'] = $request->blockchain_xpub;
        $input['secret_string'] = $request->secret_string;
        $input['bank_info'] = $request->bank_info;
        $input['mobile_info'] = $request->mobile_info;
        $input['transfer_charge'] = $request->transfer_charge;
        $input['extra_charge'] = $request->extra_charge;
        $input['withdraw_fee'] = $request->withdraw_fee;

        DB::table('settings')
            ->where('id', 1)
            ->update($input);

        Session::flash('message', 'Payment Informations Updated Successfully.');
        return redirect('admin/settings/payment');
    }

    public function about(Request $request)
    {
        //return $request->all();
        DB::table('settings')
            ->where('id', 1)
            ->update(['about' => $request->about]);


        Session::flash('message', 'About Us Text Updated Successfully.');
        return redirect('admin/settings/info');
    }

    public function address(Request $request)
    {
        //return $request->all();
        DB::table('settings')
            ->where('id', 1)
            ->update(['address' => $request->address,
                'phone' => $request->phone,
                'fax' => $request->fax,
                'email' => $request->email]);
        Session::flash('message', 'Address Updated Successfully.');
        return redirect('admin/settings/address');
    }

    public function footer(Request $request)
    {
        //return $request->all();
        DB::table('settings')
            ->where('id', 1)
            ->update(['footer' => $request->footer]);
        Session::flash('message', 'Footer Updated Successfully.');
        return redirect('admin/settings/footer');
    }

    public function logo(Request $request)
    {
        //return $request->all();

        ///return redirect('admin/settings');
        $logo = $request->file('logo');
        $name = $logo->getClientOriginalName();
        $logo->move('assets/images/logo',$name);
        DB::table('settings')
            ->where('id', 1)
            ->update(['logo' => $name]);
        Session::flash('message', 'Website Logo Updated Successfully.');
        return redirect('admin/settings/logo');
    }

    public function favicon(Request $request)
    {
        $logo = $request->file('favicon');
        $name = $logo->getClientOriginalName();
        $logo->move('assets/images/',$name);
        DB::table('settings')
            ->where('id', 1)
            ->update(['favicon' => $name]);
        Session::flash('message', 'Website Favicon Updated Successfully.');
        return redirect('admin/settings/favicon');
    }

    public function background(Request $request)
    {

        $logo = $request->file('background');
        $name = $logo->getClientOriginalName();
        $logo->move('assets/images',$name);
        DB::table('settings')
            ->where('id', 1)
            ->update(['background' => $name]);
        Session::flash('message', 'Background Image Updated Successfully.');
        return redirect('admin/settings/background');
    }


    public function setlanguage()
    {
        $language = SiteLanguage::findOrFail(1);
        return view('admin.setlanguages',compact('language'));
    }

    public function language(Request $request)
    {
        $language = SiteLanguage::findOrFail(1);
        $data = $request->all();
        $language->update($data);
        return redirect('admin/language-settings')->with('message','Website Language Updated Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //return $request->all();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
