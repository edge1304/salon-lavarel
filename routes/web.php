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
    Route::get('/chinh-sua/{id}',[
        'as'=> 'admin.category.edit',
        'uses'=>'ControllerCategory@edit'
    ]);
    Route::post('/chinh-sua/{id}',[
        'as'=> 'admin.category.update',
        'uses'=>'ControllerCategory@update'
    ]);
    Route::get('/xoa/{id}',[
        'as'=> 'admin.category.delete',
        'uses'=>'ControllerCategory@delete'
    ]);
});

Route::prefix('/san-pham')->group(function (){
    Route::get('/',[
        'as'=> 'admin.product.index',
        'uses'=>'ControllerProduct@index'
    ]);

    Route::get('/tao-moi',[
        'as'=> 'admin.product.add',
        'uses'=>'ControllerProduct@create'
    ]);
    Route::post('/tao-moi',[
        'as'=> 'admin.product.insert',
        'uses'=>'ControllerProduct@insert'
    ]);
    Route::get('/chinh-sua',[
        'as'=> 'admin.product.edit',
        'uses'=>'ControllerProduct@edit'
    ]);

});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
