<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Mail;
session_start();


class AdminController extends Controller
{
    public function index(){
        return view('admin_login');
    }

    public function show_dashboard(){
        return view('admin.dashboard');
    }

    public function dashboard(Request $request){

        $admin_email = $request->admin_userName;
        $admin_password = md5($request->admin_password);

        $result = DB::table('admin')->where('admin_email',$admin_email)->where ('admin_password',$admin_password)->first();

        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);

            return Redirect::to('/dashboard');
        }else{
            Session::put('message','UserName hoặc Mật khẩu sai!');
            return Redirect::to('/admin'); // trả về trang admin
        }
    }

    public function logout(){
        Session::put('admin.name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin'); // trả về trang admin
    }
}
