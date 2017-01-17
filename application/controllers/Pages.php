<?php
class Pages extends CI_Controller {
	
	public function view($page = 'home') {
		if($page == 'home' || $page == 'form') {
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');

			$config = array(
								array(
										'field' => 'cpf',
										'label' => 'CPF',
										'rules' => 'callback_cpf'
								),
								array(
										'field' => 'cep',
										'label' => 'CEP',
										'rules' => 'callback_cep'
								)
							);

			$this->form_validation->set_rules($config);
				
			if ($this->form_validation->run() == FALSE)
				$this->load->view('form');
			
			//VALIDAÇÃO OK 
			else {
				$this->load->model('address');
				$address = $this->address->create();
				
				//Inserção do endereço com sucesso
				if ($address != NULL) {
					$this->load->model('contact');
					$id = $this->contact->create($address);
					
					//Inserção do contato com sucesso
					if ($id != NULL) {
						$nome = $this->input->post('name');
						$email = $this->input->post('email');
						
						$this->load->library('email');
						$this->email->from('dont_reply@testemongeral.com', 'Teste Mongeral Aegon');
						$this->email->to($email);
						$this->email->subject('Obrigado ' . $nome . '!');
					
						$message = '<html>
									<head>
									  <title>Cadastro completo!</title>
									</head>
									<body>
									  <h1>Obrigado ' . $nome . '!</h1>
									  <p>Seu cadastro já foi efetuado no nosso sistema com sucesso!</p>
									</body>
									</html>
									';
						$this->email->message($message);
						
						$this->email->send();
						
						$data = array($email);
						$this->load->view('success', $data);
					}
				}
			}
		}
	}
	
	public function cpf($cpf) {
		$cpf = preg_replace('/[^0-9]/', '', (string) $cpf);
		// Valida tamanho
		if (strlen($cpf) != 11) {
			$this->form_validation->set_message('cpf', 'O CPF informado não é válido.');
			return FALSE;
		}
		// Calcula e confere primeiro dígito verificador
		for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--)
			$soma += $cpf{$i} * $j;
		$resto = $soma % 11;
		if ($cpf{9} != ($resto < 2 ? 0 : 11 - $resto)) {
			$this->form_validation->set_message('cpf', 'O CPF informado não é válido.');
			return FALSE;
		}
		// Calcula e confere segundo dígito verificador
		for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--)
			$soma += $cpf{$i} * $j;
		$resto = $soma % 11;
		$resp = $cpf{10} == ($resto < 2 ? 0 : 11 - $resto);
		if ($resp)
			return TRUE;
		else {
			$this->form_validation->set_message('cpf', 'O CPF informado não é válido.');
			return FALSE;
		}
	}
		
	public function cep($cep) {
		
		$curl = curl_init();
		$url = "http://api.postmon.com.br/v1/cep/" . $cep;
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $url,
			CURLOPT_USERAGENT => 'Codular Sample cURL Request'
		));
		$resp = curl_exec($curl);
		curl_close($curl);
		
		if (empty($resp)) {
			$this->form_validation->set_message('cep', 'O CEP informado não é válido.');
			return FALSE;
		}
		else
			return TRUE;		
	}
}