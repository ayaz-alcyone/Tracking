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

Route::group(['middleware' => ['auth']], function () {
	Route::get('/', function () {
        return view('auth/login');
    });

    Route::get('admin/users/dashboard', 'UsersController@admin_dashboard')->name('admin_dashboard');
    Route::get('admin/users/admin_logout', 'UsersController@admin_logout')->name('admin_logout');
    
    // Route::get('users/views/{pageName}', 'UsersController@users_views');
    // Route::get('logout', 'UsersController@logout')->name('user_logout');

    // All user pages
    // Route::get('home', 'UsersController@home')->name('home');
    // Route::get('route', 'UsersController@route')->name('route');
    // Route::get('photos', 'UsersController@photos')->name('photos');
    // Route::get('invoices', 'UsersController@invoices')->name('invoices');
});

Auth::routes();

Route::group(['middleware' => 'guest'], function () {
    Route::get('users/forgotpassword', 'UsersController@forgotpassword')->name('forgotpassword');
    Route::get('admin/users/login', 'UsersController@admin_login')->name('admin_login');
    Route::post('users/post_user_login', 'UsersController@post_user_login')->name('user_login');
    
    //Route::post('admin/users/post_admin_login', 'UsersController@post_admin_login')->name('post_admin_login');
});

Route::middleware('session')->group(function () {
    // All user pages
    Route::get('home', 'UsersController@home')->name('home');
    Route::get('route', 'UsersController@route')->name('route');
    Route::get('photos', 'UsersController@photos')->name('photos');
    Route::get('invoices', 'UsersController@invoices')->name('invoices');
    Route::get('logout', 'UsersController@logout')->name('user_logout');
    Route::get('lang/{param}/{page}', 'UsersController@changeLanguage');
});