@extends('layouts.admin')

@section('content')
  @if(count($categorias) == 0 && empty($produtos))
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <strong>Não é possível cadastrar Produtos sem categoria.</strong>
      <br>
      <br>
      <a class="btn btn-danger btn-sm" href="{{route('admin.categoria.create')}}">Cadastro de Categorias</a>
    </div>
  @else
    <section class="content-header">
      <h2>{{$title}} | {{ !isset($produtos) ? 'Cadastrar' : 'Editar' }}</h2>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('admin.produtos.index')}}">{{$title}}</a></li>
        <li class="active">{{ !isset($produtos) ? 'Cadastrar': 'Atualizar'}}</li>
      </ol>
      </div>

    </section>
    <section class="content-panel">

      <div class="panel panel-theme">
        <!-- Default panel contents -->
        <div class="panel-heading">
          <a class="btn btn-theme03 btn-xs" href="{{route('admin.produtos.create')}}"> <i class="fa fa-plus fa-fw"></i> Cadastrar</a>
          <a class="btn btn-theme btn-xs" title="Listar" href="{{route('admin.produtos.index')}}"> <i class="fa fa-list fa-fw"></i> Listar</a>
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
            <form class="form-horizontal style-form" method="POST" action="{{!empty($produtos)? route('admin.produtos.update', $produtos->id) : route('admin.produtos.index') }}"  enctype="multipart/form-data">
              <div class="col-md-10">
                <!--main content start-->
                {{ csrf_field() }}
                @if(isset($produtos))
                  <input type="hidden" name="_method" value="PUT">
                @endif
                <div class="form-group">
                  <label>Nome:</label>
                  <input type="text" name="name" class="form-control" value="{{ $produtos->name or old('name')}}" required>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Data de Fabricação:</label>
                      <input type="text" name="fabricacao" class="date form-control" value="{{ $produtos->fabricacao or old('fabricacao')}}" required>
                    </div>
                  </div>
                  <div class="col-md-3 col-xs-12 col-sm-12">
                    <div class="form-group">
                      <label>Tamanho:</label>
                      <input type="text" min="0" name="tamanho" class="tamanho form-control" value="{{ $produtos->tamanho or old('tamanho')}}" required>
                    </div>
                  </div>
                  <div class="col-md-3 col-xs-12 col-sm-12 ">
                    <div class="form-group">
                      <label for="largura">Largura:</label>
                      <input type="text" min="0" name="largura" id="largura" class="tamanho form-control" value="{{ $produtos->largura or old('largura')}}" required>
                    </div>
                  </div>
                  <div class="col-md-2 col-xs-12 col-sm-12">
                    <div class="form-group">
                      <label for="peso">Peso:</label>
                      <div class="input-group">
                        <input type="text" class="peso form-control" name="peso" id="peso" value="{{ $produtos->peso or old('peso')}}"  required>
                        <div class="input-group-addon">Kg</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="inputSelect">

                  <label>Categoria<span class="text-danger">*</span>:</label>
                  <div class="cleafix"></div>
                  <select  style="width:280px;float: left;margin:0 2px; display: {{count($categorias) ===0 ?'none':''}}"
                           class="form-signin-heading form-control " id="categoria">
                    @foreach($categorias as $cat)
                      <option id="{{$cat->id}}"  value="{{$cat->id}}">{{$cat->nome}}</option>
                    @endforeach
                  </select>
                  <button  style="display: {{count($categorias) ===0 ?'none':''}}" class="text-success btn btn-primary" type="button" id="incluir"><i class="fa fa-plus"></i> incluir</button>

                  <div class="clearfix"></div>
                  @if(!empty($categorias_ativas))
                    <div class='result_categoria resultInput'>
                      @foreach($categorias_ativas as $catAtv)
                        <div class="btn-modelo">
                          <input type="hidden" value="{{$catAtv->id}}" name="categoria[]">
                          <span class="btn btn-xs btn-danger">{{$catAtv->nome}}</span>
                          <button type="button" id="removeBtn" class="btn-link text-danger inputSelect">
                            <i class="fa fa-trash"></i>
                          </button>
                        </div>
                      @endforeach
                    </div>
                  @endif
                </div>
                <div class="clear"><br></div>
                <div class="clearfix"></div>
                <button type="submit" class="btn btn-info pull-left">{{ !isset($produtos) ? 'Cadastrar': 'Atualizar'}}</button>
              </div>
            </form>

          </div>

        </div>
      </div>
    </section>
  @endif

@endsection
