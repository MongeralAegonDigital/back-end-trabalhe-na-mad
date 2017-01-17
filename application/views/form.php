<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Artur Guimarães">
    <title>Sistema de cadastro</title>
  	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script> 
</head>
<body>
    <div class="container col-md-6">
   		<br><br>
        <div class="col-md-8 centered">
            <h1 class="form-signin-heading">Por favor, preencha seus dados:</h1>
        </div>
        <br>
        <?php echo validation_errors(); ?>
		<form class="form-horizontal" method="post">
            <div class="form-group col-md-5 centered">
            	<h3>Informações Pessoais</h3>
            </div>
            <div class="form-group col-md-5 centered">
            	<label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required>
                <p id="cpfInvalido" style="font-style:italic;color:#FD0206;" class="hidden">CPF inválido!</p>
                <p id="cpfValido" style="font-style:italic;color:#1DD002;" class="hidden">CPF OK</p>
            </div>
            <div class="form-group col-md-5 centered">
            	<label for="password">Password</label>
            	<input type="password" class="form-control" id="password" name="password" required>
          	</div>
            <div class="form-group col-md-5 centered">
            	<label for="name">Nome completo</label>
            	<input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group col-md-5 centered">
            	<label for="tel">Telefone</label>
            	<input type="text" class="form-control" id="tel" name="tel" required>
          	</div>
            <div class="form-group col-md-5 centered">
            	<label for="email">Endereço de e-mail</label>
            	<input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group col-md-5 centered">
            	<label for="data">Data de nascimento</label>
            	<input type="text" class="form-control" id="data" name="data" required>
          	</div>
            
     		<br>
            <div class="form-group col-md-5 centered">
            	<h3>Endereço</h3>
            </div>
            <div class="form-group col-md-5 centered">
            	<label for="cep">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" required>
            	<p id="cepInvalido" style="font-style:italic;color:#FD0206;" class="hidden">CEP inválido!</p>
                <p id="cepValido" style="font-style:italic;color:#1DD002;" class="hidden">CEP OK</p>
            </div>
            <div id="endereco" class="hidden">
                <div class="form-group col-md-5 centered">
                    <label for="rua">Logradouro</label>
                    <input type="text" class="form-control" id="rua" name="rua">
                </div>
                <div class="form-group col-md-5 centered">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" id="numero" name="numero">
                </div>
                <div class="form-group col-md-5 centered">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento">
                </div>
                <div class="form-group col-md-5 centered">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro">
                </div>
                <div class="form-group col-md-5 centered">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade">
                </div>
                <div class="form-group col-md-5 centered">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" id="estado" name="estado">
                </div>
            </div>
            
            <br>
            <div class="form-group col-md-5 centered">
            	<h3>Informações Profissionais</h3>
            </div>
            <div class="form-group col-md-5 centered">
            	<label for="rg">RG</label>
                <input type="text" class="form-control" id="rg" name="rg" required>
            </div>
            <div class="form-group col-md-5 centered">
            	<label for="dataExp">Data de expedição</label>
            	<input type="text" class="form-control" id="dataExp" name="dataExp" required>
          	</div>
            <div class="form-group col-md-5 centered">
            	<label for="orgao">Órgão expeditor</label>
                <input type="text" class="form-control" id="orgao" name="orgao" required>
            </div>
            <div class="form-group col-md-5 centered">
            	<label for="estCivil">Estado Civil</label>
                <input type="text" class="form-control" id="estCivil" name="estCivil" required>
            </div>
            <div class="form-group col-md-5 centered">
                <label for="categoria">Categoria</label>
                <select class="form-control" id="categoria" name="categoria" required>
                  	<option value="">--</option>
                    <option value="empregado">Empregado</option>
                  	<option value="empregador">Empregador</option>
                  	<option value="autonomo">Autônomo</option>
	                <option value="desempregado">Desempregado</option>
                    <option value="outros">Outros</option>
            	</select>
  			</div>
            <div class="form-group col-md-5 centered">
            	<label for="empresa">Empresa onde trabalha (opcional)</label>
                <input type="text" class="form-control" id="empresa" name="empresa">
            </div>
            
            <br>
            <div class="form-group col-md-5 centered">
            	<input type="submit" id="submit" name="submit" class="btn btn-success btn-lg btn-block" value="Enviar">
            </div>
      	</form>
    </div>
</body>
</html>