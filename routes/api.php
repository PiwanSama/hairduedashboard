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
Route::group(['middleware' => 'auth:api'], function(){
    
});

Route::post('/addUser', 'Api\UserController@add');
Route::get('/categories', 'Api\ServiceCategoryController@categories');
Route::get('/categories/{id}', 'Api\ServiceCategoryController@getChildCategories');
Route::get('/products', 'Api\ProductController@products');
Route::get('/product/{id}', 'Api\ProductController@product');
