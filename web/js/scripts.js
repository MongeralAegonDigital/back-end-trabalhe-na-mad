$(function() {
    
    /**
     * Bootstrap Tooltip
     */
    $('body').tooltip({
        selector: '[rel=tooltip]'
    });
    
});
/**
 * Instantiate the "ns_teste" module and the dependencies.
 */
var app = angular.module("ns_teste1", [
    "ngRoute",
    "ngResource",
    "ngMessages",
    "ngFlash",
    "ui.mask",
    "vtex.ngCurrencyMask"
]);
app.config(['$httpProvider', function($httpProvider) {
    $httpProvider.interceptors.push("timestampInterceptor");
}]);



/**
 * Route Configuration.
 */
app.config(['$routeProvider', function($routeProvider){
    $routeProvider
    
    .when('/', {
        templateUrl: 'templates/homepage.html'
    })
    
    .when('/api', {
        templateUrl: 'templates/api.html',
    })
    
    .when('/cadastro', {
        templateUrl: 'templates/clients/create.html',
        controller: 'createClientCtrl'
    })
    
    .when('/clientes', {
        templateUrl: 'templates/clients/list.html',
        controller: 'listClientCtrl',
        resolve: {
            clients: ['$route', 'Client', function ($route, Client) {
                return Client.query().$promise;
            }]
        }
    })
    
    .when('/clientes/:id/editar', {
        templateUrl: 'templates/clients/update.html',
        controller: 'updateClientCtrl',
        resolve: {
            client: ['$route', 'Client', function ($route, Client) {
                return Client.get({
                    id: $route.current.params.id
                }).$promise;
            }]
        }
    })
    
    .when('/clientes/:id/editar-senha', {
        templateUrl: 'templates/clients/update_password.html',
        controller: 'updateClientPasswordCtrl',
        resolve: {
            client: ['$route', 'Client', function ($route, Client) {
                return Client.get({
                    id: $route.current.params.id
                }).$promise;
            }]
        }
    })
    
    .when('/clientes/:id/deletar', {
        templateUrl: 'templates/clients/delete.html',
        controller: 'deleteClientCtrl',
        resolve: {
            client: ['$route', 'Client', function ($route, Client) {
                return Client.get({
                    id: $route.current.params.id
                }).$promise;
            }]
        }
    })
    
    .when('/clientes/:id', {
        templateUrl: 'templates/clients/read.html',
        controller: 'readClientCtrl',
        resolve: {
            client: ['$route', 'Client', function ($route, Client) {
                return Client.get({
                    id: $route.current.params.id
                }).$promise;
            }]
        }
    })
    
    .when('/404', {
        templateUrl: 'templates/errors/404.html'
    })
    
    .when('/500', {
        templateUrl: 'templates/errors/500.html'
    })
    
    .otherwise({
        redirectTo: '404'
    })
    
    ;
}]);
/**
 * Controller to create a client.
 */
app.controller('createClientCtrl', ['$scope', '$location', 'Client', 'Flash', function($scope, $location, Client, Flash) {
    $scope.client = new Client();
    $scope.isSaving = false;
        
    // saves the client
    function save(client) {
        $scope.isSaving = true;
        
        client.$save(function(m) {
            Flash.create('success', '<strong>Muito bem!</strong> O cliente foi adicionado com sucesso!');
            
            $location.path('/clientes/' + m.client.id);
            $location.replace();
        }, function(response) {
            if (response.status === 400) {
                Flash.create('danger', '<strong>Ooops!</strong> Ocorreu um erro ao salvar o cliente. Tente novamente.');
            }
            $scope.isSaving = false;
        });
    };
    
    // handle form submission
    $scope.handleSubmit = function(clientForm, client) {
        if (clientForm.$valid) {
            save(client);
        }
    };
}]);
/**
 * Controller to delete a client.
 */
