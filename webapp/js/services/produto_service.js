webApp.factory('ProdutoService',[
	'$resource',
	'constantes',
	function($resource, constantes) {

		var _url = constantes.api.url + constantes.api.path.produto;

		return {

			//obtém a lista de produtos
			//Método GET
			'listar': function(page, params) {
				return $resource((page) ? page : _url).get(params).$promise;
			},

			//obtém os dados de um produto específico
			//Método GET
			'detalhes': function(_id) {
				return $resource(_url + "/:id").get({id:_id}).$promise;
			},

			//cadastra um produto
			//Método POST
			'cadastrar': function(input) {
				return $resource(_url).save(input).$promise; 
			},

			//atualiza os dados de um produto específica
			//Método PUT/PATCH
			'atualizar': function(_id) {
				return $resource(_url + "/:id", null, {
					'update': { method:'PUT' }
				}).update({id:_id}).$promise;
			},	

			//deleta um produto específico
			//Método DELETE
			'remover': function(_id) {
				return $resource(_url + "/:id", null, {
					'delete': { method:'DELETE' }
				}).delete({id:_id}).$promise;
			}

		};

	}
]);