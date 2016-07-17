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
					return ProdutoService.listar();
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
					return CategoriaService.listar();
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