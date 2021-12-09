@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Seja bem vindo(a)!</h2>
                    <div class="mt-2 col-md-12">
                        <button type="button" class="btn btn-primary"><a href="/register" style="color: white; text-decoration: none">Cadastrar novos usuários</a></button> 
                    </div>

                    <div class="mt-2 col-md-12">
                        <button type="button" class="btn btn-primary"> <a href="/admin/{{$user_id ?? ''}}/clients" style="color: white; text-decoration: none">Cadastrar novos clientes</a></button>  
                    </div>

                    <div class="mt-2 col-md-12">
                        <button type="button" class="btn btn-primary"><a href="/admin/{{$user_id ?? ''}}" style="color: white; text-decoration: none">Listar clientes</a></button>
                    </div>
                    
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
