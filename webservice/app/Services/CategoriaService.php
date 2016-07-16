<?php

namespace MongeralAegonApi\Services;

use Illuminate\Database\Eloquent\Model;
use MongeralAegonApi\Services\Contracts\CategoriaServiceInterface;
use Illuminate\Http\Request;
use Validator;

class CategoriaService implements CategoriaServiceInterface {
	
	/**
	 * @var Model
	 */
	private $_model;
	private $_paginacao = 15;
	
	/**
	 * Construtor da classe
	 * 
	 * @param Model $model Classe concreta que implemente a classe abstrata Model
	 */
	public function __construct(Model $model) {
		$this->_model = $model;
	}
	
	public function index() {
		//retorna um json com uma lista de categorias e pagina��o
		return response()->json($this->_model->paginate($this->_paginacao));
	}
	
	public function store(Request $request) {
		
		// regras para valida��o dos campos do formul�rio
		$rules = [
			'nome' => 'required|min:3'	
		];
		
		// realiza a valida��o dos campos
		$validator = Validator::make($request->all(), $rules);
		
		// verifica se os campos s�o v�lidos
		if($validator->fails()) {
			// retorna um json com os campos que n�o passaram na valida��o
			// e seta o status da requisi��o http para 422
			return response()->json($validator->errors (), 422);
		} else {
			
			//Cria uma categoria no banco de dados usando Mass Assignment
			$this->_model->create($request->all());
			
			// retorna um json com a mensagem de sucesso
			return response()->json("Categoria criada com sucesso.");
		}
		
	}
	
	public function show($id) {
		//retorna um json com os dados de uma categoria espec�fica
		return response()->json($this->_model->find($id));
	}
	
	public function update(Request $request, $id) {
		
		// regras para valida��o dos campos do formul�rio
		$rules = [
			'nome' => 'required|min:3'
		];
		
		// realiza a valida��o dos campos
		$validator = Validator::make($request->all(), $rules);
		
		// verifica se os campos s�o v�lidos
		if($validator->fails()) {
			// retorna um json com os campos que n�o passaram na valida��o
			// e seta o status da requisi��o http para 422
			return response()->json($validator->errors (), 422);
		} else {
			
			// Encontra o produto com o id especificado na requisi��o
			// e atualiza os dados do produto com os dados que foram enviados na requisi��o
			$categoria = $this->_model->find($id);
			$categoria->update($request->all());
				
			// retorna um json com a mensagem de sucesso
			return response()->json("Categoria atualizada com sucesso.");
		}
		
	}
	
	public function destroy($id) {
		
		//remove uma categoria do banco de dados
		$this->_model->destroy($id);
		
		//retorna um json com a mensagem de exclus�o
		return response()->json("Categoria removida com sucesso.");
	}
}