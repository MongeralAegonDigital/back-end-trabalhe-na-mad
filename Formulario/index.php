<html>

	<head>
		<title>Formulário de Cadastro</title>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="jquery-ui/jquery-ui.min.css">
		<link rel="stylesheet" href="css/custom.css">
		<link href="css/demo.css" rel="stylesheet">
		<link href="css/gmsg.css" rel="stylesheet">


		<script src="js/jquery.min.js"></script>
		<script src="js/gmsg.js"></script> <!-- loading mask-->
		<script src="jquery-ui/jquery-ui.min.js"></script>
		<script src="js/angular.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/app.js"></script>


	</head>

	<body id="popupContainer">
			<!-- render form page -->
			<div ng-app="app" ng-controller="FormController">
				<form class="simple-form" name="formulario" novalidate>
					<div class="container left-padding-zero">	
						<div class="row">
							<div class="col-md-6">
							<h2>Dados do Cliente:</h2>
						  		<fieldset class="form-group">
							    	<label for="nome">Nome:</label> 
							    	<input id="nome" type="text" class="form-control" name="nome" ng-model="user.nome" required />
							    	<span style="color:red" ng-show="formulario.nome.$error.required">Campo Obrigatório</span>
							    </fieldset>
							    <fieldset class="form-group">
							    	<label for="email">E-mail:</label>
							    	<input id="email" class="form-control" name="email" type="email" ng-model="user.email" required />
							    	<span style="color:red" ng-show="formulario.email.$error.required">Campo Obrigatório</span>
									<span style="color:red" ng-show="formulario.email.$error.email">E-mail inválido</span>
							    </fieldset>
							    <div class="container"> 
									<div class="row">
										<div class="col-md-2 left-padding-zero">
											<fieldset class="form-group">
										    	<label for="senha">Senha:</label>
										    	<input id="senha" class="form-control" name="senha" type="password" ng-model="user.senha" required/>
										    	<span style="color:red" ng-show="formulario.senha.$error.required">Campo Obrigatório</span>
										    </fieldset>
									    </div>
									    <div class="col-md-4 left-padding-zero">
											<fieldset class="form-group">
										    	<label for="telefone">Telefone:</label>
										    	<input id="telefone" class="form-control" name="telefone" type="text" ng-model="user.telefone" required/>
										    	<span style="color:red" ng-show="formulario.telefone.$error.required">Campo Obrigatório</span>
										    </fieldset>
									    </div>
								    </div>
							    </div>
							    <div class="container"> 
									<div class="row">
										<div class="col-md-3 left-padding-zero">
										    <fieldset class="form-group">
										    	<label for="cpf">CPF:</label>		    
									    		<input id="cpf" class="form-control" name="cpf" type="text" ng-model="user.cpf" required/>
									    		<span style="color:red" ng-show="formulario.cpf.$error.required">Campo Obrigatório</span>
									    	</fieldset>	
									    </div>
									    <div class="col-md-3 left-padding-zero">
										    <fieldset class="form-group">
										    	<label for="nascimento">Nascimento:</label>		    
									    		<input id="nascimento" class="form-control" name="nascimento" type="date" ng-model="user.nascimento" required/>
									    		<span style="color:red" ng-show="formulario.nascimento.$error.required">Campo Obrigatório</span>
									    	</fieldset>	
									    </div>
									</div>
								</div>	    	
						    </div>
						</div>
					</div> <!-- end container -->
					<div class="container left-padding-zero">
						<div class="row">
							<div class="col-md-6">
								<h2>Endereço do cliente:</h2>
								<div class="container"> 
									<div class="row">
										<div class="col-md-4 left-padding-zero">
											<fieldset class="form-group">
										    	<label for="cep">CEP:</label>
										    	<input id="cep" class="form-control" name="cep" ng-change="getCep(user)" type="text" ng-model="user.cep" required/>
										    	<span style="color:red" ng-show="formulario.cep.$error.required">Campo Obrigatório</span>
										    </fieldset>
									    </div>

									    <div class="col-md-2 left-padding-zero">
											<fieldset class="form-group">
										    	<label for="estado">Estado:</label>
										    	<input id="estado" name="estado" class="form-control" type="text" ng-model="user.estado" required/>
										    	<span style="color:red" ng-show="formulario.estado.$error.required">Campo Obrigatório</span>
										    </fieldset>
									    </div>
								    </div>
							    </div>
							    <fieldset class="form-group">
									<label for="logradouro">Logradouro:</label>
									<input id="logradouro" name="logradouro" class="form-control" type="text" ng-model="user.logradouro" required/>
									<span style="color:red" ng-show="formulario.logradouro.$error.required">Campo Obrigatório</span>
								</fieldset>
								<div class="container"> 
									<div class="row">
										<div class="col-md-3 left-padding-zero">
										    <fieldset class="form-group">
										    	<label for="numero">Número:</label>
										    	<input id="numero" name="numero" min="0" class="form-control" type="number" ng-model="user.numero" required/>
										    	<span style="color:red" ng-show="formulario.numero.$error.required">Campo Obrigatório</span>
										    </fieldset>
										</div>    
									    <div class="col-md-3 left-padding-zero">
										    <fieldset class="form-group">
										    	<label for="complemento">Complemento:</label>
										    	<input id="complemento" name="complemento" class="form-control" type="text" ng-model="user.complemento" required/>
										    	<span style="color:red" ng-show="formulario.complemento.$error.required">Campo Obrigatório</span>
										    </fieldset>
										</div>
									</div>
							    </div>
							    <div class="container"> 
									<div class="row">
										<div class="col-md-3 left-padding-zero">
										    <fieldset class="form-group">
										    	<label for="cidade">Cidade:</label>
										    	<input id="cidade" name="cidade" class="form-control" type="text" ng-model="user.cidade" required/>
										    	<span style="color:red" ng-show="formulario.cidade.$error.required">Campo Obrigatório</span>
										    </fieldset>
										</div>    
									    <div class="col-md-3 left-padding-zero">
										    <fieldset class="form-group">
										    	<label for="bairro">Bairro:</label>
										    	<input id="bairro" name="bairro" class="form-control" type="text" ng-model="user.bairro" required/>
										    	<span style="color:red" ng-show="formulario.bairro.$error.required">Campo Obrigatório</span>
										    </fieldset>
										</div>
									</div>
							    </div>	
							</div>
						</div>
					</div>
					<div class="container left-padding-zero">
						<div class="row">
							<div class="col-md-6">
								<h2>Dados pessoais e profissionais do cliente:</h2>
								<div class="container"> 
									<div class="row">
										<div class="col-md-3 left-padding-zero">
											<fieldset class="form-group">
										    	<label for="rg">RG:</label>
										    	<input id="rg" name="rg" class="form-control" type="number" min="0" ng-model="user.rg" required/>
										    	<span style="color:red" ng-show="formulario.rg.$error.required">Campo Obrigatório</span>
										    </fieldset>
									    </div>

									    <div class="col-md-3 left-padding-zero">
											<fieldset class="form-group">
										    	<label for="data_expedicao">Data Expedição:</label>
										    	<input id="data_expedicao" name="data_expedicao" class="form-control" type="date" ng-model="user.data_expedicao" required/>
										    	<span style="color:red" ng-show="formulario.data_expedicao.$error.required">Campo Obrigatório</span>
										    </fieldset>
									    </div>
								    </div>
							    </div>
							    <div class="container"> 
									<div class="row">
										<div class="col-md-3 left-padding-zero">
											<fieldset class="form-group">
										    	<label for="orgao">Órgão Expedidor:</label>
										    	<input id="orgao" name="orgao" class="form-control" type="text" ng-model="user.orgao" required/>
										    	<span style="color:red" ng-show="formulario.orgao.$error.required">Campo Obrigatório</span>
										    </fieldset>
									    </div>

									    <div class="col-md-3 left-padding-zero">
											<fieldset class="form-group">
										    	<label for="estado_civil">Estado Civil:</label>
										    	<select id="estado_civil" name="estado_civil" class="form-control" ng-model="user.estado_civil" required>
										    		<option value="solteiro">Solteiro</option>
										    		<option value="casado">Casado</option>
										    		<option value="divorciado">Divorciado</option>
										    		<option value="outros">Outros</option>
										    	</select>
										    	<span style="color:red" ng-show="formulario.estado_civil.$error.required">Campo Obrigatório</span>
										    </fieldset>
									    </div>
								    </div>
							    </div>
							    <div class="container"> 
									<div class="row">
										<div class="col-md-3 left-padding-zero">
										    <fieldset class="form-group">
										    	<label for="categoria">Categoria:</label>
										    	<select id="categoria" name="categoria" class="form-control" ng-model="user.categoria" required>
										    		<option value="empregado">Empregado</option>
										    		<option value="empregador">Empregador</option>
										    		<option value="autonomo">Autônomo</option>
										    		<option value="outros">Outros</option>
										    	</select>
										    	<span style="color:red" ng-show="formulario.categoria.$error.required">Campo Obrigatório</span>
										    </fieldset>
										</div>    
									    <div class="col-md-3 left-padding-zero">
										    <fieldset class="form-group">
										    	<label for="empresa">Empresa:</label>
										    	<input id="empresa" name="empresa" class="form-control" type="text" ng-model="user.empresa"/>
										    </fieldset>
										</div>
									</div>
							    </div>
							    <div class="container"> 
									<div class="row">
										<div class="col-md-3 left-padding-zero">
											<fieldset class="form-group">
										    	<label for="profissao">Profissão:</label>
										    	<input id="profissao" name="profissao" class="form-control" type="text" ng-model="user.profissao" required/>
										    	<span style="color:red" ng-show="formulario.profissao.$error.required">Campo Obrigatório</span>
										    </fieldset>
									    </div>

									    <div class="col-md-3 left-padding-zero">
											<fieldset class="form-group">
												<label for="renda">Renda:</label>
												<div class="input-group">	
											    	<span class="input-group-addon">R$</span>
											    	<input id="renda" name="renda" class="form-control" type="number" step="0.01" min="0.00" ng-model="user.renda" required/>
											    </div>	
											    <span style="color:red" ng-show="formulario.renda.$error.required">Campo Obrigatório</span>
										    </fieldset>
									    </div>
								    </div>
							    </div>	
							</div>
						</div>
					</div>
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<input type="button" class="btn btn-danger" ng-click="reset()" value="Limpar" />
								<input type="submit" class="btn btn-success" ng-click="sendemail(user)" value="Enviar" ng-disabled="formulario.nome.$error.required"/>
							</div>
						</div>
					</div>
				</form>
		</div>	

		<!-- mensagens dos diálogos -->
		<div id="dialog" title="CEP Error" hidden>
		  <p>Por favor digite o seu CEP corretamente.</p>
		  <p>Exemplo: 21875-260</p>
		</div>

		<div id="notfound" title="CEP Error" hidden>
		  <p>Seu CEP não foi encontrado.</p>
		</div>

		<div id="sucess" title="E-mail message" hidden>
		  <p>E-mail enviado com sucesso.</p>
		</div>

		<div id="failure" title="E-mail Error" hidden>
		  <p>Seu e-mail não pode ser enviado.</p>
		</div>
	</body>


</html>
