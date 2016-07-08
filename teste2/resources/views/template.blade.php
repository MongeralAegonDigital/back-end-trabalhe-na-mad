

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        
        <!-- Bootstrap libraries -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <link href="{!! asset('css/estilos.css') !!}" type='text/css' rel='stylesheet' />
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script>
            url = "{!! url('/') !!}";
        </script>
        <script type="text/javascript" src="{!! asset('js/produtos.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('js/jquerymask.js') !!}"></script>
        <script>
            $(document).ready(function(){
                getProducts(); 
             });
        </script>
    </head>
    <body>

        <div class="container">
            <div class="jumbotron">
                <h1>Teste 2 - Michel Lima</h1>
                <p>Cadastro de produtos</p>
            </div>
            <div class="panel panel-default ">
                <div class="panel-heading">Lista de produtos</div>
                <div class="panel-body">
                    
                </div>

                
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
                        <th>Ações</th>
                        
                    </thead>
                    <tbody id="produtosLista">
                    </tbody>
                </table>
                @yield('content')
            </div>
        </div>



    </body>

</html>
