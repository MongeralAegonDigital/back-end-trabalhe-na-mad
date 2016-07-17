webApp.controller('CategoriaCtrl', [
	'$log',
	'$rootScope',
	'$uibModal',
	'categorias',
	'CategoriaService',
	function($log, $rootScope, $uibModal, categorias, CategoriaService) {

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