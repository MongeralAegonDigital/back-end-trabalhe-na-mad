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
		
		//retorna um json com uma lista de produtos e paginação
		return response()->json($query->paginate($this->_paginacao));
	}
	
	public function store(Request $request)
	{
		// regras para validação dos campos do formulário
		$rules = [
			'nome' => 'required|min:6',
			'data_fabricacao' => 'required|date_format:d/m/Y',
			'tamanho' => 'required|numeric',
			'largura' => 'required|numeric',
			'peso' => 'required|numeric',
			'categorias.*.categoria_id' => 'required'
		];
				
		// realiza a validação dos campos
		$validator = Validator::make($request->all(), $rules);
		
		// verifica se os campos são válidos
		if ($validator->fails()) {
			// retorna um json com os campos que não passaram na validação
			// e seta o status da requisição http para 422
			return response()->json($validator->errors (), 422);
		} else {
			
			//previne a inclusão do produto sem uma categoria
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
		//retorna um json com os dados de um produto específico
		return response()->json($this->_model->find($id));
	}
	
	public function update(Request $request, $id)
	{
		// regras para validação dos campos do formulário
		$rules = [
			'nome' => 'required|min:6',
			'data_fabricacao' => 'required|date_format:d/m/Y',
			'tamanho' => 'required|numeric',
			'largura' => 'required|numeric',
			'peso' => 'required|numeric',
			'categorias.*.categoria_id' => 'required'
		];
		
		// realiza a validação dos campos
		$validator = Validator::make($request->all(), $rules);
		
		// verifica se os campos são válidos
		if ($validator->fails()) {
			// retorna um json com os campos que não passaram na validação
			// e seta o status da requisição http para 422
			return response()->json($validator->errors(), 422);
		} else {
			
			//previne a atualização do produto sem uma categoria
			if(!is_array($request->input('categorias')) && count($request->input('categorias')) == 0) {
				return response()->json("Selecione algumas categorias para o produto.", 400);
			}
				
			// Encontra o produto com o id especificado na requisição
			// e atualiza os dados do produto com os dados que foram enviados na requisição
			$produto = $this->_model->find($id);
			$produto->update($request->all());
			
			//remove as categorias existentes para inserção de novas
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
		
		//retorna um json com a mesnagem de exclusão
		return response()->json("Produto removido com sucesso.");
	}
	
}