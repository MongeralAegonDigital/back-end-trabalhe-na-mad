@extends('layouts.admin-template')

@section('content')

    <section class="content-panel">
        <div class="col-md-6 col-md-offset-3 text-center">
            <div class="alert alert-danger errors-form">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>

                <h3><i class="fa fa-exclamation-circle fa-fw"></i>PERMISSÃO NEGADA</h3>
                <p>O seu usuário não tem permissão de acessar a pagina.</p>
                <small>Entre em contato com Administrador da aplicação.</small>
            </div>
        </div>

    </section>
@endsection