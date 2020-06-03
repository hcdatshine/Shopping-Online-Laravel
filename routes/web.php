<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PageController@getIndex');

Route::get('trang-chu',[
    'as'=>'trangchu',
    'uses'=>'PageController@getIndex'
]);

Route::get('gioi-thieu',[
    'as'=>'gioithieu',
    'uses'=>'PageController@getAbout'
]);

Route::get('product-type/{type}',[
    'as'=>'loaisanpham',
    'uses'=>'PageController@getProductType'
]);

Route::get('lien-he',[
    'as'=>'lienhe',
    'uses'=>'PageController@getContacts'
]);

Route::get('san-pham/{id}',[
    'as'=>'sanpham',
    'uses'=>'PageController@getProduct'
]);

// Route::get('product-detail',[
//     'as'=>'chi-tiet-san-pham',
//     'uses'=>'PageController@getProductDetail'
// ]);
Route::get('tim-kiem',[
    'as'=>'search',
    'uses'=>'PageController@getSearch'
]);

Route::get('add-to-cart/{id}',[
    'as'=>'themgiohang',
    'uses'=>'PageController@getAddToCart'
]);

Route::get('delete-cart/{id}',[
    'as'=>'xoagiohang',
    'uses'=>'PageController@getDeleteCart'
]);

Route::get('dat-hang',[
    'as'=>'dathang',
    'uses'=>'PageController@getCheckout'
]);

Route::post('dat-hang',[
    'as'=>'dathang',
    'uses'=>'PageController@postCheckout'
]);

Route::get('dang-nhap',[
    'as'=>'login',
    'uses'=>'PageController@getLogin'
]);

Route::post('dang-nhap',[
    'as'=>'login',
    'uses'=>'PageController@postLogin'
]);

Route::get('dang-ky',[
    'as'=>'signup',
    'uses'=>'PageController@getSignup'
]);

Route::post('dang-ky',[
    'as'=>'signup',
    'uses'=>'PageController@postSignup'
]);

Route::get('dang-xuat',[
    'as'=>'logout',
    'uses'=>'PageController@getLogout'
]);

Route::get('thong-tin-nguoi-dung',[
    'as'=>'thongtinnguoidung',
    'uses'=>'PageController@getUserInformation'
]);

Route::post('thong-tin-nguoi-dung',[
    'as'=>'thongtinnguoidung',
    'uses'=>'PageController@postUserInformation'
]);

//  Backend
// Route::get('/admin/product',[
//         'as'=>'adminproduct',
//         'uses'=>'AdminController@index'
// ]);
Route::prefix('admin')->group(function() {
    Route::get('/',function(){
        return view('layout.app');
    });
    //category
    // Route::group(['prefix' => 'category'],function() {
    //     Route::get('/','AdminCategoryController@index')->name('category.index');
    //     Route::get('/appear/{id}','AdminCategoryController@appear')->name('category.appear');

    //     Route::get('edit/{id}','AdminCategoryController@getEdit');
    //     Route::post('edit/{id}','AdminCategoryController@postEdit')->name('category.edit');

    //     Route::post('add','AdminCategoryController@postAdd')->name('category.add');

    //     Route::get('delete/{id}','AdminCategoryController@Delete')->name('category.delete');
    // });
    
    // product
    Route::group(['prefix' => 'product'],function() {
        Route::get('/','AdminController@index')->name('product.index');

    //     Route::get('edit/{id}','AdminProductController@getEdit');
    //     Route::post('edit/{id}','AdminProductController@postEdit')->name('product.edit');

        Route::post('add','AdminProductController@postAdd')->name('product.add');

    //     Route::get('delete/{id}','AdminProductController@Delete')->name('product.delete');
    });
});