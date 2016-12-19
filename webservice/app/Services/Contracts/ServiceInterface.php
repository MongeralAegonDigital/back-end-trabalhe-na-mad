<?php
namespace MongeralAegonApi\Services\Contracts;
use Illuminate\Http\Request;

/**
 * Contrato para implementaчуo de serviчos
 * @author Marcus Mendes
 */
interface ServiceInterface {
	
	/**
	 * Mщtodo que lista todos os produtos
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request);
	
	/**
	 * Mщtodo que cria um novo produto
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request);
	
	/**
	 * Mщtodo que mostra as informaчѕes de um produto especэfico
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id);
	
	/**
	 * Mщtodo que atualiza um produto especэfico
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id);
	
	/**
	 * Mщtodo que remove um produto
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id);
	
}