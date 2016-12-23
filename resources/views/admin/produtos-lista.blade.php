@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h2>{{$title}}</h2>
    <ol class="breadcrumb">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{route('admin.produtos.index')}}">{{$title}}</a></li>
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
        <a class="btn btn-theme03 btn-xs" href="{{route('admin.produtos.create')}}"> <i class="fa fa-plus fa-fw"></i> Cadastrar</a>
        <a class="btn btn-theme btn-xs" title="Listar" href="{{route('admin.produtos.index')}}"> <i class="fa fa-list fa-fw"></i> Listar</a>
        <p class=" col-md-3 pull-right">
            <input type="text" ng-model="prod" class="form-control" placeholder="Buscar Produtos">

        </p><!-- /input-group -->
      </div>
      <!-- Table -->
      <div >
        <h1 >

        </h1>

      </div>
      <table class="table table-striped" ng-controller="myCtrl">
        <thead>
        <tr>
          <th class="col-md-3">
            <a href="#" ng-click="sortType = 'nome'">
              <span ng-show="sortType == 'Nome'" class="fa fa-caret-down"></span>
              Nome
            </a>
          </th>
          <th class="col-md-2">
            <a href="#" ng-click="sortType = 'fabricacao'">
              <span ng-show="sortType == 'Fabricacao'" class="fa fa-caret-down"></span>
              Fabricacao
            </a>
          </th>
          <th class="col-md-2">
            <a href="#" ng-click="sortType = 'tamanho'">
              <span ng-show="sortType == 'Tamanho'" class="fa fa-caret-down"></span>
              Tamanho
            </a>
          </th>
          <th class="col-md-2">
            <a href="#" ng-click="sortType = 'largura'">
              <span ng-show="sortType == 'Largura'" class="fa fa-caret-down"></span>
              Largura
            </a>
          </th>
          <th class="col-md-1">
            <a href="#" ng-click="sortType = 'peso'">
              <span ng-show="sortType == 'Peso'" class="fa fa-caret-down"></span>
              Peso
            </a>
          </th>
          <th class="col-md-2">Editar</th>
        </tr>
        </thead>
        <tbody ng-repeat="x in produtos | orderBy:sortType:sortReverse  | filter:prod ">

        <tr >
          <td> @{{x.name}}</td>
          <td> @{{ x.fabricacao | date :  "dd/MM/y"}}</td>
          <td> @{{x.tamanho}}</td>
          <td> @{{x.largura}}</td>
          <td> @{{x.peso}}</td>
          <td>
            <div >
              <a href="/admin/produtos/@{{x.id}}/edit " class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>

            </div>
          </td>
        </tr>

        </tbody>
      </table>
    </div>
  </section>
@endsection
