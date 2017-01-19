@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Cliente {{ $person->nome }}</div>
                    <div class="panel-body">
					
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['person', $person->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Person',
                                    'onclick'=>'return confirm("Confirmar Exclusão?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>CPF</th><td>{{ $person->CPF }}</td>
                                    </tr>
                                    <tr><th> Nome </th><td> {{ $person->nome }} </td></tr><tr><th> Email </th><td> {{ $person->email }} </td></tr><tr><th> Telefone </th><td> {{ $person->telefone }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection