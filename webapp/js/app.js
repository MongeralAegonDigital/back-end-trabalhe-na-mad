var webApp = (function(angular){

	var app = angular.module('webApp',[
		'ngRoute',
		'ngResource'
	]);

	app.config(['$routeProvider','$locationProvider', function($routeProvider, $locationProvider){

		$routeProvider.when('/produto',{
			templateUrl: 'partials/produto/index.html',
			controller: 'ProdutoCtrl',
			resolve: {
				produtos: function($rootScope, ProdutoService) {
					$rootScope.activeLoader = true;
					return ProdutoService.listar();
				}
			}
		});

		$routeProvider.when('/categoria',{
			templateUrl: 'partials/categoria/index.html',
			controller: 'CategoriaCtrl',
			resolve: {
				categorias: function($rootScope, CategoriaService) {
					$rootScope.activeLoader = true;
					return CategoriaService.listar();
				}
			}
		});

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