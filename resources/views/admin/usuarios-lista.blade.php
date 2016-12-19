@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h2>Usuarios</h2>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.users.index')}}">Usuarios</a></li>
        </ol>
    </section>
    <section class="content-panel">
        @if(Session::has('msg'))
            <div class="alert alert-{{Session::get('label')}} errors-form">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>

                <i class="fa fa-{{$icone = Session::get('label') == 'success' ? 'check': 'exclamation-circle'}} fa-fw"></i>{{Session::get('msg')}}
            </div>
        @endif
            <div class="panel panel-theme">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <a class="btn btn-theme03 btn-xs" href="{{route('admin.users.create')}}"> <i class="fa fa-plus fa-fw"></i> Cadastrar</a>
                    <a class="btn btn-theme btn-xs" title="Listar" href="{{route('admin.users.index')}}"> <i class="fa fa-list fa-fw"></i> Listar</a>
                </div>

                <!-- Table -->
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="col-md-4">Usuario</th>
                        <th class="col-md-6">Email</th>
                        <th class="col-md-2">Editar | Excluir</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($usuarios as $user)
                        <tr class="{{$user->email == Config::get('info.email_webmaster') && Auth::user()->email !== $user->email ? "hidden":""}}">
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <div >
                                    <a href="/admin/usuarios/{{$user->id}}/edit" class="btn btn-xs btn-info">
                                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                                    </a>
                                    |
                                    <form method="POST" class="btn-group" action="/admin/usuarios/{{$user->id}}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit"  class="btn btn-xs btn-danger">
                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                    </button>
                                    </form>
                                </div>


                            </td>
                        </tr>

                        @empty
                            <tr>
                                <td colspan="3">Sem resultados para o momento.</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
    </section>
@endsection