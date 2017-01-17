<?php
class Address extends CI_Model {

	public function __construct() {
			$this->load->database();
	}

	public function create() {
		
		$this->load->helper('url');
	
		$data = array(
			'logradouro' 	=> $this->input->post('rua'),
			'numero' 		=> $this->input->post('numero'),
			'complemento' 	=> $this->input->post('complemento'),
			'bairro' 		=> $this->input->post('bairro'),
			'cidade' 		=> $this->input->post('cidade'),
			'estado' 		=> $this->input->post('estado')
		);
		
		$result = $this->db->insert('address', $data);				
		return $this->db->insert_id();
	}
}