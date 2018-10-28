<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'CatalogsController@index');
    Route::get('/catalogs', 'CatalogsController@index');
    Route::get('/catalogs/viewproduct', 'CatalogsController@viewdetail');
    //Route::get('/viewproduct', 'ProductDetailController@v');
    Route::auth();
    Route::get('/home', 'HomeController@index');
    Route::get('/home/orders', 'HomeController@viewOrders');
    Route::resource('contacts', 'ContactController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('company', 'CompanyController');
    Route::resource('products', 'ProductsController');
    Route::resource('orders', 'OrdersController', ['only' => [
        'index', 'edit', 'update'
    ]]);
    Route::resource('user', 'UserController');
    Route::post('cart', 'CartController@addProduct');
    Route::get('cart', 'CartController@show');
    Route::delete('cart/{product_id}', 'CartController@removeProduct');
    Route::put('cart/{product_id}', 'CartController@changeQuantity');
    Route::resource('contactus', 'ContactUsController');
    Route::post('contactus', ['as'=>'contactus.store','uses'=>'ContactUsController@contactUSPost']);
    Route::get('checkout/login', 'CheckoutController@login');
    Route::post('checkout/login', 'CheckoutController@postLogin');
    Route::get('checkout/address', 'CheckoutController@address');
    Route::post('checkout/address', 'CheckoutController@postAddress');
    Route::get('checkout/payment', 'CheckoutController@payment');
    Route::post('checkout/payment', 'CheckoutController@postPayment');
    Route::get('checkout/success', 'CheckoutController@success');
    Route::post('contacts/save', 'CheckoutController@success');
    Route::get('profile', 'ProfileController@Profile');
    Route::get('carapemesanan', 'CaraPemesananController@index');
});


Route::group(['middleware' => 'api'], function () {
    Route::get('address/regencies', 'AddressController@regencies');
});
