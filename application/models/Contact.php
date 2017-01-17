<?php
class Contact extends CI_Model {

	public function __construct() {
			$this->load->database();
	}

	public function create($addressID) {
		
		$this->load->helper('url');
	
		$data = array(
			'cpf' 			=> $this->input->post('cpf'),
			'password'		=> sha1($this->input->post('password')),
			'name' 			=> $this->input->post('name'),
			'phone' 		=> $this->input->post('tel'),
			'email' 		=> $this->input->post('email'),
			'dob' 			=> $this->input->post('data'),
			'endereco' 		=> intval($addressID),
			'rg' 			=> $this->input->post('rg'),
			'dataExp' 		=> $this->input->post('dataExp'),
			'orgaoExp' 		=> $this->input->post('orgao'),
			'estadoCivil'	=> $this->input->post('estCivil'),
			'categoria' 	=> $this->input->post('categoria'),
			'empresa' 		=> $this->input->post('empresa')
		);
			
		$result = $this->db->insert('contact', $data);				
		return $this->db->insert_id();
	}
}