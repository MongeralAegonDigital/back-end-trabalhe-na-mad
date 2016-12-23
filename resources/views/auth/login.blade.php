@extends('layouts.admin-white')
@section('content')

    <style>
        html,body{
            background: #F2F2F2 !important;
            height: 100%;
        }
    </style>
    <div id="login-page">
        <div class="form-login">
            @if($errors->first('errors'))
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Erro!</strong> {{ $errors->first('errors')}}.
                </div>
            @endif
            <form  method="POST" action="{{url('login')}}">

                {{ csrf_field() }}
                <h2 class="form-login-heading"> <i class="fa fa-lock"></i> Login</h2>
                <div class="login-wrap">
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Informe E-mail" value="{{ old('email') }}" autofocus>
                        @if ($errors->has('email'))
                            <div class="help-block">
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Informe a Senha">
                        @if ($errors->has('password'))
                            <div class="help-block">
                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-unlock-alt"></i> Acessar</button>
                    </div>

                    <div class="checkbox  hidden">
                        <label>
                            <input type="checkbox"  name="remember">Lembrar da senha
                        </label>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group text-right hidden">
                         <a href="{{ url('/password/reset') }}"> Esqueceu a Senha?</a>
                    </div>

                    <hr>
                    <div class="text-left">
                        <h4>Dados para acesso.</h4>
                        <p><strong>Login: </strong>admin@mongeralaegon.com.br</p>
                        <p><strong>Senha: </strong>123456</p>
            
                    </div>
                </div>



            </form>
        </div>
    </div>
@endsection