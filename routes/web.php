<?php


use Illuminate\Support\Facades\Route;



Route::get('/', 'ControllerUser@loginAdmin');
Route::post('/', 'ControllerUser@postLoginAdmin');
Route::get('/login', 'ControllerUser@check_tab_login')->name("login");
Route::get('/logout', 'ControllerUser@logout')->name('logout');


Route::prefix('/category')->group(function (){
    Route::get('/',[
       'as'=> 'admin.category.index',
       'uses'=>'ControllerCategory@index'
    ]);
});


