<?php


use Illuminate\Support\Facades\Route;



Route::get('/', 'ControllerUser@loginAdmin')->name('home');
Route::post('/', 'ControllerUser@postLoginAdmin');
Route::get('/dang-nhap', 'ControllerUser@check_tab_login')->name("login");
Route::get('/dang-xuat', 'ControllerUser@logout')->name('logout');
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


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
    Route::get('/chinh-sua/{id}',[
        'as'=> 'admin.product.edit',
        'uses'=>'ControllerProduct@edit'
    ]);
    Route::post('/chinh-sua/{id}',[
        'as'=> 'admin.product.update',
        'uses'=>'ControllerProduct@update'
    ]);
});
Route::middleware('auth')->prefix('/nhan-vien')->group(function (){
    Route::get('/',[
        'as'=> 'admin.user.index',
        'uses'=>'ControllerUser@index'
    ]);
    Route::get('/tao-moi',[
        'as'=> 'admin.user.add',
        'uses'=>'ControllerUser@create'
    ]);
    Route::post('/tao-moi',[
        'as'=> 'admin.user.insert',
        'uses'=>'ControllerUser@insert'
    ]);
    Route::get('/chinh-sua/{id}',[
        'as'=> 'admin.user.edit',
        'uses'=>'ControllerUser@edit'
    ]);
    Route::post('/chinh-sua/{id}',[
        'as'=> 'admin.user.update',
        'uses'=>'ControllerUser@update'
    ]);
    Route::get('/xoa/{id}',[
        'as'=> 'admin.user.delete',
        'uses'=>'ControllerUser@delete'
    ]);
});
Route::middleware('auth')->prefix('/khach-hang')->group(function (){
    Route::get('/',[
        'as'=> 'admin.customer.index',
        'uses'=>'ControllerCustomer@index'
    ]);
    Route::get('/tao-moi',[
        'as'=> 'admin.customer.add',
        'uses'=>'ControllerCustomer@create'
    ]);
    Route::post('/tao-moi',[
        'as'=> 'admin.customer.insert',
        'uses'=>'ControllerCustomer@insert'
    ]);
    Route::get('/chinh-sua/{id}',[
        'as'=> 'admin.customer.edit',
        'uses'=>'ControllerCustomer@edit'
    ]);
    Route::post('/chinh-sua/{id}',[
        'as'=> 'admin.customer.update',
        'uses'=>'ControllerCustomer@update'
    ]);

});


Route::middleware('auth')->prefix('/so-quy')->group(function (){
    Route::get('/',[
        'as'=> 'admin.fundbook.index',
        'uses'=>'ControllerFundBook@index'
    ]);
    Route::get('/tao-moi',[
        'as'=> 'admin.fundbook.add',
        'uses'=>'ControllerFundBook@create'
    ]);
    Route::post('/tao-moi',[
        'as'=> 'admin.fundbook.insert',
        'uses'=>'ControllerFundBook@insert'
    ]);
    Route::get('/chinh-sua/{id}',[
        'as'=> 'admin.fundbook.edit',
        'uses'=>'ControllerFundBook@edit'
    ]);
    Route::post('/chinh-sua/{id}',[
        'as'=> 'admin.fundbook.update',
        'uses'=>'ControllerFundBook@update'
    ]);

});
