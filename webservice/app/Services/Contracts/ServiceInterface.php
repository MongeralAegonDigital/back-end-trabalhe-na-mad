<?php
namespace MongeralAegonApi\Services\Contracts;
use Illuminate\Http\Request;

/**
 * Contrato para implementa��o de servi�os
 * @author Marcus Mendes
 */
interface ServiceInterface {
	
	/**
	 * M�todo que lista todos os produtos
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request);
	
	/**
	 * M�todo que cria um novo produto
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request);
	
	/**
	 * M�todo que mostra as informa��es de um produto espec�fico
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id);
	
	/**
	 * M�todo que atualiza um produto espec�fico
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id);
	
	/**
	 * M�todo que remove um produto
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id);
	
}