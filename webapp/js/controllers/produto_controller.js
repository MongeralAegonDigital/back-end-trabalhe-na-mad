webApp.controller('ProdutoCtrl',[
	'$log',
	'$rootScope',
	'produtos',
	function($log, $rootScope, produtos) {
		
		//desativa o loader da página
		$rootScope.activeLoader = false;

		var _self = this;
		//recebe a listagem de produtos
		_self.produtos = produtos;

		_self.adicionarNovo = function() {
			alert("Adicionar Novo");
		};
	}

]);