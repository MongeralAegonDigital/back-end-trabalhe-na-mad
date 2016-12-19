@extends("template")
@section("title")
Admin - Editar produto: {{$produto->nome}}
@endsection
@section("content")
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<h1>Admin - Editar produto: {{$produto->nome}}</h1>

{!! Form::model($produto, ['method'=>'put', 'route' => ['admin.produtos.update', $produto->id]]) !!}

<div class="form-group">
    {!! Form::label("Nome") !!}
    {!! Form::text('nome', $produto->nome, ['class' =>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label("Data de fabricacao") !!}
    {!! Form::text('data_fabricacao', $produto->data_fabricacao, ['class' =>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label("Tamanho") !!}
    {!! Form::text('tamanho', $produto->tamanho, ['class' =>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label("Largura") !!}
    {!! Form::text('largura', $produto->largura, ['class' =>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label("Peso") !!}
    {!! Form::text('peso', $produto->peso, ['class' =>'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::label("Categorias") !!}
    {!! Form::textarea('categorias', $produto->categoriaList, ['class' =>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Salvar produto', ['class' =>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}
@endsection