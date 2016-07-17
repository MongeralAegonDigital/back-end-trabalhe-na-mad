webApp.factory('CategoriaService',[
	'$resource',
	'constantes',
	function($resource, constantes) {

		var _url = constantes.api.url + constantes.api.path.categoria;

		return {

			//obtém a lista de categorias
			//Método GET
			'listar': function(page) {
				return $resource((page) ? page : _url).get().$promise;
			},

			//obtém os dados de uma categoria específica
			//Método GET
			'detalhes': function(_id) {
				return $resource(_url + "/:id").get({id:_id}).$promise;
			},

			//cadastra uma categoria
			//Método POST
			'cadastrar': function(input) {
				return $resource(_url).save(input).$promise; 
			},

			//atualiza os dados de uma categoria específica
			//Método PUT/PATCH
			'atualizar': function(_id) {
				return $resource(_url + "/:id", null, {
					'update': { method:'PUT' }
				}).update({id:_id}).$promise;
			},

			//deleta uma categoria específico
			//Método DELETE
			'remover': function(_id) {
				return $resource(_url + "/:id", null, {
					'delete': { method:'DELETE' }
				}).delete({id:_id}).$promise;
			}

		};

	}
]);