<?php

namespace App\Http\Controllers;

use App\FAQ;
use App\PageSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PageSettingsController extends Controller
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
        $pagedata = PageSettings::find(1);
        return view('admin.pagesettings',compact('pagedata'));
    }


    public function aboutpage()
    {
        $pagedata = PageSettings::findOrFail(1);
        return view('admin.aboutpage',compact('pagedata'));
    }

    public function documentation()
    {
        $pagedata = PageSettings::findOrFail(1);
        return view('admin.developerspage',compact('pagedata'));
    }

    public function faqpage()
    {
        $faqs = FAQ::all();
        $pagedata = PageSettings::findOrFail(1);
        return view('admin.faqpage',compact('pagedata','faqs'));
    }

    public function contactpage()
    {
        $pagedata = PageSettings::findOrFail(1);
        return view('admin.contactuspage',compact('pagedata'));
    }

    //FAQ Page Add,Edit,Update
    public function addfaq()
    {
        return view('admin.faqadd');
    }

    public function faqdelete($id)
    {
        FAQ::findOrFail($id)->delete();
        return redirect('admin/pagesettings/faq')->with('message','FAQ Deleted Successfully.');
    }

    public function faqedit($id)
    {
        $faq = FAQ::findOrFail($id);
        return view('admin.faqedit',compact('faq'));
    }

    public function faqsave(Request $request)
    {
        $faq = new FAQ();
        $faq->fill($request->all());
        $faq->save();
        Session::flash('message', 'New FAQ Added Successfully.');
        return redirect('admin/pagesettings/faq');
    }

    public function faqupdate(Request $request,$id)
    {
        $faq = FAQ::findOrFail($id);
        $data = $request->all();
        $faq->update($data);
        Session::flash('message', 'FAQ Updated Successfully.');
        return redirect('admin/pagesettings/faq');
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
        //
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
    }

    //Upadte About Page Section Settings
    public function about(Request $request)
    {
        $page = PageSettings::findOrFail(1);
        $input = $request->all();
        if ($request->a_status == ""){
            $input['a_status'] = 0;
        }
        $page->update($input);
        Session::flash('message', 'About Us Page Content Updated Successfully.');
        return redirect('admin/pagesettings/about');
    }

    //Upadte documentation Page Section Settings
    public function documentationup(Request $request)
    {
        $page = PageSettings::findOrFail(1);
        $input = $request->all();
        if ($request->api_status == ""){
            $input['api_status'] = 0;
        }
        $page->update($input);
        Session::flash('message', 'API Documentation Page Content Updated Successfully.');
        return redirect('admin/pagesettings/documentation');
    }

    //Upadte FAQ Page Section Settings
    public function faq(Request $request)
    {
        $page = PageSettings::findOrFail(1);
        $input = $request->all();
        if ($request->f_status == ""){
            $input['f_status'] = 0;
        }
        $page->update($input);
        Session::flash('message', 'FAQ Page Content Updated Successfully.');
        return redirect('admin/pagesettings/faq');
    }

    //Upadte Contact Page Section Settings
    public function contact(Request $request)
    {
        $page = PageSettings::findOrFail(1);
        $input = $request->all();
        if ($request->c_status == ""){
            $input['c_status'] = 0;
        }
        $page->update($input);
        Session::flash('message', 'Contact Page Content Updated Successfully.');
        return redirect('admin/pagesettings/contact');
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
