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
        return redirect()->route('admin');    
    }else{
        return view('admin.loginForm');
    }
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rotas para autenticação do usuário.
Route::get('/admin', 'AuthController@dashboard')->name('admin');
Route::get('/admin/logout', 'AuthController@logout')->name('admin.logout');
Route::get('/admin/login', 'AuthController@loginInfo')->name('admin.login');
Route::post('/admin/login/do', 'AuthController@login')->name('admin.login.do');


Route::get('/admin/users', 'UserController@all');

Route::get('/admin/{id}', 'ClientController@show');
Route::get('/admin/{id}/clients', 'ClientController@index')->name('admin.clients');
Route::post('/admin/clients', 'ClientController@create')->name('admin.clients.do');
Route::delete('admin/{id}/clients', 'ClientController@destroy');