@extends('layouts.admin-white')
@section('content')

    <div class="bg"></div>
    <div id="login-page">
        <div class="form-login">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}
                <h2 class="form-login-heading"> Recuperar Senha</h2>
                <div class="login-wrap">
                    <input id="email" type="email" placeholder="Informe email para recuperação"
                           class="form-control" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                    <br>
                    <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-send-o"></i> Enviar</button>

                    <hr>
                    <div class="text-center">
                        <small >Retornar para area de login.</small>
                        <br>
                        <a href="{{url('/login')}}"><i class="fa fa-home"></i> Pagina Login</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
    </div>

@endsection

