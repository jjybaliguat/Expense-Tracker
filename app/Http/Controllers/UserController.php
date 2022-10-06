<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }

    public function registerUSer(Request $request){
        $request->validate([
            'username'=>'required|unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5',
            'cpassword'=>'required'
        ]);
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->tithes_percent = 0.10;
        $user->offering_percent = 0.00;
        $user->password = Hash::make($request->password);
        $save = $user->save();
        if($save){
            return back()->with('success', 'Successfully Registered!');
        }else{
            return back()->with('fail', 'Something went Wrong');
        }
    }

    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId', $user->id);
                $request->session()->put('tithes_percent', $user->tithes_percent);
                $request->session()->put('offering_percent', $user->offering_percent);
               return redirect('dashboard');
            }else{
                return back()->with('fail', 'Password is not correct!');
            }
        }else{
            return back()->with('fail', 'Email is not registered!' );
        }
    }

    public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=', Session::get('loginId'))->first();
        }
        return view('user.dashboard', compact('data'));
    }
    
    public function profile(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=', Session::get('loginId'))->first();
        }
        return view('user.profile', compact('data'));
    }
    public function settings(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=', Session::get('loginId'))->first();
        }
        return view('user.settings', compact('data'));
    }

    public function logOut(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('/');
        }
    }
}
