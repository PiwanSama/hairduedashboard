<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Client API
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/logout', 'UserController@logout');
    Route::get('/categories', 'ServiceCategoryController@categories');
});

Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');
Route::get('/providers', 'ServiceProviderController@getProviders');
Route::get('/products', 'ProductController@products');
Route::get('/product/{id}', 'ProductController@product');
Route::get('/providers/{id}', 'ServiceCategoryController@getProvidersByCategory');
Route::get('/provider/{id}', 'ServiceProviderController@getProviderDetails');
Route::post('/order/create', 'OrderController@postOrder');
Route::get('/order/{id}', 'OrderController@getOrder');
