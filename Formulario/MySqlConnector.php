<?php

	class MySqlConnector{

		private $conn;
		private $userInfo;

		function __construct($userInfo) {
			$this->userInfo = $userInfo;
		}	

		//conecta ao banco
		function getConnection(){
			//conexão já existe
			if($this->conn) return $this->conn;

			$this->conn = mysql_connect('localhost', 'paulo', '1234');

			mysql_select_db('user_database', $this->conn) or die('Não pode selecionar banco.');
        	return $this->conn;
		}

		//verifica se usuário existe (identificador é cpf)
		function checkIfCPFExist($cpf){
			$query = "SELECT * from users where cpf = '$cpf'";

			return $this->exec_query($query);
		}

		function updateUser(){
			$user = $this->userInfo->getUserInfo();
   			
			$nome = $user->getNome();
			$email = $user->getEmail();
			$senha = $user->getSenha();
			$telefone = $user->getTelefone();
			$cpf = $user->getCpf();
			$nascimento = $user->getNascimento();
			$cep = $user->getCep();
			$estado = $user->getEstado();
			$logradouro = $user->getLogradouro();
			$numero = $user->getNumero();
			$complemento = $user->getComplemento();
			$cidade = $user->getCidade();
			$bairro = $user->getBairro();
			$rg = $user->getRg();
			$data_expedicao = $user->getDataExpedicao();
			$orgao = $user->getOrgao();
			$estado_civil = $user->getEstadoCivil();
			$categoria = $user->getCategoria();
			$empresa = $user->getEmpresa();
			$profissao = $user->getProfissao();
			$renda = $user->getRenda(); 

			$query = "UPDATE users SET nome = '$nome' ,"
					 	. " email = '$email' , senha = '$senha' , telefone = '$telefone' ,"
					 	. " cpf = '$cpf' , nascimento = '$nascimento' , cep = '$cep' , estado = '$estado' ,"
					 	. " logradouro = '$logradouro' , numero = '$numero' , complemento = '$complemento' ,"
					 	. " cidade = '$cidade' , bairro = '$bairro' , rg = '$rg' , data_expedicao = '$data_expedicao' ," 
					 	. " orgao = '$orgao' , estado_civil = '$estado_civil' , categoria = '$categoria' , empresa = '$empresa' ,"
					 	. " profissao = '$profissao' , renda = '$renda' WHERE cpf = '$cpf'";

			return $this->exec_query($query);		 
		}

		function insertUser(){
			$user = $this->userInfo->getUserInfo();
   			
			$nome = $user->getNome();
			$email = $user->getEmail();
			$senha = $user->getSenha();
			$telefone = $user->getTelefone();
			$cpf = $user->getCpf();
			$nascimento = $user->getNascimento();
			$cep = $user->getCep();
			$estado = $user->getEstado();
			$logradouro = $user->getLogradouro();
			$numero = $user->getNumero();
			$complemento = $user->getComplemento();
			$cidade = $user->getCidade();
			$bairro  = $user->getBairro();
			$rg = $user->getRg();
			$data_expedicao = $user->getDataExpedicao();
			$orgao = $user->getOrgao();
			$estado_civil = $user->getEstadoCivil();
			$categoria = $user->getCategoria();
			$empresa = $user->getEmpresa();
			$profissao = $user->getProfissao();
			$renda = $user->getRenda();

			$query = "INSERT INTO users (nome , email , senha , telefone , cpf , nascimento ,"
										. "cep , estado , logradouro , numero , complemento ,"
										. "cidade , bairro , rg , data_expedicao , orgao , "
										. " estado_civil , categoria , empresa , profissao , renda)"
										. " VALUES ( '$nome' , '$email' , '$senha' , '$telefone' , "
										. "	'$cpf' , '$nascimento' , '$cep' , '$estado' , '$logradouro' , "
										. " '$numero' , '$complemento' , '$cidade' , '$bairro' , '$rg' , "
										. " '$data_expedicao' , '$orgao' , '$estado_civil' , '$categoria' , "
										. "	'$empresa' , '$profissao' , '$renda')";


			return $this->exec_query($query);
		}

		function exec_query($query){
			$result = mysql_query($query);

			if($result !== false) return true;
    		return false;
		}

		function insertOrUpdateUser(){
			$user = $this->userInfo->getUserInfo();

			if($this->checkIfCPFExist($user->getCpf())){
				return $this->updateUser();
			} else {
				return $this->insertUser();
			}
		}

	}

?>