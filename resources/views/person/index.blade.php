@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Clientes</div>
                    <div class="panel-body">

                        <a href="{{ url('/person/create') }}" class="btn btn-primary btn-xs" title="Adicionar Cliente"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>CPF</th><th> Nome </th><th> Email </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($person as $item)
                                    <tr>
                                        <td>{{ $item->CPF }}</td>
                                        <td>{{ $item->nome }}</td><td>{{ $item->email }}</td>
                                        <td>
                                            <a href="{{ url('/person/' . $item->id) }}" class="btn btn-success btn-xs" title="Visualizar Cliente"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/person', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Deletar Cliente" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Person',
                                                        'onclick'=>'return confirm("Confirmar exclusão?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $person->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection