<?php


use Illuminate\Support\Facades\Route;



Route::get('/', 'ControllerUser@loginAdmin')->name('home');
Route::post('/', 'ControllerUser@postLoginAdmin');
Route::get('/dang-nhap', 'ControllerUser@check_tab_login')->name("login");
Route::get('/dang-xuat', 'ControllerUser@logout')->name('logout');


Route::prefix('/danh-muc')->group(function (){
    Route::get('/',[
       'as'=> 'admin.category.index',
       'uses'=>'ControllerCategory@index'
    ]);

    Route::get('/tao-moi',[
        'as'=> 'admin.category.add',
        'uses'=>'ControllerCategory@create'
    ]);
    Route::post('/tao-moi',[
        'as'=> 'admin.category.insert',
        'uses'=>'ControllerCategory@insert'
    ]);


});


