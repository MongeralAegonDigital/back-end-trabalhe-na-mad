<?php

namespace MongeralAegonApi\Http\Controllers;

use Illuminate\Http\Request;
use MongeralAegonApi\Services\Contracts\CategoriaServiceInterface;

class CategoriaController extends Controller
{
	/**
	 * @var CategoriaServiceInterface
	 */
    private $_categoriaService;
    
    public function __construct(CategoriaServiceInterface $categoriaService)
    {
    	//recebe a instância da classe concreta que implementa CategoriaServiceInterface
    	$this->_categoriaService = $categoriaService;
    }
	
    public function index()
    {
    	//delega a tratamento da requisição para a classe CategoriaService
        return $this->_categoriaService->index();
    }

    public function store(Request $request)
    {
    	//delega a tratamento da requisição para a classe CategoriaService
        return $this->_categoriaService->store($request);
    }
    
    public function show($id)
    {
    	//delega a tratamento da requisição para a classe CategoriaService
        return $this->_categoriaService->show($id);
    }

    public function update(Request $request, $id)
    {
    	//delega a tratamento da requisição para a classe CategoriaService
        return $this->_categoriaService->update($request, $id);
    }

    public function destroy($id)
    {
    	//delega a tratamento da requisição para a classe CategoriaService
        return $this->_categoriaService->destroy($id);
    }
}
