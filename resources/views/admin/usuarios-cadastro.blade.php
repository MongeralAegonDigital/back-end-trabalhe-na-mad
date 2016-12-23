@extends('layouts.admin')

@section('content')

    <section class="content-header">
        <h2>Usuários | {{ !isset($usuarios) ? 'Cadastrar' : 'Editar' }}</h2>
        <ol class="breadcrumb">
            <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('admin/usuarios')}}">Usuários</a></li>
            <li class="active">{{ !isset($usuarios) ? 'Cadastrar': 'Atualizar'}}</li>
        </ol>
    </section>
    <section class="content-panel">

        <div class="panel panel-theme">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <a class="btn btn-theme03 btn-xs" href="{{url('/admin/usuarios/create')}}"> <i class="fa fa-plus fa-fw"></i> Cadastrar</a>
                <a class="btn btn-theme btn-xs" title="Listar" href="{{url('/admin/usuarios')}}"> <i class="fa fa-list fa-fw"></i> Listar</a>
            </div>
            @if($errors->all())
                <div class="alert alert-danger errors-form">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>O Formulário não foi enviado, favor corrigir seguintes erros:</strong>
                    <br>
                    <br>
                    @foreach($errors->all() as $error)
                        <i class="fa fa-exclamation-circle fa-fw" aria-hidden="true"></i> {{$error}}<br>
                    @endforeach
                </div>
            @endif
            <div class="panel-body ">
                <div class="row">
                    <form class="form-horizontal style-form" method="POST" action="{{ !isset($usuarios) ? '/admin/usuarios':'/admin/usuarios/'.$usuarios->id}}" enctype="multipart/form-data">
                        <div class="col-md-8">
                            <!--main content start-->
                            {{ csrf_field() }}
                            @if(isset($usuarios))
                                <input type="hidden" name="_method" value="PUT">
                            @endif
                            <div class="form-group">
                                <label>Nome:</label>
                                <input type="text" name="name" class="form-control text-uppercase   " value="{{ $usuarios->name or old('name')}}" required>
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" name="email" class="form-control " value="{{ $usuarios->email or old('email')}}" required>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Senha:</label>
                                        <input type="password" min="6" name="password" class="form-control " autocomplete="false"  required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Confirmação de senha:</label>
                                        <input type="password" min="6" name="password_confirmation" class="form-control"  required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info pull-right">{{ !isset($usuarios) ? 'Cadastrar': 'Atualizar'}}</button>
                        </div>


                    </form>
                </div>
            </div>
    </section>
@endsection
