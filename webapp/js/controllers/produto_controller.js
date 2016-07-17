webApp.controller('ProdutoCtrl',[
	'$log',
	'$rootScope',
	'$uibModal',
	'produtos',
	'ProdutoService',
	function($log, $rootScope, $uibModal, produtos, ProdutoService) {
		
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
			alert("Adicionar Novo");
		};

		//método que filtra os dados da tabela
		_self.buscar = function(produto) {
			$log.log(produto);
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