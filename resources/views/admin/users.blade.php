@extends('layouts.app')
@section('content') 
   
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h2>Usuários cadastrados</h2>
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
                    <th scope="col">Telefone</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Situação</th>
                 </tr>
               </thead>
             

            <tbody>
                @foreach ($users['data'] ?? '' as $user)
                     <tr>
                       {{-- <td scope="row">{{$loop->index + 1}}</td> --}}
                       <td>{{$user->name}}</td>
                       <td>{{$user->email}}</td>
                       <td>{{$user->phone}}</td>
                       <td>{{$user->state}}</td>
                       <td>{{$user->situation === 1 ? 'Ativo' : 'Desativado'}}</td>
                     </tr>
                @endforeach
                
                
             </tbody>
            </table>

        {{-- <p> Você ainda não possui clientes cadastrados, <a href="{{route('admin.clients')}}">Cadastrar clientes</a></p> --}}

    </div>

    {{-- <a href="{{route('admin.logout')}}">Logout </a> --}}
@endsection