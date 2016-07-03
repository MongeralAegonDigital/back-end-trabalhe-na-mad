<?php


	require 'mail/PHPMailerAutoload.php';
	require 'UserInfo.php';

	class EmailSender{

		private $mail;
		private $userInfo;
		

		function __construct($userInfo) {
			//novo objeto da classe PHPMailer
       		$this->mail = new PHPMailer();
       		$this->userInfo = $userInfo;
   		}

   		//envia um novo e-mail para o cliente
   		public function sendEmail(){

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

			//corpo do e-mail
			$body = "<h2>Seus dados cadastrados: </h2><br><br>"
					."Nome: $nome <br>"
					."E-mail: $email <br>"
					."Password: $senha <br>"
					."Telefone: $telefone <br>"
					."CPF: $cpf <br>"
					."Data de Nascimento: $nascimento <br>"
					."CEP: $cep <br>"
					."Estado: $estado <br>"
					."Rua: $logradouro <br>"
					."Número: $numero <br>"
					."Complemento: $complemento <br>"
					."Cidade: $cidade <br>"
					."Bairro: $bairro <br>"
					."Identidade: $rg <br>"
					."Data de Expedição: $data_expedicao <br>"
					."Órgão Expedidor: $orgao <br>"
					."Estado Civil: $estado_civil <br>"
					."Categoria: $categoria <br>"
					."Empresa: $empresa <br>"
					."Profissão: $profissao <br>"
					."Renda R\$: $renda <br>";
			
			

			//seta o corpo do e-mail como html
			$this->mail->msgHTML($body);

			//tenta enviar o e-mail
			if(!$this->mail->Send()) return false;
			else return true;
   		}

   		//configura os dados para envio do e-mail
   		public function configureEmailSender(){

   			if(!$this->mail){
   				echo "false";
   				return;
   			}

   			$this->mail->IsSMTP();

   			//configuração do gmail
			$this->mail->Port = 465; //porta usada pelo gmail.
			$this->mail->Host = 'smtp.gmail.com'; 
			$this->mail->SMTPSecure = 'ssl';


			//configuração do usuário do gmail
			$this->mail->SMTPAuth = true; 
			$this->mail->Username = 'username@gmail.com'; // usuario gmail.   
			$this->mail->Password = '******************'; // senha do email.

			$this->mail->SingleTo = true; 

			// configuração do email a ver enviado.
			$this->mail->From = "paulo10.1977@yahoo.com.br"; 
			$this->mail->FromName = "Paulo Sergio"; 

			$this->mail->addAddress("paulo10.1977@yahoo.com.br"); // email do destinatario.

			$this->mail->Subject = "Dados do Cadastro"; 

			//codificação para caracteres UTF-8
			$this->mail->CharSet = 'UTF-8';
			
   		}

	} //end of class
?>