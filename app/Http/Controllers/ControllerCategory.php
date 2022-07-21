<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerCategory extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        return view("admin.category.index");
    }
}
