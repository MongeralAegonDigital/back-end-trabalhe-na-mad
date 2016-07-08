@extends("template")
@section("title")
Lista de produtos
@endsection
@section("content")
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<h1>Lista de Produtos</h1>
@foreach($produtos as $produto)
    <h2>{{$produto->nome}}</h2>
    <p>Data de fabricação: {{$produto->data_fabricacao}}</p>
    <p>Tamanho: {{$produto->tamanho}}cm</p>
    <p>Largura: {{$produto->largura}}cm</p>
    <p>Peso: {{$produto->peso}}cm</p>
    <p>
        Categorias:
    <ul>
        @foreach($produto->categorias as $categoria)
        <li>{{$categoria->nome}}</li> 
        @endforeach
    </ul>
    </p>
    
    <hr>
    
@endforeach
@endsection