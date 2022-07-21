<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Author;
use Illuminate\Support\Facades\Auth;
use App\Components\BranchData;

class ControllerUser extends Controller
{
    //
    public function loginAdmin(){

       if(auth()->check()){
            return view('admin.home');
        }

        return redirect('/login');
    }
    public function check_tab_login(){
        if(auth()->check()){
            return redirect()->to('/');
        }
        $data_branch = new BranchData();
        $htmlBranch = $data_branch->branchHtml();
        return view('admin.login.index', compact('htmlBranch'));
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
            return redirect()->to('/login');
        }

    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
