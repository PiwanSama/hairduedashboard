
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

Route::get('/', function () {
    return view('login');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
  Route::get('/', 'HomeController@index');
  Route::resources([
    'products' => 'productController',
    'providers' => 'serviceProviderController',
    'services' => 'serviceController',
    'categories' => 'ServiceCategoryController',
  ]);
  Route::resource('user', 'UserController', ['except' => ['show']]);
  Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
  Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
  Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
  Route::get('/search-products','ProductController@searchProducts');
});
