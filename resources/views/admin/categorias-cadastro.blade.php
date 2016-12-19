@extends('layouts.admin')

@section('content')

  <section class="content-header">
    <h2>{{$title}} | {{ !isset($categoria) ? 'Cadastrar' : 'Editar' }}</h2>
    <ol class="breadcrumb">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{route('admin.categoria.index')}}">{{$title}}</a></li>
      <li class="active">{{ !isset($categoria) ? 'Cadastrar': 'Atualizar'}}</li>
    </ol>
    </div>

  </section>
  <section class="content-panel">

    <div class="panel panel-theme">
      <!-- Default panel contents -->
      <div class="panel-heading">
        <a class="btn btn-theme03 btn-xs" href="{{route('admin.categoria.create')}}"> <i class="fa fa-plus fa-fw"></i> Cadastrar</a>
        <a class="btn btn-theme btn-xs" title="Listar" href="{{route('admin.categoria.index')}}"> <i class="fa fa-list fa-fw"></i> Listar</a>
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
          <form class="form-horizontal style-form" method="POST" action="{{!empty($categoria )? route('admin.categoria.update', $categoria->id) : route('admin.categoria.index') }}" enctype="multipart/form-data">
            <div class="col-md-6">
              <!--main content start-->
              {{ csrf_field() }}
              @if(isset($categoria))
                <input type="hidden" name="_method" value="PUT">
              @endif
              <div class="form-group">
              <label>Nome:</label>
                <input type="text" name="nome" class="form-control" value="{{ $categoria->nome or old('nome')}}" required>
              </div>

              <div class="clearfix"></div>
              <button type="submit" class="btn btn-info pull-left">{{ !isset($categoria) ? 'Cadastrar': 'Atualizar'}}</button>
            </div>
          </form>

          </div>

      </div>
    </div>
  </section>
@endsection
