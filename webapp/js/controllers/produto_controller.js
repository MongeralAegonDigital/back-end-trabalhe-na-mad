webApp.controller('ProdutoCtrl',[
	'$log',
	'$rootScope',
	'$uibModal',
	'produtos',
	'ProdutoService',
	'CategoriaService',
	function($log, $rootScope, $uibModal, produtos, ProdutoService, CategoriaService) {
		
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