@extends("template")
@section("title")
Admin
@endsection
@section("content")
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<h1>Admin</h1>
<a href="{{ route('admin.produtos.create') }}">Cadastrar novo produto</a>
<table class="table">
    <thead>
        <th>ID</th>
        <th>Nome</th>
        <th>Data de fabricação</th>
        <th>Tamanho(cm)</th>
        <th>Largura(cm)</th>
        <th>Peso(cm)</th>
        <th>Data de cadastro</th>
        <th>Data de modificação</th>
        <th>Categorias</th>
        <th>Ação</th>
    </thead>
    <tbody>
        @foreach($produtos as $produto)
            <tr>
                <td>{{$produto->id}}</td>
                <td>{{$produto->nome}}</td>
                <td>{{$produto->data_fabricacao}}</td>
                <td>{{$produto->tamanho}}</td>
                <td>{{$produto->largura}}</td>
                <td>{{$produto->peso}}</td>
                <td>{{$produto->created_at}}</td>
                <td>{{$produto->updated_at}}</td>
                <td></td>
                <td><a href="{{ route('admin.produtos.edit', ['id' => $produto->id]) }}">Editar</a></td>
                <td><a href="{{ route('admin.produtos.delete', ['id' => $produto->id]) }}">Excluir</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

{!! $produtos->render() !!}

@endsection