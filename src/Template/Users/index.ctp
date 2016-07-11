<div id="tudo">
<?php echo $this->Html->script('Users', array('inline' => false)); ?>
<h1> Cadastro de Usuários </h1>
<br>
<?php
	echo $this->Form->create($user,['url' =>['action' => 'add']]);
	echo $this->Form->input('name',['label' => 'Nome','style'=>'width:350px; height:30px;']);
	echo $this->Form->input('cpf',['label' => 'CPF','type' => 'number','style'=>'width:200px; height:30px;']);	
	$this->Form->templates(['dateWidget' => '{{day}}{{month}}{{year}}']);
	echo $this->Form->input('birthdate',['label' => 'Data de Nascimento','type' => 'date','minYear' => date('Y') - 70,'maxYear' => date('Y') - 00,'style'=>'height:30px;']);	
	echo $this->Form->input('email',['label' => 'E-Mail','style'=>'width:300px; height:30px;']);
	echo $this->Form->input('password',['label' => 'Senha','style'=>'width:250px; height:30px;']);
	echo $this->Form->input('phone',['label' => 'Telefone','type' => 'number','style'=>'width:200px; height:30px;']);
	echo $this->Form->input('address.postcode',['label' => 'CEP','type' => 'number','style'=>'width:200px; height:30px;']);
	echo $this->Form->input('address.street',['label' => 'Endereço','style'=>'width:350px; height:30px;']);
	echo $this->Form->input('address.neighborhood',['label' => 'Bairro','style'=>'width:300px; height:30px;']);
	echo $this->Form->input('address.state',['label' => 'Estado','style'=>'width:300px; height:30px;']);
	echo $this->Form->input('address.city',['label' => 'Cidade','style'=>'width:200px; height:30px;']);	
	echo $this->Form->input('address.number',['label' => 'Numero','type' => 'number','style'=>'width:60px; height:30px;']);
	echo $this->Form->input('address.complement',['label' => 'Complemento','style'=>'width:200px; height:30px;']);
	echo $this->Form->input('profile.rg',['label' => 'RG','type' => 'number','style'=>'width:200px; height:30px;']);
	echo $this->Form->input('profile.shipping_date',['label' => 'Data de Expedição','type' => 'date','minYear' => date('Y') - 70,'maxYear' => date('Y') - 00,'style'=>'height:30px;']);
	echo $this->Form->input('profile.dispatcher_organ',['label' => 'Órgão Expedidor','style'=>'width:180px; height:30px;']);
	echo $this->Form->input('profile.marital_status',['label' => 'Estado Civil','style'=>'width:180px; height:30px;']);
	$categorias = ['Empregado' => 'Empregado', 'Empregador' => 'Empregador', 'Autonomo' => 'Autonomo', 'Outros' => 'Outros'];
	echo $this->Form->input('profile.category',['label' => 'Categoria','options' => $categorias,'empty' => 'Escolha uma categoria','style'=>'width:180px; height:40px;']);
	echo $this->Form->input('profile.company_work',['label' => 'Empresa em que trabalha','style'=>'width:300px; height:30px;']);
	echo $this->Form->input('profile.profession',['label' => 'Profissão','style'=>'width:250px; height:30px;']);
	echo $this->Form->input('profile.gross_income',['label' => 'Salário','style'=>'width:100px; height:30px;']);
	echo $this->Form->button('Salvar',['type' => 'Submit']);
	echo $this->Form->end();
?>
</div>
<script>	
 	var cep = document.getElementsByName('address[postcode]')[0];
 	var cpf = document.getElementsByName('cpf')[0];
 	cep.onblur = function() {  
		pesquisacep(this.value);
	} 

	cpf.onblur = function() {  
		validarCPF(this.value);
	} 
</script>