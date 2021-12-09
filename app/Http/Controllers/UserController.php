<?php

namespace App\Http\Controllers;

use App\User;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{

    public function show(Request $request){
       
        if(Auth::check() === true){
            $user = User::where('id', $request->id)->first();
            $user_id = $user->id;
            
            json_encode($client = $user->Clients()->get());
            
            $client = array('data' => json_decode($client));

            return view("admin.dashboard", ["clients"=>$client, "user_id"=>$user_id]);

            
        }else{
            return redirect()->route('admin.login');        
        }
       
    
        
    }


}
