<?php

namespace App\Http\Controllers;

use App\SeoTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SeoToolsController extends Controller
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
        $tools = SeoTools::find(1);
        return view('admin.googleanalytics',compact('tools'));
    }

    public function metaform()
    {
        $tools = SeoTools::find(1);
        return view('admin.metatags',compact('tools'));
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
        $tool = SeoTools::findOrFail($id);
        $data = $request->all();
        $tool->update($data);
        Session::flash('message', 'Analytics Code Updated Successfully.');
        return redirect('admin/tools/google');
    }

    public function metaupdate(Request $request)
    {
        $tool = SeoTools::findOrFail(1);
        $data = $request->all();
        $tool->update($data);
        Session::flash('message', 'Website Meta Tags Updated Successfully.');
        return redirect('admin/tools/meta');
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