app.controller('deleteClientCtrl', ['$scope', '$location', 'client', 'Flash', function($scope, $location, client, Flash) {
    $scope.client = client;
    $scope.isSaving = false;
    
    // delete the client
    $scope.delete = function(client) {
        $scope.isSaving = true;
        
        client.$delete(function(m) {
            Flash.create('success', '<strong>Muito bem!</strong> O cliente foi deletado com sucesso!');
            
            $location.path('/clientes');
            $location.replace();
        }, function(response) {
            if (response.status === 400) {
                Flash.create('danger', '<strong>Ooops!</strong> Ocorreu um erro ao deletar o cliente. Tente novamente.');
            }
            $scope.isSaving = false;
        });
    };
}]);
/**
 * Controller to list all the clients.
 */
app.controller('listClientCtrl', ['$scope', 'clients', function($scope, clients) {
    $scope.clients = clients;
    $scope.nbClients = clients.length;
}]);
/**
 * Controller to show details of a client.
 */
app.controller('readClientCtrl', ['$scope', 'client', function($scope, client) {
    $scope.client = client;
}]);
/**
 * Controller to update a client.
 */
app.controller('updateClientCtrl', ['$scope', '$location', 'client', 'Flash', function($scope, $location, client, Flash) {
    $scope.clientCurName = client.name;
    $scope.client = client;
    $scope.isSaving = false;
        
    // saves the client
    function save(client) {
        $scope.isSaving = true;
        
        client.$save(function(m) {
            Flash.create('success', '<strong>Muito bem!</strong> O cliente foi editado com sucesso!');
            
            $location.path('/clientes/' + m.client.id);
            $location.replace();
        }, function(response) {
            if (response.status === 400) {
                Flash.create('danger', '<strong>Ooops!</strong> Ocorreu um erro ao salvar o cliente. Tente novamente.');
            }
            $scope.isSaving = false;
        });
    };
    
    // handle form submission
    $scope.handleSubmit = function(clientForm, client) {
        if (clientForm.$valid) {
            save(client);
        }
    };
}]);
/**
 * Controller to update a client password.
 */
app.controller('updateClientPasswordCtrl', ['$scope', '$location', 'client', 'Flash', function($scope, $location, client, Flash) {
    $scope.clientCurName = client.name;
    $scope.client = client;
    $scope.isSaving = false;
        
    // saves the client
    function save(client) {
        $scope.isSaving = true;
        
        client.$save(function(m) {
            Flash.create('success', '<strong>Muito bem!</strong> A senha foi alterada com sucesso!');
            
            $location.path('/clientes/' + m.client.id);
            $location.replace();
        }, function(response) {
            if (response.status === 400) {
                Flash.create('danger', '<strong>Ooops!</strong> Ocorreu um erro ao salvar a nova senha. Tente novamente.');
            }
            $scope.isSaving = false;
        });
    };
    
    // handle form submission
    $scope.handleSubmit = function(clientForm, client) {
        if (clientForm.$valid) {
            save(client);
        }
    };
}]);
/**
 * Multiples the ng-model by 10 to work with ng-currency-mask.
 * 
 * From ng-currency-mask readme:
 * "Expects it to be an int, in cents. e.g.: 100 ($ 1), 420 ($ 4,20)"
 * 
 * See https://github.com/vtex/ng-currency-mask for more details.
 */
app.directive('currencyMaskNormalize', function () {
    return {
        require: 'ngModel',
        restrict: 'A',
        scope: {
            ngModel: '='
        },
        link: function ($scope, elem, $attrs, ngModel) {
            if ($scope.ngModel) {
                $scope.ngModel *= 100;
            }
        }
    };
});
/**
 * Converts a string to Date inside a date input.
 */
app.directive('dateNormalize', function () {
    return {
        require: 'ngModel',
        restrict: 'A',
        link: function ($scope, elem, $attrs, ngModel) {
            ngModel.$formatters.push(function (value) {
                if (value) {
                    return new Date(value);
                } else {
                    return null;
                }
            });
        }
    };
});
/**
 * Fetches for address details using the zip code.
 * 
 * Zip-to-Address API: 
 * URL                          METHOD      BODY        RESULT
 * api/zip-to-address/:cep      GET         empty       Returns address details, if exists.
 * 
 */
