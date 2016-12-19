@extends("template")
@section("title")
Admin
@endsection
@section("content")
<hr>
<div class="panel-footer">
    <button class="btn btn-info novoProduto" type="button" value="1">Cadastrar novo produto</button>
</div>
<hr>

<div class="painelCadastrar panel panel-default hidden" style="width: 90%; margin: auto">
    <div class="panel-heading"><strong>Cadastrar novo produto</strong></div>
        <div class="panel-body">
            {!! Form::open(['method'=>'post', 'route' => 'admin.produtos.store', 'id'=>'create']) !!}

            <div class="form-group">
                {!! Form::label("Nome") !!}
                {!! Form::text('nome', null, ['class' =>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Data de fabricacao") !!}
                {!! Form::text('data_fabricacao', null, ['class' =>'form-control datepicker']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Tamanho") !!}
                {!! Form::text('tamanho', null, ['class' =>'form-control float']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Largura") !!}
                {!! Form::text('largura', null, ['class' =>'form-control float']) !!}
            </div>

            <div class="form-group">
                {!! Form::label("Peso") !!}
                {!! Form::text('peso', null, ['class' =>'form-control peso']) !!}
            </div>

            <div class='form-group'>
                {!! Form::label("Categorias(separar por vírgula)") !!}
                {!! Form::textarea('categorias', null, ['class' =>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::button('Salvar', ['id'=>'cadastrar', 'class' =>'btn btn-primary']) !!}
                {!! Form::button('Cancelar', ['id'=>'cancelar', 'class' =>'btn btn-info fecharPainelCadastrar']) !!}
            </div>

            {!! Form::close() !!}
        </div>
</div>

<div class="painelEditar panel panel-default hidden" style="width: 90%; margin: auto">
    
    <div class="panel-heading"><strong>Editar produto</strong></div>
        <div class="panel-body">
            {!! Form::open(['method'=>'post', 'route' => 'admin.produtos.edit', 'id'=>'edit']) !!}

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
                {!! Form::label("Categorias(separar por vírgula)") !!}
                {!! Form::textarea('categorias', null, ['class' =>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::button('Salvar', ['id'=>'editar', 'class' =>'btn btn-primary']) !!}
                {!! Form::button('Cancelar', ['id'=>'cancelar', 'class' =>'btn btn-info fecharPainelEditar']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection