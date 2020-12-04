<?php

namespace App\Http\Controllers;

use App\Blog;
use App\SectionTitles;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titles = SectionTitles::findOrFail(1);
        $blogs = Blog::all();
        return view('admin.blogsection',compact('blogs','titles'));
    }

    public function titleform()
    {
        $languages = SectionTitles::findOrFail(1);
        return view('admin.blogtitles',compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->fill($request->all());

        if ($file = $request->file('image')){
            $photo_name = str_random(3).$request->file('image')->getClientOriginalName();
            $file->move('assets/images/blog',$photo_name);
            $blog['featured_image'] = $photo_name;
        }
        $blog->save();
        return redirect('admin/blog')->with('message','New Blog Added Successfully.');
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
        $blog = Blog::findOrFail($id);
        return view('admin.blogedit',compact('blog'));
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
        $blog = Blog::findOrFail($id);
        $data = $request->all();

        if ($file = $request->file('image')){
            $photo_name = str_random(3).$request->file('image')->getClientOriginalName();
            $file->move('assets/images/blog',$photo_name);
            $data['featured_image'] = $photo_name;
        }
        $blog->update($data);
        return redirect('admin/blog')->with('message','Blog Updated Successfully.');
    }

    public function titles(Request $request)
    {
        $blog = SectionTitles::findOrFail(1);
        $data['blog_title'] = $request->blog_title;
        $data['blog_text'] = $request->blog_text;
        $blog->update($data);
        return redirect('admin/blog/titles')->with('message','Blog Section Title & Text Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect('admin/blog')->with('message','Blog Delete Successfully.');
    }
}
