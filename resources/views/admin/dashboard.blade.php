@extends('layouts.app')
@section('content') 
   
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h2>Clientes</h2>
    </div>

    <div class="col-md-5 offset-md-9 dashboard-title-container" style="margin-bottom: 20px">
      <button type="button" class="btn btn-primary"><a href='{{$user_id}}/clients' style="color: white; text-decoration: none">Cadastrar novos clientes</a></button>
      
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
                    <th scope="col">Origem </th>
                    <th scope="col">Situação</th>
                    <th scope="col"> Ações </th>
                 </tr>
               </thead>
             

            <tbody>
                @foreach ($clients['data'] ?? '' as $client)
                     <tr>
                       {{-- <td scope="row">{{$loop->index + 1}}</td> --}}
                       <td>{{$client->name}}</td>
                       <td>{{$client->email}}</td>
                       <td>{{$client->phone}}</td>
                       <td>{{$client->origin}}</td>
                       <td>{{$client->situation === 1 ? 'Ativo' : 'Desativado'}}</td>
                       <td>
                        <form action="/admin/{{$client->id}}/clients" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger delete-btn">Excluir</button>
                        </form> 
                        </td>
                     </tr>
                @endforeach
                
                
             </tbody>
            </table>

        {{-- <p> Você ainda não possui clientes cadastrados, <a href="{{route('admin.clients')}}">Cadastrar clientes</a></p> --}}

    </div>

    {{-- <a href="{{route('admin.logout')}}">Logout </a> --}}
@endsection