@extends('layouts.admin')

@section('content')
<section class="content-header">
  <h2>{{$title}}</h2>
  <ol class="breadcrumb">
    <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{route('admin.categoria.index')}}">{{$title}}</a></li>
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
      <a class="btn btn-theme03 btn-xs" href="{{route('admin.categoria.create')}}"> <i class="fa fa-plus fa-fw"></i> Cadastrar</a>
      <a class="btn btn-theme btn-xs" title="Listar" href="{{route('admin.categoria.index')}}"> <i class="fa fa-list fa-fw"></i> Listar</a>
    </div>

    <!-- Table -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th class="col-md-9">Nome</th>
          <th class="col-md-2">Excluir</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($categorias as $cat)
        <tr >

          <td>{{$cat->nome}}</td>
          <td>
            <div >
              <a href="{{route('admin.categoria.edit', $cat->id)}}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
              |
              <form method="POST" class="btn-group" action="{{route('admin.categoria.destroy',$cat->id)}}">
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
