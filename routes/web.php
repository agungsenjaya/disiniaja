<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');

Route::GROUP(['prefix' => 'owner',  'middleware' => ['role:owner']], function(){
    Route::GET('/','OwnerController@index')->name('owner');
    Route::GET('order','OwnerController@order')->name('owner.order');
    Route::GET('order/view','OwnerController@order_view')->name('owner.order_view');
    
    Route::GET('/','OwnerController@index')->name('owner');
    Route::GET('order','OwnerController@order')->name('owner.order');
    Route::GET('order/view','OwnerController@order_view')->name('owner.order_view');
    
    Route::GET('promo','OwnerController@promo')->name('owner.promo');
    Route::GET('promo/create','OwnerController@promo_create')->name('owner.promo_create');
    Route::POST('promo/store','OwnerController@promo_store')->name('owner.promo_store');
    Route::GET('promo/view','OwnerController@promo_view')->name('owner.promo_view');
    
    Route::GET('frame','OwnerController@frame')->name('owner.frame');
    Route::GET('frame/create','OwnerController@frame_create')->name('owner.frame_create');
    Route::POST('frame/store','OwnerController@frame_store')->name('owner.frame_store');
    Route::GET('frame/view','OwnerController@frame_view')->name('owner.frame_view');
    
    Route::GET('cetak','OwnerController@cetak')->name('owner.cetak');
    Route::GET('cetak/create','OwnerController@cetak_create')->name('owner.cetak_create');
    Route::POST('cetak/store','OwnerController@cetak_store')->name('owner.cetak_store');
    Route::GET('cetak/view','OwnerController@cetak_view')->name('owner.cetak_view');
    
    Route::GET('paket','OwnerController@paket')->name('owner.paket');
    Route::GET('paket/create','OwnerController@paket_create')->name('owner.paket_create');
    Route::POST('paket/store','OwnerController@paket_store')->name('owner.paket_store');
    Route::GET('paket/view','OwnerController@paket_view')->name('owner.paket_view');
    
    Route::GET('kategori','OwnerController@kategori')->name('owner.kategori');
    Route::GET('kategori/create','OwnerController@kategori_create')->name('owner.kategori_create');
    Route::POST('kategori/store','OwnerController@kategori_store')->name('owner.kategori_store');
    Route::GET('kategori/view','OwnerController@kategori_view')->name('owner.kategori_view');

});

Route::GROUP(['prefix' => 'admin',  'middleware' => ['role:admin']], function(){
    Route::GET('/','AdminController@index')->name('admin');
});
