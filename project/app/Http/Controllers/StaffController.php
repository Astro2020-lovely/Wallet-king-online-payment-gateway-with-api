<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Validator;

class StaffController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = User::all();
        return view('admin.staffs',compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staffadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'photo.mimes' => 'Only JPG,PNG file Allowed for Staff Photo',
            'email.unique' => 'Staff Already Exists With this Email',
            'email.required' => 'Please Enter an Staff Email',
            'password.min' => 'Password Must Be 6 digits Long',
            'password.required' => 'Please Enter an Staff Password',
        ];

        $validator = Validator::make($request->all(),[
            'photo' => 'mimes:jpeg,bmp,png',
            'email' => 'required|email|max:255|unique:admin',
            'password' => 'required|min:6',
        ],$messages);

        if ($validator->passes()) {
            $staff = new User();
            $staff->fill($request->all());

            if ($file = $request->file('photo')){
                $photo_name = str_random(3).$request->file('photo')->getClientOriginalName();
                $file->move('assets/images/admin',$photo_name);
                $staff['photo'] = $photo_name;
            }
            $staff['password'] = Hash::make($request->password);

            $staff->save();
            return redirect('admin/staffs')->with('message','New Staff Added Successfully.');
        }
        return redirect('admin/staffs/create')->withErrors($validator)->withInput(Input::except('password'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = User::findOrFail($id);
        return view('admin.staffdetails',compact('staff'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = User::findOrFail($id);
        $blog->delete();
        return redirect('admin/staffs')->with('message','Staff Delete Successfully.');
    }
}
