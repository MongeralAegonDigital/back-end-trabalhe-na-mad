<?php

class User{
	private $nome = "";
	private	$email = "";
	private $senha = "";
	private $telefone = "";
	private $cpf = "";
	private $nascimento = "";
	private $cep = "";
	private $estado = "";
	private $logradouro = "";
	private $numero = "";
	private $complemento = "";
	private $cidade = "";
	private $bairro = "";
	private $rg = "";
	private $data_expedicao = "";
	private $orgao = "";
	private $estado_civil = "";
	private $categoria = "";
	private $empresa = "";
	private $profissao = "";
	private $renda = "";

	public function getEmail()
	{
	    return $this->email;
	}
	
	public function setEmail($email)
	{
	    $this->email = $email;
	}

	public function getNome()
	{
	    return $this->nome;
	}
	
	public function setNome($nome)
	{
	    $this->nome = $nome;
	}

	public function getSenha()
	{
	    return $this->senha;
	}
	
	public function setSenha($senha)
	{
	    $this->senha = $senha;
	}

	public function getTelefone()
	{
	    return $this->telefone;
	}
	
	public function setTelefone($telefone)
	{
	    $this->telefone = $telefone;
	}

	public function getCpf()
	{
	    return $this->cpf;
	}
	
	public function setCpf($cpf)
	{
	    $this->cpf = $cpf;
	}

	public function getNascimento()
	{
	    return $this->nascimento;
	}
	
	public function setNascimento($nascimento)
	{
	    $this->nascimento = $nascimento;
	}

	public function getCep()
	{
	    return $this->cep;
	}
	
	public function setCep($cep)
	{
	    $this->cep = $cep;
	}

	public function getEstado()
	{
	    return $this->estado;
	}
	
	public function setEstado($estado)
	{
	    $this->estado = $estado;
	}

	public function getLogradouro()
	{
	    return $this->logradouro;
	}
	
	public function setLogradouro($logradouro)
	{
	    $this->logradouro = $logradouro;
	}

	public function getNumero()
	{
	    return $this->numero;
	}
	
	public function setNumero($numero)
	{
	    $this->numero = $numero;
	}

	public function getComplemento()
	{
	    return $this->complemento;
	}
	
	public function setComplemento($complemento)
	{
	    $this->complemento = $complemento;
	}

	public function getCidade()
	{
	    return $this->cidade;
	}
	
	public function setCidade($cidade)
	{
	    $this->cidade = $cidade;
	}

	public function getBairro()
	{
	    return $this->bairro;
	}
	
	public function setBairro($bairro)
	{
	    $this->bairro = $bairro;
	}

	public function getRg()
	{
	    return $this->rg;
	}
	
	public function setRg($rg)
	{
	    $this->rg = $rg;
	}

	public function getDataExpedicao()
	{
	    return $this->data_expedicao;
	}
	
	public function setDataExpedicao($data_expedicao)
	{
	    $this->data_expedicao = $data_expedicao;
	}

	public function getOrgao()
	{
	    return $this->orgao;
	}
	
	public function setOrgao($orgao)
	{
	    $this->orgao = $orgao;
	}

	public function getEstadoCivil()
	{
	    return $this->estado_civil;
	}
	
	public function setEstadoCivil($estado_civil)
	{
	    $this->estado_civil = $estado_civil;
	}

	public function getCategoria()
	{
	    return $this->categoria;
	}
	
	public function setCategoria($categoria)
	{
	    $this->categoria = $categoria;
	}

	public function getEmpresa()
	{
	    return $this->empresa;
	}
	
	public function setEmpresa($empresa)
	{
	    $this->empresa = $empresa;
	}

	public function getProfissao()
	{
	    return $this->profissao;
	}
	
	public function setProfissao($profissao)
	{
	    $this->profissao = $profissao;
	}

	public function getRenda()
	{
	    return $this->renda;
	}
	
	public function setRenda($renda)
	{
	    $this->renda = $renda;
	}
}
?>