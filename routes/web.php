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

Auth::routes();

Route::get('/','HomeController@home');
Route::get('home','HomeController@home');
Route::get('logout', function(){
    Auth::logout();
    return redirect('login');
});

Route::get('register', 'RegisterController@getRegister');
Route::post('register/create', 'RegisterController@postRegister');
Route::get('login', 'LoginController@getLogin')->name('login');
Route::post('login/post', 'LoginController@postLogin');
Route::post('login', 'LoginController@postLogin');
Route::get('admin', 'AdminPageController@show')->name('admin.dashboard')->middleware('auth');
