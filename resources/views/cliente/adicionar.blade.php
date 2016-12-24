@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">                
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{ route('cliente.index') }}">Clientes</a></li>
                    <li class="active">Adicionar</li>
                </ol>

                <div class="panel-body">                                    
                    <form action="{{ route('cliente.salvar') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="Nome do cliente">
                            @if($errors->has('nome'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nome') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">E-mail</label>
                            <input type="text" name="email" class="form-control" placeholder="E-mail do cliente">
                            @if($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('endereco') ? 'has-error' : '' }}">
                            <label for="endereco">Endereço</label>
                            <input type="text" name="endereco" class="form-control" placeholder="Endereço do cliente">
                            @if($errors->has('endereco'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('endereco') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button class="btn btn-info">Adicionar</button>
                        
                    </form>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection