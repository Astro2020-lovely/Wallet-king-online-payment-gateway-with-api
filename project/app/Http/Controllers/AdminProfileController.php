<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use InvalidArgumentException;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        //$this->userid = Auth::user()->id;
    }

    public function index()
    {
        $admin = User::find(Auth::user()->id);
        return view('admin.adminprofile' , compact('admin'));
    }

    public function password()
    {
        $admin = User::find(Auth::user()->id);
        return view('admin.adminchangepass' , compact('admin'));
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



    public function generate_bkup()
    {
        $bkuplink = "";
        $chk = file_get_contents('backup.txt');
        if ($chk != ""){
            $bkuplink = url($chk);
        }
        return view('admin.movetoserver',compact('bkuplink','chk'));
    }


    public function clear_bkup()
    {
        $destination  = public_path().'/install';
        $bkuplink = "";
        $chk = file_get_contents('backup.txt');
        if ($chk != ""){
            unlink(public_path($chk));
        }

        if (is_dir($destination)) {
            $this->deleteDir($destination);
        }
        $handle = fopen('backup.txt','w+');
        fwrite($handle,"");
        fclose($handle);
        //return "No Backup File Generated.";
        return redirect()->back()->with('message','Backup file Deleted Successfully!');
    }


    public function activation()
    {
        return view('admin.activation');
    }

    public function activation_submit(Request $request)
    {
        $purchase_code =  $request->pcode;
        $my_script =  'Wallet King';
        $my_domain = url('/');

        $chkData = file_get_contents(config('services.genius.ocean').'purchase112662activate.php?code='.$purchase_code.'&domain='.$my_domain.'&script='.$my_script);
        $chk = json_decode($chkData,true);
        if($chk['status'] != "success")
        {
            return redirect()->back()->with('error',$chk['message']);

        }else{
            $this->setUp($chk['p2'],$chk['lData']);
//            DB::table('settings')
//                ->where('id', 1)
//                ->update(['is_active' => 1]);

            return redirect('admin/dashboard')->with('message','Congratulation!! Your System is successfully Activated.');
        }
        //return config('services.genius.ocean');
    }

    function setUp($mtFile,$goFileData){
        $fpa = fopen(public_path().$mtFile, 'w');
        fwrite($fpa, $goFileData);
        fclose($fpa);
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
        $user = User::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('photo')){
            $photo = time().$request->file('photo')->getClientOriginalName();
            $file->move('assets/images/admin',$photo);
            $input['photo'] = $photo;
        }

        if ($request->cpass){
            if (Hash::check($request->cpass, $user->password)){

                if ($request->newpass == $request->renewpass){
                    $input['password'] = Hash::make($request->newpass);
                }else{
                    Session::flash('error', 'Confirm Password Doesnot match.');
                    return redirect('admin/adminprofile');
                }
            }else{
                Session::flash('error', 'Admin Profile Updated Successfully.');
                return redirect('admin/adminprofile');
            }
        }
        //return $request->cpass;
        //return "Not..";
        $user->update($input);
        Session::flash('message', 'Admin Profile Updated Successfully.');
        return redirect('admin/adminprofile');
    }

    public function changepass(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $input['password'] = "";
        if ($request->cpass){
            if (Hash::check($request->cpass, $user->password)){

                if ($request->newpass == $request->renewpass){
                    $input['password'] = Hash::make($request->newpass);
                }else{
                    Session::flash('error', 'Confirm Password Does not match.');
                    return redirect('admin/adminpassword');
                }
            }else{
                Session::flash('error', 'Current Password Does not match');
                return redirect('admin/adminpassword');
            }
        }

        $user->update($input);
        Session::flash('message', 'Admin Password Updated Successfully.');
        return redirect('admin/adminpassword');
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


    public function movescript(){
        ini_set('max_execution_time', 3000);

        $destination  = public_path().'/install';
        $chk = file_get_contents('backup.txt');
        if ($chk != ""){
            unlink(public_path($chk));
        }

        if (is_dir($destination)) {
            $this->deleteDir($destination);
        }

        $src = base_path().'/vendor/update';
        $this->recurse_copy($src,$destination);
        $files = public_path();
        $bkupname = 'WalletKING-By-GeniusOcean-'.date('Y-m-d').'.zip';

        $zipper = new \Chumper\Zipper\Zipper;

        $zipper->make($bkupname)->add($files);

        $zipper->remove($bkupname);

        $zipper->close();

        $handle = fopen('backup.txt','w+');
        fwrite($handle,$bkupname);
        fclose($handle);

        if (is_dir($destination)) {
            $this->deleteDir($destination);
        }
        return response()->json(['status' => 'success','backupfile' => url($bkupname),'filename' => $bkupname],200);
    }

    public function recurse_copy($src,$dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    $this->recurse_copy($src . '/' . $file,$dst . '/' . $file);
                }
                else {
                    copy($src . '/' . $file,$dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }


    public function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }

}
