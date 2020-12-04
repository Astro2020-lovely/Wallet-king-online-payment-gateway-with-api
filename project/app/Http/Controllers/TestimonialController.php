<?php

namespace App\Http\Controllers;

use App\SectionTitles;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role != "administrator"){
                return redirect('admin/dashboard');
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
        $testimonials = Testimonial::all();
        return view('admin.testimonialsection',compact('testimonials'));
    }

    public function titlesform()
    {
        $languages = SectionTitles::findOrFail(1);
        return view('admin.testimonialtitles',compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonialadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testimonial = new Testimonial;
        $testimonial->fill($request->all());

        $testimonial->save();
        return redirect('admin/testimonial')->with('message','Testimonial Added Successfully.');
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
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonialedit',compact('testimonial'));
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
        $testimonial = Testimonial::findOrFail($id);
        $data = $request->all();

        $testimonial->update($data);
        return redirect('admin/testimonial')->with('message','Testimonial Updated Successfully.');
    }

    public function titles(Request $request)
    {
        $service = SectionTitles::findOrFail(1);
        $data['testimonial_title'] = $request->testimonial_title;
        $data['testimonial_text'] = $request->testimonial_text;
        $service->update($data);
        return redirect('admin/testimonial/titles')->with('message','Testimonial Section Title & Text Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();
        return redirect('admin/testimonial')->with('message','Testimonial Delete Successfully.');
    }
}
