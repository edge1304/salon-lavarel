<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerCategory extends Controller
{
    //
    function index(){
        return view("admin.category.index");
    }
}
