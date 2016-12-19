var webApp = (function(angular){

	var app = angular.module('webApp',[
		'ngRoute',
		'ngResource',
		'ui.bootstrap',
		'toastr'
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
			controllerAs: 'cat',
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
				}).update({id:_id, _method:'PUT'}).$promise;
			},

			//deleta uma categoria específico
			//Método DELETE
			'remover': function(_id) {
				return $resource(_url + "/:id", null, {
					'delete': { method:'DELETE' }
				}).delete({id:_id, _method:'DELETE'}).$promise;
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
				return $resource(_url).save(input).$promise; 
			},

			//atualiza os dados de um produto específica
			//Método PUT/PATCH
			'atualizar': function(_id) {
				return $resource(_url + "/:id", null, {
					'update': { method:'PUT' }
				}).update({id:_id, _method:'PUT'}).$promise;
			},	

			//deleta um produto específico
			//Método DELETE
			'remover': function(_id) {
				return $resource(_url + "/:id", null, {
					'delete': { method:'DELETE' }
				}).delete({id:_id, _method:'DELETE'}).$promise;
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
	'$uibModal',
	'categorias',
	'CategoriaService',
	'toastr',
	function($log, $rootScope, $uibModal, categorias, CategoriaService, toastr) {

		//desativa o loader da página
		$rootScope.activeLoader = false;

		var _self = this;

		//paginação
		//url da próxima página
		_self.proximaPagina = categorias.next_page_url;
		_self.paginaAnterior = categorias.prev_page_url;

		//recebe a listagem de categorias
		_self.categorias = categorias.data;
		
		//método que avança a paginação
		_self.proxima = function() {
			if(_self.proximaPagina) {
				$rootScope.activeLoader = true;
				paginacao(_self.proximaPagina);
			}
		};

		//método que volta a paginação
		_self.anterior = function() {
			if(_self.paginaAnterior) {
				$rootScope.activeLoader = true;
				paginacao(_self.paginaAnterior);
			}
		};

		//método que adiciona um nova categoria
		_self.adicionarNova = function() {
			var modalAddNova = $uibModal.open({
		      animation: true,
		      templateUrl: './partials/categoria/form.html',
		      controller: 'CatAdicionarInstanceCtrl',
		      controllerAs: 'catAdd',
		      size: "md"
		    });

		    modalAddNova.result.then(function() {
		    	//recarrega a tabela quando é adicionado uma nova categoria
		    	$rootScope.activeLoader = true;
		      	paginacao(null, null);
		    });
		};

		//método que remove uma categoria
		_self.remover = function(categoria) {

			if(confirm("Tem certeza que deseja realizar essa ação?")) {

				CategoriaService.remover(categoria.id).then(function(response){
					toastr.success(response.msg, "Sucesso");
					$rootScope.activeLoader = true;
					paginacao(null, null);
				});

			}

		};

		function paginacao(url) {
			CategoriaService.listar(url).then(function(response){
				$rootScope.activeLoader = false;
				_self.proximaPagina = response.next_page_url;
				_self.paginaAnterior = response.prev_page_url;
				_self.categorias = response.data;
			});
		}
	}

]);

webApp.controller('CatAdicionarInstanceCtrl',[
	'$log',
	'$uibModalInstance',
	'CategoriaService',
	'toastr',
	function($log, $uibModalInstance, CategoriaService, toastr) {

		var _self = this;
		_self.titulo = "Adicionar Nova"; //título do modal
		_self.categoria = {};
		_self.btnLoading = false;

		//método que adiciona uma nova categoria
		_self.adicionar = function(produto) {
			
			_self.btnLoading = true;
		
			//Salva a categoria
			CategoriaService.cadastrar(produto).then(function(response){
				_self.btnLoading = false;
				_self.categoria = {};
				toastr.success(response.msg, "Sucesso");
				$uibModalInstance.close();
			});
			
		};

		//fecha o modal
		_self.cancel = function () {
		    $uibModalInstance.dismiss('cancel');
		};
	}
]);
webApp.controller('ProdutoCtrl',[
	'$log',
	'$rootScope',
	'$uibModal',
	'produtos',
	'ProdutoService',
	'CategoriaService',
	'toastr',
	function($log, $rootScope, $uibModal, produtos, ProdutoService, CategoriaService, toastr) {
		
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
				paginacao(_self.proximaPagina, _self.produto);
			}
		};

		//método que volta a paginação
		_self.anterior = function() {
			if(_self.paginaAnterior) {
				$rootScope.activeLoader = true;
				paginacao(_self.paginaAnterior, _self.produto);
			}
		};
		
		//método que adiciona um novo produto
		_self.adicionarNovo = function() {
			var modalAddNovo = $uibModal.open({
		      animation: true,
		      templateUrl: './partials/produto/form.html',
		      controller: 'AdicionarInstanceCtrl',
		      controllerAs: 'prodAdd',
		      size: "md",
		      resolve: {
		      	categorias: function() {
		      		//envia a lista de categoria para o AdicionarInstanceCtrl
		      		return CategoriaService.listar();
		      	}
		      }
		    });

		    modalAddNovo.result.then(function() {
		    	//recarrega a tabela quando é adicionado um novo produto
		    	$rootScope.activeLoader = true;
		      	paginacao(null, null);
		    });
		};

		//método que remove um produto
		_self.remover = function(produto) {

			if(confirm("Tem certeza que deseja realizar esse ação?")) {
				ProdutoService.remover(produto.id).then(function(response){
					toastr.success(response.msg, "Sucesso");
					$rootScope.activeLoader = true;
					paginacao(null, null);
				});
			}

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

webApp.controller('AdicionarInstanceCtrl',[
	'$log',
	'$uibModalInstance',
	'categorias',
	'ProdutoService',
	'toastr',
	function($log, $uibModalInstance, categorias, ProdutoService, toastr) {

		var _self = this;
		_self.titulo = "Adicionar Novo"; //título do modal
		_self.produto = {};
		_self.categorias = categorias.data;
		_self.btnLoading = false;

		//método que valida se o checkbox está marcado
		_self.selectedCheckbox = function(categorias) {

			if(categorias) {
				return Object.keys(categorias).some(function(key){
					return categorias[key];
				});
			}

			return false;

		};

		//método que adiciona um novo produto
		_self.adicionar = function(produto) {
			
			_self.btnLoading = true;
			_categorias = [];

			for(var prop in produto.categorias) {
				if(produto.categorias[prop] == true) {
					_categorias.push({categoria_id: prop});
				}
			}

			produto.categorias = _categorias;

			//Salva o produto
			ProdutoService.cadastrar(produto).then(function(response){
				_self.btnLoading = false;
				_self.produto = {};
				toastr.success(response.msg, "Sucesso");
				$uibModalInstance.close();
			});
			
		};

		//fecha o modal
		_self.cancel = function () {
		    $uibModalInstance.dismiss('cancel');
		};
	}
]);