<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function dashboard(){
        if(Auth::check() === true){
            return view('admin.dashboard');
        }

        return redirect()->route('admin.login');
        
    }

    public function loginInfo(){

        return view('admin.loginForm');
    }

    public function login(Request $request){
        
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return redirect()->back()->withInput()->withErrors(['O e-mail informado é inválido!']);
        }
        
        $credentials = [
            'email'=> $request->email,
            'password'=> $request->password
        ];

        if(Auth::attempt($credentials)){
            return redirect()->route('admin');
        }else{
            return redirect()->back()->withInput()->withErrors(['Login ou senha inválido!']);
        }
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin');
    }
}