app.directive('findAddressByZipcode', ['$http', 'Flash', function ($http, Flash) {
    return {
        restrict: 'A',
        scope: {
            address: '='
        },
        link: function($scope, elem, $attrs) {
            $scope.$watch('address.zipcode', function(newValue, oldValue) {
                if (!newValue) {
                    return;
                }
                
                if (!newValue.match(/(\d{5})[\-](\d{3})/)) {
                    return;
                }
                
                Flash.clear();
                
                $http.get('api/zip-to-address/' + newValue).then(function(response) {
                    if (angular.equals([], response.data)) {
                        Flash.create('warning', 'Não encontramos o enderço desse CEP. Por favor, preencha o formulário manualmente.', 0, { container: 'flash-address' });
                    } else {
                        $scope.address.route = response.data.route;
                        $scope.address.neighborhood = response.data.neighborhood;
                        $scope.address.city = response.data.city;
                        $scope.address.state = response.data.state;
                    }
                }, function(response) {
                    Flash.create('danger', 'Não foi possível buscar o endereço. Por favor, preencha o formulário manualmente.', 0, { container: 'flash-address' });
                });
            }, true);
        }
    };
}]);
/**
 * Shows "loading" gif while a route is loading and handle some route errors.
 */
app.directive('routeResolve', ['$rootScope', '$location', function ($rootScope, $location) {
    return {
        restrict: 'E',
        replace: true,
        template: '<div><div class="loading" ng-if="isRouteLoading"></div></div>',
        link: function ($scope, elem, $attrs) {
            $scope.isRouteLoading = false;

            $rootScope.$on('$routeChangeStart', function () {
                $scope.isRouteLoading = true;
            });

            $rootScope.$on('$routeChangeSuccess', function () {
                $scope.isRouteLoading = false;
            });
            
            $rootScope.$on('$routeChangeError', function (e, $curRoute, $prevRoute, rejection) {
                if (rejection.status === 404) {
                    $location.path('/404');
                    $location.replace();
                }
                else if (rejection.status === 500) {
                    $location.path('/500');
                    $location.replace();
                }
            });
        }
    };
}]);
/**
 * Checks if the CPF is valid.
 */
app.directive('validateCpf', function() {
    return {
        restrict: 'A',
        require: 'ngModel',
        link: function($scope, elem, $attrs, ngModel) {
            ngModel.$validators.cpf = function (modelValue, viewValue) {
                if (!modelValue) {
                    return true;
                }
                
                var numbers = modelValue.replace(/[^0-9]+/g, '');
                
		if (numbers.length !== 11 ||
                    numbers == '00000000000' ||
                    numbers == '11111111111' ||
                    numbers == '22222222222' ||
                    numbers == '33333333333' ||
                    numbers == '44444444444' ||
                    numbers == '55555555555' ||
                    numbers == '66666666666' ||
                    numbers == '77777777777' ||
                    numbers == '88888888888' ||
                    numbers == '99999999999') {
                    return false;
		}
		
		var i;
                var j;
		var d1 = 0;
                var d2 = 0;
		for (i = 0, j = 11; i <= 8; i++, j--) {
                    d1 += numbers[i] * (j-1);
                    d2 += numbers[i] * j;
		}
		d2 += numbers[i] * j;
		
		var c1 = d1%11 < 2 ? 0 : 11-(d1%11);
		var c2 = d2%11 < 2 ? 0 : 11-(d2%11);
		return !(c1 != numbers[9] || c2 != numbers[10]);
            };
        }
    };
});
/**
 * Checks if two variables are equals.
 */
app.directive('validateEqualsTo', function() {
    return {
        restrict: 'A',
        require: 'ngModel',
        scope: {
            equalsTo: '='
        },
        link: function($scope, elem, $attrs, ngModel) {
            ngModel.$validators.equalsTo = function (modelValue) {
                if (!modelValue) {
                    return true;
                }
                return angular.equals(modelValue, $scope.equalsTo);
            };
        }
    };
});
/**
 * Checks if the CPF already exists in database.
 */
