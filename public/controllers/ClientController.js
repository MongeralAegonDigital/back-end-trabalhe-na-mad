angular.module('Mongeral')
.controller('ClientController', function($scope, ClientService, CepSearch){
    $scope.cepValido = false;
    $scope.client = {};
});