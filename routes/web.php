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

Route::get('/', 'FrontEndController@home');
Route::get('home','FrontEndController@home');
//bagian dashboard admin

//Route::get('dashboard','HomeController@home')->name('admin.dashboard');
Route::get('logout', function(){
    Auth::logout();
    return redirect('home');
});

Route::get('register', 'RegisterController@getRegister');
Route::post('register/create', 'RegisterController@postRegister');
Route::get('login', 'LoginController@getLogin')->name('login');
Route::post('login/post', 'LoginController@postLogin');
Route::post('login', 'LoginController@postLogin');


Route::get('dashboard','DashboardController@home')->name('admin.dashboard')->middleware('auth');
Route::get('admin', 'DashboardController@show')->name('admin.dashboard')->middleware('rule:admin','auth');
Route::get('user', 'UserController@show');
Route::post('user/create', 'UserController@createAjax');
Route::put('user/delete/{id}', 'UserController@delete');




Route::get('error_page', function(){
    return view('error_page');
})->name('error.page');