app.directive('validateUniqueCpf', ['$http', '$q', function($http, $q) {
    return {
        restrict: 'A',
        require: 'ngModel',
        scope: {
            client: '='
        },
        link: function($scope, elem, $attrs, ngModel) {
            ngModel.$asyncValidators.uniqueCpf = function (modelValue, viewValue) {
                if (!modelValue) {
                    return true;
                }
                
                return $http.get('api/clients?cpf=' + modelValue).then(function (response) {
                    if (response.data.length === 0) {
                        return true;
                    } else if (response.data[0].id === $scope.client.id) {
                        return true;
                    } else {
                        return $q.reject('CPF já cadastrado.');
                    }
                });
            };
        }
    };
}]);
/**
 * Converts a string to a formatted date according to the current locale.
 */
app.filter('localeDate', function () {
    return function (dateString) {
        if (dateString) {
            var date = new Date(dateString);
            return date.toLocaleDateString();
        } else {
            return '';
        }
    };
});
/**
 * Converts a formatted phone number to integer.
 */
app.filter('tel', function () {
    return function (phoneString) {
        if (phoneString) {
            return '+55' + phoneString.replace(/[^0-9]+/g, '');
        } else {
            return '';
        }
    };
});
app.factory('timestampInterceptor', function() {
    return {
        request: function (config) {
            var regexp = new RegExp('^templates');
            if (regexp.test(config.url)) {
                var time = new Date().getTime();
                config.url += '?timestamp=' + time;
            }
            return config;
        }
    };
});
(function() {
  angular.module('vtex.ngCurrencyMask', []).service('CurrencyMaskUtils', function() {
    var CurrencyMaskUtils;
    return CurrencyMaskUtils = (function() {
      function CurrencyMaskUtils() {}

      CurrencyMaskUtils.clearSeparators = function(value) {
        if (value == null) {
          return;
        }
        if (typeof value === 'number') {
          value = value.toString();
        }
        return parseFloat(value.replace(/,/g, '.').replace(/\.(?![^.]*$)/g, ''));
      };

      CurrencyMaskUtils.toIntCents = function(value) {
        if (value != null) {
          return Math.abs(parseInt(CurrencyMaskUtils.clearSeparators(value) * 100));
        }
      };

      CurrencyMaskUtils.toFloatString = function(value) {
        if (value != null) {
          return (Math.abs(value / 100)).toFixed(2);
        }
      };

      return CurrencyMaskUtils;

    })();
  }).directive('currencyMask', function($timeout, $filter, CurrencyMaskUtils) {
    return {
      restrict: 'A',
      require: '?ngModel',
      link: function(scope, elem, attrs, ctrl) {
        var Utils, applyCurrencyFilter, errorPrefix;
        errorPrefix = 'VTEX ngCurrencyMask';
        if (!ctrl) {
          throw new Error(errorPrefix + " requires ngModel!");
        }
        if (!/input/i.test(elem[0].tagName)) {
          throw new Error(errorPrefix + " should be binded to <input />.");
        }
        Utils = CurrencyMaskUtils;
        applyCurrencyFilter = function(value) {
          if (value == null) {
            value = ctrl.$viewValue || elem[0].value;
          }
          if (value != null) {
            return elem[0].value = $filter('currency')(Utils.clearSeparators(value), '');
          }
        };
        elem[0].addEventListener('blur', function() {
          return applyCurrencyFilter();
        });
        ctrl.$parsers.unshift(Utils.toIntCents);
        ctrl.$formatters.unshift(Utils.toFloatString);
        return $timeout(applyCurrencyFilter);
      }
    };
  });

}).call(this);

/**
 * Client Resource Factory.
 * 
 * Clients API: 
 * URL                  METHOD      BODY        RESULT
 * api/clients          GET         empty       Returns all clients
 * api/clients          POST        JSON        Creates a new client
 * api/clients/:id      GET         JSON        Returns a single client
 * api/clients/:id      POST        JSON        Updates an existing client
 * api/clients/:id      DELETE      empty       Deletes an existing client
 * 
 */
app.factory('Client', ['$resource', function($resource){
    return $resource('api/clients/:id', { id: '@id' });
}]);