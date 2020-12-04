<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\UserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use URL;
use Redirect;
use Input;
use App\Order;
use App\Package;
use App\PricingTable;
use App\Settings;
use Config;

use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Stripe\Error\Card;

class StripeController extends Controller
{

    public function __construct()
    {
        //Set Spripe Keys
        $stripe = Settings::findOrFail(1);
  		Config::set('services.stripe.key', $stripe->stripe_key);
  		Config::set('services.stripe.secret', $stripe->stripe_secret);
    }


    function goRandomString($length = 10) {
        $characters = 'abcdefghijklmnpqrstuvwxyz123456789';
        $string = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        }
        return $string;
    }

    public function store(Request $request){

        if($request->total > 0){

        $settings = Settings::findOrFail(1);

        $success_url = action('PaymentController@payreturn');


        $item_name = $settings->title." Deposit Amount";
        $transid = strtoupper($this->goRandomString(4).str_random(3).$this->goRandomString(4));
        ;
        $item_amount = $request->total;

		$validator = Validator::make($request->all(),[
						'card' => 'required',
						'cvv' => 'required',
						'month' => 'required',
						'year' => 'required',
					]);

		if ($validator->passes()) {

	     	$stripe = Stripe::make(Config::get('services.stripe.secret'));
	     	try{
	     		$token = $stripe->tokens()->create([
	     			'card' =>[
	     					'number' => $request->card,
	     					'exp_month' => $request->month,
	     					'exp_year' => $request->year,
	     					'cvc' => $request->cvv,
	     				],
	     			]);
	     		if (!isset($token['id'])) {
	     			return back()->with('error','Token Problem With Your Token.');
	     		}

	     		$charge = $stripe->charges()->create([
	     			'card' => $token['id'],
	     			'currency' => 'USD',
	     			'amount' => $item_amount,
	     			'description' => $item_name,
	     			]);

	     		//dd($charge);

	     		if ($charge['status'] == 'succeeded') {

                    $receivertrans = new Transaction();
                    $receivertrans['transid'] = $transid;
                    $receivertrans['mainacc'] = $request->acc;
                    $receivertrans['accto'] = null;
                    $receivertrans['accfrom'] = null;
                    $receivertrans['type'] = "deposit";
                    $receivertrans['sign'] = "+";
                    $receivertrans['reference'] = $request->reference;
                    $receivertrans['reason'] = "Account Deposit";
                    $receivertrans['amount'] = $item_amount;
                    $receivertrans['fee'] = "0";
                    $receivertrans['deposit_method'] = "Stripe";
                    $receivertrans['deposit_transid'] = $charge['balance_transaction'];
                    $receivertrans['deposit_chargeid'] = $charge['id'];
                    $receivertrans['trans_date'] = date('Y-m-d H:i:s');
                    $receivertrans['status'] = 1;
                    $receivertrans->save();

                    $account = UserAccount::findOrFail($request->acc);
                    $data['current_balance'] = $account->current_balance + $item_amount;
                    $account->update($data);

	     			return redirect($success_url);
	     		}
	     		
	     	}catch (Exception $e){
	     		return back()->with('error', $e->getMessage());
	     	}catch (\Cartalyst\Stripe\Exception\CardErrorException $e){
	     		return back()->with('error', $e->getMessage());
	     	}catch (\Cartalyst\Stripe\Exception\MissingParameterException $e){
	     		return back()->with('error', $e->getMessage());
	     	}
		}
		return back()->with('error', 'Please Enter Valid Credit Card Informations.');

        }else{
            return back()->with('error', 'Please Enter Valid Amount.');
        }
	}
}
