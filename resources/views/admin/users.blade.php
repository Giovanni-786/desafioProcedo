@extends('layouts.app')
@section('content') 
   
<style>
  .row-data{
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

</style>

<?php
  
?>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h2>Usuários cadastrados</h2>
        <button type="button" class="btn btn-primary"><a href="{{route('admin.usersencrypt')}}" style="color: white; text-decoration: none">Listar usuários criptografados</a></button>
    </div>

    <div class="col-md-5 offset-md-9 dashboard-title-container" style="margin-bottom: 20px">
      <button type="button" class="btn btn-primary"><a href='/register' style="color: white; text-decoration: none">Cadastrar novos usuários</a></button>
      
      <button type="button" class="btn btn-primary"><a href="/admin" style="color: white; text-decoration: none">Voltar</a></button>
  </div>

    <div class="col-md-10 offset-md-1 dashboard-clients-container">
 
        @if(session('msg'))
        <div class="alert alert-success">
          {{ session('msg') }}
        </div>
        @endif
             <table class="table">
               <thead>
                 <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                 </tr>
               </thead>
             

            <tbody>
                @foreach ($users['data'] ?? '' as $user)
                     <tr>
                       <td class="row-data">{{Crypt::decryptString($user->name)}}</td>
                       <td>{{Crypt::decryptString($user->email)}}</td>
                     </tr>
                @endforeach
                
                
             </tbody>
            </table>

        {{-- <p> Você ainda não possui clientes cadastrados, <a href="{{route('admin.clients')}}">Cadastrar clientes</a></p> --}}

    </div>

    {{-- <a href="{{route('admin.logout')}}">Logout </a> --}}
@endsection