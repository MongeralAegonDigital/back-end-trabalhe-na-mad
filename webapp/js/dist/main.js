var webApp = (function(angular){

	var app = angular.module('webApp',[
		'ngRoute',
		'ngResource',
		'ui.bootstrap'
	]);

	app.config(['$routeProvider','$locationProvider', function($routeProvider, $locationProvider){

		//define a rota produto
		$routeProvider.when('/produto',{
			templateUrl: 'partials/produto/index.html',
			controller: 'ProdutoCtrl',
			controllerAs: 'prod',
			resolve: {
				//obtém a lista de produtos cadatrados
				produtos: ['$rootScope','ProdutoService', function($rootScope, ProdutoService) {
					$rootScope.activeLoader = true;
					return ProdutoService.listar(null,null);
				}]
			}
		});

		//define a rota categoria
		$routeProvider.when('/categoria',{
			templateUrl: 'partials/categoria/index.html',
			controller: 'CategoriaCtrl',
			resolve: {
				//obtém a lista de categorias cadastras
				categorias: ['$rootScope','CategoriaService', function($rootScope, CategoriaService) {
					$rootScope.activeLoader = true;
					return CategoriaService.listar(null,null);
				}]
			}
		});

		//define a rota padrão caso não encontre um rota
		$routeProvider.otherwise({
			redirectTo: '/produto'
		});

		$locationProvider.html5Mode(true);
		$locationProvider.hashPrefix('!');
	
	}]);

	app.run(['$rootScope', function($rootScope){
		$rootScope.activeLoader = false;
	}]);

	return app;

})(angular);
webApp.constant('constantes',{
	'api': {
		'url':'http://www.webservice.dev/api',
		'path': {
			'produto': '/produto',
			'categoria': '/categoria'
		}
	}
});
webApp.factory('CategoriaService',[
	'$resource',
	'constantes',
	function($resource, constantes) {

		var _url = constantes.api.url + constantes.api.path.categoria;

		return {

			//obtém a lista de categorias
			//Método GET
			'listar': function(page) {
				return $resource(_url).get().$promise;
			},

			//obtém os dados de uma categoria específica
			//Método GET
			'detalhes': function(_id) {
				return $resource(_url + "/:id").get({id:_id}).$promise;
			},

			//cadastra uma categoria
			//Método POST
			'cadastrar': function(input) {
				return $resource(_url).save($input).$promise; 
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
				return $resource(_url).save($input).$promise; 
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
webApp.controller('AppCtrl',[

	'$scope',
	'$log',
	function($scope,$log) {

		var _self = this;

		//Itens do menu
		_self.menuItems = [
			{ 'path': '/produto', 'title':'Produto', 'selected': false },
			{ 'path': '/categoria', 'title':'Categoria', 'selected': false }
		];

		$scope.$on('$routeChangeSuccess', function(event,current,previous){

			_self.menuItems = _self.menuItems.map(function(item){

				if(current.$$route.originalPath == item.path) {
					item.selected = true;
				} else {
					item.selected = false;
				}

				return item;
			});

		});

	}

]);
webApp.controller('CategoriaCtrl', [
	'$log',
	'$rootScope',
	'categorias',
	function($log, $rootScope, categorias) {

		//desativa o loader da página
		$rootScope.activeLoader = false;

		var _self = this;
		//recebe a listagem de categorias
		_self.categorias = categorias;
		
		$log.log(_self.categorias);
	}

]);
webApp.controller('ProdutoCtrl',[
	'$log',
	'$rootScope',
	'produtos',
	'ProdutoService',
	function($log, $rootScope, produtos, ProdutoService) {
		
		//desativa o loader da página
		$rootScope.activeLoader = false;

		var _self = this;

		//paginação
		//url da próxima página
		_self.proximaPagina = produtos.next_page_url;
		_self.paginaAnterior = produtos.prev_page_url;

		//recebe a listagem de produtos
		_self.produtos = produtos.data;

		//recebe os dados do formulário do filtro
		_self.produto = {};

		//método que avança a paginação
		_self.proxima = function() {
			if(_self.proximaPagina) {
				$rootScope.activeLoader = true;
				paginacao(_self.proximaPagina, null);
			}
		};

		//método que volta a paginação
		_self.anterior = function() {
			if(_self.paginaAnterior) {
				$rootScope.activeLoader = true;
				paginacao(_self.paginaAnterior, null);
			}
		};
		
		//método que adiciona um novo produto
		_self.adicionarNovo = function() {
			alert("Adicionar Novo");
		};

		//método que filtra os dados da tabela
		_self.buscar = function(produto) {
			$rootScope.activeLoader = true;
			paginacao(null, produto);
		};

		function paginacao(url, params) {
			ProdutoService.listar(url, params).then(function(response){
				$rootScope.activeLoader = false;
				_self.proximaPagina = response.next_page_url;
				_self.paginaAnterior = response.prev_page_url;
				_self.produtos = response.data;
			});
		}
	}

]);