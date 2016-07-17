<?php
namespace MongeralAegonApi\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use MongeralAegonApi\Services\Contracts\ProdutoServiceInterface;
use Validator;

/**
 * Classe que implementa a interface ProdutoServiceInterface
 * @author Marcus Mendes
 */
class ProdutoService implements ProdutoServiceInterface {
	
	/**
	 * @var Model
	 */
	private $_model;
	private $_paginacao = 15;
	
	/**
	 * Construtor da classe
	 * @param Model $model Classe concreta que implemente a classe abstrata Model
	 */
	public function __construct(Model $model)
	{
		$this->_model = $model;
	}
	
	public function index(Request $request) 
	{
		$query = $this->_model->with(['categorias','categorias.categoria']);
		
		//definido no modelo Produto
		$query->tabelaFiltros($request);
		$query->tabelaSorte($request);
		
		//retorna um json com uma lista de produtos e pagina��o
		return response()->json($query->paginate($this->_paginacao));
	}
	
	public function store(Request $request)
	{
		// regras para valida��o dos campos do formul�rio
		$rules = [
			'nome' => 'required|min:6',
			'data_fabricacao' => 'required|date_format:d/m/Y',
			'tamanho' => 'required|numeric',
			'largura' => 'required|numeric',
			'peso' => 'required|numeric',
			'categorias.*.categoria_id' => 'required'
		];
				
		// realiza a valida��o dos campos
		$validator = Validator::make($request->all(), $rules);
		
		// verifica se os campos s�o v�lidos
		if ($validator->fails()) {
			// retorna um json com os campos que n�o passaram na valida��o
			// e seta o status da requisi��o http para 422
			return response()->json($validator->errors (), 422);
		} else {
			
			//previne a inclus�o do produto sem uma categoria
			if(!is_array($request->input('categorias')) && count($request->input('categorias')) == 0) {
				return response()->json("Selecione algumas categorias para o produto.", 400);
			}
						
			//Cria um produto no banco de dados usando Mass Assignment
			$produto = $this->_model->create($request->all());
			
			//inseri as categorias do produto via Mass Assignment
			foreach($request->input('categorias') as $categoria) {
				$produto->categorias()->create($categoria);
			}
				
			// retorna um json com a mensagem de sucesso
			return response()->json("Produto criado com sucesso.");
		}
	}
	
	public function show($id)
	{
		//retorna um json com os dados de um produto espec�fico
		return response()->json($this->_model->find($id));
	}
	
	public function update(Request $request, $id)
	{
		// regras para valida��o dos campos do formul�rio
		$rules = [
			'nome' => 'required|min:6',
			'data_fabricacao' => 'required|date_format:d/m/Y',
			'tamanho' => 'required|numeric',
			'largura' => 'required|numeric',
			'peso' => 'required|numeric',
			'categorias.*.categoria_id' => 'required'
		];
		
		// realiza a valida��o dos campos
		$validator = Validator::make($request->all(), $rules);
		
		// verifica se os campos s�o v�lidos
		if ($validator->fails()) {
			// retorna um json com os campos que n�o passaram na valida��o
			// e seta o status da requisi��o http para 422
			return response()->json($validator->errors(), 422);
		} else {
			
			//previne a atualiza��o do produto sem uma categoria
			if(!is_array($request->input('categorias')) && count($request->input('categorias')) == 0) {
				return response()->json("Selecione algumas categorias para o produto.", 400);
			}
				
			// Encontra o produto com o id especificado na requisi��o
			// e atualiza os dados do produto com os dados que foram enviados na requisi��o
			$produto = $this->_model->find($id);
			$produto->update($request->all());
			
			//remove as categorias existentes para inser��o de novas
			$produto->categorias()->delete();
			
			foreach($request->input('categorias') as $categoria) {
				$produto->categorias()->create($categoria);
			}
				
			// retorna um json com a mensagem de sucesso
			return response()->json("Produto atualizado com sucesso.");
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