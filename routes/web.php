<?php


use Illuminate\Support\Facades\Route;



Route::get('/', 'ControllerUser@loginAdmin');
Route::post('/', 'ControllerUser@postLoginAdmin');
Route::get('/dang-nhap', 'ControllerUser@check_tab_login');
Route::get('/dang-xuat', 'ControllerUser@logout');


Route::prefix('/danh-muc')->group(function (){
    Route::get('/',[
       'as'=> 'admin.category.index',
       'uses'=>'ControllerCategory@index'
    ]);
});


