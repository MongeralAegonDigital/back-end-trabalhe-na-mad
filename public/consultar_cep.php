<?php

$cep = $_POST['cep'];

$results = simplexml_load_file('http://api.postmon.com.br/v1/cep/'.$cep.'?format=xml');

$dados['logradouro'] = (string) $results->logradouro;
$dados['complemento'] = (string) $results->complemento;
$dados['bairro'] = (string) $results->bairro;
$dados['estado'] = (string) $results->estado;
$dados['cidade'] = (string) $results->cidade;
$dados['complemento'] = (string) $results->complemento;
		
echo json_encode($dados);

?>