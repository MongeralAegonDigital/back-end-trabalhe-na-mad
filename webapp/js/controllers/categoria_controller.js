webApp.controller('CategoriaCtrl', [
	'$log',
	'$rootScope',
	'categorias',
	function($log, $rootScope, categorias) {

		$rootScope.activeLoader = false;
		
		var _self = this;
		_self.categorias = categorias;
		
		$log.log(_self.categorias);
	}

]);