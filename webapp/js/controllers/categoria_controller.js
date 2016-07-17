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