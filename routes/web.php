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

Route::get('/','HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

/*shopmanagers route*/
Route::get('/shopmanager', 'ShopmanagerController@index');
Route::get('shopmanager/create','ShopmanagerController@create');
Route::post('shopmanager/store','ShopmanagerController@store');
Route::get('shopmanager/singledelete','ShopmanagerController@singleDelete');
Route::get('shopmanager/bulkdelete','ShopmanagerController@bulkDelete');
/*shopmanagers route end*/


/*customers route*/
Route::get('/customer', 'customerController@index');
Route::get('customer/create','customerController@create');
Route::post('customer/store','customerController@store');
Route::get('customer/mobilestore','customerController@mobilestore');
Route::get('customer/singledelete','customerController@singleDelete');
Route::get('customer/bulkdelete','customerController@bulkDelete');
/*customers route end*/


/*customers route*/
Route::get('/parcel', 'parcelController@index');
Route::get('parcel/create','parcelController@create');
Route::post('parcel/store','parcelController@store');

Route::get('parcel/mobilestore','parcelController@mobilestore');
Route::get('parcel/mobileparcelhtml','parcelController@mobileparcelhtml');
Route::get('parcel/mobileparcelhtmltwo','parcelController@mobileparcelhtmltwo');
Route::get('parcel/mobileparcelstoreone','parcelController@mobileparcelstoreone');
Route::get('parcel/mobileparcelstoretwo','parcelController@mobileparcelstoretwo');

Route::get('parcel/mobileparcellist','parcelController@mobileparcellist');

Route::get('parcel/singledeleteparcel','parcelController@singleDeleteParcel');
Route::get('parcel/singledelete','parcelController@singleDelete');
Route::get('parcel/bulkdelete','parcelController@bulkDelete');
Route::get('parcel/bulkdeleteparcel','parcelController@bulkdeleteparcel');
Route::get('parcel/searchcustomer','parcelController@searchCustomer');
Route::get('parcel/searchshopmanager','parcelController@searchShopmanager');
Route::get('parcel/addnewparcelid','parcelController@addNewParcel');
Route::get('parcel/parceldata','parcelController@parcelData');
Route::post('parcel/parceldatastore','parcelController@parcelDataStore');
Route::get('cart/','parcelController@parcelCart');
Route::get('cartdata/','parcelController@parcelCartData');

/*customers route end*/


/*mobile routes*/
Route::get('shopmanager/login','ShopmanagerController@mobileLogin');

/*mobile routes end*/



