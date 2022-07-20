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
        return view('admin.login.index');
    }
    public function check_tab_login(){
        if(auth()->check()){
            return redirect()->to('/');
        }
        return view('admin.login.index');
    }
    public function postLoginAdmin(Request $request){


        $remember = $request->has('remember_me') ? true : false;
        if(auth()->attempt([
            'phone'=>$request->username,
            'password'=>$request->password,
        ],$remember)){

            return redirect()->to('/');
        }
        else{
            return redirect()->to('/dang-nhap');
        }

    }

    public function logout() {
        Auth::logout();
        return redirect('/dang-nhap');
    }
}
