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