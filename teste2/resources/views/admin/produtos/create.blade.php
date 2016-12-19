@extends("template")
@section("title")
Admin - Cadastrar produtos
@endsection
@section("content")
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<h1>Admin - Cadastrar produtos</h1>
{!! Form::open(['method'=>'post', 'route' => 'admin.produtos.store']) !!}

<div class="form-group">
    {!! Form::label("Nome") !!}
    {!! Form::text('nome', null, ['class' =>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label("Data de fabricacao") !!}
    {!! Form::text('data_fabricacao', null, ['class' =>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label("Tamanho") !!}
    {!! Form::text('tamanho', null, ['class' =>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label("Largura") !!}
    {!! Form::text('largura', null, ['class' =>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label("Peso") !!}
    {!! Form::text('peso', null, ['class' =>'form-control']) !!}
</div>

<div class='form-group'>
    {!! Form::label("Categorias") !!}
    {!! Form::textarea('categorias', null, ['class' =>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Cadastrar produto', ['class' =>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}

@endsection