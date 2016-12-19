<!DOCTYPE html>
<html>
    <head>
    	<meta charset="UTF-8">
        <title>WebService</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
            
            ul > li {
            	font-size: 16px;
            	font-weight: 600;
            }
        </style>
    </head>
    <body>
       <h1>Bem vindo a Mongeral Aegon API Teste</h1>
       
       <h3>Para utilizar a api produtos:</h3>
       <ul>
       		<li>Listar todos os produto (GET): dominio/api/produto</li>
       		<li>Listar um produto específico (GET):  dominio/api/produto/{id}</li>
       		<li>Criar novo produto (POST):  dominio/api/produto</li>
       		<li>Atualizar produto (PUT/PATCH):  dominio/api/produto/{id}</li>
       		<li>Remover produto (DELETE):  dominio/api/produto/{id}</li>
       </ul>
       
       <h3>Para utilizar a api categorias:</h3>
       <ul>
       		<li>Listar todas as categorias (GET): dominio/api/categoria</li>
       		<li>Listar uma categoria específica (GET):  dominio/api/categoria/{id}</li>
       		<li>Criar nova categoria (POST):  dominio/api/categoria</li>
       		<li>Atualizar categoria (PUT/PATCH):  dominio/api/categoria/{id}</li>
       		<li>Remover categoria (DELETE):  dominio/api/categoria/{id}</li>
       </ul>
       
    </body>
</html>
