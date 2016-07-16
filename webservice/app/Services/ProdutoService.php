<?php
namespace MongeralAegonApi\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Validator;
use MongeralAegonApi\Services\Contracts\ProdutoServiceInterface;

/**
 * Classe que implementa a interface ProdutoServiceInterface
 * @author Marcus Mendes
 */
class ProdutoService implements ProdutoServiceInterface {
	
	/**
	 * @var Model
	 */
	private $_model;
	
	/**
	 * Construtor da classe
	 * @param Model $model Classe concreta que implemente a classe abstrata Model
	 */
	public function __construct(Model $model)
	{
		$this->_model = $model;
	}
	
	public function index() 
	{
		return response()->json($this->_model->all());
	}
	
	public function store(Request $request)
	{
		// regras para valida��o dos campos do formul�rio
		$rules = [
				'nome' => 'required',
				'data_fabricacao' => 'required',
				'tamanho' => 'required',
				'largura' => 'required',
				'peso' => 'required'
		];
		
		// realiza a valida��o dos campos
		$validator = Validator::make ( $request->all (), $rules );
		
		// verifica se os campos s�o v�lidos
		if ($validator->fails ()) {
			// retorna um json com os campos que n�o passaram na valida��o
			// e seta o status da requisi��o http para 422
			return response ()->json ( $validator->errors (), 422 );
		} else {
				
			//Cria um produto no banco de dados usando Mass Assignment
			$this->_model->create($request->all());
				
			// retorna um json com a mensagem de sucesso
			return response ()->json ( "Produto criado com sucesso." );
		}
	}
	
	public function show($id)
	{
		return response()->json($this->_model->find($id));
	}
	
	public function update(Request $request, $id)
	{
		// regras para valida��o dos campos do formul�rio
		$rules = [
				'nome' => 'required',
				'data_fabricacao' => 'required',
				'tamanho' => 'required',
				'largura' => 'required',
				'peso' => 'required'
		];
		
		// realiza a valida��o dos campos
		$validator = Validator::make ( $request->all (), $rules );
		
		// verifica se os campos s�o v�lidos
		if ($validator->fails()) {
			// retorna um json com os campos que n�o passaram na valida��o
			// e seta o status da requisi��o http para 422
			return response()->json( $validator->errors (), 422 );
		} else {
				
			// Encontra o produto com o id especificado na requisi��o
			// e atualiza os dados do produto com os dados que foram enviados na requisi��o
			$produto = $this->_model->find($id);
			$produto->update($request->all());
				
			// retorna um json com a mensagem de sucesso
			return response ()->json ( "Produto atualizado com sucesso." );
		}
	}
	
	public function destroy($id)
	{
		//remove um produto do banco de dados
		$this->_model->destroy($id);
		
		//retorna um json com a mesnagem de exclus�o
		return response()->json("Produto removido com sucesso.");
	}
	
}