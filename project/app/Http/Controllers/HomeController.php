<?php

namespace App\Http\Controllers;

use App\Analytic;
use App\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $os_data = "";
        $browser_data = "";
        $oss = Analytic::where('type','os')->orderBy('total','desc')->take(5)->get();
        $browsers = Analytic::where('type','browser')->orderBy('total','desc')->take(5)->get();

        $trans_data = "";
        for($i = 0; $i < 30; $i++) {
            $trans_data .= '{x: new Date('.date("Y, m, d", strtotime('-'. $i .' days')).'), y: '.count(Transaction::whereDate('trans_date', '=', date("Y-m-d", strtotime('-'. $i .' days')))->groupBy('transid')->get()).', label: "'.date("d M", strtotime('-'. $i .' days')).'"},';

        }

        foreach ($oss as $os){
            $os_data .= '{y: '.$os->total.', name: "'.$os->info.'"},';
        }

        foreach ($browsers as $browser){
            $browser_data .= '{y: '.$browser->total.', name: "'.$browser->info.'"},';
        }

        return view('admin.dashboard',compact('oss','browsers','os_data','browser_data','trans_data'));
    }
}
