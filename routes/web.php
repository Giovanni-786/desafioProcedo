<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    if(Auth::check() === true){
        return view('admin.dashboard');
    }else{
        return view('admin.loginForm');
    }
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AuthController@dashboard')->name('admin');
Route::get('/admin/login', 'AuthController@loginInfo')->name('admin.login');
Route::get('/admin/logout', 'AuthController@logout')->name('admin.logout');
ROute::post('/admin/login/do', 'AuthController@login')->name('admin.login.do');