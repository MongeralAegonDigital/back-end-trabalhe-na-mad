<?php

require 'User.php';	

class UserInfo{

	private $user;
	private $data;

	function __construct($user_data) {
		//novo objeto da classe PHPMailer
       	$this->data = $user_data;
       	$this->user = new User();
       	$this->setUserDataInfo();
   	}

   	private function setUserDataInfo(){
		$this->user->setNome(isset($this->data["nome"]) ? $this->data["nome"] : "");
		$this->user->setEmail(isset($this->data["email"]) ? $this->data["email"] : "");
		$this->user->setSenha(isset($this->data["senha"]) ? $this->data["senha"] : "");
		$this->user->setTelefone(isset($this->data["telefone"]) ? $this->data["telefone"] : "");
		$this->user->setCpf(isset($this->data["cpf"]) ? $this->data["cpf"] : "");
		$this->user->setNascimento(isset($this->data["nascimento"]) ? $this->data["nascimento"] : "");
		$this->user->setCep(isset($this->data["cep"]) ? $this->data["cep"] : "");
		$this->user->setEstado(isset($this->data["estado"]) ? $this->data["estado"] : "");
		$this->user->setLogradouro(isset($this->data["logradouro"]) ? $this->data["logradouro"] : "");
		$this->user->setNumero(isset($this->data["numero"]) ? $this->data["numero"] : "");
		$this->user->setComplemento(isset($this->data["complemento"]) ? $this->data["complemento"] : "");
		$this->user->setCidade(isset($this->data["cidade"]) ? $this->data["cidade"] : "");
		$this->user->setBairro(isset($this->data["bairro"]) ? $this->data["bairro"] : "");
		$this->user->setRg(isset($this->data["rg"]) ? $this->data["rg"] : "");
		$this->user->setDataExpedicao(isset($this->data["data_expedicao"]) ? $this->data["data_expedicao"] : "");
		$this->user->setOrgao(isset($this->data["orgao"]) ? $this->data["orgao"] : "");
		$this->user->setEstadoCivil(isset($this->data["estado_civil"]) ? $this->data["estado_civil"] : "");
		$this->user->setCategoria(isset($this->data["categoria"]) ? $this->data["categoria"] : "");
		$this->user->setEmpresa(isset($this->data["empresa"]) ? $this->data["empresa"] : "");
		$this->user->setProfissao(isset($this->data["profissao"]) ? $this->data["profissao"] : "");
		$this->user->setRenda(isset($this->data["renda"]) ? $this->data["renda"] : "");
	}	

	public function getUserInfo(){
		return $this->user;
	}	
}		

?>	