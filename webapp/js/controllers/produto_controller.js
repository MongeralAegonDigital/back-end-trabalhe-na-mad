webApp.controller('ProdutoCtrl',[
	'$log',
	'$rootScope',
	'produtos',
	function($log, $rootScope, produtos) {
		
		$rootScope.activeLoader = false;

		var _self = this;
		_self.produtos = produtos;

		$log.log(_self.produtos);
	}

]);