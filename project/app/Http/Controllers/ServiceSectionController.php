<?php

namespace App\Http\Controllers;

use App\SectionTitles;
use App\ServiceSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceSectionController extends Controller
{

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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = ServiceSection::all();
        return view('admin.servicesection',compact('services'));
    }

    public function titlesform()
    {
        $languages = SectionTitles::findOrFail(1);
        return view('admin.servicetitles',compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.servicesectionadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new ServiceSection();
        $service->fill($request->all());

        if ($file = $request->file('image')){
            $photo_name = str_random(3).$request->file('image')->getClientOriginalName();
            $file->move('assets/images/service',$photo_name);
            $service['icon'] = $photo_name;
        }
        $service->save();
        return redirect('admin/service')->with('message','Service Added Successfully.');
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

        $service = ServiceSection::findOrFail($id);
        return view('admin.servicesectionedit',compact('service'));
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
        $service = ServiceSection::findOrFail($id);
        $data = $request->all();

        if ($file = $request->file('image')){
            $photo_name = str_random(3).$request->file('image')->getClientOriginalName();
            $file->move('assets/images/service',$photo_name);
            $data['icon'] = $photo_name;
        }
        $service->update($data);
        return redirect('admin/service')->with('message','Service Sectionn Updated Successfully.');
    }

    public function titles(Request $request)
    {
        $service = SectionTitles::findOrFail(1);
        $data['service_title'] = $request->service_title;
        $data['service_text'] = $request->service_text;
        $service->update($data);
        return redirect('admin/service/titles')->with('message','Service Section Title & Text Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = ServiceSection::findOrFail($id);
        $service->delete();
        return redirect('admin/service')->with('message','Service Delete Successfully.');
    }
}
