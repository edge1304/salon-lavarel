<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Author;
use Illuminate\Support\Facades\Auth;


class ControllerUser extends Controller
{
    //
    public function loginAdmin(){

       if(auth()->check()){
            return view('admin.home');
        }

        return redirect()->route('login');
    }
    public function check_tab_login(){
        if(auth()->check()){
            return redirect()->route('home');
        }
        return view('admin.login.index');
    }
    public function postLoginAdmin(Request $request){

        $remember = $request->has('remember_me') ? true : false;
        if(auth()->attempt([
            'phone'=>$request->username,
            'password'=>$request->password,
        ],$remember)){

            return redirect()->route('home');
        }
        else{
            return redirect()->route('login');
        }

    }

    public function logout() {
        Auth::logout();
        return redirect('/dang-nhap');
    }
}
