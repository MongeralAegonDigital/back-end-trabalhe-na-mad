@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">                    
                    <li class="active">Clientes</li>
                </ol>

                <div class="panel-body">
                    <p>
                        <a class="btn btn-info" href="{{ route('cliente.adicionar') }}">Adicinar</a>
                    </p>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Endereço</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clientes as $cliente)

                            <tr>
                                <th scope="row">{{ $cliente->id }}</th>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>{{ $cliente->endereco }}</td>
                                <td>
                                    <a class="btn btn-default" href="{{route('cliente.detalhe',$cliente->id)}}">Detalhe</a>
                                    <a class="btn btn-default" href="{{route('cliente.editar',$cliente->id)}}">Editar</a>
                                    <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{route('cliente.deletar',$cliente->id)}}' : false)">Deletar</a>
                                </td>
                            </tr>                            

                            @endforeach
                            
                        </tbody>
                        
                    </table>

                    <div align="center">
                        {!! $clientes->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection