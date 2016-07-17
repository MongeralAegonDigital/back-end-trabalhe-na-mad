<?php

namespace MongeralAegonApi\Http\Controllers;
use Illuminate\Http\Request;
use MongeralAegonApi\Services\Contracts\ProdutoServiceInterface;

class ProdutoController extends Controller {
	
	/**
	 * @var ProdutoServiceInterface
	 */
	private $_produtoService;
	
	public function __construct(ProdutoServiceInterface $service)
	{
		//recebe a instância da classe concreta que implementa ProdutoServiceInterface
		$this->_produtoService = $service;
	}
	
	public function index(Request $request) {
		//delega a tratamento da requisição para a classe ProdutoService
		return $this->_produtoService->index($request);
	}
	
	public function store(Request $request) {
		//delega a tratamento da requisição para a classe ProdutoService
		return $this->_produtoService->store($request);
	}
	
	public function show($id) {
		//delega a tratamento da requisição para a classe ProdutoService
		return $this->_produtoService->show($id);
	}
	
	public function update(Request $request, $id) {
		//delega a tratamento da requisição para a classe ProdutoService
		return $this->_produtoService->update($request, $id);
	}
	
	public function destroy($id) {
		//delega a tratamento da requisição para a classe ProdutoService
		return $this->_produtoService->destroy($id);
	}
}
