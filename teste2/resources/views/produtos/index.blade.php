@extends("template")
@section("title")
Lista de produtos
@endsection
@section("content")
<h1>Lista de Produtos</h1>
<hr>
@foreach($produtos as $produto)
    <h2>{{$produto->nome}}</h2>
    <p>Data de fabricação: {{$produto->data_fabricacao}}</p>
    <p>Tamanho: {{$produto->tamanho}}cm</p>
    <p>Largura: {{$produto->largura}}cm</p>
    <p>Peso: {{$produto->peso}}cm</p>
    
    <hr>
    
@endforeach
@endsection