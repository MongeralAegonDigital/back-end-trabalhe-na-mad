<?php
namespace MongeralAegonApi\Services;

use MongeralAegonApi\Services\Contracts\CategoriaServiceInterface;
use Illuminate\Database\Eloquent\Model;

class CategoriaService implements CategoriaServiceInterface {
	
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
        //
    }

    public function store(Request $request)
    {
        //
    }
    
    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}