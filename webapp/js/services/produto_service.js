webApp.factory('ProdutoService',[
	'$resource',
	'constantes',
	function($resource, constantes) {

		var _url = constantes.api.url + constantes.api.path.produto;

		return {

			//Método GET
			'listar': function(page) {
				return $resource(_url).get().$promise;
			},

			//Método GET
			'detalhes': function(_id) {
				return $resource(_url + "/:id").get({id:_id}).$promise;
			},

			//Método POST
			'cadastrar': function(input) {
				return $resource(_url).save($input).$promise; 
			},

			//Método PUT/PATCH
			'atualizar': function(_id) {
				return $resource(_url + "/:id", null, {
					'update': { method:'PUT' }
				}).update({id:_id}).$promise;
			},

			//Método DELETE
			'remover': function(_id) {
				return $resource(_url + "/:id", null, {
					'delete': { method:'DELETE' }
				}).delete({id:_id}).$promise;
			}

		};

	}
]);