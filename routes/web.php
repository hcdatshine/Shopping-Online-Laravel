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