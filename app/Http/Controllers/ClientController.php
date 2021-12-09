<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\User;
use App\Models\Flight;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index(Request $request) {

        
        $user = User::where('id', $request->id)->first(); 
        
        $user = array('data' => json_decode($user));
        
        if(Auth::check() === true){
            
            return view('admin.registerClient', ["user_id"=>$user]);
        }

        return redirect()->route('admin.login');        
    }

    public function create(Request $request){
        
        
        if(!filter_var($request['email'], FILTER_VALIDATE_EMAIL)){
            return redirect()->back()->withInput()->withErrors(['O e-mail informado é inválido!']);
        }
        
         Client::create([
            
            'name' => $request['name'],
            'email' => $request['email'],
            'document' => $request['document'],
            'phone' => $request['phone'],
            'origin' => $request['origin'],
            'state' => $request['state'],
            'city' => $request['city'],
            'situation' => $request['situation'],
            'observation' => $request['observation'],           
            'user_id' => $request['user_id'],
        ]);

        

        return redirect('admin/'.$request['user_id']);

    }


    public function destroy($id){

        $user = Auth::user();
        $user_id = $user->id ?? "";

        $client = Client::where('id', $id)->first();
        $client->delete();
        return redirect('admin/'.$user_id)->with('msg', 'Cliente excluído com sucesso!');
    }


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
