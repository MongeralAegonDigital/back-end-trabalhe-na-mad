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